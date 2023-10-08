<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class RegisterForm extends Form
{
    public string $first_name;

    public string $last_name;

    public string $email;

    public string $password;

    public string $password_confirmation;

    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'min:3', 'max:255'],
            'last_name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'min:8', 'confirmed', 'max:255'],
            'password_confirmation' => ['required'],
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'firstName.required' => 'hello',
    //     ];
    // }
}
