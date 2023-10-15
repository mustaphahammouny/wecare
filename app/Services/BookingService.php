<?php

namespace App\Services;

use App\Data\BookingData;
use App\Data\BookingFilter;
use App\Enums\StatusList;
use App\Models\Extra;
use App\Repositories\BookingRepository;
use App\Repositories\ExtraRepository;
use App\Repositories\PricingRepository;
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

    public function store(BookingData $bookingData)
    {
        try {
            DB::beginTransaction();

            $pricing = $this->pricingRepository->first(['duration' => $bookingData->duration]);
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
}
