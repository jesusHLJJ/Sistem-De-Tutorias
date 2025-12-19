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
        Schema::create('pat_actividades', function (Blueprint $table) {
            $table->id('id_actividad');
            $table->foreignId('id_plan_accion')->constrained('plan_accion_tutoria', 'id_plan_accion')->onDelete('cascade');
            $table->string('actividad');
            $table->date('fecha');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pat_actividades');
    }
};
