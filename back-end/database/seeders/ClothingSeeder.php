<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClothingSeeder extends Seeder
{
    public function run()
    {
        $clothing = [
            [
                'gender' => 'Masculino',
                'size' => 'M',
                'color' => 'Negro',
                'product_id' => 3,
            ],
            [
                'gender' => 'Masculino',
                'size' => 'L',
                'color' => 'Azul',
                'product_id' => 6,
            ],
            [
                'gender' => 'Femenino',
                'size' => 'S',
                'color' => 'Gris',
                'product_id' => 7,
            ],
            [
                'gender' => 'Femenino',
                'size' => 'L',
                'color' => 'Negro',
                'product_id' => 8,
            ],
            [
                'gender' => 'Femenino',
                'size' => 'S',
                'color' => 'Rosa',
                'product_id' => 9,
            ],
            [
                'gender' => 'Femenino',
                'size' => 'S',
                'color' => 'Blanco',
                'product_id' => 10,
            ],
            [
                'gender' => 'Masculino',
                'size' => 'L',
                'color' => 'Gris',
                'product_id' => 11,
            ],
            [
                'gender' => 'Femenino',
                'size' => 'L',
                'color' => 'Blanco',
                'product_id' => 13,
            ],
            [
                'gender' => 'Femenino',
                'size' => 'S',
                'color' => 'Negro',
                'product_id' => 14,
            ],
            [
                'gender' => 'Femenino',
                'size' => 'M',
                'color' => 'Negro',
                'product_id' => 15,
            ],
            [
                'gender' => 'Masculino',
                'size' => 'L',
                'color' => 'Negro',
                'product_id' => 16,
            ],

            [
                'gender' => 'Masculino',
                'size' => 'S',
                'color' => 'Rojo',
                'product_id' => 17,
            ],
            [
                'gender' => 'Masculino',
                'size' => 'M',
                'color' => 'Rojo',
                'product_id' => 18,
            ],
            [
                'gender' => 'Masculino',
                'size' => 'L',
                'color' => 'Negro',
                'product_id' => 19,
            ],
            [
                'gender' => 'Femenino',
                'size' => 'M',
                'color' => 'Rojo',
                'product_id' => 20,
            ],
            
        ];

        DB::table('clothing')->insert($clothing);
    }
}
