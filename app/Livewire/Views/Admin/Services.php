<?php

namespace App\Livewire\Views\Admin;

use App\Models\Service;
use App\Services\ServiceService;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin.app')]
class Services extends Component
{
    public function delete(ServiceService $serviceService, Service $service)
    {
        try {
            $serviceService->delete($service);

            Session::flash('success', 'Deleted!');

            return $this->redirect(self::class, navigate: true);
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function render(ServiceService $serviceService)
    {
        return view('livewire.admin.services')
            ->title('Services')
            ->with([
                'services' => $serviceService->paginate(with: ['firstMedia']),
            ]);
    }
}
