<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            ['title' => 'Cleaning', 'media' => 'cleaning.ltr.png', 'min' => 2, 'max' => 8, 'step' => 2],
            ['title' => 'Ironing', 'media' => 'ironing.ltr.png', 'min' => 1, 'max' => 4, 'step' => 1],
            ['title' => 'Cooking', 'media' => 'cooking.ltr.png', 'min' => 2, 'max' => 8, 'step' => 1],
            ['title' => 'Teaching', 'media' => 'teaching.ltr.png', 'min' => 2, 'max' => 8, 'step' => 2],
            ['title' => 'Coaching', 'media' => 'coaching.ltr.png', 'min' => 1, 'max' => 2, 'step' => 1],
            ['title' => 'Haircut', 'media' => 'haircut.ltr.png', 'min' => 1, 'max' => 2, 'step' => 1],
            ['title' => 'Beautifying', 'media' => 'beautifying.ltr.png', 'min' => 2, 'max' => 4, 'step' => 1],
        ];

        foreach ($services as $service) {
            $serviceModel = Service::create([
                'slug' => Str::slug($service['title']),
                'title' => $service['title'],
                'min_duration' => $service['min'],
                'max_duration' => $service['max'],
                'step_duration' => $service['step'],
                'active' => true,
            ]);

            $serviceModel->addMedia(resource_path("images/services/{$service['media']}"))
                ->preservingOriginal()
                ->toMediaCollection();
        }
    }
}
