<?php

namespace App\Livewire\Views\Auth;

use App\Livewire\Views\Client\Services;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.auth.app')]
#[Title('Sign up')]
class Register extends Component
{
    #[On('authenticated')]
    public function authenticated()
    {
        return $this->redirect(Services::class, navigate: true);
    }

    public function render()
    {
        return view('livewire.auth.register');
    }
}
