<?php

namespace App\Repositories;

use App\Constants\General;
use App\Data\BookingData;
use App\Enums\StatusList;
use App\Data\BookingFilter;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class BookingRepository
{
    public function get(?BookingFilter $bookingFilter): Collection
    {
        return $this->findBy($bookingFilter)
            ->get();
    }

    public function paginate(?BookingFilter $bookingFilter)
    {
        return $this->findBy($bookingFilter)
            ->orderBy('created_at', 'desc')
            ->paginate(General::PER_PAGE);
    }

    public function find($id): Booking
    {
        return Booking::with(['user.company', 'service', 'extras'])
            ->findOrFail($id);
    }

    public function store(BookingData $bookingData): Booking
    {
        $booking = new Booking();

        return $this->persist($booking, $bookingData);
    }

    private function findBy(?BookingFilter $bookingFilter)
    {
        return Booking::with(['service', 'extras'])
            ->when($bookingFilter->userId ?? false, function ($query, $userId) {
                $query->where('user_id', $userId);
            })
            ->when($bookingFilter->start ?? false, function ($query, $start) {
                $query->whereDate('service_at', '>=', $start);
            })
            ->when($bookingFilter->end ?? false, function ($query, $end) {
                $query->whereDate('service_at', '<=', $end);
            })
            ->when($bookingFilter->status ?? false, function ($query, $status) {
                $query->where('status', $status->value);
            });
    }

    private function persist(Booking $booking, BookingData $bookingData): Booking
    {
        $user = User::find($bookingData->userId);

        $booking->fill($bookingData->except('extras', 'status')->toArray());

        if (!$user->phone) {
            $user->phone = $bookingData->phone;
            $user->save();
        }

        $booking->status = $bookingData->status;

        $booking->save();

        $booking->extras()->sync($bookingData->extras);

        return $booking;
    }
}
