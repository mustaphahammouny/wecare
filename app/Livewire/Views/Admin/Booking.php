<?php

namespace App\Livewire\Views\Admin;

use App\Enums\BookingStatus;
use App\Livewire\Forms\BookingForm;
use App\Models\Booking as BookingModel;
use App\Services\BookingService;
use Exception;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.admin.app')]
#[Title('Booking')]
class Booking extends Component
{
    public BookingForm $form;

    public BookingModel $booking;

    public function mount()
    {
        $this->form->fillProps($this->booking);
    }

    #[Computed]
    public function statuses(): array
    {
        return BookingStatus::cases();
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
            $bookingService->updateStatus($this->booking, $this->form->status);

            Session::flash('success', 'Saved!');

            return $this->redirect(Bookings::class, navigate: true);
        } catch (Exception $e) {
            Session::flash('error', $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.admin.booking');
    }
}
