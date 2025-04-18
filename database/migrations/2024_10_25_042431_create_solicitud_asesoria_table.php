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
        Schema::create('solicitud_asesoria', function (Blueprint $table) {
            $table->id('id_solicitud');

            $table->foreignId('id_profesor')
                ->constrained('profesores', 'id_profesor');

            $table->foreignId('id_materia')
                ->constrained('materias', 'id_materia');

            $table->foreignId('id_alumno')
                ->constrained('alumnos', 'id_alumno');

            $table->date('fecha')->nullable(); // column for date
            $table->string('medio_didactico_recurso', 50)->nullable();
            $table->string('temas_tratar_descripcion', 50)->nullable();

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitud_asesoria');
    }
};
