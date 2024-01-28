<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonSeeder extends Seeder
{
    public function run()
    {
        $people = [
            [
                'dni' => '12345678A',
                'email' => 'juan@gmail.com',
                'password' => bcrypt('password123'),
                'name' => 'Juan',
                'surnames' => 'Pérez',
            ],
            [
                'dni' => '23456789B',
                'email' => 'ana@yahoo.com',
                'password' => bcrypt('securepass'),
                'name' => 'Ana',
                'surnames' => 'Gómez García',
            ],
            [
                'dni' => '34567890C',
                'email' => 'carlos@hotmail.com',
                'password' => bcrypt('carlos456'),
                'name' => 'Carlos',
                'surnames' => 'García Lopez',
            ],
            [
                'dni' => '45678901D',
                'email' => 'laura@gmail.com',
                'password' => bcrypt('laurita123'),
                'name' => 'Laura',
                'surnames' => 'Martínez Lopez',
            ],
            [
                'dni' => '11111111D',
                'email' => 'ines@gmail.com',
                'password' => bcrypt('laurita123'),
                'name' => 'Admin Carla',
                'surnames' => 'Lopez García',
            ],
        ];

        // Insert personas into the database
        DB::table('people')->insert($people);
    }
}
