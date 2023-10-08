<?php

namespace App\Livewire\Views\Store;

use App\Data\ServiceFilter;
use App\Services\ServiceService;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

#[Layout('layouts.store.app')]
class Home extends Component
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
        return view('livewire.store.home')
            ->title('Home');
    }
}
