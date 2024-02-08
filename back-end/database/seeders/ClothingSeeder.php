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
                'color' => 'negro',
                'product_id' => 3,
            ],
            [
                'gender' => 'masculino',
                'size' => 'L',
                'color' => 'azul',
                'product_id' => 6,
            ],
            [
                'gender' => 'femenino',
                'size' => 'S',
                'color' => 'gris',
                'product_id' => 7,
            ],
        ];

        DB::table('clothing')->insert($clothing);
    }
}
