<?php

namespace App\Livewire\Components;

use App\Livewire\Forms\TimeForm;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Time extends Component
{
    public TimeForm $form;

    #[Locked]
    public array $state;

    #[Locked]
    public array $times;

    public function mount(array $state)
    {
        $this->state = $state;

        $this->form->fillProps($this->state);

        $this->times = range(8, 20 - $this->state['duration']['duration'], 1);
    }

    public function submit()
    {
        $this->validate();

        $this->fillState();

        $this->dispatch('next-step', current: self::class, state: $this->state); 
    }

    public function render()
    {
        return view('livewire.components.time');
    }

    private function fillState()
    {
        $this->state['time'] = $this->form->time;
    }
}
