<?php

namespace App\Livewire\Components;

use Livewire\Component;

class DeleteAccount extends Component
{
    public function delete()
    {
        dd('delete');
    }

    public function render()
    {
        return view('livewire.components.delete-account');
    }
}
