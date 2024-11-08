<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articles_have_topics', function (Blueprint $table) {
            // Define article_fk con foreignId y asegura la restricción correcta
            $table->foreignId('article_fk')->constrained('articles')->onDelete('cascade');

            // Define topic_fk como un unsignedSmallInteger, y agrega la restricción de clave foránea
            $table->unsignedSmallInteger('topic_fk');
            $table->foreign('topic_fk')->references('topic_id')->on('topics');

            // Clave primaria compuesta
            $table->primary(['article_fk', 'topic_fk']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles_have_topics');
    }
};
