<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'url_image' => 'https://www.indalas.com/15524-large_default/zapatillas-deportivas-palermo.jpg',
                'description' => 'Descripción del producto 1',
                'name' => 'Mezcla proteina vegana',
                'price' => 29.99,
                'admin_dni' => '11111111D',
            ],
            [
                'url_image' => 'https://www.indalas.com/15524-large_default/zapatillas-deportivas-palermo.jpg',
                'description' => 'Descripción del producto 2',
                'name' => 'Mezcla ganador de peso',
                'price' => 19.99,
                'admin_dni' => '11111111D',
            ],
            [
                'url_image' => 'https://www.indalas.com/15524-large_default/zapatillas-deportivas-palermo.jpg',
                'description' => 'Descripción del producto 3',
                'name' => 'Sudadera running',
                'price' => 39.99,
                'admin_dni' => '11111111D',
            ],
            [
                'url_image' => 'https://www.indalas.com/15524-large_default/zapatillas-deportivas-palermo.jpg',
                'description' => 'Descripción del producto 4',
                'name' => 'Brownie proteico',
                'price' => 49.99,
                'admin_dni' => '11111111D',
            ],
            [
                'url_image' => 'https://www.indalas.com/15524-large_default/zapatillas-deportivas-palermo.jpg',
                'description' => 'Descripción del producto 5',
                'name' => 'Omega 3',
                'price' => 19.99,
                'admin_dni' => '11111111D',
            ],
        ];

        // Insertar productos en la base de datos
        DB::table('products')->insert($products);
    }
}
