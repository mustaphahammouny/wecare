<?php

namespace App\Livewire\Components;

use App\Livewire\Views\Auth\Login;
use App\Services\AuthService;
use Livewire\Component;

class Logout extends Component
{
    public $classes = '';

    public function logout(AuthService $authService)
    {
        try {
            $authService->logout();

            return $this->redirect(Login::class, navigate: true);
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.components.logout');
    }
}
