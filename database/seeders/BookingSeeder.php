<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\City;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $cities = City::all();
        $services = Service::with('durations')->get();

        Booking::factory()->count(20)->state(new Sequence(
            function (Sequence $sequence) use ($services, $cities) {
                $service = $services->random();
                $city = $cities->random();
                $duration = $service->durations->random();
                $hours = random_int($duration->min, $duration->max);

                return [
                    'service_id' => $service->id,
                    'city_id' => $city->id,
                    'hourly_price' => $duration->hourly_price,
                    'duration' => $hours,
                    'total' => $duration->hourly_price * $hours,
                ];
            }
        ))
            ->create();
    }
}
