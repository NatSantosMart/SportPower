<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Sample client data
        $clients = [
            [
                'dni' => '12345678A',
                'phone' => '657456781',
                'country' => 'España',
                'postal_code' => '28001',
                'city' => 'Madrid',
                'address' => 'Calle Principal 123',
                'email' => 'juan@gmail.com',
                'password' => bcrypt('password123'),
                'name' => 'Juan',
                'surnames' => 'Pérez',
            ],
            [
                'dni' => '23456789B',
                'phone' => '723452613',
                'country' => 'España',
                'postal_code' => '12345',
                'city' => 'Almería',
                'address' => 'Avenida Central 456',
                'email' => 'ana@yahoo.com',
                'password' => bcrypt('securepass'),
                'name' => 'Ana',
                'surnames' => 'Gómez García',
            ],
            [
                'dni' => '34567890C',
                'phone' => '678534251',
                'country' => 'España',
                'postal_code' => '90210',
                'city' => 'Bilbao',
                'address' => 'Calle Margara 123',
                'email' => 'carlos@hotmail.com',
                'password' => bcrypt('carlos456'),
                'name' => 'Carlos',
                'surnames' => 'García Lopez',
            ],
            [
                'dni' => '45678901D',
                'phone' => '985644289',
                'country' => 'España',
                'postal_code' => '75001',
                'city' => 'Valencia',
                'address' => 'Rue de la Paix 101',
                'email' => 'laura@gmail.com',
                'password' => bcrypt('laurita123'),
                'name' => 'Laura',
                'surnames' => 'Martínez Lopez',
            ],
        ];

        // Insert clients into the database
        DB::table('clients')->insert($clients);
    }
}
