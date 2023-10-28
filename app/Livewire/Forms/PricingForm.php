<?php

namespace App\Livewire\Forms;

use App\Data\PricingData;
use App\Models\Pricing;
use Livewire\Form;

class PricingForm extends Form
{
    public int $min_duration;

    public int $max_duration;

    public float $price;

    public function rules()
    {
        return [
            'min_duration' => ['required', 'integer', 'min:1'],
            'max_duration' => ['required', 'integer', 'min:1'],
            'price' => ['required', 'numeric', 'min:1'],
        ];
    }

    public function fillProps(?Pricing $pricing)
    {
        if ($pricing) {
            $this->min_duration = $pricing->min_duration;
            $this->max_duration = $pricing->max_duration;
            $this->price = $pricing->price;
        }
    }

    public function toData()
    {
        return PricingData::from($this->all());
    }
}
