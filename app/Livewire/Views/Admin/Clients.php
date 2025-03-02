<?php

namespace App\Livewire\Views\Admin;

use App\Services\UserService;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.admin.app')]
#[Title('Clients')]
class Clients extends Component
{
    protected UserService $userService;

    public function boot(UserService $userService)
    {
        $this->userService = $userService;
    }

    #[Computed]
    public function clients()
    {
        return $this->userService->paginate();
    }

    public function render()
    {
        return view('livewire.admin.clients');
    }
}
