<?php

namespace App\Livewire\Forms;

use App\Data\CompanyData;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Locked;
use Livewire\Form;

class BookingForm extends Form
{
    public int $status;

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
        $data = array_filter($this->all(), function ($value) {
            return $value !== null;
        });

        return CompanyData::from($data);    
    }
}
