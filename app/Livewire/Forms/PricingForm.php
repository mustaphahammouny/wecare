<?php

namespace App\Livewire\Forms;

use App\Models\Duration;
use Livewire\Form;

class DurationForm extends Form
{
    public int $min;

    public int $max;

    public float $hourly_price;

    public function rules()
    {
        return [
            'min' => ['required', 'integer', 'min:1'],
            'max' => ['required', 'integer', 'min:1'],
            'hourly_price' => ['required', 'numeric', 'min:1'],
        ];
    }

    public function fillProps(?Duration $duration)
    {
        if ($duration) {
            $this->min = $duration->min;
            $this->max = $duration->max;
            $this->hourly_price = $duration->hourly_price;
        }
    }
}
