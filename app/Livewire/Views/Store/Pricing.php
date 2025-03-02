<?php

namespace App\Livewire\Views\Store;

use App\Models\Service;
use App\Services\ServiceService;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.store.app')]
#[Title('Pricing')]
class Pricing extends Component
{
    protected ServiceService $serviceService;

    public function boot(ServiceService $serviceService)
    {
        $this->serviceService = $serviceService;
    }

    #[Computed]
    public function services()
    {
        return $this->serviceService->get(['minDuration', 'maxDuration']);
    }

    public function price(Service $service)
    {
        if ($service->minDuration->hourly_price == $service->maxDuration->hourly_price) {
            return $service->minDuration->formatted_hourly_price;
        }

        return "{$service->maxDuration->formatted_hourly_price} - {$service->minDuration->formatted_hourly_price}";
    }

    public function render()
    {
        return view('livewire.store.pricing');
    }
}
