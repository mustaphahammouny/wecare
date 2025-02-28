<?php

namespace App\Livewire\Forms;

use App\Data\ServiceData;
use App\Models\Service;
use Livewire\Form;

class ServiceForm extends Form
{
    public string $title;

    public $image = null;

    public bool $active = false;

    // public array $durations;

    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'image' => ['nullable', 'image'],
            'active' => ['required', 'boolean'],
            // 'durations' => ['required', 'array'],
            // 'durations.*.min' => ['required', 'integer', 'min:1'],
            // 'durations.*.max' => ['required', 'integer', 'min:1'],
            // 'durations.*.price' => ['required', 'decimal'],
        ];
    }

    public function fillProps(?Service $service)
    {
        if ($service) {
            $this->title = $service->title;
            // $this->durations = $service->durations;
            $this->active = $service->active;
        }
    }

    public function toData()
    {
        return ServiceData::from($this->all());
    }
}
