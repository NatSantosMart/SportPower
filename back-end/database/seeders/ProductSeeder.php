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
                'url_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGgsIYhpPvmlllkmiM_NWiW71JkN5lkMkVvg&usqp=CAU',
                'description' => 'Impact Whey Protein te aporta un valor nutricional sin igual de la mano de nuestros nutricionistas más expertos. Dale a tu cuerpo la energía que necesita gracias a sus ingredientes de la más alta calidad, que te aportan 23g* de proteína por cada ración.',
                'name' => 'Mezcla proteina vegana',
                'price' => 29.99,
                'type' => "suplemento",
            ],
            [
                'url_image' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQjYaoOFnSGUJMzWAXY2AeoVEUdzIcAhtA4Arlq8mtW32nuIbD9vomeVj6mZtbK5szI2DY&usqp=CAU',
                'description' => 'Prueba Clear Whey Isolate, y no mirarás atrás. Si quieres una consistencia más ligera que el lactosuero tradicional y más intensa que los zumos, no busques más. Ha sido ganadora del «mejor polvo de proteínas» de los European Specialist Sports Nutrition Awards de 2022, pero ahí no acaba la cosa.                               Clear Whey Isolate te ofrece una explosión de sabores afrutados junto con 20 g* de proteína por ración gracias a su aislado de proteína de lactosuero hidrolizado. Se podría decir que es «la repera».',
                'name' => 'Mezcla ganador de peso',
                'price' => 19.99,
                'type' => "suplemento",
            ],
            [
                'url_image' => 'https://contents.mediadecathlon.com/p1974541/k$203568708f8047440373cac20a349b42/sq/sudadera-running-kalenji-dry-feel-hombre-negro-capucha-transpirable.jpg?format=auto&f=800x0',
                'description' => 'Diseñadas para proporcionar sujeción y esculpir, nuestras mallas con largo por encima del tobillo se adaptan a tus curvas y están elaboradas pensando en la funcionalidad y el rendimiento, ideal para mantenerte segura durante todo tipo de entrenamientos.',
                'name' => 'Sudadera running',
                'price' => 39.99,
                'type' => "ropa",
            ],
            [
                'url_image' => 'https://www.vita33.com/images/productos/my-protein-brownie-proteico-75g-chocolate-chip-1-22805.jpeg',
                'description' => 'Nuestra Barrita Vegana Proteica contiene una mezcla totalmente natural de proteínas de origen vegetal, elaborada con la mejor manteca de cacao, chips de chocolate y nueces tostadas. No contiene gluten, ni edulcorantes artificiales, ni azúcares añadidos. Es ideal para complementar un estilo de vida vegano.',
                'name' => 'Brownie proteico',
                'price' => 49.99,
                'type' => "suplemento",
            ],
            [
                'url_image' => 'https://static.carrefour.es/hd_510x_/img_pim_food/829889_00_1.jpg',
                'description' => '¿Quieres incluir el vinagre de sidra de manzana en tu rutina diaria, pero sin que te deje un mal sabor de boca? Te presentamos estas deliciosas Gominolas con sabor a manzana.',
                'name' => 'Omega 3',
                'price' => 19.99,
                'type' => "suplemento",
            ],
            [
                'url_image' => 'https://www.joma-sport.com/dw/image/v2/BFRV_PRD/on/demandware.static/-/Sites-joma-masterCatalog/default/dw3fba8169/images/medium/102241.010_4.jpg?sw=460&sh=475&sm=fit',
                'description' => 'Descripción del producto 6',
                'name' => 'Sudadera Joma',
                'price' => 89.49,
                'type' => "ropa",
            ],
            [
                'url_image' => 'https://www.bolf.es/spa_pl_Pantalon-de-chandal-para-mujer-gris-Bolf-BL32-93500_1.jpg',
                'description' => 'Descripción del producto 7',
                'name' => 'Chandal gris',
                'price' => 40.49,
                'type' => "ropa",
            ],
            [
                'url_image' => 'https://cdn.grupoelcorteingles.es/SGFM/dctm/MEDIA03/202203/11/00199410407466____13__640x640.jpg',
                'description' => 'Diseñadas para proporcionar sujeción y esculpir, nuestras mallas con largo por encima del tobillo se adaptan a tus curvas y están elaboradas pensando en la funcionalidad y el rendimiento, ideal para mantenerte segura durante todo tipo de entrenamientos.',
                'name' => 'Top deportivo',
                'price' => 40.49,
                'type' => "ropa",
            ],
            [
                'url_image' => 'https://resize.sprintercdn.com/f/261x261/products/0343726/nike-pro_0343726_00_4_3449968738.jpg?w=384&q=75',
                'description' => 'Diseñadas para proporcionar sujeción y esculpir, nuestras mallas con largo por encima del tobillo se adaptan a tus curvas y están elaboradas pensando en la funcionalidad y el rendimiento, ideal para mantenerte segura durante todo tipo de entrenamientos.',
                'name' => 'Top deportivo',
                'price' => 20.15,
                'type' => "ropa",
            ],
            [
                'url_image' => 'https://static.nike.com/a/images/c_limit,w_592,f_auto/t_product_v1/3ed9debb-4c8a-4193-b901-43b16a6602bd/dri-fit-one-camiseta-de-running-de-manga-corta-LGS1dN.png',
                'description' => 'Diseñadas para proporcionar sujeción y esculpir, nuestras mallas con largo por encima del tobillo se adaptan a tus curvas y están elaboradas pensando en la funcionalidad y el rendimiento, ideal para mantenerte segura durante todo tipo de entrenamientos.',
                'name' => 'Camiseta nike',
                'price' => 50.00,
                'type' => "ropa",
            ],
        ];

        // Insertar productos en la base de datos
        DB::table('products')->insert($products);
    }
}
