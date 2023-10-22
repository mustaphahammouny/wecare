<?php

namespace App\Livewire\Views\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.auth.app')]
class Login extends Component
{
    #[On('authenticated')]
    public function authenticated()
    {
        $role = Auth::user()->role;

        return $this->redirect($role->component(), navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.login')
            ->title('Sign in');
    }
}
