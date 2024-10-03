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
                'excerpt' => 'articles/excerpts/laravel.md',
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
                'excerpt' => 'articles/excerpts/laravel.md',
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
                'excerpt' => 'articles/excerpts/laravel.md',
            ],
            // Agrega más artículos según sea necesario
        ]);
    }
}
