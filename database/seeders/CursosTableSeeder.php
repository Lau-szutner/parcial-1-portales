<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CursosTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('cursos')->insert([
            [
                'nombre' => 'Curso de PHP',
                'descripcion' => 'Aprende los fundamentos de PHP y cómo desarrollar aplicaciones web.',
                'duracion' => 40,
                'nivel' => 'Básico',
                'imagen' => 'images/cursos/php.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Curso de Laravel',
                'descripcion' => 'Domina el framework Laravel para crear aplicaciones robustas y escalables.',
                'duracion' => 30,
                'nivel' => 'Intermedio',
                'imagen' => 'images/cursos/laravel.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nombre' => 'Curso de JavaScript',
                'descripcion' => 'Aprende a programar con JavaScript y su ecosistema.',
                'duracion' => 35,
                'nivel' => 'Básico',
                'imagen' => 'images/cursos/javascript.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
