<?php

use App\Livewire\Views\Auth\ForgotPassword;
use App\Livewire\Views\Auth\Login;
use App\Livewire\Views\Auth\Register;
use App\Livewire\Views\Store\Home;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->name('auth.')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('login', Login::class)->name('login');

        Route::get('register', Register::class)->name('register');

        Route::get('forgot-password', ForgotPassword::class)->name('password.request');
    });
});

Route::get('/', Home::class)->name('home');
