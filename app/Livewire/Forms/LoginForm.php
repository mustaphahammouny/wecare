<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class LoginForm extends Form
{
    public string $email;

    public string $password;

    public bool $remember = false;

    public function rules()
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];
    }
}
