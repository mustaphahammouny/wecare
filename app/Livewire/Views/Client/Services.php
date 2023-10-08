<?php

namespace App\Livewire\Views\Client;

use App\Enums\ServiceList;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

#[Layout('layouts.client.app')]
class Services extends Component
{
    #[Locked]
    public array $services;

    public function boot()
    {
        $this->services = ServiceList::cases();
    }

    public function render()
    {
        return view('livewire.client.services')
            ->title('Services');
    }
}
