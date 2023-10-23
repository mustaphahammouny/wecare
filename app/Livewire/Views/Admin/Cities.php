<?php

namespace App\Livewire\Views\Admin;

use App\Services\CityService;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin.app')]
class Cities extends Component
{
    public function render(CityService $cityService)
    {
        return view('livewire.admin.cities')
            ->title('Cities')
            ->with([
                'cities' => $cityService->paginate(),
            ]);
    }
}
