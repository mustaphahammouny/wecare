<?php

namespace App\Policies;

use App\Models\Booking;
use App\Models\User;

class BookingPolicy
{
    public function download(User $user, Booking $booking): bool
    {
        return $user->id === $booking->user_id;
    }
}
