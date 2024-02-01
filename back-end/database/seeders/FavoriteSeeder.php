<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoriteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Datos de ejemplo para la tabla 'ASIGNA_FAVORITO'
        $favorites = [
            [
                'client_dni' => '23456789B',
                'product_id' => 1,
            ],
            [
                'client_dni' => '23456789B',
                'product_id' => 2,
            ],
            [
                'client_dni' => '23456789B',
                'product_id' => 4,
            ],
            [
                'client_dni' => '45678901D',
                'product_id' => 3,
            ],
            [
                'client_dni' => '45678901D',
                'product_id' => 4,
            ],
            [
                'client_dni' => '12345678A',
                'product_id' => 4,
            ],
        ];

        // Insertar los datos en la tabla 'ASIGNA_FAVORITO'
        DB::table('favorites')->insert($favorites);
    }
}
