<?php

namespace Database\Seeders;

use App\Models\General;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        General::create([
            'name'          => 'JIM Mart App',
            'mobile'        => '6285790702471',
            'email'         => 'kopkarjim@gmail.com',
            'address'       => 'Jalan Langkat No 88 Singgahan Pelem Pare',
            'city'          => 'Kediri',
            'state'         => 'Jawa Timur',
            'zip'           => '64213',
            'country'       => 'Indonesia',
            'min'           => 1000.00,
            'free'          => 50000.00,
            'tax'           => 0.00,
            'shipping'      => 'fixed',
            'shippingPrice' => 1000.00,
            'status'        => 1,
            'extra_field'   => NULL,
        ]);
    }
}
