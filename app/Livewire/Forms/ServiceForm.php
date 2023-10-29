<?php

namespace App\Livewire\Forms;

use App\Data\ServiceData;
use App\Models\Service;
use Livewire\Form;

class ServiceForm extends Form
{
    public string $title;

    public int $min_duration;

    public int $max_duration;

    public int $step_duration;

    public $image = null;

    public bool $active = false;

    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'min_duration' => ['required', 'integer', 'min:1'],
            'max_duration' => ['required', 'integer', 'min:1'],
            'step_duration' => ['required', 'integer', 'min:1'],
            'image' => ['nullable', 'image'],
            'active' => ['required', 'boolean'],
        ];
    }

    public function fillProps(?Service $service)
    {
        if ($service) {
            $this->title = $service->title;
            $this->min_duration = $service->min_duration;
            $this->max_duration = $service->max_duration;
            $this->step_duration = $service->step_duration;
            $this->active = $service->active;
        }
    }

    public function toData()
    {
        return ServiceData::from($this->all());
    }
}
