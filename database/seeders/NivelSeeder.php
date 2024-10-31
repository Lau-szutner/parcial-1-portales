<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class NivelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        DB::table('nivels')->insert([
            [
                'nivel_id' => 1,
                'name' => 'Principiante',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nivel_id' => 2,
                'name' => 'Medio',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nivel_id' => 3,
                'name' => 'Avanzado',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
