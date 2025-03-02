<?php

namespace App\Livewire\Forms;

use App\Models\City;
use Livewire\Form;

class CityForm extends Form
{
    public string $name;

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
        ];
    }

    public function fillProps(?City $city)
    {
        if ($city) {
            $this->name = $city->name;
        }
    }
}
