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
#[Title('Refunded bookings')]
class RefundedBookings extends Component
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
            'status' => BookingStatus::Refunded,
        ]);
    }

    public function render()
    {
        return view('livewire.client.bookings');
    }
}
