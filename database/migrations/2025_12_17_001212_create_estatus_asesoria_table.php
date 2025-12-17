<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('estatus_asesoria', function (Blueprint $table) {
            $table->integer('id_estatus')->primary();
            $table->string('nombre', 50);
            $table->timestamps();
        });

        // Insert default values
        DB::table('estatus_asesoria')->insert([
            ['id_estatus' => 0, 'nombre' => 'Pendiente', 'created_at' => now(), 'updated_at' => now()],
            ['id_estatus' => 1, 'nombre' => 'Atendida', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estatus_asesoria');
    }
};
