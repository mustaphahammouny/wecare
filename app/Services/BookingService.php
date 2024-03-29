<?php

namespace App\Services;

use App\Data\BookingData;
use App\Data\BookingFilter;
use App\Data\PricingFilter;
use App\Enums\StatusList;
use App\Models\Booking;
use App\Models\Extra;
use App\Repositories\BookingRepository;
use App\Repositories\ExtraRepository;
use App\Repositories\PricingRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Support\Facades\DB;

class BookingService
{
    public function __construct(
        protected BookingRepository $bookingRepository,
        protected ExtraRepository $extraRepository,
        protected PricingRepository $pricingRepository
    ) {
    }

    public function paginate(BookingFilter $bookingFilter = null)
    {
        return $this->bookingRepository->paginate($bookingFilter);
    }

    public function find(int $id)
    {
        return $this->bookingRepository->find($id);
    }

    public function store(BookingData $bookingData)
    {
        try {
            DB::beginTransaction();

            $pricingFilter = PricingFilter::from(['duration' => $bookingData->duration]);
            $pricing = $this->pricingRepository->first($pricingFilter);
            $extras = $this->extraRepository->findIn($bookingData->extras);
            $extrasTotal = $extras->sum('price');

            $extras = $extras->reduce(function (array $carry, Extra $extra) {
                $carry[$extra->id] = ['extra_price' => $extra->price];

                return $carry;
            }, []);

            $bookingData->servicePrice = $pricing->price;
            $bookingData->total = $pricing->price * $bookingData->duration + $extrasTotal;
            $bookingData->extras = $extras;
            $bookingData->status = StatusList::Scheduled;

            $booking = $this->bookingRepository->store($bookingData);

            DB::commit();

            return $booking;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    public function download(Booking $booking)
    {
        try {
            $booking = $this->bookingRepository->find($booking->id);

            $pdf = Pdf::loadView('pdf.invoice', compact('booking'))->output();

            return [
                'name' => "{$booking->number}.pdf",
                'content' => $pdf,
            ];
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateStatus(Booking $booking, StatusList $status)
    {
        try {
            DB::beginTransaction();

            $this->bookingRepository->updateStatus($booking, $status);

            DB::commit();

            return $booking;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}
