<?php

namespace Database\Seeders;

use App\Models\KopProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KopProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // KopProduct::truncate();
        $kopProducts = [
            [
                'name'                  => 'Simpanan Pokok',
                'kop_product_type_id'   => 1,
                'cover'                 => '',
                'status'                => 1,
                'created_at'            => now(),
                'updated_at'            => now()
            ],
            [
                'name'                  => 'Simpanan Wajib',
                'kop_product_type_id'   => 1,
                'cover'                 => '',
                'status'                => 1,
                'created_at'            => now(),
                'updated_at'            => now()
            ],
            [
                'name'                  => 'Simpanan Sukarela',
                'kop_product_type_id'   => 1,
                'cover'                 => '',
                'status'                => 1,
                'created_at'            => now(),
                'updated_at'            => now()
            ],
            [
                'name'                  => 'Pembiayaan / Mudhorobah',
                'kop_product_type_id'   => 2,
                'cover'                 => '',
                'status'                => 1,
                'created_at'            => now(),
                'updated_at'            => now()
            ]
        ];
        KopProduct::insert($kopProducts);
    }
}
