<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCursosTable extends Migration
{
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id(); // Columna 'id' auto-incremental
            $table->string('nombre'); // Columna para el nombre del curso
            $table->text('descripcion'); // Columna para la descripción del curso
            $table->integer('duracion'); // Columna para la duración del curso en horas
            $table->string('nivel'); // Columna para el nivel del curso (por ejemplo, básico, intermedio, avanzado)
            $table->string('imagen'); // Columna para la imagen (puede ser null)
            $table->timestamps(); // Columnas 'created_at' y 'updated_at'
        });
    }

    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
