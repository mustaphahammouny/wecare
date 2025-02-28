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
            ['title' => 'Cleaning', 'media' => 'cleaning.ltr.png', 'durations' => [
                ['min' => 2, 'max' => 4, 'hourly_price' => 20],
                ['min' => 5, 'max' => 6, 'hourly_price' => 18],
                ['min' => 7, 'max' => 8, 'hourly_price' => 16],
            ]],
            ['title' => 'Ironing', 'media' => 'ironing.ltr.png', 'durations' => [
                ['min' => 1, 'max' => 2, 'hourly_price' => 20],
                ['min' => 3, 'max' => 4, 'hourly_price' => 18],
            ]],
            ['title' => 'Cooking', 'media' => 'cooking.ltr.png', 'durations' => [
                ['min' => 2, 'max' => 4, 'hourly_price' => 20],
                ['min' => 5, 'max' => 6, 'hourly_price' => 18],
            ]],
            ['title' => 'Teaching', 'media' => 'teaching.ltr.png', 'durations' => [
                ['min' => 2, 'max' => 4, 'hourly_price' => 30],
                ['min' => 5, 'max' => 6, 'hourly_price' => 25],
            ]],
            ['title' => 'Coaching', 'media' => 'coaching.ltr.png', 'durations' => [
                ['min' => 1, 'max' => 2, 'hourly_price' => 20],
            ]],
            ['title' => 'Haircut', 'media' => 'haircut.ltr.png', 'durations' => [
                ['min' => 1, 'max' => 2, 'hourly_price' => 20],
            ]],
            ['title' => 'Beautifying', 'media' => 'beautifying.ltr.png', 'durations' => [
                ['min' => 2, 'max' => 3, 'hourly_price' => 20],
            ]],
        ];

        foreach ($services as $service) {
            $serviceModel = Service::create([
                'slug' => Str::slug($service['title']),
                'title' => $service['title'],
                'active' => true,
            ]);

            $serviceModel->durations()->createMany($service['durations']);

            $serviceModel->addMedia(resource_path("images/services/{$service['media']}"))
                ->preservingOriginal()
                ->toMediaCollection();
        }
    }
}
