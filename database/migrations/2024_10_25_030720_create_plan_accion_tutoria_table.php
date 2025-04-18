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
        Schema::create('plan_accion_tutoria', function (Blueprint $table) {
            $table->id('id_plan_accion'); // auto increment primary key

            $table->foreignId('id_profesor')
                ->constrained('profesores', 'id_profesor');

            $table->foreignId('id_periodo')
                ->constrained('periodos', 'id_periodo');

            $table->foreignId('id_semestre')
                ->constrained('semestres', 'id_semestre');

            $table->string('no_matricula_grupo');
            $table->string('hombres', 50);
            $table->string('mujeres', 50);
            $table->string('ploblematica_identificada', 50);
            $table->string('objetivos', 50);
            $table->string('acciones_implementar', 50);
            $table->string('act_1', 50);
            $table->string('act_2', 50);
            $table->string('act_3', 50);
            $table->string('act_4', 50);
            $table->string('act_5', 50);
            $table->string('evaluacion_final', 50);

            // Timestamps
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_accion_tutoria');
    }
};
