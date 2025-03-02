<?php

namespace App\Services;

use App\Constants\General;
use App\Enums\BookingStatus;
use App\Models\Booking;
use App\Models\Duration;
use App\Models\Extra;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookingService
{
    public function paginate(array $filter = [])
    {
        return Booking::query()
            ->with(['service', 'extras', 'user'])
            ->when(
                Arr::get($filter, 'user_id'),
                fn($query, $userId) => $query->where('user_id', $userId)
            )
            ->when(
                Arr::get($filter, 'start'),
                fn($query, $start) => $query->whereDate('service_at', '>=', $start)
            )
            ->when(
                Arr::get($filter, 'end'),
                fn($query, $end) => $query->whereDate('service_at', '<=', $end)
            )
            ->when(
                Arr::get($filter, 'status'),
                fn($query, $status) => $query->where('status', $status)
            )
            ->orderBy('created_at', 'desc')
            ->paginate(General::PER_PAGE);
    }

    public function store(array $data): Booking
    {
        /** @var User */
        $user = Auth::user();

        $duration = Duration::query()
            ->withWhereHas(
                'service',
                fn($query) => $query
                    ->withWhereHas(
                        'extras',
                        fn($query) => $query->whereIn(Arr::get($data, 'extras'))
                    )
                    ->where('id', Arr::get($data, 'service_id'))
            )
            ->where('min', '<=', Arr::get($data, 'duration'))
            ->where('max', '>=', Arr::get($data, 'duration'))
            ->first();

        $extras = $duration->service->extras->map(fn(Extra $extra) => [
            'title' => $extra->title,
            'price' => $extra->price,
        ]);

        $extrasTotal = $duration->service->extras->sum('price');

        try {
            DB::beginTransaction();

            $booking = $user->bookings()->create([
                'service_id' => $duration->service->id,
                'city_id' => Arr::get($data, 'city_id'),
                'total' => $duration->hourly_price * Arr::get($data, 'duration') + $extrasTotal,
                'status' => BookingStatus::Scheduled,
            ]);

            $booking->extras()->createMany($extras);

            DB::commit();

            return $booking;
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    public function download(Booking $booking): array
    {
        $booking->load(['user.company', 'service', 'extras']);

        try {
            $pdf = Pdf::loadView('pdf.invoice', compact('booking'))->output();

            return [
                'name' => "{$booking->number}.pdf",
                'content' => $pdf,
            ];
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function updateStatus(Booking $booking, BookingStatus $status): Booking
    {
        try {
            $booking = $booking->updateStatus($status);

            return $booking;
        } catch (Exception $e) {
            throw $e;
        }
    }
}
