<?php

namespace App\Livewire\Views\Store;

use App\Data\PricingFilter;
use App\Enums\PlanList;
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
        $pricingFilter = PricingFilter::from(['plan' => PlanList::Once->value]);

        $this->pricings = $pricingService->get($pricingFilter);
    }

    public function render()
    {
        return view('livewire.store.pricing')
            ->title('Pricing');
    }
}
