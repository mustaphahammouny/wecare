<?php

namespace App\Livewire\Views\Store;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.store.app')]
#[Title('About')]
class About extends Component
{
    public function render()
    {
        return view('livewire.store.about');
    }
}
