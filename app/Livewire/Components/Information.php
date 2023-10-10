<?php

namespace App\Livewire\Components;

use App\Livewire\Forms\InformationForm;
use App\Services\CityService;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class Information extends Component
{
    public InformationForm $form;

    #[Locked]
    public array $state;

    #[Locked]
    public Collection $cities;

    public function boot(CityService $cityService)
    {
        $this->cities = $cityService->get();
    }

    public function mount(array $state)
    {
        $this->state = $state;

        $this->form->fillProps($this->state);
    }

    #[On('city-updated')]
    public function cityUpdated($city)
    {
        $this->form->city = $city;
    }

    public function submit()
    {
        $this->validate();

        $this->fillState();

        $this->dispatch('next-step', current: self::class, state: $this->state);
    }

    public function render()
    {
        return view('livewire.components.information');
    }

    private function fillState()
    {
        $this->state['phone'] = $this->form->phone;

        $this->state['city'] = $this->form->city;

        $this->state['address'] = $this->form->address;
    }
}
