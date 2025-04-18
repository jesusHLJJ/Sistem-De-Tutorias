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
        Schema::create('materias', function (Blueprint $table) {
            $table->id('id_materia');

            $table->string('clave_materia', 50)->unique();
            $table->string('nombre', 50);
            $table->integer('HRS_TEORICAS')->default(0);
            $table->integer('HRS_PRACTICAS')->default(0);
            $table->integer('creditos');

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materias');
    }
};
