<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\City;
use App\Models\Pricing;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $services = Service::all();
        $cities = City::all();

        Booking::factory()->count(20)->state(new Sequence(
            function (Sequence $sequence) use ($services, $cities) {
                $service = $services->random();
                $city = $cities->random();
                $pricing = Pricing::inRandomOrder()->first();
                $duration = random_int($service->min_duration, $service->max_duration);

                return [
                    'service_id' => $service->id,
                    'city_id' => $city->id,
                    'service_price' => $pricing->price,
                    'duration' => $duration,
                    'total' => $pricing->price * $duration,
                ];
            }
        ))
            ->create();
    }
}
