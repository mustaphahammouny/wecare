<?php

namespace Database\Factories;

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
            'address' => fake()->address(),
            'service_at' => Carbon::now()->addDays(rand(-10, 10)),
            'status' => fake()->randomElement(StatusList::cases()),
        ];
    }
}
