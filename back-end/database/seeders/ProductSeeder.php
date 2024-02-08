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
            ],
            [
                'url_image' => 'https://www.indalas.com/15524-large_default/zapatillas-deportivas-palermo.jpg',
                'description' => 'Descripción del producto 2',
                'name' => 'Mezcla ganador de peso',
                'price' => 19.99,
            ],
            [
                'url_image' => 'https://resize.sprintercdn.com/o/products/0337719/sudadera-running-nike_0337719_00_4_2429132278.jpg',
                'description' => 'Descripción del producto 3',
                'name' => 'Sudadera running',
                'price' => 39.99,
            ],
            [
                'url_image' => 'https://www.indalas.com/15524-large_default/zapatillas-deportivas-palermo.jpg',
                'description' => 'Descripción del producto 4',
                'name' => 'Brownie proteico',
                'price' => 49.99,
            ],
            [
                'url_image' => 'https://www.indalas.com/15524-large_default/zapatillas-deportivas-palermo.jpg',
                'description' => 'Descripción del producto 5',
                'name' => 'Omega 3',
                'price' => 19.99,
            ],
            [
                'url_image' => 'https://www.joma-sport.com/dw/image/v2/BFRV_PRD/on/demandware.static/-/Sites-joma-masterCatalog/default/dw3fba8169/images/medium/102241.010_4.jpg?sw=460&sh=475&sm=fit',
                'description' => 'Descripción del producto 6',
                'name' => 'Sudadera Joma',
                'price' => 89.49,
            ],
            [
                'url_image' => 'https://www.bolf.es/spa_pl_Pantalon-de-chandal-para-mujer-gris-Bolf-BL32-93500_1.jpg',
                'description' => 'Descripción del producto 7',
                'name' => 'Chandal gris',
                'price' => 40.49,
            ],
        ];

        // Insertar productos en la base de datos
        DB::table('products')->insert($products);
    }
}
