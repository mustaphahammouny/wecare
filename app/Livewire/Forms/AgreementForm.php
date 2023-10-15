<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class AgreementForm extends Form
{
    public bool $agreement = false;

    public function rules()
    {
        return [
            'agreement' => ['required', 'accepted'],
        ];
    }

    public function fillProps(array $state)
    {
        $this->agreement = $state['agreement'] ?? false;
    }
}
