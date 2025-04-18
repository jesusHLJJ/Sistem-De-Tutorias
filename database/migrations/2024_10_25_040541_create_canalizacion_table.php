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
        Schema::create('canalizacion', function (Blueprint $table) {
            $table->id('id_canalizacion');

            $table->foreignId('id_alumno')
                ->constrained('alumnos', 'id_alumno');

            $table->date('fecha')->nullable(); // date field
            $table->string('factores_motivacion', 150)->nullable(); // motivation factors
            $table->string('relacion_documentos_solicitud', 150)->nullable(); // document request relation
            $table->string('observaciones_problematica', 150)->nullable(); // problem observations

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('canalizacion');
    }
};
