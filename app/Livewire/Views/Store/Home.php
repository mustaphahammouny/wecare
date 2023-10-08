<?php

namespace App\Livewire\Views\Store;

use App\Enums\ServiceList;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

#[Layout('layouts.guest.app')]
class Home extends Component
{
    #[Locked]
    public array $services;

    public function boot()
    {
        $this->services = ServiceList::cases();
    }

    public function render()
    {
        return view('livewire.store.home')
            ->title('Home');
    }
}
