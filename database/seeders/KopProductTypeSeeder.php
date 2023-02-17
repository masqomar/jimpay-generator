<?php

namespace Database\Seeders;

use App\Models\KopProductType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KopProductTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // KopProductType::truncate();
        $kopProductTypes = [
            [
                'cover'         => '',
                'name'          => 'Simpanan Anggota',
                'status'        => 1,
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'cover'         => '',
                'name'          => 'Pembiayaan Anggota',
                'status'        => 1,
                'created_at'    => now(),
                'updated_at'    => now()
            ],
            [
                'cover'         => '',
                'name'          => 'Tabungan Anggota',
                'status'        => 1,
                'created_at'    => now(),
                'updated_at'    => now()
            ],
        ];

        KopProductType::insert($kopProductTypes);
    }
}
