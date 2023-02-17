<?php

namespace Database\Seeders;

use App\Models\Period;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(RoleAndPermissionSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(DevidenSeeder::class);
        $this->call(GeneralSeeder::class);
        $this->call(KopProductTypeSeeder::class);
        $this->call(KopProductSeeder::class);
        $this->call(PeriodSeeder::class);
    }
}
