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
        Schema::create('semestral_tutoria', function (Blueprint $table) {
            $table->id('id_tutoria_academica');

            $table->foreignId('id_profesor')
                ->constrained('profesores', 'id_profesor');

            $table->foreignId('id_alumno')
                ->constrained('alumnos', 'id_alumno');

            $table->string('tutoria_grupal', 100)->nullable(); // group tutoring
            $table->string('tutoria_individual', 100)->nullable(); // individual tutoring
            $table->string('asesoria_academica', 100)->nullable(); // academic advisory
            $table->string('area_psicologica', 100)->nullable(); // psychological area
            $table->string('crditos_culturales_deportivos', 100)->nullable(); // cultural and sports credits
            $table->string('crditos_academicos', 100)->nullable(); // academic credits
            $table->string('ingles_cubierto', 100)->nullable(); // covered English
            $table->string('materias_reprobadas', 100)->nullable(); // failed subjects
            $table->string('informe_grupal', 200)->nullable(); // group report

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('semestral_tutoria');
    }
};
