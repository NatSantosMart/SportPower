<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderProductSeeder extends Seeder
{
    public function run()
    {
        // Datos de ejemplo para la tabla 'CONTIENE'
        $orderProducts = [
            [
                'order_id' => 1,
                'product_id' => 1,
            ],
            [
                'order_id' => 1,
                'product_id' => 2,
            ],
            [
                'order_id' => 2,
                'product_id' => 3,
            ],
            [
                'order_id' => 3,
                'product_id' => 4,
            ],
        ];

        // Insertar los datos en la tabla 'CONTIENE'
        DB::table('order_products')->insert($orderProducts);
    }
}
