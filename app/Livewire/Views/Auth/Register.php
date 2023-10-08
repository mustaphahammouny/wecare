<?php

namespace App\Livewire\Views\Auth;

use App\Livewire\Forms\RegisterForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.auth.app')]
class Register extends Component
{
    public RegisterForm $form;

    public function register()
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
        return view('livewire.auth.register')
            ->title('Sign up');
    }
}
