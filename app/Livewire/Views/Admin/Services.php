<?php

namespace App\Livewire\Views\Admin;

use App\Services\ServiceService;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin.app')]
class Services extends Component
{
    public function render(ServiceService $serviceService)
    {
        return view('livewire.admin.services')
            ->title('Services')
            ->with([
                'services' => $serviceService->paginate(),
            ]);
    }
}
