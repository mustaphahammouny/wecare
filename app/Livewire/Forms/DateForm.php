<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class DateForm extends Form
{
    public ?string $date = null;

    public function rules()
    {
        return [
            'date' => ['required', 'date_format:d/m/Y', 'after:tomorrow']
        ];
    }

    public function fillProps(array $state)
    {
        $this->date = $state['date'] ?? null;
    }
}
