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
        Schema::create('encuesta_motivacion_estudio', function (Blueprint $table) {
            $table->id('id_encuesta_motivacion');

            $table->foreignId('id_alumno')
                ->constrained('alumnos', 'id_alumno');

            $table->string('pregunta_1_motivacion', 100)->nullable();
            $table->string('pregunta_2_motivacion', 100)->nullable();
            $table->string('pregunta_3_motivacion', 100)->nullable();
            $table->string('pregunta_4_motivacion', 100)->nullable();
            $table->string('pregunta_5_motivacion', 100)->nullable();
            $table->string('pregunta_6_motivacion', 100)->nullable();
            $table->string('pregunta_7_motivacion', 100)->nullable();
            $table->string('pregunta_8_motivacion', 100)->nullable();
            $table->string('pregunta_9_motivacion', 100)->nullable();
            $table->string('pregunta_10_motivacion', 100)->nullable();
            $table->string('pregunta_11_motivacion', 100)->nullable();
            $table->string('pregunta_12_motivacion', 100)->nullable();
            $table->string('pregunta_13_motivacion', 100)->nullable();
            $table->string('pregunta_14_motivacion', 100)->nullable();
            $table->string('pregunta_15_motivacion', 100)->nullable();
            $table->string('pregunta_16_motivacion', 100)->nullable();
            $table->string('pregunta_17_motivacion', 100)->nullable();
            $table->string('pregunta_18_motivacion', 100)->nullable();
            $table->string('pregunta_19_motivacion', 100)->nullable();
            $table->string('pregunta_20_motivacion', 100)->nullable();
            $table->string('calificacion_final_motivacion', 20)->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('encuesta_motivacion_estudio');
    }
};
