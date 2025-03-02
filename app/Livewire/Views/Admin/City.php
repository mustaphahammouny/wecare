<?php

namespace App\Livewire\Views\Admin;

use App\Livewire\Forms\CityForm;
use App\Models\City as CityModel;
use App\Services\CityService;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.admin.app')]
#[Title('City')]
class City extends Component
{
    public CityForm $form;

    public ?CityModel $city = null;

    public function mount()
    {
        $this->form->fillProps($this->city);
    }

    public function save(CityService $cityService)
    {
        $this->form->validate();

        try {
            if ($this->city) {
                $cityService->update($this->city, $this->form->all());
            } else {
                $cityService->store($this->form->all());
            }

            Session::flash('success', 'Saved!');

            return $this->redirect(Cities::class, navigate: true);
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.city');
    }
}
