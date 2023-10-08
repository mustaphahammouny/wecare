<?php

namespace Database\Seeders;

use App\Models\Extra;
use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ExtraSeeder extends Seeder
{
    public function run(): void
    {
        $extras = [
            ['title' => 'With products', 'price' => 50.00,],
        ];
        $services = Service::all();

        foreach ($extras as $extra) {
            foreach ($services as $service) {
                Extra::create([
                    'service_id' => $service->id,
                    'slug' => Str::slug($service['title']),
                    'title' => $extra['title'],
                    'price' => $extra['price'],
                ]);
            }
        }
    }
}
