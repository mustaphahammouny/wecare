<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class TimeForm extends Form
{
    public ?int $time = null;

    public function rules()
    {
        return [
            'time' => ['required', 'integer'],
        ];
    }

    public function fillProps(array $state)
    {
        $this->time = $state['time'] ?? null;
    }
}
