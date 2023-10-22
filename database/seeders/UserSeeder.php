<?php

namespace Database\Seeders;

use App\Enums\RoleList;
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
            'role' => RoleList::Client->value,
        ]);

        User::factory()->create([
            'first_name' => 'WeCare',
            'last_name' => 'Admin',
            'email' => 'admin@wecare.com',
            'role' => RoleList::Admin->value,
        ]);

        User::factory(10)->create();
    }
}
