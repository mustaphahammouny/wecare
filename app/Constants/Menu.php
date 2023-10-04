<?php

namespace App\Constants;

abstract class Menu
{
    const STORE_MENU = [
        ['title' => 'store.home.title', 'route' => 'home'],
        ['title' => 'store.pricing.title', 'route' => 'pricing'],
        ['title' => 'store.about.title', 'route' => 'about'],
        ['title' => 'store.faq.title', 'route' => 'faq'],
    ];

    const CLIENT_MENU = [
        ['title' => 'client.services.title', 'route' => 'client.services', 'icon' => 'far fa-list'],
        ['title' => 'client.upcoming-bookings.title', 'route' => 'client.upcoming-bookings', 'icon' => 'far fa-calendar-days'],
        ['title' => 'client.past-bookings.title', 'route' => 'client.past-bookings', 'icon' => 'far fa-file-invoice'],
        ['title' => 'client.company.title', 'route' => 'client.company', 'icon' => 'far fa-building'],
        ['title' => 'client.profile.title', 'route' => 'client.profile', 'icon' => 'flaticon-user'],
    ];
}
