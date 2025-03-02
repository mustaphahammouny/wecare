<?php

namespace App\Livewire\Views\Admin;

use App\Livewire\Forms\ServiceForm;
use App\Models\Service as ServiceModel;
use App\Services\ServiceService;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Layout('layouts.admin.app')]
#[Title('City')]
class Service extends Component
{
    use WithFileUploads;

    public ServiceForm $form;

    public ?ServiceModel $service = null;

    public function mount()
    {
        $this->form->fillProps($this->service);
    }

    public function save(ServiceService $serviceService)
    {
        $this->form->validate();

        try {
            if ($this->service) {
                $serviceService->update($this->service, $this->form->all());
            } else {
                $serviceService->store($this->form->all());
            }

            Session::flash('success', 'Saved!');

            return $this->redirect(Services::class, navigate: true);
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.service');
    }
}
