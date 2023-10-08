<?php

namespace Database\Seeders;

use App\Enums\ServiceList;
use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = ServiceList::cases();

        foreach ($services as $service) {
            Service::create([
                'slug' => $service->value,
                'active' => true,
            ]);

            // $serviceModel->addMedia($service->media())
            //     ->preservingOriginal()
            //     ->toMediaCollection();
        }
    }
}
