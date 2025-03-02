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
    #[Computed]
    public function clients(UserService $userService)
    {
        return $userService->paginate();
    }

    public function render()
    {
        return view('livewire.admin.clients');
    }
}
