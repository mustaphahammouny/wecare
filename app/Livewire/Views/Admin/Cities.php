<?php

namespace App\Livewire\Views\Admin;

use App\Models\City;
use App\Services\CityService;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.admin.app')]
#[Title('Cities')]
class Cities extends Component
{
    #[Computed]
    public function cities(CityService $cityService)
    {
        return $cityService->paginate();
    }

    public function delete(CityService $cityService, City $city)
    {
        try {
            $cityService->delete($city);

            Session::flash('success', 'Deleted!');

            return $this->redirect(self::class, navigate: true);
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.cities');
    }
}
