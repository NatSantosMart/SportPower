<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonSeeder extends Seeder
{
    public function run()
    {
        // Sample person data
        $people = [
            [
                'dni' => '12345678A',
                'email' => 'person1@example.com',
                'password' => bcrypt('password1'), // You may want to hash passwords
                'name' => 'John',
                'surnames' => 'Doe',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dni' => '87654321B',
                'email' => 'person2@example.com',
                'password' => bcrypt('password2'),
                'name' => 'Jane',
                'surnames' => 'Smith',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more sample people as needed
        ];

        // Insert people into the database
        DB::table('people')->insert($people);
    }
}
