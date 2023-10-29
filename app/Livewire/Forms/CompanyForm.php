<?php

namespace App\Livewire\Forms;

use App\Data\CompanyData;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Locked;
use Livewire\Form;

class CompanyForm extends Form
{
    #[Locked]
    public int $user_id;

    public string $name;

    public string $ice;

    public ?string $address;

    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'ice' => ['required', 'string'],
            'address' => ['nullable', 'string', 'min:3'],
        ];
    }

    public function fillProps(?Company $company)
    {
        $this->user_id = Auth::id();

        if ($company) {
            $this->name = $company->name;

            $this->ice = $company->ice;

            $this->address = $company->address;
        }
    }

    public function toData()
    {
        return CompanyData::from($this->all());    
    }
}
