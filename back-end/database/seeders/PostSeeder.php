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
                'type' => 'Recetas saludables',
                'comment_id' => 3,
            ],
            [
                'type' => 'Consejos deportivos',
                'comment_id' => 6,
            ],
        ];
        DB::table('posts')->insert($datosPost);
    }
}
