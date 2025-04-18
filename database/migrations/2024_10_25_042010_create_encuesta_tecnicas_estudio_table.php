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
        Schema::create('encuesta_tecnicas_estudio', function (Blueprint $table) {
            $table->id('id_encuesta_tecnica');

            $table->foreignId('id_alumno')
                ->constrained('alumnos', 'id_alumno');

            // Preguntas de técnicas de estudio
            $table->string('pregunta_1_tecnica', 10)->nullable();
            $table->string('pregunta_2_tecnica', 10)->nullable();
            $table->string('pregunta_3_tecnica', 10)->nullable();
            $table->string('pregunta_4_tecnica', 10)->nullable();
            $table->string('pregunta_5_tecnica', 10)->nullable();
            $table->string('pregunta_6_tecnica', 10)->nullable();
            $table->string('pregunta_7_tecnica', 10)->nullable();
            $table->string('pregunta_8_tecnica', 10)->nullable();
            $table->string('pregunta_9_tecnica', 10)->nullable();
            $table->string('pregunta_10_tecnica', 10)->nullable();
            $table->string('pregunta_11_tecnica', 10)->nullable();
            $table->string('pregunta_12_tecnica', 10)->nullable();
            $table->string('pregunta_13_tecnica', 10)->nullable();
            $table->string('pregunta_14_tecnica', 10)->nullable();
            $table->string('pregunta_15_tecnica', 10)->nullable();
            $table->string('pregunta_16_tecnica', 10)->nullable();
            $table->string('pregunta_17_tecnica', 10)->nullable();
            $table->string('pregunta_18_tecnica', 10)->nullable();
            $table->string('pregunta_19_tecnica', 10)->nullable();
            $table->string('pregunta_20_tecnica', 10)->nullable();

            // Calificación final
            $table->string('calificacion_final_tecnica', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encuesta_tecnicas_estudio');
    }
};
