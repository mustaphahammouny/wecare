<?php

namespace App\Livewire\Views\Admin;

use App\Services\BookingService;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin.app')]
class Bookings extends Component
{
    public function render(BookingService $bookingService)
    {
        return view('livewire.admin.bookings')
            ->title('Bookings')
            ->with([
                'bookings' => $bookingService->paginate(with: ['service', 'extras', 'user']),
            ]);
    }
}
