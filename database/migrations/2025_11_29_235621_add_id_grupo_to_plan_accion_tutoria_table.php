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
        Schema::table('plan_accion_tutoria', function (Blueprint $table) {
            $table->foreignId('id_grupo')->nullable()->constrained('grupos', 'id_grupo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plan_accion_tutoria', function (Blueprint $table) {
            $table->dropForeign(['id_grupo']);
            $table->dropColumn('id_grupo');
        });
    }
};
