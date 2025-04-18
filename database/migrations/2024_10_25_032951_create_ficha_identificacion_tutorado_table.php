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
        Schema::create('ficha_identificacion_tutorado', function (Blueprint $table) {
            $table->id('id_ficha');

            $table->foreignId('id_alumno')
                ->constrained('alumnos', 'id_alumno');

            $table->date('fecha')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ficha_identificacion_tutorado');
    }
};
