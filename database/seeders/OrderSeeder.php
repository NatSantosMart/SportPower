<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $datosPedido = [
            [
                'status' => 'realizado',
                'delivery_date' => '2023-11-10',
                'request_date' => '2023-11-05',
                'total_price' => 49.98,
                'id' => 1,
                'client_dni' => '23456789B',
            ],
            [
                'status' => 'realizado',
                'delivery_date' => '2023-11-10',
                'request_date' => '2023-11-05',
                'total_price' => 59.98,
                'id' => 2,
                'client_dni' => '45678901D',
            ],
            [
                'status' => 'entregado',
                'delivery_date' => '2023-11-15',
                'request_date' => '2023-11-12',
                'total_price' => 69.98,
                'id' => 3,
                'client_dni' => '12345678A',
            ],
        ];
        DB::table('orders')->insert($datosPedido);
    }
}
