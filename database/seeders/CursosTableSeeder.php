<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cursos')->insert([
            // 1. Desarrollo web (Frontend y Backend)
            [
                'nombre' => 'Curso de PHP Moderno',
                'descripcion' => 'Aprende los fundamentos de PHP 8.x y cómo desarrollar aplicaciones web dinámicas desde cero.',
                'duracion' => 40,
                'nivel' => 'Básico',
                'imagen' => 'images/cursos/php.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 2. Desarrollo web (Frameworks)
            [
                'nombre' => 'Master en Laravel 11',
                'descripcion' => 'Domina el framework más elegante de PHP para crear aplicaciones robustas, escalables y profesionales.',
                'duracion' => 60,
                'nivel' => 'Intermedio',
                'imagen' => 'images/cursos/laravel.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 3. Algoritmos y estructuras de datos
            [
                'nombre' => 'Algoritmos con JavaScript',
                'descripcion' => 'Entiende cómo resolver problemas complejos y mejorar la eficiencia de tu código mediante estructuras de datos.',
                'duracion' => 35,
                'nivel' => 'Intermedio',
                'imagen' => 'images/cursos/javascript.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 4. Programación orientada a objetos (POO)
            [
                'nombre' => 'POO: Pensando en Objetos',
                'descripcion' => 'Abstrae la realidad en código utilizando clases, herencia, polimorfismo y encapsulamiento.',
                'duracion' => 25,
                'nivel' => 'Básico',
                'imagen' => 'images/cursos/poo.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 5. Bases de datos y SQL
            [
                'nombre' => 'Bases de Datos con MySQL',
                'descripcion' => 'Diseña modelos relacionales eficientes y domina el lenguaje SQL para gestionar grandes volúmenes de datos.',
                'duracion' => 45,
                'nivel' => 'Intermedio',
                'imagen' => 'images/cursos/sql.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 6. Desarrollo de APIs
            [
                'nombre' => 'Diseño de APIs RESTful',
                'descripcion' => 'Crea servicios web profesionales utilizando estándares de la industria como JSON y autenticación JWT.',
                'duracion' => 30,
                'nivel' => 'Avanzado',
                'imagen' => 'images/cursos/api.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 7. Desarrollo móvil
            [
                'nombre' => 'Flutter: Apps Multiplataforma',
                'descripcion' => 'Construye aplicaciones nativas para Android e iOS utilizando un único lenguaje: Dart.',
                'duracion' => 55,
                'nivel' => 'Avanzado',
                'imagen' => 'images/cursos/flutter.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 8. Redes y sistemas distribuidos
            [
                'nombre' => 'Arquitectura de Microservicios',
                'descripcion' => 'Aprende a dividir aplicaciones grandes en servicios pequeños y distribuidos que se comunican entre sí.',
                'duracion' => 50,
                'nivel' => 'Avanzado',
                'imagen' => 'images/cursos/microservicios.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 9. Ciberseguridad
            [
                'nombre' => 'Seguridad en Aplicaciones Web',
                'descripcion' => 'Protege tus proyectos de ataques comunes como SQL Injection, XSS y CSRF.',
                'duracion' => 20,
                'nivel' => 'Intermedio',
                'imagen' => 'images/cursos/seguridad.avif',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 10. Optimización de rendimiento
            [
                'nombre' => 'Performance y Web Vitals',
                'descripcion' => 'Optimiza la carga y el renderizado de tus sitios web para obtener una puntuación de 100 en Lighthouse.',
                'duracion' => 15,
                'nivel' => 'Avanzado',
                'imagen' => 'images/cursos/performance.webp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // 11. Backend avanzado
            [
                'nombre' => 'Node.js y Tiempo Real',
                'descripcion' => 'Desarrolla aplicaciones ultra rápidas y sistemas de chat o notificaciones usando WebSockets.',
                'duracion' => 42,
                'nivel' => 'Intermedio',
                'imagen' => 'images/cursos/node.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
