<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\Auth;
use Livewire\Form;

class InformationForm extends Form
{
    public ?string $phone = null;

    public ?int $city = null;

    public ?string $address = null;

    public function rules()
    {
        return [
            'phone' => ['required', 'numeric', 'digits:10'],
            'city' => ['required', 'integer'],
            'address' => ['required', 'string', 'min:5', 'max:255'],
        ];
    }

    public function fillProps(array $state)
    {
        $this->phone = $state['phone'] ?? Auth::user()->phone ?? null;

        $this->city = $state['city'] ?? null;

        $this->address = $state['address'] ?? null;
    }
}
