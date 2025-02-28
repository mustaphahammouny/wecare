<?php

use App\Livewire\Views\Client\Company;
use App\Livewire\Views\Client\PastBookings;
use App\Livewire\Views\Client\Profile;
use App\Livewire\Views\Client\Services;
use App\Livewire\Views\Client\UpcomingBookings;
use Illuminate\Support\Facades\Route;

Route::prefix('client')->name('client.')->group(function () {
    Route::middleware(['auth', 'role:client'])->group(function () {
        Route::get('services', Services::class)->name('services');

        Route::get('upcoming-bookings', UpcomingBookings::class)->name('upcoming-bookings');

        Route::get('past-bookings', PastBookings::class)->name('past-bookings');

        Route::get('company', Company::class)->name('company');

        Route::get('profile', Profile::class)->name('profile');
    });
});
