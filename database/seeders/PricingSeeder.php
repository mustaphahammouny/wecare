<?php

namespace Database\Seeders;

use App\Enums\PlanList;
use App\Models\Pricing;
use Illuminate\Database\Seeder;

class PricingSeeder extends Seeder
{
    public function run(): void
    {
        $pricings = [
            [
                'plan' => PlanList::Once, 'durations' => [
                    ['min' => 1, 'max' => 2, 'price' => 80.00,],
                    ['min' => 3, 'max' => 4, 'price' => 65.00,],
                    ['min' => 5, 'max' => 6, 'price' => 55.00,],
                    ['min' => 7, 'max' => 8, 'price' => 50.00,],
                ]
            ], [
                'plan' => PlanList::Regular, 'durations' => [
                    ['min' => 1, 'max' => 2, 'price' => 70.00,],
                    ['min' => 3, 'max' => 4, 'price' => 55.00,],
                    ['min' => 5, 'max' => 6, 'price' => 45.00,],
                    ['min' => 7, 'max' => 8, 'price' => 40.00,],
                ]
            ]
        ];

        foreach ($pricings as $pricing) {
            foreach ($pricing['durations'] as $duration) {
                Pricing::create([
                    'plan' => $pricing['plan']->value,
                    'min_duration' => $duration['min'],
                    'max_duration' => $duration['max'],
                    'price' => $duration['price'],
                ]);
            }
        }
    }
}