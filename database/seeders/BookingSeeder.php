<?php

namespace Database\Seeders;

use App\Enums\PlanList;
use App\Models\Booking;
use App\Models\Pricing;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        $services = Service::all();

        Booking::factory()->count(20)->state(new Sequence(
            function (Sequence $sequence) use ($services) {
                $service = $services->random();
                $plan = Arr::random(PlanList::cases());
                $planOption = null;
                $pricing = Pricing::where('plan', $plan)
                    ->inRandomOrder()
                    ->first();
                $duration = random_int($pricing->min_duration, $pricing->max_duration);

                if ($plan == PlanList::Regular) {
                    $planOption = Arr::random($plan->options());
                }

                return [
                    'service_id' => $service->id,
                    'service_price' => $pricing->price,
                    'plan' => $plan->value,
                    'plan_option' => $planOption?->value,
                    'duration' => $duration,
                    'total' => $pricing->price * $duration,
                ];
            }
        ))
            ->create();
    }
}
