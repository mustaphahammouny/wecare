<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class DurationForm extends Form
{
    public ?int $duration = null;

    public array $extras;

    public function rules()
    {
        return [
            'duration' => ['required', 'integer'],
        ];
    }

    public function fillProps(array $state)
    {
        $this->duration = $state['duration']['duration'] ?? null;

        $this->extras = array_column($state['extras'] ?? [], 'id');
    }
}
