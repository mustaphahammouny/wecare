<?php

namespace App\Livewire\Views\Admin;

use App\Services\BookingService;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin.app')]
class Booking extends Component
{
    public function render()
    {
        return view('livewire.admin.bookings')
            ->title('Bookings')
            ->with([
                'bookings' => $bookingService->paginate(),
            ]);
    }
}
