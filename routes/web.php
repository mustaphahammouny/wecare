<?php

use App\Http\Controllers\LocaleController;
use App\Livewire\Views\Admin\Booking as AdminBooking;
use App\Livewire\Views\Admin\Bookings;
use App\Livewire\Views\Admin\Cities;
use App\Livewire\Views\Admin\City;
use App\Livewire\Views\Admin\Clients;
use App\Livewire\Views\Admin\Contacts;
use App\Livewire\Views\Admin\Dashboard;
use App\Livewire\Views\Admin\Pricing as AdminPricing;
use App\Livewire\Views\Admin\Pricings;
use App\Livewire\Views\Admin\Service;
use App\Livewire\Views\Auth\ForgotPassword;
use App\Livewire\Views\Auth\Login;
use App\Livewire\Views\Auth\Register;
use App\Livewire\Views\Client\Company;
use App\Livewire\Views\Client\PastBookings;
use App\Livewire\Views\Client\Profile;
use App\Livewire\Views\Client\Services as ClientServices;
use App\Livewire\Views\Admin\Services as AdminServices;
use App\Livewire\Views\Client\UpcomingBookings;
use App\Livewire\Views\Store\About;
use App\Livewire\Views\Store\Booking;
use App\Livewire\Views\Store\Contact;
use App\Livewire\Views\Store\Faq;
use App\Livewire\Views\Store\Home;
use App\Livewire\Views\Store\Pricing;
use App\Livewire\Views\Store\ThankYou;
use Illuminate\Support\Facades\Route;

Route::get('locale/{locale}/update', [LocaleController::class, 'update'])
    ->name('locale.update');

Route::get('/', Home::class)->name('home');

Route::get('about', About::class)->name('about');

Route::get('faq', Faq::class)->name('faq');

Route::get('pricing', Pricing::class)->name('pricing');

Route::get('contact', Contact::class)->name('contact');

Route::get('booking/{slug}', Booking::class)->name('booking');

Route::get('thank-you', ThankYou::class)->name('thank-you');

Route::prefix('auth')->name('auth.')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('login', Login::class)->name('login');

        Route::get('register', Register::class)->name('register');

        Route::get('forgot-password', ForgotPassword::class)->name('password.request');
    });
});

Route::prefix('client')->name('client.')->group(function () {
    Route::middleware(['auth', 'role:client'])->group(function () {
        Route::get('services', ClientServices::class)->name('services');

        Route::get('upcoming-bookings', UpcomingBookings::class)->name('upcoming-bookings');

        Route::get('past-bookings', PastBookings::class)->name('past-bookings');

        Route::get('company', Company::class)->name('company');

        Route::get('profile', Profile::class)->name('profile');
    });
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware(['auth', 'role:admin'])->group(function () {
        Route::get('dashboard', Dashboard::class)->name('dashboard');

        Route::get('bookings', Bookings::class)->name('bookings');
        Route::get('booking/{id}', AdminBooking::class)->name('booking');

        Route::get('contacts', Contacts::class)->name('contacts');

        Route::get('clients', Clients::class)->name('clients');

        Route::get('services', AdminServices::class)->name('services');
        Route::get('service/{id?}', Service::class)->name('service');

        Route::get('pricings', Pricings::class)->name('pricings');
        Route::get('pricing/{id?}', AdminPricing::class)->name('pricing');

        Route::get('cities', Cities::class)->name('cities');
        Route::get('city/{id?}', City::class)->name('city');
    });
});
