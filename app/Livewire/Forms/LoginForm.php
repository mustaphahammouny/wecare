<?php

namespace App\Livewire\Forms;

use App\Data\LoginData;
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

    public function toData()
    {
        return LoginData::from($this->all());    
    }
}
