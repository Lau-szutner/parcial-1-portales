<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TopicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('topics')->insert([
            [
                'topic_id' => 1,
                'name' => 'Desarrollo web (Frontend y Backend)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'topic_id' => 2,
                'name' => 'Algoritmos y estructuras de datos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'topic_id' => 3,
                'name' => 'Programación orientada a objetos (POO)',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'topic_id' => 4,
                'name' => 'Bases de datos y SQL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'topic_id' => 5,
                'name' => 'Desarrollo de APIs',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'topic_id' => 6,
                'name' => 'Desarrollo móvil',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'topic_id' => 7,
                'name' => 'Redes y sistemas distribuidos',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'topic_id' => 8,
                'name' => 'Ciberseguridad',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'topic_id' => 9,
                'name' => 'Optimización de rendimiento',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
