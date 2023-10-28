<?php

namespace App\Livewire\Views\Admin;

use App\Models\Pricing;
use App\Services\PricingService;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin.app')]
class Pricings extends Component
{
    public function delete(PricingService $pricingService, Pricing $pricing)
    {
        try {
            $pricingService->delete($pricing);

            Session::flash('success', 'Deleted!');

            return $this->redirect(self::class, navigate: true);
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function render(PricingService $pricingService)
    {
        return view('livewire.admin.pricings')
            ->title('Pricings')
            ->with([
                'pricings' => $pricingService->paginate(),
            ]);
    }
}
