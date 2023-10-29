<?php

namespace App\Livewire\Views\Admin;

use App\Livewire\Forms\ServiceForm;
use App\Models\Service as ServiceModel;
use App\Services\ServiceService;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.admin.app')]
class Service extends Component
{
    use WithFileUploads;
    
    public ServiceForm $form;

    #[Locked]
    public ?int $id = null;

    #[Locked]
    public ?ServiceModel $service = null;

    public function boot(ServiceService $serviceService)
    {
        if ($this->id) {
            $this->service = $serviceService->find($this->id);
        }
    }

    public function mount()
    {
        $this->form->fillProps($this->service);
    }

    public function save(ServiceService $serviceService)
    {
        $this->form->validate();

        try {
            $serviceService->updateOrCreate($this->service, $this->form->toData());

            Session::flash('success', 'Saved!');

            return $this->redirect(Services::class, navigate: true);
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.service')
            ->title('Service');
    }
}
