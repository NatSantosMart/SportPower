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
                'dni' => '11111111D',
                'email' => 'ines@gmail.com',
                'password' => bcrypt('laurita123'),
            ],
           
        ];

        // Insert admins into the database
        DB::table('admins')->insert($admins);
    }
}
