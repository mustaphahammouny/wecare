<?php

namespace App\Livewire\Forms;

use App\Enums\PlanList;
use Livewire\Form;

class PlanForm extends Form
{
    public ?int $plan = null;

    public ?int $plan_option = null;

    public array $extras;

    public function rules()
    {
        return [
            'plan' => ['required', 'integer'],
            'plan_option' => ['required_if:form.plan,' . (PlanList::Regular)->value],
            'extras' => ['array'],
            'extras.*' => ['integer'],
        ];
    }

    public function fillProps(array $state)
    {
        $this->plan = $state['plan'] ?? null;

        $this->plan_option = $state['plan_option'] ?? null;

        $this->extras = array_column($state['extras'] ?? [], 'id');
    }
}
