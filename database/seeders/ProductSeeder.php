<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Sample product data
        $products = [
            [
                'url_image' => 'https://upload.wikimedia.org/wikipedia/commons/e/ea/Famous_Cargo_Pants.png',
                'description' => 'Sample description for product 1',
                'name' => 'Product 1',
                'price' => 50.00,
                'admin_dni' => '87654321B', // Replace with actual admin DNI
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'url_image' => 'https://m.media-amazon.com/images/I/71Mqij29tnL._AC_UY1000_.jpg',
                'description' => 'Sample description for product 2',
                'name' => 'Product 2',
                'price' => 60.00,
                'admin_dni' => '87654321B', // Replace with actual admin DNI
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more sample products as needed
        ];

        // Insert products into the database
        DB::table('products')->insert($products);
    }
}
