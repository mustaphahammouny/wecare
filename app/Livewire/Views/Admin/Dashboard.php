<?php

namespace App\Livewire\Views\Admin;

use App\Enums\BookingStatus;
use App\Services\DashboardService;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Component;

#[Layout('layouts.admin.app')]
class Dashboard extends Component
{
    #[Locked]
    public array $statuses;

    #[Locked]
    public array $counts;

    public function mount(DashboardService $dashboardService)
    {
        $this->statuses = BookingStatus::cases();

        $this->counts = $dashboardService->counts();
    }

    public function render()
    {
        return view('livewire.admin.dashboard')
            ->title('Dashboard');
    }
}
