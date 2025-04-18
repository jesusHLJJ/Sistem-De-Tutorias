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
        Schema::create('grupo_materia', function (Blueprint $table) {

            $table->foreignId('id_grupo')
                ->constrained('grupos', 'id_grupo');

            $table->foreignId('id_materia')
                ->constrained('materias', 'id_materia');

            // Composite primary key
            $table->primary(['id_grupo', 'id_materia']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('grupo_materia');
    }
};
