<?php

namespace App\Livewire\Components;

use App\Livewire\Forms\DateForm;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class Date extends Component
{
    public DateForm $form;

    #[Locked]
    public array $state;

    public function mount(array $state)
    {
        $this->state = $state;

        $this->form->fillProps($this->state);
    }

    #[On('date-updated')]
    public function dateUpdated($date)
    {
        $this->form->date = $date;
    }

    public function submit()
    {        
        $this->validate();

        $this->fillState();

        $this->dispatch('next-step', current: self::class, state: $this->state); 
    }

    public function render()
    {
        return view('livewire.components.date');
    }

    private function fillState()
    {
        $this->state['date'] = $this->form->date;
    }
}
