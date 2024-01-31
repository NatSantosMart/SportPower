<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminSeeder::class); 
        $this->call(ClientSeeder::class); 
        $this->call(ProductSeeder::class); 
        $this->call(CommentSeeder::class); 
        $this->call(PostSeeder::class);
        $this->call(RatingSeeder::class);  
        $this->call(OrderSeeder::class); 
        $this->call(OrderProductSeeder::class); 
        $this->call(FavoriteSeeder::class); 
        $this->call(CartSeeder::class); 
        $this->call(ClothingSeeder::class); 
        $this->call(SupplementSeeder::class); 
    }
}
