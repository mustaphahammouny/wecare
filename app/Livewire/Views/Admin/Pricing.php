<?php

namespace App\Livewire\Views\Admin;

use App\Livewire\Forms\PricingForm;
use App\Models\Pricing as PricingModel;
use App\Services\PricingService;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

#[Layout('layouts.admin.app')]
class Pricing extends Component
{
    public PricingForm $form;

    #[Locked]
    public ?int $id = null;

    protected ?PricingModel $pricing = null;

    public function boot(PricingService $pricingService)
    {
        if ($this->id) {
            $this->pricing = $pricingService->find($this->id);
        }
    }

    public function mount()
    {
        $this->form->fillProps($this->pricing);
    }

    public function save(PricingService $pricingService)
    {
        $this->form->validate();

        try {
            $pricingService->updateOrCreate($this->pricing, $this->form->toData());

            Session::flash('success', 'Saved!');

            return $this->redirect(Pricings::class, navigate: true);
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.pricing')
            ->title('Pricing');
    }
}
