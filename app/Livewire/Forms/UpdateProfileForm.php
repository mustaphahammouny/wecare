<?php

namespace App\Livewire\Forms;

use App\Data\UserData;
use App\Models\User;
use Livewire\Form;

class UpdateProfileForm extends Form
{
    public string $first_name;

    public string $last_name;

    public string $email;

    public ?string $phone;

    public function rules()
    {
        return [
            'first_name' => ['required', 'string', 'min:3', 'max:255'],
            'last_name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['nullable', 'numeric', 'digits:10'],
        ];
    }

    public function fillProps(User $user)
    {
        $this->first_name = $user->first_name;

        $this->last_name = $user->last_name;

        $this->email = $user->email;

        $this->phone = $user->phone;
    }

    public function toData()
    {
        return UserData::from($this->all());
    }
}
