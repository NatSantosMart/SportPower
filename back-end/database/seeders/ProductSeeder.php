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
                'url_image' => 'https://magnesium-quelle.ch/wp-content/uploads/Vegane-Protein-Mischung-Vegan-protein-blend-MyProtein.png',
                'description' => 'Impact Whey Protein te aporta un valor nutricional sin igual de la mano de nuestros nutricionistas más expertos. Dale a tu cuerpo la energía que necesita gracias a sus ingredientes de la más alta calidad, que te aportan 23g* de proteína por cada ración.',
                'name' => 'Mezcla proteina vegana',
                'price' => 29.99,
                'type' => "suplemento",
            ],
            [
                'url_image' => 'https://www.muxcularworld.com/wp-content/uploads/2020/09/serious-mass-optimum-nutrition.jpg',
                'description' => 'Prueba Clear Whey Isolate, y no mirarás atrás. Si quieres una consistencia más ligera que el lactosuero tradicional y más intensa que los zumos, no busques más. Ha sido ganadora del «mejor polvo de proteínas» de los European Specialist Sports Nutrition Awards de 2022, pero ahí no acaba la cosa. Clear Whey Isolate te ofrece una explosión de sabores afrutados junto con 20 g* de proteína por ración gracias a su aislado de proteína de lactosuero hidrolizado. Se podría decir que es «la repera».',
                'name' => 'Mezcla ganador de peso',
                'price' => 19.99,
                'type' => "suplemento",
            ],
            [
                'url_image' => 'https://www.firehawkwearshop.com/wp-content/uploads/2020/11/SUDADERA-CREMALLERA-TRAIL-RUNNIG-PURE-TRAIL-BLACK.jpg',
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
                'url_image' => 'https://c-va.niceshops.com/upload/image/product/large/default/3-chenes-laboratoires-omega-3-1262173-es.png',
                'description' => '¿Quieres incluir el vinagre de sidra de manzana en tu rutina diaria, pero sin que te deje un mal sabor de boca? Te presentamos estas deliciosas Gominolas con sabor a manzana.',
                'name' => 'Omega 3',
                'price' => 19.99,
                'type' => "suplemento",
            ],
            [
                'url_image' => 'https://www.joma-sport.com/dw/image/v2/BFRV_PRD/on/demandware.static/-/Sites-joma-masterCatalog/default/dw6429316e/images/medium/101333.700_5.jpg?sw=460&sh=475&sm=fit',
                'description' => 'Con un diseño específico para actividades deportivas, con cortes que permiten movimientos libres y cómodos. Puede tener un cuello alto para proporcionar mayor protección contra el frío o una capucha ajustable para proteger la cabeza en condiciones climáticas adversas.',
                'name' => 'Sudadera Joma',
                'price' => 89.49,
                'type' => "ropa",
            ],
            [
                'url_image' => 'https://www.bolf.es/spa_pl_Pantalon-de-chandal-para-mujer-gris-Bolf-BL32-93500_1.jpg',
                'description' => 'Es una opción versátil que se puede usar tanto para hacer ejercicio como para uso casual, gracias a su diseño práctico y moderno.',
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
                'url_image' => 'https://media.futbolmania.com/media/catalog/product/cache/1/image/0f330055bc18e2dda592b4a7c3a0ea22/B/V/BV3636-610_sujetador-color-z-fucsia-nike-dri-fit-swoosh-con-relleno_1_completa-pecho.jpg',
                'description' => 'Es una prenda versátil que se puede usar tanto para hacer ejercicio como para uso casual, gracias a su diseño simple y moderno.  Podría incluir detalles adicionales como costuras planas para reducir el roce, paneles de malla para mejorar la ventilación o tecnología Dri-FIT para absorber el sudor y mantener la piel seca.',
                'name' => 'Top deportivo rosa',
                'price' => 20.15,
                'type' => "ropa",
            ],
            [
                'url_image' => 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/jepby6pclgyh4zoqc6wr/camiseta-sportswear-essential-R9S8Fx.png',
                'description' => 'Fabricada con materiales de alta calidad que ofrecen comodidad y durabilidad, como algodón suave o poliéster transpirable. Podría tener un diseño simple y elegante, con el logotipo icónico de Nike en el pecho o en la manga.',
                'name' => 'Camiseta nike',
                'price' => 50.00,
                'type' => "ropa",
            ],
            [
                'url_image' => 'https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/yql7ozajhdesi8vklgb3/sportswear-camiseta-GQFmbc.png',
                'description' => 'Fabricada con materiales de alta calidad que ofrecen comodidad y durabilidad, como algodón suave o poliéster transpirable. Podría tener un diseño simple y elegante, con el logotipo icónico de Nike en el pecho o en la manga.',
                'name' => 'Camiseta nike',
                'price' => 50.00,
                'type' => "ropa",
            ],
            [
                'url_image' => 'https://www.institutolagranja.com/wp-content/uploads/2023/02/sudaderas-hombre-sudadera-roja-marchica-el-ganso.jpg',
                'description' => 'Fabricada con materiales de alta calidad que ofrecen comodidad y durabilidad, como algodón suave o poliéster transpirable. Podría tener un diseño simple y elegante, con el logotipo icónico de Nike en el pecho o en la manga.',
                'name' => 'Sudadera adidas',
                'price' => 90.50,
                'type' => "ropa",
            ],
        ];

        // Insertar productos en la base de datos
        DB::table('products')->insert($products);
    }
}
