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
        Schema::create('caracteristicas_personales', function (Blueprint $table) {
            $table->id('id_caracteristica_personal');
            
            $table->foreignId('id_ficha')
                ->constrained('ficha_identificacion_tutorado', 'id_ficha');

            // Indicadores de características personales
            $table->string('indicador_1', 30)->nullable();
            $table->string('observacion_1', 30)->nullable();
            $table->string('indicador_2', 30)->nullable();
            $table->string('observacion_2', 30)->nullable();
            $table->string('indicador_3', 30)->nullable();
            $table->string('observacion_3', 30)->nullable();
            $table->string('indicador_4', 30)->nullable();
            $table->string('observacion_4', 30)->nullable();
            $table->string('indicador_5', 30)->nullable();
            $table->string('observacion_5', 30)->nullable();
            $table->string('indicador_6', 30)->nullable();
            $table->string('observacion_6', 30)->nullable();
            $table->string('indicador_7', 30)->nullable();
            $table->string('observacion_7', 30)->nullable();
            $table->string('indicador_8', 30)->nullable();
            $table->string('observacion_8', 30)->nullable();
            $table->string('indicador_9', 30)->nullable();
            $table->string('observacion_9', 30)->nullable();
            $table->string('indicador_10', 30)->nullable();
            $table->string('observacion_10', 30)->nullable();
            $table->string('indicador_11', 30)->nullable();
            $table->string('observacion_11', 30)->nullable();
            $table->string('indicador_12', 30)->nullable();
            $table->string('observacion_12', 30)->nullable();
            $table->string('indicador_13', 30)->nullable();
            $table->string('observacion_13', 30)->nullable();
            $table->string('indicador_14', 30)->nullable();
            $table->string('observacion_14', 30)->nullable();
            $table->string('indicador_15', 30)->nullable();
            $table->string('observacion_15', 30)->nullable();
            $table->string('indicador_16', 30)->nullable();
            $table->string('observacion_16', 30)->nullable();
            $table->string('indicador_17', 30)->nullable();
            $table->string('observacion_17', 30)->nullable();
            $table->string('indicador_18', 30)->nullable();
            $table->string('observacion_18', 30)->nullable();
            $table->string('indicador_19', 30)->nullable();
            $table->string('observacion_19', 30)->nullable();
            $table->string('indicador_20', 30)->nullable();
            $table->string('observacion_20', 30)->nullable();
            $table->string('indicador_21', 30)->nullable();
            $table->string('observacion_21', 30)->nullable();
            $table->string('indicador_22', 30)->nullable();
            $table->string('observacion_22', 30)->nullable();
            $table->string('indicador_23', 30)->nullable();
            $table->string('observacion_23', 30)->nullable();
            $table->string('indicador_24', 30)->nullable();
            $table->string('observacion_24', 30)->nullable();
            $table->string('indicador_25', 30)->nullable();
            $table->string('observacion_25', 30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caracteristicas_personales');
    }
};
