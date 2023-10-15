<?php

namespace App\Livewire\Views\Client;

use App\Data\BookingFilter;
use App\Services\BookingService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.client.app')]
class UpcomingBookings extends Component
{
    public function render(BookingService $bookingService)
    {
        $bookingFilter = BookingFilter::from([
            'user_id' => Auth::id(),
            'start' => Carbon::now(),
        ]);

        return view('livewire.client.upcoming-bookings')
            ->title('Upcoming bookings')
            ->with([
                'bookings' => $bookingService->paginate($bookingFilter),
            ]);
    }
}
