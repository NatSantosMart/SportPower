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
                'gender' => 'masculino',
                'size' => 'M',
                'color' => 'Negro',
                'product_id' => 3,
            ],
            [
                'gender' => 'masculino',
                'size' => 'L',
                'color' => 'Azul',
                'product_id' => 6,
            ],
            [
                'gender' => 'femenino',
                'size' => 'S',
                'color' => 'Gris',
                'product_id' => 7,
            ],
            [
                'gender' => 'femenino',
                'size' => 'L',
                'color' => 'Negro',
                'product_id' => 8,
            ],
            [
                'gender' => 'femenino',
                'size' => 'S',
                'color' => 'Rosa',
                'product_id' => 9,
            ],
            [
                'gender' => 'femenino',
                'size' => 'S',
                'color' => 'Blanco',
                'product_id' => 10,
            ],
        ];

        DB::table('clothing')->insert($clothing);
    }
}
