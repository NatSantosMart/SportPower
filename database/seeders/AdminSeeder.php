<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AdminSeeder extends Seeder
{
    public function run()
    {
        // Sample admin data
        $admins = [
            [
                'dni' => '87654321B', // Replace with actual admin DNI
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more sample admins as needed
        ];

        // Insert admins into the database
        DB::table('admins')->insert($admins);
    }
}
