<?php

namespace App\Livewire\Views\Store;

use App\Services\PricingService;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

#[Layout('layouts.store.app')]
class Pricing extends Component
{
    #[Locked]
    public Collection $pricings;

    public function boot(PricingService $pricingService)
    {
        $this->pricings = $pricingService->get(['min_duration' => 7, 'max_duration' => 8]);
    }

    public function render()
    {
        return view('livewire.store.pricing')
            ->title('Pricing');
    }
}
