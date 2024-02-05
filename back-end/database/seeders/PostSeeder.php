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
                'type' => 'rutinas de recuperación',
                'comment_id' => 6,
            ],
            [
                'type' => 'Entrenamientos',
                'comment_id' => 7,
            ],
        ];
        DB::table('posts')->insert($datosPost);
    }
}
