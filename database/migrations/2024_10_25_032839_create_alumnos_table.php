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
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id('id_alumno');

            $table->foreignId('id_grupo')
                ->nullable()
                ->constrained('grupos', 'id_grupo');

            $table->foreignId('id_carrera')
                ->nullable()
                ->constrained('carreras', 'id_carrera');

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->string('matricula', 50)->unique();
            $table->string('nombre', 50)->nullable();
            $table->string('ap_paterno', 50)->nullable();
            $table->string('ap_materno', 50)->nullable();
            $table->string('telefono', 10)->nullable();
            $table->string('estatus_canalizacion', 20)->nullable();

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnos');
    }
};