<?php

namespace App\Livewire\Views\Store;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.store.app')]
class Contact extends Component
{
    public function render()
    {
        return view('livewire.store.contact')
            ->title('Contact');
    }
}
