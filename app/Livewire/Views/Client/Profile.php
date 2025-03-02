<?php

namespace App\Livewire\Views\Client;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.client.app')]
#[Title('Profile')]
class Profile extends Component
{
    public function render()
    {
        return view('livewire.client.profile');
    }
}
