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
        Schema::create('mensual_asesoria', function (Blueprint $table) {
            $table->id('id_asesoria_mensual');

            $table->foreignId('id_profesor')
                ->constrained('profesores', 'id_profesor');

            $table->foreignId('id_alumno')
                ->constrained('alumnos', 'id_alumno');

            $table->foreignId('id_materia')
                ->constrained('materias', 'id_materia');

            $table->string('mes', 20);
            $table->string('no_asesorias_implicadas', 50)->nullable();
            $table->string('tipo_recurso_didactico', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mensual_asesoria');
    }
};
