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
                'color' => 'azul',
                'product_id' => 3,
            ],
        ];

        DB::table('clothes')->insert($clothing);
    }
}
