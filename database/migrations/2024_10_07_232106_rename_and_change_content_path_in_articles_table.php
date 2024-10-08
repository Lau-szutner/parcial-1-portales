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
        Schema::table('articles', function (Blueprint $table) {
            // Renombrar la columna 'content_path' a 'body' y cambiar su tipo a MEDIUMTEXT
            $table->mediumText('content_path')->change();
            $table->renameColumn('content_path', 'body');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            // Revertir el nombre de 'body' a 'content_path' y volver a tipo string
            $table->renameColumn('body', 'content_path');
            $table->string('content_path', 255)->change();
        });
    }
};
