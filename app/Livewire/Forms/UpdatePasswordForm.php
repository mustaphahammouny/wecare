<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class UpdatePasswordForm extends Form
{
    public string $current_password;

    public string $password;

    public string $password_confirmation;

    public function rules()
    {
        return [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', 'min:8', 'confirmed', 'max:255'],
            'password_confirmation' => ['required'],
        ];
    }
}
