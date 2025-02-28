<?php

namespace App\Services;

use App\Data\BookingData;
use App\Data\BookingFilter;
use App\Data\DurationFilter;
use App\Enums\BookingStatus;
use App\Models\Booking;
use App\Models\Extra;
use App\Repositories\BookingRepository;
use App\Repositories\ExtraRepository;
use App\Repositories\ServiceRepository;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class BookingService
{
    public function __construct(
        protected ServiceRepository $serviceRepository,
        protected BookingRepository $bookingRepository,
        protected ExtraRepository $extraRepository
    ) {}

    public function paginate(?BookingFilter $bookingFilter = null, array $with = [])
    {
        return $this->bookingRepository->paginate($bookingFilter, $with);
    }

    public function find(int $id)
    {
        return $this->bookingRepository->find($id);
    }

    public function store(BookingData $bookingData)
    {
        try {
            DB::beginTransaction();

            $service = $this->serviceRepository->find($bookingData->serviceId, [
                'durations' => fn($query) => $query->where('min', '<=', $bookingData->duration)
                    ->where('max', '>=', $bookingData->duration)
                    ->limit(1)
            ]);

            $duration = $service->durations->first();
            $extras = $this->extraRepository->findIn($bookingData->extras);
            $extrasTotal = $extras->sum('price');

            $extras = $extras->reduce(function (array $carry, Extra $extra) {
                $carry[$extra->id] = ['extra_price' => $extra->price];

                return $carry;
            }, []);

            $bookingData->servicePrice = $duration->hourly_price;
            $bookingData->total = $duration->hourly_price * $bookingData->duration + $extrasTotal;
            $bookingData->extras = $extras;
            $bookingData->status = BookingStatus::Scheduled;

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

    public function updateStatus(Booking $booking, BookingStatus $status)
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
