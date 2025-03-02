<?php

namespace App\Livewire\Views\Client;

use App\Enums\BookingStatus;
use App\Models\Booking;
use App\Services\BookingService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.client.app')]
#[Title('Completed bookings')]
class CompletedBookings extends Component
{
    protected BookingService $bookingService;

    public function boot(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    #[Computed]
    public function bookings()
    {
        return $this->bookingService->paginate([
            'user_id' => Auth::id(),
            'status' => BookingStatus::Completed,
        ]);
    }

    public function download(BookingService $bookingService, Booking $booking)
    {
        $this->authorize('download', $booking);

        try {
            $pdf = $bookingService->download($booking);

            return response()->streamDownload(fn() => print($pdf['content']), $pdf['name']);
        } catch (\Exception $e) {
            Session::flash('error', $e->getMessage());

            return $this->redirect(self::class, navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.client.completed-bookings');
    }
}
