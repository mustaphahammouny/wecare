<?php

namespace App\Repositories;

use App\Constants\General;
use App\Data\BookingData;
use App\Data\BookingFilter;
use App\Enums\BookingStatus;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class BookingRepository
{
    public function get(?BookingFilter $bookingFilter, array $with = []): Collection
    {
        return $this->findBy($bookingFilter, $with)
            ->get();
    }

    public function paginate(?BookingFilter $bookingFilter, array $with = [])
    {
        return $this->findBy($bookingFilter, $with)
            ->orderBy('created_at', 'desc')
            ->paginate(General::PER_PAGE);
    }

    public function find(int $id, array $with = []): Booking
    {
        return Booking::with($with)
            ->findOrFail($id);
    }

    public function countByStatuses(?BookingFilter $bookingFilter, array $with = []): array
    {
        $bookings = $this->findBy($bookingFilter, $with);

        foreach (BookingStatus::cases() as $status) {
            $bookings = $bookings->selectRaw('COUNT(CASE WHEN status = "' . $status->value . '" THEN 1 ELSE null END) AS ' . strtolower($status->name));
        }

        return $bookings->first()->toArray();
    }

    public function store(BookingData $bookingData): Booking
    {
        $booking = new Booking();

        return $this->persist($booking, $bookingData);
    }

    public function updateStatus(Booking $booking, BookingStatus $status): Booking
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

        $booking->fill($bookingData->except('extras', 'status', 'serviceAt')->toArray());

        if (!$user->phone) {
            $user->phone = $bookingData->phone;
            $user->save();
        }

        $booking->service_at = $bookingData->serviceAt;
        $booking->status = $bookingData->status;

        $booking->save();

        $booking->extras()->sync($bookingData->extras);

        return $booking;
    }
}
