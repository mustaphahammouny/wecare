<?php

namespace App\Constants;

abstract class Menu
{
    const STORE_MENU = [
        ['title' => 'Home', 'route' => 'home'],
        ['title' => 'Pricing', 'route' => 'pricing'],
        ['title' => 'About', 'route' => 'about'],
        ['title' => 'Faq', 'route' => 'faq'],
        ['title' => 'Contact', 'route' => 'contact'],
    ];

    const CLIENT_MENU = [
        ['title' => 'Services', 'route' => 'client.services', 'icon' => 'far fa-list'],
        ['title' => 'Upcoming bookings', 'route' => 'client.upcoming-bookings', 'icon' => 'far fa-calendar-days'],
        ['title' => 'Past bookings', 'route' => 'client.past-bookings', 'icon' => 'far fa-file-invoice'],
        ['title' => 'Company', 'route' => 'client.company', 'icon' => 'far fa-building'],
        ['title' => 'Profile', 'route' => 'client.profile', 'icon' => 'flaticon-user'],
    ];

    const ADMIN_MENU = [
        ['title' => 'Dashboard', 'route' => 'admin.dashboard', 'icon' => 'far fa-dashboard'],
        ['title' => 'Bookings', 'route' => 'admin.bookings', 'icon' => 'far fa-calendar-days'],
        ['title' => 'Clients', 'route' => 'admin.clients', 'icon' => 'far fa-users'],
        ['title' => 'Services', 'route' => 'admin.services', 'icon' => 'far fa-list'],
        ['title' => 'Cities', 'route' => 'admin.cities', 'icon' => 'far fa-map'],
    ];
}
