<?php

use App\Livewire\Views\Client\CancelledBookings;
use App\Livewire\Views\Client\Company;
use App\Livewire\Views\Client\CompletedBookings;
use App\Livewire\Views\Client\Profile;
use App\Livewire\Views\Client\RefundedBookings;
use App\Livewire\Views\Client\Services;
use App\Livewire\Views\Client\UpcomingBookings;
use Illuminate\Support\Facades\Route;

Route::prefix('client')->name('client.')->group(function () {
    Route::middleware(['auth', 'role:client'])->group(function () {
        Route::get('services', Services::class)->name('services');

        Route::get('upcoming-bookings', UpcomingBookings::class)->name('upcoming-bookings');

        Route::get('cancelled-bookings', CancelledBookings::class)->name('cancelled-bookings');

        Route::get('completed-bookings', CompletedBookings::class)->name('completed-bookings');

        Route::get('refunded-bookings', RefundedBookings::class)->name('refunded-bookings');

        Route::get('company', Company::class)->name('company');

        Route::get('profile', Profile::class)->name('profile');
    });
});
