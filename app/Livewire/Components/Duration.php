<?php

namespace App\Livewire\Components;

use App\Data\PricingFilter;
use App\Livewire\Forms\DurationForm;
use App\Services\PricingService;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Duration extends Component
{
    public DurationForm $form;

    #[Locked]
    public array $state;

    #[Locked]
    public array $durations;

    public function mount(PricingService $pricingService, array $state)
    {
        $this->state = $state;

        $this->form->fillProps($this->state);

        $pricingFilter = PricingFilter::from(['plan' => $this->state['plan']]);

        $pricings = $pricingService->get($pricingFilter);

        $service = $this->state['service'];

        for ($i = $service['min_duration']; $i <= $service['max_duration']; $i += $service['step_duration']) {
            $pricing = $pricings->first(fn ($pricing) => $i >= $pricing->min_duration && $i <= $pricing->max_duration);
            $this->durations[] = [
                'id' => $pricing->id,
                'duration' => $i,
                'price' => $pricing->price,
                'formatted_price' => $pricing->formatted_price,
                'hourly_price' => $pricing->hourly_price,
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
            ->first(fn ($duration) => $duration['duration'] == $this->form->duration);

        $this->state['extras'] = collect($this->state['service']['extras'])
            ->whereIn('id', $this->form->extras)
            ->toArray();
    }
}
