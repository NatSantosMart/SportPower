<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingSeeder extends Seeder
{
    public function run()
    {
        // Datos de ejemplo para la tabla 'VALORACION'
        $datosValoracion = [
            [
                'score' => 5,
                'product_id' => 1,
                'comment_id' => 1,
            ],
            [
                'score' => 3,
                'product_id' => 2,
                'comment_id' => 2,
            ],
            [
                'score' => 5,
                'product_id' => 4,
                'comment_id' => 4,
            ],
            [
                'score' => 1,
                'product_id' => 4,
                'comment_id' => 5,
            ],
        ];

        // Insertar los datos en la tabla 'VALORACION'
        DB::table('ratings')->insert($datosValoracion);
    }
}
