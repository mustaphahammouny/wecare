<?php

use App\Livewire\Views\Store\About;
use App\Livewire\Views\Store\Booking;
use App\Livewire\Views\Store\Contact;
use App\Livewire\Views\Store\Faq;
use App\Livewire\Views\Store\Home;
use App\Livewire\Views\Store\Pricing;
use App\Livewire\Views\Store\ThankYou;
use Illuminate\Support\Facades\Route;

Route::get('/', Home::class)->name('home');

Route::get('about', About::class)->name('about');

Route::get('faq', Faq::class)->name('faq');

Route::get('pricing', Pricing::class)->name('pricing');

Route::get('contact', Contact::class)->name('contact');

Route::get('booking/{slug}', Booking::class)->name('booking');

Route::get('thank-you', ThankYou::class)->name('thank-you');
