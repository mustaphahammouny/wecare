<?php

namespace App\Services;

use App\Constants\Menu;
use App\Enums\Role;
use App\Enums\BookingStatus;
use App\Models\Booking;
use App\Models\City;
use App\Models\Contact;
use App\Models\Service;
use App\Models\User;

class DashboardService
{
    public function counts()
    {
        $menu = collect(Menu::ADMIN_MENU);

        $general['clients']['count'] = User::query()
            ->where('role', Role::Client)
            ->count();

        $general['services']['count'] = Service::query()->count();

        $general['cities']['count'] = City::query()->count();

        $general['contacts']['count'] = Contact::query()->count();

        foreach ($general as $key => $count) {
            $general[$key] = array_merge($count, $menu->firstWhere('title', ucfirst($key)));
        }


        $bookingQuery = Booking::query();

        foreach (BookingStatus::cases() as $status) {
            $bookingQuery->selectRaw('COUNT(CASE WHEN status = "' . $status->value . '" THEN 1 ELSE null END) AS ' . strtolower($status->name));
        }

        $bookings = $bookingQuery->first()->toArray();

        foreach ($bookings as $key => $count) {
            $bookings[$key] = [
                'count' => $count,
                'status' => BookingStatus::fromString($key),
            ];
        }

        return [
            'general' => $general,
            'bookings' => $bookings,
        ];
    }
}
