<?php

namespace App\Services;

use App\Data\BookingData;
use App\Data\BookingFilter;
use App\Repositories\BookingRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class BookingService
{
    public function __construct(protected BookingRepository $bookingRepository)
    {
    }

    public function paginate(BookingFilter $bookingFilter = null)
    {
        return $this->bookingRepository->paginate($bookingFilter);
    }

    public function store(BookingData $bookingData)
    {
        try {
            DB::beginTransaction();

            $booking = $this->bookingRepository->store($bookingData);

            DB::commit();

            return $booking;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}
