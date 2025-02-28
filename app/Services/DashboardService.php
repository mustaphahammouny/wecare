<?php

namespace App\Services;

use App\Constants\Menu;
use App\Data\UserFilter;
use App\Enums\Role;
use App\Enums\BookingStatus;
use App\Repositories\BookingRepository;
use App\Repositories\CityRepository;
use App\Repositories\ContactRepository;
use App\Repositories\ServiceRepository;
use App\Repositories\UserRepository;

class DashboardService
{
    public function __construct(
        protected BookingRepository $bookingRepository,
        protected ServiceRepository $serviceRepository,
        protected CityRepository $cityRepository,
        protected UserRepository $userRepository,
        protected ContactRepository $contactRepository
    ) {
    }

    public function counts()
    {
        $menu = collect(Menu::ADMIN_MENU);
        $userFilter = UserFilter::from(['role' => Role::Client]);

        $general['clients']['count'] = $this->userRepository->count($userFilter);
        $general['services']['count'] = $this->serviceRepository->count();
        $general['cities']['count'] = $this->cityRepository->count();
        $general['contacts']['count'] = $this->contactRepository->count();

        foreach ($general as $key => $count) {
            $general[$key] = array_merge($count, $menu->firstWhere('title', ucfirst($key)));
        }

        $bookings = $this->bookingRepository->countByStatuses();

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
