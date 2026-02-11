<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesHasGenresSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('articles_have_topics')->insert([
            // Artículo 1 (IDE) -> Web (1), Algoritmos (2)
            ['article_fk' => 1, 'topic_fk' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['article_fk' => 1, 'topic_fk' => 2, 'created_at' => now(), 'updated_at' => now()],

            // Artículo 2 (Laravel) -> Web (1), POO (3)
            ['article_fk' => 2, 'topic_fk' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['article_fk' => 2, 'topic_fk' => 3, 'created_at' => now(), 'updated_at' => now()],

            // Artículo 3 (Markdown) -> Web (1)
            ['article_fk' => 3, 'topic_fk' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Artículo 4 (SQL) -> Bases de datos (4)
            ['article_fk' => 4, 'topic_fk' => 4, 'created_at' => now(), 'updated_at' => now()],

            // Artículo 5 (Seguridad) -> Ciberseguridad (8)
            ['article_fk' => 5, 'topic_fk' => 8, 'created_at' => now(), 'updated_at' => now()],

            // Artículo 6 (Flutter) -> Móvil (6)
            ['article_fk' => 6, 'topic_fk' => 6, 'created_at' => now(), 'updated_at' => now()],

            // Artículo 7 (Microservicios) -> Sistemas Distribuidos (7)
            ['article_fk' => 7, 'topic_fk' => 7, 'created_at' => now(), 'updated_at' => now()],

            // Artículo 8 (API) -> APIs (5), Web (1)
            ['article_fk' => 8, 'topic_fk' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['article_fk' => 8, 'topic_fk' => 1, 'created_at' => now(), 'updated_at' => now()],

            // Artículo 9 (Big O) -> Algoritmos (2), Optimización (9)
            ['article_fk' => 9, 'topic_fk' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['article_fk' => 9, 'topic_fk' => 9, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
