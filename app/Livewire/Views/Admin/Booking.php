<?php

namespace App\Livewire\Views\Admin;

use App\Enums\StatusList;
use App\Livewire\Forms\BookingForm;
use App\Models\Booking as BookingModel;
use App\Services\BookingService;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout('layouts.admin.app')]
class Booking extends Component
{
    public BookingForm $form;

    #[Locked]
    public array $statuses;

    #[Locked]
    public ?int $id = null;

    protected ?BookingModel $booking = null;

    public function boot(BookingService $bookingService)
    {
        $this->booking = $bookingService->find($this->id);

        $this->statuses = StatusList::cases();
    }

    public function mount()
    {
        $this->form->fillProps($this->booking);
    }

    #[On('status-updated')]
    public function statusUpdated($status)
    {
        $this->form->status = $status;
    }

    public function save(BookingService $bookingService)
    {
        $this->form->validate();

        try {
            $status = StatusList::from($this->form->status);

            $bookingService->updateStatus($this->booking, $status);

            Session::flash('success', 'Saved!');

            return $this->redirect(Bookings::class, navigate: true);
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.booking')
            ->title('Booking');
    }
}
