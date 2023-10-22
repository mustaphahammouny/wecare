<?php

namespace App\Livewire\Views\Admin;

use App\Services\UserService;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.admin.app')]
class Clients extends Component
{
    public function render(UserService $userService)
    {
        return view('livewire.admin.clients')
            ->title('Clients')
            ->with([
                'clients' => $userService->clients(),
            ]);
    }
}
