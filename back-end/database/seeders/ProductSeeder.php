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
                'description' => 'El top deportivo de Nike ofrece un diseño ergonómico y un ajuste ceñido que garantiza comodidad y libertad de movimiento durante cualquier actividad física. Fabricado con materiales de alto rendimiento y tecnología de absorción de humedad, como Dri-FIT, mantiene la piel fresca y seca al tiempo que proporciona un soporte adecuado, ya sea con un sujetador incorporado o una banda elástica en el busto, para reducir el rebote durante el ejercicio de alto impacto.',
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
                'url_image' => 'https://i8.amplience.net/i/jpl/jd_622179_a?qlt=92&w=600&h=765&v=1&fmt=auto',
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
            [
                'url_image' => 'https://static.sprintercdn.com/products/0356390/nike-dance_0356390_00_4_702260680.jpg',
                'description' => 'Fabricada con materiales de alta calidad que ofrecen comodidad y durabilidad, como algodón suave o poliéster transpirable. Podría tener un diseño simple y elegante, con el logotipo icónico de Nike en el pecho o en la manga.',
                'name' => 'Pantalones adidas',
                'price' => 30.50,
                'type' => "ropa",
            ],
            [
                'url_image' => 'https://resize.sprintercdn.com/o/products/0337719/sudadera-running-nike_0337719_00_4_2429132278.jpg',
                'description' => 'Fabricada con materiales de alta calidad que ofrecen comodidad y durabilidad, como algodón suave o poliéster transpirable. Podría tener un diseño simple y elegante, con el logotipo icónico de Nike en el pecho o en la manga.',
                'name' => 'Sudadera nike',
                'price' => 99.50,
                'type' => "ropa",
            ],
            [
                'url_image' => 'https://static.sprintercdn.com/products/0331804/nike-club-logo_0331804_00_4_273966972.jpg',
                'description' => 'Fabricada con materiales de alta calidad que ofrecen comodidad y durabilidad, como algodón suave o poliéster transpirable. Podría tener un diseño simple y elegante, con el logotipo icónico de Nike en el pecho o en la manga.',
                'name' => 'Sudadera nike',
                'price' => 80.50,
                'type' => "ropa",
            ],
            [
                'url_image' => 'https://depor8.com/cdn/shop/products/PantalonesAdidasSquadra21GT6642hombrealgodonnegrodepor8com_8.jpg?v=1624689674',
                'description' => 'Fabricada con materiales de alta calidad que ofrecen comodidad y durabilidad, como algodón suave o poliéster transpirable. Podría tener un diseño simple y elegante, con el logotipo icónico de Nike en el pecho o en la manga.',
                'name' => 'Pantalones negros',
                'price' => 60.50,
                'type' => "ropa",
            ],


            [
                'url_image' => 'https://cdn.grupoelcorteingles.es/SGFM/dctm/MEDIA03/202303/13/00199441512672____2__640x640.jpg',
                'description' => 'Fabricada con materiales de alta calidad que ofrecen comodidad y durabilidad, como algodón suave o poliéster transpirable. Podría tener un diseño simple y elegante, con el logotipo icónico de Nike en el pecho o en la manga.',
                'name' => 'Camiseta nike',
                'price' => 39.50,
                'type' => "ropa",
            ],
            [
                'url_image' => 'https://www.hokosport.com/cdn/shop/products/camiseta-manga-larga-termica-hombre-rojo-negro-fuyu-1.jpg?v=1699906529',
                'description' => 'Fabricada con materiales de alta calidad que ofrecen comodidad y durabilidad, como algodón suave o poliéster transpirable. Podría tener un diseño simple y elegante, con el logotipo icónico de Nike en el pecho o en la manga.',
                'name' => 'Camiseta roja',
                'price' => 30.50,
                'type' => "ropa",
            ],
            [
                'url_image' => 'https://static.sprintercdn.com/products/0327603/fila-surf_0327603_00_4_1554392421.jpg',
                'description' => 'Fabricada con materiales de alta calidad que ofrecen comodidad y durabilidad, como algodón suave o poliéster transpirable. Podría tener un diseño simple y elegante, con el logotipo icónico de Nike en el pecho o en la manga.',
                'name' => 'Camiseta Fila',
                'price' => 60.50,
                'type' => "ropa",
            ],
            [
                'url_image' => 'https://resize.sprintercdn.com/f/512x512/products/0342094/adidas-entrada-22_0342094_00_4_3982702110.jpg?w=768&q=75',
                'description' => 'Fabricada con materiales de alta calidad que ofrecen comodidad y durabilidad, como algodón suave o poliéster transpirable. Podría tener un diseño simple y elegante, con el logotipo icónico de Nike en el pecho o en la manga.',
                'name' => 'Camiseta adidas',
                'price' => 100.50,
                'type' => "ropa",
            ],

            [
                'url_image' => 'https://panel.drasanvi.com/img/products/032050689.png',
                'description' => 'Te damos la bienvenida a tu nuevo camino. El simple hecho de haber llegado hasta aquí ya es un comienzo y queremos facilitarte las cosas, por lo que te presentamos nuestro pack Impact Protein. ',
                'name' => 'Wey Protein',
                'price' => 49.99,
                'type' => "suplemento",
            ],
            [
                'url_image' => 'https://contents.mediadecathlon.com/m13225675/k$ae3fde3bb96bad0e8415d43b53aa62cf/sq/creatina-creatine-100-creapure-400-gr-perfect-nutrition.jpg?format=auto&f=800x0',
                'description' => 'La creatina monohidrato es una de las formas de creatina más investigadas del mundo, y se ha probado científicamente que nuestro producto en polvo de impactante calidad aumenta el rendimiento físico1al mejorar la potencia general.',
                'name' => 'Creatina',
                'price' => 69.25,
                'type' => "suplemento",
            ],
            [
                'url_image' => 'https://m.media-amazon.com/images/I/71BX++c1ZFL.jpg',
                'description' => 'Nuestra Barrita Vegana Proteica contiene una mezcla totalmente natural de proteínas de origen vegetal, elaborada con la mejor manteca de cacao, chips de chocolate y nueces tostadas. No contiene gluten, ni edulcorantes artificiales, ni azúcares añadidos. Es ideal para complementar un estilo de vida vegano.',
                'name' => 'Scitec Nutrition Complejo',
                'price' => 60.99,
                'type' => "suplemento",
            ],
            [
                'url_image' => 'https://justloading.com/wp-content/uploads/2021/03/Pack_Proteico_Chocolate.jpg',
                'description' => 'Te damos la bienvenida a tu nuevo camino. El simple hecho de haber llegado hasta aquí ya es un comienzo y queremos facilitarte las cosas, por lo que te presentamos nuestro pack Impact Protein.  ',
                'name' => 'Pack Impact Protein',
                'price' => 109.99,
                'type' => "suplemento",
            ],









            [
                'url_image' => 'https://m.media-amazon.com/images/I/71pTYnndhxL._AC_UF894,1000_QL80_.jpg',
                'description' => 'Nuestra Barrita Vegana Proteica contiene una mezcla totalmente natural de proteínas de origen vegetal, elaborada con la mejor manteca de cacao, chips de chocolate y nueces tostadas. No contiene gluten, ni edulcorantes artificiales, ni azúcares añadidos. Es ideal para complementar un estilo de vida vegano.',
                'name' => 'Caramelo barritas',
                'price' => 29.99,
                'type' => "suplemento",
            ],
            [
                'url_image' => 'https://caminoking.dk/wp-content/uploads/2023/06/Protein-Snack-Karamel-40-g.png',
                'description' => 'Nuestra Barrita Vegana Proteica contiene una mezcla totalmente natural de proteínas de origen vegetal, elaborada con la mejor manteca de cacao, chips de chocolate y nueces tostadas. No contiene gluten, ni edulcorantes artificiales, ni azúcares añadidos. Es ideal para complementar un estilo de vida vegano.',
                'name' => 'Barrita de caramelo',
                'price' => 3.99,
                'type' => "suplemento",
            ],
            [
                'url_image' => 'https://justloading.com/wp-content/uploads/2020/11/20_Protein_Snack_Justloading_x3-600x600.jpg',
                'description' => 'Nuestra Barrita Vegana Proteica contiene una mezcla totalmente natural de proteínas de origen vegetal, elaborada con la mejor manteca de cacao, chips de chocolate y nueces tostadas. No contiene gluten, ni edulcorantes artificiales, ni azúcares añadidos. Es ideal para complementar un estilo de vida vegano.',
                'name' => 'Barritas de chocolate',
                'price' => 15,
                'type' => "suplemento",
            ],
            [
                'url_image' => 'https://m.media-amazon.com/images/I/81FmHZW4Z1S._AC_UF894,1000_QL80_.jpg',
                'description' => 'BeFIT es una gama de productos hiperproteicos, formada por batidos, cremas y barritas que contribuyen a tonificar tu masa muscular: barritas de chocolate, chocolate-naranja, caramelo o coco y batidos de chocolate, fresa, vainilla o capuccino y la Crema de chocolate con una deliciosa textura. Y ahora los nuevos Batidos con Guaraná de Chocolate-Avellanas y de Vainilla-Toffee.',
                'name' => 'Galletas proteicas',
                'price' => 35.95,
                'type' => "suplemento",
            ],
            [
                'url_image' => 'https://a1.soysuper.com/d3b32ed6b9430b8e2cb6d197c4db741e.1500.0.0.0.wmark.9b7fc6b9.jpg',
                'description' => 'Contiene una mezcla totalmente natural de proteínas de origen vegetal, elaborada con la mejor manteca de cacao, chips de chocolate y nueces tostadas. No contiene gluten, ni edulcorantes artificiales, ni azúcares añadidos. Es ideal para complementar un estilo de vida vegano.',
                'name' => 'Postre proteico fresa',
                'price' => 49.99,
                'type' => "suplemento",
            ],
            [
                'url_image' => 'https://m.media-amazon.com/images/I/81UlLUehEtL._AC_UF894,1000_QL80_.jpg',
                'description' => 'Contiene una mezcla totalmente natural de proteínas de origen vegetal, elaborada con la mejor manteca de cacao, chips de chocolate y nueces tostadas. No contiene gluten, ni edulcorantes artificiales, ni azúcares añadidos. Es ideal para complementar un estilo de vida vegano.',
                'name' => 'Barritas limón',
                'price' => 29.99,
                'type' => "suplemento",
            ],






            [
                'url_image' => 'https://static.thcdn.com/images/large/webp//productimg/1600/1600/11543363-1384860397374972.jpg',
                'description' => 'También conocida como la "vitamina de energía", la vitamina B12 es una fuente de poder. Conforma nuestra estructura celular y el ADN.5 Pero puede ser difícil de obtener en la dieta, especialmente en dietas vegetales. Una carencia de vitamina B12 puede causar bajadas de energía y un deterioro de la capacidad intelectual.',
                'name' => 'Vitamina B12',
                'price' => 29.99,
                'type' => "suplemento",
            ],
            [
                'url_image' => 'https://static.thcdn.com/images/large/webp//productimg/1600/1600/11279952-1314848177714108.jpg',
                'description' => 'También conocida como la "vitamina de energía", la vitamina B12 es una fuente de poder. Conforma nuestra estructura celular y el ADN.5 Pero puede ser difícil de obtener en la dieta, especialmente en dietas vegetales. Una carencia de vitamina B12 puede causar bajadas de energía y un deterioro de la capacidad intelectual.',
                'name' => 'Vitamina D3 y Curcumina',
                'price' => 9.99,
                'type' => "suplemento",
            ],
            [
                'url_image' => 'https://static.thcdn.com/images/large/webp//productimg/1600/1600/11338775-9584828040720049.jpg',
                'description' => 'También conocida como la "vitamina de energía", la vitamina B12 es una fuente de poder. Conforma nuestra estructura celular y el ADN.5 Pero puede ser difícil de obtener en la dieta, especialmente en dietas vegetales. Una carencia de vitamina B12 puede causar bajadas de energía y un deterioro de la capacidad intelectual.',
                'name' => 'Cápsulas de Colágeno',
                'price' => 4.99,
                'type' => "suplemento",
            ],
            [
                'url_image' => 'https://static.thcdn.com/images/large/webp//productimg/1600/1600/13528456-7904973173746309.jpg',
                'description' => 'También conocida como la "vitamina de energía", la vitamina B12 es una fuente de poder. Conforma nuestra estructura celular y el ADN.5 Pero puede ser difícil de obtener en la dieta, especialmente en dietas vegetales. Una carencia de vitamina B12 puede causar bajadas de energía y un deterioro de la capacidad intelectual.',
                'name' => 'Gominolas de Ashwagandha',
                'price' => 20.99,
                'type' => "suplemento",
            ],
            [
                'url_image' => 'https://static.thcdn.com/images/large/webp//productimg/1600/1600/10530421-3104926487711944.jpg',
                'description' => 'La cúrcuma es una especia que procede de la planta de la cúrcuma. Se la conoce principalmente por ser una especia que se utiliza en la cocina. Es especialmente popular en la cocina india, y es la especia principal en el curry, pero ahora se reconoce en el mundo occidental por sus propiedades para la salud.',
                'name' => 'Multivitamínico Alpha Men',
                'price' => 7,
                'type' => "suplemento",
            ],
            [
                'url_image' => 'https://static.thcdn.com/images/large/webp//productimg/1600/1600/12717736-1045013015062145.jpg',
                'description' => 'También conocida como la "vitamina de energía", la vitamina B12 es una fuente de poder. Conforma nuestra estructura celular y el ADN.5 Pero puede ser difícil de obtener en la dieta, especialmente en dietas vegetales. Una carencia de vitamina B12 puede causar bajadas de energía y un deterioro de la capacidad intelectual.',
                'name' => 'Shots de Pre-Entreno (Caja de 12)',
                'price' => 25.50,
                'type' => "suplemento",
            ],
            [
                'url_image' => 'https://static.thcdn.com/images/large/webp//productimg/1600/1600/11338691-1154882200166080.jpg',
                'description' => 'Cúrcuma y BioPerine® de Myvitamins es una mezcla especialmente formulada que contiene especias naturales para reforzar tu salud y bienestar.Contiene cúrcuma, que puede ayudar a la digestión estimulando la producción de fluidos digestivos.1 También contiene BioPerine®, que está elaborada a partir de piperina y diseñada para aumentar la absorción de nutrientes.',
                'name' => 'Tabletas de Cúrcuma y Bioperine',
                'price' => 12.50,
                'type' => "suplemento",
            ],
        ];

        // Insertar productos en la base de datos
        DB::table('products')->insert($products);
    }
}
