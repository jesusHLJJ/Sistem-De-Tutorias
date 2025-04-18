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
        Schema::create('ficha_identificacion_estado_psicofisiologico', function (Blueprint $table) {
            $table->id('id_estado_psicofisiologico');

            $table->foreignId('id_ficha')
                ->constrained('ficha_identificacion_tutorado', 'id_ficha');

            $table->string('indicador_psicofisiologico_1', 100)->nullable();
            $table->string('indicador_psicofisiologico_2', 100)->nullable();
            $table->string('indicador_psicofisiologico_3', 100)->nullable();
            $table->string('indicador_psicofisiologico_4', 100)->nullable();
            $table->string('indicador_psicofisiologico_5', 100)->nullable();
            $table->string('indicador_psicofisiologico_6', 100)->nullable();
            $table->string('indicador_psicofisiologico_7', 100)->nullable();
            $table->string('indicador_psicofisiologico_8', 100)->nullable();
            $table->string('indicador_psicofisiologico_9', 100)->nullable();
            $table->string('indicador_psicofisiologico_10', 100)->nullable();
            $table->string('indicador_psicofisiologico_11', 100)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ficha_identificacion_estado_psicofisiologico');
    }
};
