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
        Schema::create('mens_tutoria', function (Blueprint $table) {
            $table->id('id_mens_tutoria');

            $table->foreignId('id_profesor')
                ->constrained('profesores', 'id_profesor');

            $table->foreignId('id_alumno')
                ->constrained('alumnos', 'id_alumno');

            $table->foreignId('id_problematica')
                ->constrained('problematica_identificada', 'id_problematica');

            $table->string('mes_entrega', 20)->nullable();
            
            $table->string('analisis_metodo_aplicado', 200)->nullable();
            $table->string('area_canalizar', 50)->nullable();

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mens_tutoria');
    }
};
