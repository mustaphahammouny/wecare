<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->clear();

        $this->call(UserSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(ServiceSeeder::class);
        $this->call(ExtraSeeder::class);
        $this->call(BookingSeeder::class);
        $this->call(ContactSeeder::class);
    }

    private function clear(): void
    {
        $re = File::cleanDirectory(storage_path('app/public'));

        $excludeTables = ['migrations'];
        $tables = DB::select('SHOW TABLES');

        Schema::disableForeignKeyConstraints();

        foreach ($tables as $table) {
            $tableName = reset($table);

            if (!in_array($tableName, $excludeTables)) {
                DB::table($tableName)->truncate();
            }
        }

        Schema::enableForeignKeyConstraints();
    }
}
