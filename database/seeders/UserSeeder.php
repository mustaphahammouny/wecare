<?php

namespace Database\Seeders;

use App\Enums\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create([
            'first_name' => 'WeCare',
            'last_name' => 'Client',
            'email' => 'client@wecare.com',
            'role' => Role::Client->value,
        ]);

        User::factory()->create([
            'first_name' => 'WeCare',
            'last_name' => 'Admin',
            'email' => 'admin@wecare.com',
            'role' => Role::Admin->value,
        ]);

        User::factory(10)->create();
    }
}
