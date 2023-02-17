<?php

namespace Database\Seeders;

use App\Models\Period;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Period::truncate();
        $periods = [
            [
                'name'          => '2021',
                'open_date'     => '2023-01-01',
                'close_date'    => '2023-12-31',
                'status'        => 1,
                'created_at'    => now(),
                'updated_at'    => now()
            ]
        ];
        Period::insert($periods);
    }
}
