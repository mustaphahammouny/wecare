<?php

namespace App\Livewire\Components;

use App\Enums\PlanList;
use App\Livewire\Forms\PlanForm;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Plan extends Component
{
    public PlanForm $form;

    #[Locked]
    public array $state;

    #[Locked]
    public array $plans;

    public function boot()
    {
        $this->plans = PlanList::cases();
    }

    public function mount(array $state)
    {
        $this->state = $state;

        $this->form->fillProps($this->state);
    }

    public function submit()
    {
        $this->form->validate();

        $this->fillState();

        $this->dispatch('next-step', current: self::class, state: $this->state);
    }

    public function updatedFormPlan()
    {
        $plan = PlanList::from($this->form->plan);

        $this->form->frenquecy = null;

        $this->form->validate();
    }

    public function render()
    {
        return view('livewire.components.plan');
    }

    private function fillState()
    {
        $this->state['plan'] = $this->form->plan;

        $this->state['extras'] = collect($this->state['service']['extras'])
            ->whereIn('id', $this->form->extras)
            ->toArray();
    }
}
