<?php

namespace App\Livewire\Views\Auth;

use App\Livewire\Forms\LoginForm;
use App\Livewire\Views\Client\Services;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.auth.app')]
class Login extends Component
{
    public LoginForm $form;

    public function login()
    {
        $this->form->validate();

        dd($this->form->all());

        try {
            return $this->redirect(Services::class, navigate: true);
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->title('Sign in');
    }
}
