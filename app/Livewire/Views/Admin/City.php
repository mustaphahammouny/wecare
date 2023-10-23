<?php

namespace App\Livewire\Views\Admin;

use App\Livewire\Forms\CityForm;
use App\Models\City as CityModel;
use App\Services\CityService;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

#[Layout('layouts.admin.app')]
class City extends Component
{
    public CityForm $form;

    #[Locked]
    public ?int $id = null;

    protected ?CityModel $city = null;

    public function boot(CityService $cityService)
    {
        if ($this->id) {
            $this->city = $cityService->find($this->id);
        }
    }

    public function mount()
    {
        $this->form->fillProps($this->city);
    }

    public function save(CityService $cityService)
    {
        $this->form->validate();

        try {
            $cityService->updateOrCreate($this->city, $this->form->toData());

            Session::flash('success', 'Saved!');

            return $this->redirect(Cities::class, navigate: true);
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.city')
            ->title('City');
    }
}
