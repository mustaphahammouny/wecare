<?php

namespace App\Livewire\Views\Admin;

use App\Services\BookingService;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.admin.app')]
#[Title('Bookings')]
class Bookings extends Component
{
    #[Computed]
    public function bookings(BookingService $bookingService)
    {
        return $bookingService->paginate();
    }

    public function render()
    {
        return view('livewire.admin.bookings');
    }
}
