<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplementSeeder extends Seeder
{
    public function run()
    {
        $datosSuplemento = [
            [
                'quantity' => '5kg',
                'product_id' => 1,
            ],
            [
                'quantity' => '1kg',
                'product_id' => 2,
            ],
            [
                'quantity' => '3 unidades',
                'product_id' => 4,
            ],
            [
                'quantity' => '90 cápsulas',
                'product_id' => 5,
            ],
        ];

        DB::table('supplements')->insert($datosSuplemento);
    }
}
