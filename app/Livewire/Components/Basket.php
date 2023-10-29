<?php

namespace App\Livewire\Components;

use App\Support\Number;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class Basket extends Component
{
    #[Locked]
    public $state = [];

    #[Locked]
    public $total = '';

    #[On('state-updated')]
    public function updateCurrentState(array $state)
    {
        $this->state = array_merge($this->state, $state);
    }

    public function mount(array $state)
    {
        $this->state = $state;
    }

    public function render()
    {
        $this->updateTotal();

        return view('livewire.components.basket');
    }

    private function updateTotal()
    {
        if (isset($this->state['duration'])) {
            $optionsTotal = array_reduce(array_column($this->state['extras'], 'price'), fn ($carry, $item) => $carry += $item);

            $total = $this->state['duration']['price'] * $this->state['duration']['duration'] + $optionsTotal;

            $this->total = Number::toPrice($total);
        }
    }
}
