<?php

namespace Database\Seeders;

use App\Enums\ExtraList;
use App\Models\Extra;
use App\Models\Service;
use Illuminate\Database\Seeder;

class ExtraSeeder extends Seeder
{
    public function run(): void
    {
        $extras = ExtraList::cases();
        $services = Service::all();

        foreach ($extras as $extra) {
            foreach ($services as $service) {
                Extra::create([
                    'service_id' => $service->id,
                    'slug' => $extra->value,
                    'price' => 50.00,
                ]);
            }
        }
    }
}
