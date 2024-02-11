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
                'description' => 'He estado usando este ganador de peso durante un par de semanas y estoy muy decepcionado. A pesar de seguir las instrucciones de uso y consumirlo regularmente, no he experimentado ningún aumento significativo en mi masa muscular. Además, el sabor es extremadamente dulce y artificial, lo que hace que sea difícil de beber. También he notado que me siento hinchado y con malestar estomacal después de tomarlo, lo que me hace cuestionar la calidad de los ingredientes utilizados. En general, no recomendaría este producto y buscaré alternativas más efectivas y mejor toleradas.',
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
                'description' => 'Entrega rápida y eficiente!!',
                'id' => 4,
                'client_dni' => '12345678A',
            ],
            [
                'date' => '2023-11-04',
                'description' => 'El producto llegó roto',
                'id' => 5,
                'client_dni' => '23456789B',
            ],
            [
                'date' => '2023-11-04',
                'description' => '¿Te has detenido alguna vez a pensar en cómo tu estilo de vida afecta tu bienestar? La actividad física no solo es buena para tu cuerpo, sino también para tu mente y espíritu. ¡Es hora de ponerse en movimiento y disfrutar de una vida activa!',
                'id' => 6,
                'client_dni' => '23456789B',
            ],
            [
                'date' => '2023-11-04',
                'description' => 'Descansa y recupérate: El descanso es igual de importante que el ejercicio. Asegúrate de dormir lo suficiente y tomar tiempo para relajarte y recargar energías. El cuerpo necesita tiempo para repararse y rejuvenecerse.',
                'id' => 7,
                'client_dni' => '23456789B',
            ],
        ];

        // Insertar los datos en la tabla 'COMENTARIO'
        DB::table('comments')->insert($datosComentario);
    }
}
