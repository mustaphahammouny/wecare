<?php

namespace App\Livewire\Components;

use App\Livewire\Forms\PaymentForm;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Payment extends Component
{
    public PaymentForm $form;

    #[Locked]
    public array $state;

    public function submit()
    {
        $this->form->validate();

        $this->dispatch('next-step', current: self::class, state: $this->state);
    }

    public function render()
    {
        return view('livewire.components.payment');
    }
}
