<?php

namespace Database\Seeders;

use App\Models\Deviden;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DevidenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Deviden::truncate();
        Deviden::create([
            'operational_reserve'   => 5,
            'capital'               => 25,
            'user_capital'          => 20,
            'user_activity'         => 10,
            'management'            => 20
        ]);
    }
}
