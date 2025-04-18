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
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->id('id_calificacion');

            $table->foreignId('id_grupo')
                ->constrained('grupos', 'id_grupo');

            $table->foreignId('id_materia')
                ->constrained('materias', 'id_materia');

            $table->foreignId('id_profesor')
                ->constrained('profesores', 'id_profesor');

            $table->foreignId('id_alumno')
                ->constrained('alumnos', 'id_alumno');
        
            $table->string('parcial_1', 10)->nullable();
            $table->string('parcial_2', 10)->nullable();
            $table->string('parcial_3', 10)->nullable();
            $table->string('segunda_oportunidad', 10)->nullable();
            $table->string('comentario')->nullable();
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calificaciones');
    }
};
