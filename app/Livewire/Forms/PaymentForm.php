<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class PaymentForm extends Form
{
    public bool $agreed = false;

    public function rules()
    {
        return [
            'agreed' => ['required', 'boolean'],
        ];
    }

    public function fillProps(array $state)
    {
        $this->agreed = $state['agreed'] ?? false;
    }
}
