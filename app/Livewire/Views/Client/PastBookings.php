<?php

namespace App\Livewire\Views\Client;

use App\Data\BookingFilter;
use App\Services\BookingService;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.client.app')]
class PastBookings extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    public function render(BookingService $bookingService)
    {
        $bookingFilter = BookingFilter::from([
            'user_id' => Auth::id(),
            'end' => Carbon::now(),
        ]);

        return view('livewire.client.past-bookings')
            ->title('Past bookings')
            ->with([
                'bookings' => $bookingService->paginate($bookingFilter),
            ]);
    }
}
