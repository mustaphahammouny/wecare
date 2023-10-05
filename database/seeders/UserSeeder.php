<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'Med',
            'last_name' => 'Yoyo',
            'email' => 'med@yoyo.com',
        ]);

        User::factory(10)->create();
    }
}
