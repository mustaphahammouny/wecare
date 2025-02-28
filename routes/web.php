<?php

use App\Http\Controllers\LocaleController;
use App\Livewire\Views\Auth\ForgotPassword;
use App\Livewire\Views\Auth\Login;
use App\Livewire\Views\Auth\Register;
use Illuminate\Support\Facades\Route;

Route::get('locale/{locale}/update', [LocaleController::class, 'update'])
    ->name('locale.update');

Route::prefix('auth')->name('auth.')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('login', Login::class)->name('login');

        Route::get('register', Register::class)->name('register');

        Route::get('forgot-password', ForgotPassword::class)->name('password.request');
    });
});

require __DIR__ . '/store.php';

require __DIR__ . '/client.php';

require __DIR__ . '/admin.php';
