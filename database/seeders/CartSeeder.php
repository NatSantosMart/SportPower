<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Datos de ejemplo para agregar a la tabla 'anyadir_carrito'
        $cartData = [
            [
                'client_dni' => '23456789B',
                'product_id' => 2,
            ],
            [
                'client_dni' => '23456789B',
                'product_id' => 3,
            ],
            [
                'client_dni' => '23456789B',
                'product_id' => 1,
            ],
            [
                'client_dni' => '34567890C',
                'product_id' => 1,
            ],
            [
                'client_dni' => '45678901D',
                'product_id' => 2,
            ],
            [
                'client_dni' => '12345678A',
                'product_id' => 3,
            ],
        ];

        // Insertar los datos en la tabla 'anyadir_carrito'
        DB::table('carts')->insert($cartData);
    }
}
