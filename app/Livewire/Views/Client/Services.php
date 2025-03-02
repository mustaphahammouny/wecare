<?php

namespace App\Livewire\Views\Client;

use App\Services\ServiceService;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.client.app')]
#[Title('Servcies')]
class Services extends Component
{
    protected ServiceService $serviceService;

    public function boot(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    #[Computed]
    public function services()
    {
        return $this->serviceService->get(['firstMedia']);
    }

    public function render()
    {
        return view('livewire.client.services');
    }
}
