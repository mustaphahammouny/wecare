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
    protected BookingService $bookingService;

    public function boot(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    #[Computed]
    public function bookings()
    {
        return $this->bookingService->paginate();
    }

    public function render()
    {
        return view('livewire.admin.bookings');
    }
}
