<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // id (pk), title (unique), creator, year, genre(null)
        Schema::create('game', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100)->unique();
            $table->string('creator', 100);
            $table->year('year');
            $table->string('genre', 100)->nullable();
            $table->timestamps(); // Fecha de creacion y fecha de ultima modificacion
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('game');
    }
};
