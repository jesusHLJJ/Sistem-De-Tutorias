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
        Schema::create('encuesta_organizacion_estudio', function (Blueprint $table) {
            $table->id('id_encuesta_organizacion');

            $table->foreignId('id_alumno')
                ->constrained('alumnos', 'id_alumno');

            // Preguntas de organización
            $table->string('pregunta_1_organizacion', 100)->nullable();
            $table->string('pregunta_2_organizacion', 100)->nullable();
            $table->string('pregunta_3_organizacion', 100)->nullable();
            $table->string('pregunta_4_organizacion', 100)->nullable();
            $table->string('pregunta_5_organizacion', 100)->nullable();
            $table->string('pregunta_6_organizacion', 100)->nullable();
            $table->string('pregunta_7_organizacion', 100)->nullable();
            $table->string('pregunta_8_organizacion', 100)->nullable();
            $table->string('pregunta_9_organizacion', 100)->nullable();
            $table->string('pregunta_10_organizacion', 100)->nullable();
            $table->string('pregunta_11_organizacion', 100)->nullable();
            $table->string('pregunta_12_organizacion', 100)->nullable();
            $table->string('pregunta_13_organizacion', 100)->nullable();
            $table->string('pregunta_14_organizacion', 100)->nullable();
            $table->string('pregunta_15_organizacion', 100)->nullable();
            $table->string('pregunta_16_organizacion', 100)->nullable();
            $table->string('pregunta_17_organizacion', 100)->nullable();
            $table->string('pregunta_18_organizacion', 100)->nullable();
            $table->string('pregunta_19_organizacion', 100)->nullable();
            $table->string('pregunta_20_organizacion', 100)->nullable();

            // Calificación final
            $table->string('calificacion_final_organizacion', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encuesta_organizacion_estudio');
    }
};
