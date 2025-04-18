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
        Schema::create('calificaciones_globales', function (Blueprint $table) {
            $table->id('id_calificacion_global');

            $table->foreignId('id_encuesta_organizacion')
                ->constrained('encuesta_organizacion_estudio', 'id_encuesta_organizacion');

            $table->foreignId('id_encuesta_tecnica')
                ->constrained('encuesta_tecnicas_estudio', 'id_encuesta_tecnica');

            $table->foreignId('id_encuesta_motivacion')
                ->constrained('encuesta_motivacion_estudio', 'id_encuesta_motivacion');

            $table->string('calif_global_organizacion', 20)->nullable(); // global organization grade
            $table->string('calif_global_tecnicas', 20)->nullable(); // global techniques grade
            $table->string('calif_global_motivacion', 20)->nullable(); // global motivation grade
            $table->string('calificacion_todas_habilidades', 20)->nullable(); // all skills grade
            $table->string('interpretacion', 25)->nullable(); // interpretation

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calificaciones_globales');
    }
};
