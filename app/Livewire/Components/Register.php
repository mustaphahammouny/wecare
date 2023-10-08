<?php

namespace App\Livewire\Components;

use App\Livewire\Forms\RegisterForm;
use App\Services\AuthService;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Register extends Component
{
    public RegisterForm $form;

    public function register(AuthService $authService)
    {
        $this->form->validate();

        try {
            dd($this->form->all());

            $authService->login($this->form->all());

            $this->dispatch('authenticated');
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.components.register');
    }
}
