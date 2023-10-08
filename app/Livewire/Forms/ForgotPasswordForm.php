<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class ForgotPasswordForm extends Form
{
    public string $email;

    public function rules()
    {
        return [
            'email' => ['required', 'email'],
        ];
    }
}
