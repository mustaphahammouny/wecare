<?php

namespace App\Livewire\Views\Client;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.client.app')]
class Profile extends Component
{
    public function render()
    {
        return view('livewire.client.profile')
            ->title('Profile');
    }
}
