<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class DurationForm extends Form
{
    public ?int $duration = null;

    public function rules()
    {
        return [
            'duration' => ['required', 'integer'],
        ];
    }

    public function fillProps(array $state)
    {
        $this->duration = $state['duration']['duration'] ?? null;
    }
}
