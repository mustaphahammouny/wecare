<?php

namespace Database\Seeders;

use App\Models\Pricing;
use Illuminate\Database\Seeder;

class PricingSeeder extends Seeder
{
    public function run(): void
    {
        $pricings = [
            ['min' => 1, 'max' => 2, 'price' => 80.00,],
            ['min' => 3, 'max' => 4, 'price' => 65.00,],
            ['min' => 5, 'max' => 6, 'price' => 55.00,],
            ['min' => 7, 'max' => 8, 'price' => 50.00,],
        ];

        foreach ($pricings as $pricing) {
            Pricing::create([
                'min_duration' => $pricing['min'],
                'max_duration' => $pricing['max'],
                'price' => $pricing['price'],
            ]);
        }
    }
}
