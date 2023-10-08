<?php

namespace App\Livewire\Views\Store;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.simple')]
class Booking extends Component
{
    public function render()
    {
        return view('livewire.store.booking')
            ->title('Booking');
    }
}
