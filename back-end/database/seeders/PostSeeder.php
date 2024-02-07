<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    public function run()
    {
        $datosPost = [
            [
                'type' => 'recetas saludables',
                'comment_id' => 3,
            ],
            [
                'type' => 'recetas saludables',
                'comment_id' => 6,
            ],
            [
                'type' => 'recetas saludables',
                'comment_id' => 7,
            ],
        ];
        DB::table('posts')->insert($datosPost);
    }
}
