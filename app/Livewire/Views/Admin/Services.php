<?php

namespace App\Livewire\Views\Admin;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin.app')]
class Services extends Component
{
    public function render()
    {
        return view('livewire.admin.services')
            ->title('Services');
    }
}
