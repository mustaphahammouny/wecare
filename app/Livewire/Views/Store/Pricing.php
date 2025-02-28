<?php

namespace App\Livewire\Views\Store;

use App\Models\Service;
use App\Services\ServiceService;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

#[Layout('layouts.store.app')]
class Pricing extends Component
{
    #[Locked]
    public Collection $services;

    public function price(Service $service)
    {
        if ($service->minDuration->hourly_price == $service->maxDuration->hourly_price) {
            return $service->minDuration->formatted_hourly_price;
        }

        return "{$service->maxDuration->formatted_hourly_price} - {$service->minDuration->formatted_hourly_price}";
    }

    public function boot(ServiceService $serviceService)
    {
        $this->services = $serviceService->get(with: ['minDuration', 'maxDuration']);
    }

    public function render()
    {
        return view('livewire.store.pricing')
            ->title('Pricing');
    }
}
