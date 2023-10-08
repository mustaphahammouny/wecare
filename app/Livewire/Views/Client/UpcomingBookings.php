<?php

namespace App\Livewire\Views\Client;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.client.app')]
class UpcomingBookings extends Component
{
    public function render()
    {
        return view('livewire.client.upcoming-bookings')
            ->title('Upcoming bookings');
    }
}
