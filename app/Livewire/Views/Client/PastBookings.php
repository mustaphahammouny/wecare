<?php

namespace App\Livewire\Views\Client;

use App\Data\BookingFilter;
use App\Models\Booking;
use App\Services\BookingService;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.client.app')]
class PastBookings extends Component
{
    use WithPagination;
    use AuthorizesRequests;

    #[Computed]
    public function bookings(BookingService $bookingService)
    {
        $bookingFilter = BookingFilter::from([
            'user_id' => Auth::id(),
            'end' => Carbon::now(),
        ]);

        return $bookingService->paginate($bookingFilter, ['service', 'extras']);
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
        return view('livewire.client.past-bookings')
            ->title('Past bookings');
    }
}
