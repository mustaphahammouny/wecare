<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class ContactForm extends Form
{
    public string $full_name;

    public string $email;

    public string $subject;

    public string $message;

    public function rules()
    {
        return [
            'full_name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'subject' => ['required', 'string', 'min:3', 'max:255'],
            'message' => ['required', 'min:8', 'max:255'],
        ];
    }
}
