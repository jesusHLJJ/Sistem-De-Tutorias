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
        Schema::create('jefes_carrera', function (Blueprint $table) {
            $table->id("id_jefe_carrera");

            $table->foreignId('id_carrera')
                ->constrained('carreras', 'id_carrera');

            $table->string('nombre', 50);
            $table->string('ap_paterno', 50);
            $table->string('ap_materno', 50);
            $table->string('correo', 50);
            $table->string('telefono', 20);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jefes_carrera');
    }
};
