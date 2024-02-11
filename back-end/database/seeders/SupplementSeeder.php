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

            [
                'quantity' => '5kg',
                'product_id' => 21,
                'flavor' => 'Caramelo',
                'type' => 'Proteina',
            ],
            [
                'quantity' => '5kg',
                'product_id' => 22,
                'flavor' => 'Chocolate',
                'type' => 'Proteina',
            ],
            [
                'quantity' => '1kg',
                'product_id' => 23,
                'flavor' => 'Fresa',
                'type' => 'Proteina',
            ],
            [
                'quantity' => '5kg',
                'product_id' => 24,
                'flavor' => 'Chocolate',
                'type' => 'Proteina',
            ],

            [
                'quantity' => '3 unidades',
                'product_id' => 25,
                'flavor' => 'Caramelo',
                'type' => 'Snack',
            ],

            [
                'quantity' => '3 unidades',
                'product_id' => 26,
                'flavor' => 'Caramelo',
                'type' => 'Snack',
            ],
            [
                'quantity' => '3 unidades',
                'product_id' => 27,
                'flavor' => 'Chocolate',
                'type' => 'Snack',
            ],
            [
                'quantity' => '3 unidades',
                'product_id' => 28,
                'flavor' => 'Chocolate',
                'type' => 'Snack',
            ],
            [
                'quantity' => '3 unidades',
                'product_id' => 29,
                'flavor' => 'Fresa',
                'type' => 'Snack',
            ],
            [
                'quantity' => '3 unidades',
                'product_id' => 30,
                'flavor' => 'Limón',
                'type' => 'Snack',
            ],







            [
                'quantity' => '90 cápsulas',
                'product_id' => 31,
                'flavor' => '',
                'type' => 'Vitamina',
            ],
            [
                'quantity' => '90 cápsulas',
                'product_id' => 32,
                'flavor' => '',
                'type' => 'Vitamina',
            ],
            [
                'quantity' => '90 cápsulas',
                'product_id' => 33,
                'flavor' => '',
                'type' => 'Vitamina',
            ],
            [
                'quantity' => '90 cápsulas',
                'product_id' => 34,
                'flavor' => 'Fresa',
                'type' => 'Vitamina',
            ],
            [
                'quantity' => '90 cápsulas',
                'product_id' => 35,
                'flavor' => 'Limón',
                'type' => 'Vitamina',
            ],
            [
                'quantity' => '90 cápsulas',
                'product_id' => 36,
                'flavor' => '',
                'type' => 'Vitamina',
            ],
            [
                'quantity' => '90 cápsulas',
                'product_id' => 37,
                'flavor' => '',
                'type' => 'Vitamina',
            ],
            
        ];

        DB::table('supplements')->insert($datosSuplemento);
    }
}
