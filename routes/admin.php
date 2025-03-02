<?php

use App\Livewire\Views\Admin\Booking;
use App\Livewire\Views\Admin\Bookings;
use App\Livewire\Views\Admin\Cities;
use App\Livewire\Views\Admin\City;
use App\Livewire\Views\Admin\Clients;
use App\Livewire\Views\Admin\Contacts;
use App\Livewire\Views\Admin\Dashboard;
use App\Livewire\Views\Admin\Service;
use App\Livewire\Views\Admin\Services;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('dashboard', Dashboard::class)->name('dashboard');

        Route::get('bookings', Bookings::class)->name('bookings');
        Route::get('booking/{booking}', Booking::class)->name('booking');

        Route::get('contacts', Contacts::class)->name('contacts');

        Route::get('clients', Clients::class)->name('clients');

        Route::get('services', Services::class)->name('services');
        Route::get('service/{service?}', Service::class)->name('service');

        Route::get('cities', Cities::class)->name('cities');
        Route::get('city/{city?}', City::class)->name('city');
    });
});
