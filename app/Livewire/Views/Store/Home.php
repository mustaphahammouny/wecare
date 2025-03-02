<?php

namespace App\Livewire\Views\Store;

use App\Services\ServiceService;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.store.app')]
#[Title('Home')]
class Home extends Component
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
        return view('livewire.store.home');
    }
}
