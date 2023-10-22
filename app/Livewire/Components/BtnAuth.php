<?php

namespace App\Livewire\Components;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class BtnAuth extends Component
{
    #[Locked]
    public string $title = 'Sign in';

    #[Locked]
    public string $route = 'auth.login';

    public function mount()
    {
        $this->fillProps();
    }

    #[On('authenticated')]
    public function authenticated()
    {
        $this->fillProps();
    }

    public function render()
    {
        return view('livewire.components.btn-auth');
    }

    private function fillProps()
    {
        if (Auth::check()) {
            $this->title = Auth::user()->full_name;

            $this->route = Auth::user()->role->route();
        }
    }
}
