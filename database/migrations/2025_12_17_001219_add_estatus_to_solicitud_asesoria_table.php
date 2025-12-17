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
        Schema::table('solicitud_asesoria', function (Blueprint $table) {
            $table->integer('id_estatus')->default(0);
            $table->foreign('id_estatus')->references('id_estatus')->on('estatus_asesoria');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('solicitud_asesoria', function (Blueprint $table) {
            $table->dropForeign(['id_estatus']);
            $table->dropColumn('id_estatus');
        });
    }
};
