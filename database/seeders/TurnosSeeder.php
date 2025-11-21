<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TurnosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('turnos')->insert([
            ['turno' => 'Matutino', 'clave_turno' => 'mañana', 'created_at' => now(), 'updated_at' => now()],
            ['turno' => 'Vespertino', 'clave_turno' => 'tarde', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
