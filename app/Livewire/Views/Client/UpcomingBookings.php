<?php

namespace App\Livewire\Views\Client;

use App\Enums\BookingStatus;
use App\Services\BookingService;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.client.app')]
#[Title('Upcoming bookings')]
class UpcomingBookings extends Component
{
    protected BookingService $bookingService;

    public function boot(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    #[Computed]
    public function bookings()
    {
        return $this->bookingService->paginate([
            'user_id' => Auth::id(),
            'start' => now(),
            'status' => BookingStatus::Scheduled,
        ]);
    }

    public function render()
    {
        return view('livewire.client.upcoming-bookings');
    }
}
