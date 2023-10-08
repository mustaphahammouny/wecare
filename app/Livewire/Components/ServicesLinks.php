<?php

namespace App\Livewire\Components;

use App\Data\ServiceFilter;
use App\Services\ServiceService;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Locked;
use Livewire\Component;

class ServicesLinks extends Component
{
    #[Locked]
    public Collection $services;

    public function boot(ServiceService $serviceService)
    {
        $serviceFilter = ServiceFilter::from(['active' => true]);

        $this->services = $serviceService->get($serviceFilter);
    }

    public function render()
    {
        return view('livewire.components.services-links');
    }
}
