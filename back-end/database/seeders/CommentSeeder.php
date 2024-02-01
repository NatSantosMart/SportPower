<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentSeeder extends Seeder
{
    public function run()
    {
        // Datos de ejemplo para la tabla 'COMENTARIO'
        $datosComentario = [
            [
                'date' => '2023-11-01',
                'description' => '¡Excelente producto!',
                'id' => 1,
                'client_dni' => '23456789B',
            ],
            [
                'date' => '2023-11-02',
                'description' => 'No me gustó mucho',
                'id' => 2,
                'client_dni' => '34567890C',
            ],
            [
                'date' => '2023-11-03',
                'description' => 'Ensalada de espinacas con fresas y nueces: Una combinación refrescante y llena de antioxidantes para una comida rápida y saludable',
                'id' => 3,
                'client_dni' => '45678901D',
            ],
            [
                'date' => '2023-11-04',
                'description' => 'Entrega rápida y eficiente',
                'id' => 4,
                'client_dni' => '12345678A',
            ],
            [
                'date' => '2023-11-04',
                'description' => 'El producto llegó roto',
                'id' => 5,
                'client_dni' => '23456789B',
            ],
        ];

        // Insertar los datos en la tabla 'COMENTARIO'
        DB::table('comments')->insert($datosComentario);
    }
}
