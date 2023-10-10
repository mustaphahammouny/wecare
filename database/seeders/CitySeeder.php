<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        $cities = ['Casablanca', 'Rabat', 'Sale', 'Kenitra',];

        foreach ($cities as $city) {
            City::create([
                'name' => $city
            ]);
        }
    }
}
