<?php

namespace App\Livewire\Views\Client;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.client.app')]
class PastBookings extends Component
{
    public function render()
    {
        return view('livewire.client.past-bookings')
            ->title('Past bookings');
    }
}
