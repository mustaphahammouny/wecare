<?php

namespace App\Livewire\Views\Auth;

use App\Livewire\Forms\ForgotPasswordForm;
use App\Livewire\Views\Client\Services;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.auth.app')]
class ForgotPassword extends Component
{
    public ForgotPasswordForm $form;

    public function send()
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
        return view('livewire.auth.forgot-password')
            ->title('Forgot Password');
    }
}
