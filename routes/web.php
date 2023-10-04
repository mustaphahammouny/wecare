<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->name('auth.')->group(function () {
    Route::middleware(['guest'])->group(function () {
        Route::get('login', function () {
            return 'auth.login';
        })->name('login');

        Route::get('register', function () {
            return 'auth.register';
        })->name('register');
    });
});

Route::get('/', function () {
    return view('store.home');
})->name('home');

Route::get('/client', function () {
    return view('client.dashboard');
});

Route::get('/admin', function () {
    return view('admin.dashboard');
});
