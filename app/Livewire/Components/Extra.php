<?php

namespace App\Livewire\Components;

use Livewire\Attributes\Locked;
use Livewire\Component;

class Extra extends Component
{
    #[Locked]
    public array $state;

    public array $extras;

    public function mount(array $state)
    {
        $this->state = $state;

        $this->extras = $this->state['extras'];
    }

    public function submit()
    {
        $this->form->validate();

        $this->fillState();

        $this->dispatch('next-step', current: self::class, state: $this->state);
    }

    public function render()
    {
        return view('livewire.components.extra');
    }

    private function fillState()
    {
        $this->state['extras'] = collect($this->state['service']['extras'])
            ->whereIn('id', $this->extras)
            ->toArray();
    }
}
