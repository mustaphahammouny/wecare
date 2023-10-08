<?php

namespace App\Livewire\Views\Store;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.store.app')]
class Pricing extends Component
{
    public function render()
    {
        return view('livewire.store.pricing')
            ->title('Pricing');
    }
}
