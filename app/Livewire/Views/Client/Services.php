<?php

namespace App\Livewire\Views\Client;

use App\Data\ServiceFilter;
use App\Services\ServiceService;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.client.app')]
class Services extends Component
{
    #[Computed]
    public function services(ServiceService $serviceService)
    {
        $serviceFilter = ServiceFilter::from(['active' => true]);

        return $serviceService->get($serviceFilter);
    }

    public function render()
    {
        return view('livewire.client.services')
            ->title('Services');
    }
}
