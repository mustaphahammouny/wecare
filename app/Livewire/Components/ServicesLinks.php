<?php

namespace App\Livewire\Components;

use App\Enums\ServiceList;
use Livewire\Attributes\Locked;
use Livewire\Component;

class ServicesLinks extends Component
{
    #[Locked]
    public array $services;

    public function boot()
    {
        $this->services = ServiceList::cases();
    }

    public function render()
    {
        return view('livewire.components.services-links');
    }
}
