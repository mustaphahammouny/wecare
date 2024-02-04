<?php

namespace App\Repositories;

use App\Constants\General;
use App\Data\BookingData;
use App\Data\BookingFilter;
use App\Enums\StatusList;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class BookingRepository
{
    public function get(?BookingFilter $bookingFilter): Collection
    {
        return $this->findBy($bookingFilter, ['service', 'extras'])
            ->get();
    }

    public function paginate(?BookingFilter $bookingFilter)
    {
        return $this->findBy($bookingFilter, ['service', 'extras'])
            ->orderBy('created_at', 'desc')
            ->paginate(General::PER_PAGE);
    }

    public function find(int $id): Booking
    {
        return Booking::with(['user.company', 'service', 'extras'])
            ->findOrFail($id);
    }

    public function countByStatuses(?BookingFilter $bookingFilter = null): array
    {
        $bookings = $this->findBy($bookingFilter);

        foreach (StatusList::cases() as $status) {
            $bookings = $bookings->selectRaw('COUNT(CASE WHEN status = "' . $status->value . '" THEN 1 ELSE null END) AS ' . strtolower($status->name));
        }

        return $bookings->first()->toArray();
    }

    public function store(BookingData $bookingData): Booking
    {
        $booking = new Booking();

        return $this->persist($booking, $bookingData);
    }

    public function updateStatus(Booking $booking, StatusList $status): Booking
    {
        $booking->update([
            'status' => $status,
        ]);

        return $booking;
    }

    private function findBy(?BookingFilter $bookingFilter, array $with = [])
    {
        return Booking::with($with)
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

        dd($booking);

        $booking->save();

        $booking->extras()->sync($bookingData->extras);

        return $booking;
    }
}
