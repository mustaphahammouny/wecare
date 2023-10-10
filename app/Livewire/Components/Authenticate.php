<?php

namespace App\Livewire\Components;

use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class Authenticate extends Component
{
    #[Locked]
    public array $state;

    #[Locked]
    public $current = Login::class;

    public function navigate(string $component)
    {
        $this->current = $component == 'register' ? Register::class : Login::class;
    }

    #[On('authenticated')]
    public function authenticated()
    {
        $this->dispatch('next-step', current: self::class, state: $this->state);
    }

    public function render()
    {
        return view('livewire.components.authenticate');
    }
}
