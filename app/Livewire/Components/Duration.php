<?php

namespace App\Livewire\Components;

use App\Livewire\Forms\DurationForm;
use App\Support\Number;
use Illuminate\Support\Arr;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Duration extends Component
{
    public DurationForm $form;

    #[Locked]
    public array $state;

    #[Locked]
    public array $durations;

    public function mount(array $state)
    {
        $this->state = $state;

        $this->form->fillProps($this->state);

        $durations = $this->state['service']['durations'];
        $min = min(array_column($durations, 'min'));
        $max = max(array_column($durations, 'max'));

        for ($i = $min; $i <= $max; $i++) {
            $duration = Arr::first($durations, fn($duration) => $i >= $duration['min'] && $i <= $duration['max']);

            if (!$duration) {
                continue;
            }

            $this->durations[] = [
                'id' => $duration['id'],
                'duration' => $i,
                'hourly_price' => $duration['hourly_price'],
                'formatted_duration' => Number::toDuration($i),
                'formatted_hourly_price' => Number::toHourlyPrice(($duration['hourly_price'])),
            ];
        }
    }

    public function updated()
    {
        $this->fillState();

        $this->form->validate();

        $this->dispatch('state-updated', state: $this->state);
    }

    public function submit()
    {
        $this->validate();

        $this->fillState();

        $this->dispatch('next-step', current: self::class, state: $this->state);
    }

    public function render()
    {
        return view('livewire.components.duration');
    }

    private function fillState()
    {
        $this->state['duration'] = collect($this->durations)
            ->first(fn($duration) => $duration['duration'] == $this->form->duration);

        $this->state['extras'] = collect($this->state['service']['extras'])
            ->whereIn('id', $this->form->extras)
            ->toArray();
    }
}
