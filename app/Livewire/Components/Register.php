<?php

namespace App\Livewire\Components;

use App\Livewire\Forms\RegisterForm;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Register extends Component
{
    public RegisterForm $form;

    public function register(UserService $userService)
    {
        $this->form->validate();
        
        try {
            $user = $userService->store($this->form->toData());

            Auth::login($user);

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
