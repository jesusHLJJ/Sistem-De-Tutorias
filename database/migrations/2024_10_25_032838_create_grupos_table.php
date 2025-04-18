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
        Schema::create('grupos', function (Blueprint $table) {
            $table->id('id_grupo');

            $table->foreignId('id_carrera')
                ->constrained('carreras', 'id_carrera');

            $table->foreignId('id_semestre')
                ->constrained('semestres', 'id_semestre');

            $table->foreignId('id_turno')
                ->constrained('turnos', 'id_turno');

            $table->string('clave_grupo', 20);

            $table->foreignId('id_profesor')
                ->constrained('profesores', 'id_profesor');

            $table->foreignId('id_periodo')
                ->constrained('periodos', 'id_periodo');

            $table->foreignId('id_salon')
                ->constrained('salones', 'id_salon');

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupos');
    }
};
