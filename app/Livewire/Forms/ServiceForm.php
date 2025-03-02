<?php

namespace App\Livewire\Forms;

use App\Models\Service;
use Illuminate\Http\UploadedFile;
use Livewire\Form;

class ServiceForm extends Form
{
    public string $title;

    public ?UploadedFile $image = null;

    public bool $active = false;

    public function rules()
    {
        return [
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'image' => ['nullable', 'image'],
            'active' => ['required', 'boolean'],
        ];
    }

    public function fillProps(?Service $service)
    {
        if ($service) {
            $this->title = $service->title;
            $this->active = $service->active;
        }
    }
}
