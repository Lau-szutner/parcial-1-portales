<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('courses');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Aquí puedes definir cómo volver a crear la tabla si es necesario.
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            // Agrega aquí las columnas que tenía la tabla.
            $table->string('name');
            $table->timestamps();
        });
    }
}
