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
        Schema::create('canalizacion_citas', function (Blueprint $table) {
            $table->id('id_canalizacion_cita');

            $table->foreignId('id_canalizacion')
                ->constrained('canalizacion', 'id_canalizacion');

            $table->date('fecha_cita_programada')->nullable(); // appointment dates
            $table->time('horario_inicio')->nullable(); // appointment dates
            $table->time('horario_fin')->nullable(); // appointment dates


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('canalizacion_citas');
    }
};
