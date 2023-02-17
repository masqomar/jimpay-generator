<?php

namespace Database\Seeders;

use App\Models\Cities;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Cities::truncate();
        $cities = [
            [
                'name'          => 'Jalan Langkat',
                'lat'           => '-7,7503',
                'lng'           => '112,17494',
                'extra_field'   => '',
                'status'        => 1
            ],
            [
                'name'          => 'Jalan Seruni',
                'lat'           => '-7,75308',
                'lng'           => '122,18076',
                'extra_field'   => '',
                'status'        => 1
            ],
            [
                'name'          => 'Jalan Cempaka',
                'lat'           => '-7,75315',
                'lng'           => '122,18285',
                'extra_field'   => '',
                'status'        => 1
            ],
            [
                'name'          => 'Jalan Pancawarna',
                'lat'           => '-7,75456',
                'lng'           => '112,18978',
                'extra_field'   => '',
                'status'        => 1
            ],
        ];

        Cities::insert($cities);
    }
}
