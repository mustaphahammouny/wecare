<?php

namespace App\Livewire\Views\Client;

use App\Livewire\Forms\CompanyForm;
use App\Services\CompanyService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.client.app')]
#[Title('Company')]
class Company extends Component
{
    protected CompanyService $companyService;

    public CompanyForm $form;

    public function boot(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    #[Computed]
    public function user()
    {
        return Auth::user();
    }

    #[Computed]
    public function company()
    {
        return $this->companyService->first([
            'user_id' => $this->user->id,
        ]);
    }

    public function mount()
    {
        $this->form->fillProps($this->company);
    }

    public function save()
    {
        $this->form->validate();

        try {
            $this->companyService->updateOrCreate($this->user, $this->form->all());

            Session::flash('success', 'Saved!');

            return $this->redirect(self::class, navigate: true);
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.client.company');
    }
}
