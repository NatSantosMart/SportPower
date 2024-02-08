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
                'flavor' => 'Chocolate',
                'type' => 'Proteina',
            ],
            [
                'quantity' => '1kg',
                'product_id' => 2,
                'flavor' => 'Fresa',
                'type' => 'Proteina',
            ],
            [
                'quantity' => '3 unidades',
                'product_id' => 4,
                'flavor' => 'Chocolate',
                'type' => 'Snack',
            ],
        ];

        DB::table('supplements')->insert($datosSuplemento);
    }
}
