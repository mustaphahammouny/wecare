<?php

namespace App\Livewire\Components;

use App\Enums\PlanList;
use App\Enums\FrequencyList;
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

        if ($plan == PlanList::Regular) {
            $this->form->frenquecy = FrequencyList::Weekly->value;
        } else {
            $this->form->frenquecy = null;
        }

        $this->form->validate();
    }

    public function render()
    {
        $frequencies = [];

        if ($this->form->plan) {
            $frequencies = PlanList::from($this->form->plan)->options();
        }

        return view('livewire.components.plan')->with([
            'planOptions' => $frequencies,
        ]);
    }

    private function fillState()
    {
        $this->state['plan'] = $this->form->plan;

        $this->state['frenquecy'] = $this->form->frenquecy ?? null;

        $this->state['extras'] = collect($this->state['service']['extras'])
            ->whereIn('id', $this->form->extras)
            ->toArray();
    }
}
