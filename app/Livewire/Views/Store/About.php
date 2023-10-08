<?php

namespace App\Livewire\Views\Store;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.store.app')]
class About extends Component
{
    public function render()
    {
        return view('livewire.store.about')
            ->title('About');
    }
}
