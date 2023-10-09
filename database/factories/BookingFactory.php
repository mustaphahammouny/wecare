<?php

namespace Database\Factories;

use App\Enums\CityList;
use App\Enums\StatusList;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'user_id' => 1,
            'phone' => fake()->phoneNumber(),
            'city' => fake()->randomElement(CityList::cases())->value,
            'address' => fake()->address(),
            'service_at' => Carbon::now()->subDays(rand(4, 10)),
            'status' => fake()->randomElement(StatusList::cases()),
        ];
    }
}
