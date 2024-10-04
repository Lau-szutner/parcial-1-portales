<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        // DB::table('articles')->truncate();

        DB::table('articles')->insert([
            [
                'title' => '¿Cuál es el mejor IDE para codear?',
                'img' => 'images/ide-mejor.webp',
                'category' => 'Desarrollo',
                'content_path' => 'mejor_ide_para_codear',
                'time-to-read' => '20 minutos',
                'author' => 'Lautaro Fernandez Szutner',
                'created_at' => now(),
                'updated_at' => now(),
                'excerpt' => '¿Cuál es el mejor IDE para codear?
                El mejor IDE depende de las necesidades del proyecto y del desarrollador. Visual Studio Code es popular por su ligereza y extensibilidad, mientras que JetBrains IntelliJ IDEA destaca en proyectos Java por sus potentes herramientas integradas. Cada IDE ofrece características que se adaptan mejor a ciertos lenguajes o flujos de trabajo.',
            ],
            [
                'title' => '¿Cómo usar Laravel?',
                'img' => 'images/usar-laravel.webp',
                'category' => 'Frameworks',
                'content_path' => 'articles/como-usar-laravel.md',
                'time-to-read' => '40 minutos',
                'author' => 'Lautaro Fernandez Szutner',
                'created_at' => now(),
                'updated_at' => now(),
                'excerpt' => 'Laravel es un framework PHP que facilita el desarrollo web. Para usarlo, necesitas instalar Composer y PHP. Con Composer, puedes crear un nuevo proyecto Laravel, que utiliza una estructura MVC y proporciona herramientas como Eloquent para gestionar bases de datos de manera eficiente.',
            ],
            [
                'title' => 'Introducción a Markdown',
                'img' => 'images/introduccion-markdown.webp',
                'category' => 'Guías',
                'content_path' => 'articles/introduccion-markdown.md',
                'time-to-read' => '32 minutos',
                'author' => 'Lautaro Fernandez Szutner',
                'created_at' => now(),
                'updated_at' => now(),
                'excerpt' => 'Markdown es un lenguaje de marcado simple usado para formatear texto de forma fácil y legible. Permite crear documentos que pueden convertirse en HTML, usando una sintaxis sencilla para listas, negritas, títulos y enlaces. Es muy utilizado en documentación y plataformas como GitHub.',
            ],
            // Agrega más artículos según sea necesario
        ]);
    }
}
