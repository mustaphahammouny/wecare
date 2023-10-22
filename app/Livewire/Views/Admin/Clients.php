<?php

namespace App\Livewire\Views\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin.app')]
class Clients extends Component
{
    public function render()
    {
        return view('livewire.admin.clients')
            ->title('Clients');
    }
}
