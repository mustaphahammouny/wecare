<?php

use App\Livewire\Views\Auth\ForgotPassword;
use App\Livewire\Views\Auth\Login;
use App\Livewire\Views\Auth\Register;
use App\Livewire\Views\Client\Company;
use App\Livewire\Views\Client\PastBookings;
use App\Livewire\Views\Client\Profile;
use App\Livewire\Views\Client\Services;
use App\Livewire\Views\Client\UpcomingBookings;
use App\Livewire\Views\Store\About;
use App\Livewire\Views\Store\Booking;
use App\Livewire\Views\Store\Faq;
use App\Livewire\Views\Store\Home;
use App\Livewire\Views\Store\Pricing;
use Illuminate\Support\Facades\Route;

Route::get('locale/{locale}/update', [LocaleController::class, 'update'])
    ->name('locale.update');

Route::get('/', Home::class)->name('home');

Route::get('about', About::class)->name('about');

Route::get('faq', Faq::class)->name('faq');

Route::get('pricing', Pricing::class)->name('pricing');

Route::get('booking/{slug}', Booking::class)->name('booking');

Route::prefix('auth')->name('auth.')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('login', Login::class)->name('login');

        Route::get('register', Register::class)->name('register');

        Route::get('forgot-password', ForgotPassword::class)->name('password.request');
    });
});

Route::prefix('client')->name('client.')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('services', Services::class)->name('services');

        Route::get('upcoming-bookings', UpcomingBookings::class)->name('upcoming-bookings');

        Route::get('past-bookings', PastBookings::class)->name('past-bookings');

        Route::get('company', Company::class)->name('company');

        Route::get('profile', Profile::class)->name('profile');
    });
});
