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
                'date' => '2023-01-02',
                'description' => 'He estado usando este ganador de peso durante un par de semanas y estoy muy decepcionado. A pesar de seguir las instrucciones de uso y consumirlo regularmente, no he experimentado ningún aumento significativo en mi masa muscular. Además, el sabor es extremadamente dulce y artificial, lo que hace que sea difícil de beber. También he notado que me siento hinchado y con malestar estomacal después de tomarlo, lo que me hace cuestionar la calidad de los ingredientes utilizados. En general, no recomendaría este producto y buscaré alternativas más efectivas y mejor toleradas.',
                'id' => 2,
                'client_dni' => '34567890C',
            ],
            [
                'date' => '2023-12-23',
                'description' => 'Ensalada de espinacas con fresas y nueces: Una combinación refrescante y llena de antioxidantes para una comida rápida y saludable',
                'id' => 3,
                'client_dni' => '45678901D',
            ],
            [
                'date' => '2023-11-11',
                'description' => 'Entrega rápida y eficiente!!',
                'id' => 4,
                'client_dni' => '12345678A',
            ],
            [
                'date' => '2023-11-24',
                'description' => 'El producto llegó roto',
                'id' => 5,
                'client_dni' => '23456789B',
            ],
            [
                'date' => '2023-11-14',
                'description' => '¿Te has detenido alguna vez a pensar en cómo tu estilo de vida afecta tu bienestar? La actividad física no solo es buena para tu cuerpo, sino también para tu mente y espíritu. ¡Es hora de ponerse en movimiento y disfrutar de una vida activa!',
                'id' => 6,
                'client_dni' => '23456789B',
            ],
            [
                'date' => '2023-11-13',
                'description' => 'Descansa y recupérate: El descanso es igual de importante que el ejercicio. Asegúrate de dormir lo suficiente y tomar tiempo para relajarte y recargar energías. El cuerpo necesita tiempo para repararse y rejuvenecerse.',
                'id' => 7,
                'client_dni' => '23456789B',
            ],
            [
                'date' => '2024-01-02',
                'description' => '¡Estoy encantada con mi top deportivo de Nike! La calidad del material es excelente y se siente increíblemente cómodo durante mis entrenamientos. La tecnología Dri-FIT realmente funciona; me mantiene fresca y seca incluso durante las sesiones de ejercicio más intensas. Además, el ajuste ceñido y el soporte adicional en el busto son perfectos para actividades de alto impacto como correr y hacer entrenamiento de fuerza. Sin duda, recomendaría este top a cualquier persona que busque comodidad, rendimiento y estilo en su ropa deportiva',
                'id' => 8,
                'client_dni' => '23456789B',
            ],
            [
                'date' => '2024-01-02',
                'description' => 'Me gusta especialmente cómo absorbe el sudor, lo que hace que sea perfecto para sesiones intensas en el gimnasio o para correr al aire libre. ',
                'id' => 9,
                'client_dni' => '12345678A',
            ],
            [
                'date' => '2024-01-12',
                'description' => 'Lamentablemente, mi experiencia con el top deportivo de Nike no fue tan positiva como esperaba. Aunque inicialmente me gustó el ajuste y el diseño, después de algunos lavados noté que el material comenzó a desgastarse rápidamente y perdió su forma.',
                'id' => 10,
                'client_dni' => '34567890C',
            ],
        ];

        // Insertar los datos en la tabla 'COMENTARIO'
        DB::table('comments')->insert($datosComentario);
    }
}
