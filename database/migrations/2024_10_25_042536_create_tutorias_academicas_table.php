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
        Schema::create('tutorias_academicas', function (Blueprint $table) {
            $table->id('id_tutoria');
            
            $table->foreignId('id_profesor')
                ->constrained('profesores', 'id_profesor');

            $table->foreignId('id_semestre')
                ->constrained('semestres', 'id_semestre');

            $table->foreignId('id_grupo')
                ->constrained('grupos', 'id_grupo');

            $table->string('mes_reporte', 100); // not null
            $table->string('formacion_academica', 100)->nullable();
            $table->string('formacion_personal', 100)->nullable();
            $table->string('formacion_profesional', 100)->nullable();

            // Timestamps
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tutorias_academicas');
    }
};
