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
            [
                'date' => '2023-11-04',
                'description' => 'Las rutinas de recuperación son clave para el bienestar físico y mental. Incluir estiramientos, descanso activo y técnicas de relajación puede mejorar la recuperación muscular y reducir el estrés. Dedica tiempo a cuidar tu cuerpo después del ejercicio para maximizar los resultados y promover la salud a largo plazo',
                'id' => 6,
                'client_dni' => '23456789B',
            ],
            [
                'date' => '2023-11-23',
                'description' => 'El entrenamiento regular es fundamental para alcanzar tus objetivos de condición física. Varía tu rutina para evitar estancamientos y mantener la motivación alta. Combina ejercicios de fuerza, cardio y flexibilidad para obtener un entrenamiento completo y equilibrado.',
                'id' => 7,
                'client_dni' => '23456789B',
            ],           
        ];

        // Insertar los datos en la tabla 'COMENTARIO'
        DB::table('comments')->insert($datosComentario);
    }
}
