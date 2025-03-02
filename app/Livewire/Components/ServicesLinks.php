<?php

namespace App\Livewire\Components;

use App\Services\ServiceService;
use Livewire\Attributes\Computed;
use Livewire\Component;

class ServicesLinks extends Component
{
    protected ServiceService $serviceService;

    public function boot(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    #[Computed]
    public function services()
    {
        return $this->serviceService->paginate();
    }

    public function render()
    {
        return view('livewire.components.services-links');
    }
}
