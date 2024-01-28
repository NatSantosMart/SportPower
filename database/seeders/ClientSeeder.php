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
            ],
            [
                'dni' => '23456789B',
                'phone' => '723452613',
                'country' => 'España',
                'postal_code' => '12345',
                'city' => 'Almería',
                'address' => 'Avenida Central 456',
            ],
            [
                'dni' => '34567890C',
                'phone' => '678534251',
                'country' => 'España',
                'postal_code' => '90210',
                'city' => 'Bilbao',
                'address' => 'Calle Margara 123',
            ],
            [
                'dni' => '45678901D',
                'phone' => '985644289',
                'country' => 'España',
                'postal_code' => '75001',
                'city' => 'Valencia',
                'address' => 'Rue de la Paix 101',
            ],
        ];

        // Insert clients into the database
        DB::table('clients')->insert($clients);
    }
}
