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

            $table->foreignId('article_fk')->constrained('articles')->onDelete('cascade');

            $table->unsignedSmallInteger('topic_fk');

            $table->foreign('topic_fk')->references('topic_id')->on('topics');

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
