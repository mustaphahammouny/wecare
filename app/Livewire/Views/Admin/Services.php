<?php

namespace App\Livewire\Views\Admin;

use App\Models\Service;
use App\Services\ServiceService;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.admin.app')]
#[Title('Services')]
class Services extends Component
{
    #[Computed]
    public function services(ServiceService $serviceService)
    {
        return $serviceService->paginate();
    }

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

    public function render()
    {
        return view('livewire.admin.services');
    }
}
