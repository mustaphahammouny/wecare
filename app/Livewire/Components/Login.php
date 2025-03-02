<?php

namespace App\Livewire\Components;

use App\Livewire\Forms\LoginForm;
use App\Services\AuthService;
use Exception;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Login extends Component
{
    public LoginForm $form;

    public function login(AuthService $authService)
    {
        $this->form->validate();

        try {
            $authService->login($this->form->all());

            $this->dispatch('authenticated');
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.components.login');
    }
}
