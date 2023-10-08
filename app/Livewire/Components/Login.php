<?php

namespace App\Livewire\Components;

use App\Enums\ProviderList;
use App\Livewire\Forms\LoginForm;
use App\Services\AuthService;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Locked;
use Livewire\Component;

class Login extends Component
{
    public LoginForm $form;

    #[Locked]
    public array $providers = [];

    public function boot()
    {
        $this->providers = ProviderList::cases();
    }

    public function login(AuthService $authService)
    {
        $this->form->validate();

        try {
            $authService->login($this->form->all());

            $this->dispatch('authenticated');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.components.login');
    }
}
