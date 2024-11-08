<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesHasGenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articles_have_topics')->insert([
            [
                'article_fk' => 1,
                'topic_fk' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'article_fk' => 1,
                'topic_fk' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'article_fk' => 1,
                'topic_fk' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'article_fk' => 2,
                'topic_fk' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'article_fk' => 3,
                'topic_fk' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
