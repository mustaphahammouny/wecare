<?php

namespace App\Livewire\Views\Admin;

use App\Models\City;
use App\Services\CityService;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin.app')]
class Cities extends Component
{
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

    public function render(CityService $cityService)
    {
        return view('livewire.admin.cities')
            ->title('Cities')
            ->with([
                'cities' => $cityService->paginate(),
            ]);
    }
}
