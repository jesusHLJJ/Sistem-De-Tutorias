<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemestresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('semestres')->insert([
            ['semestre' => 'Primero', 'clave_semestre' => 'Primero', 'created_at' => now(), 'updated_at' => now()],
            ['semestre' => 'Segundo', 'clave_semestre' => 'Segundo', 'created_at' => now(), 'updated_at' => now()],
            ['semestre' => 'Tercero', 'clave_semestre' => 'Tercero', 'created_at' => now(), 'updated_at' => now()],
            ['semestre' => 'Cuarto', 'clave_semestre' => 'Cuarto', 'created_at' => now(), 'updated_at' => now()],
            ['semestre' => 'Quinto', 'clave_semestre' => 'Quintoo', 'created_at' => now(), 'updated_at' => now()],
            ['semestre' => 'Sexto', 'clave_semestre' => 'Sextoo', 'created_at' => now(), 'updated_at' => now()],
            ['semestre' => 'Septimo', 'clave_semestre' => 'Septimoro', 'created_at' => now(), 'updated_at' => now()],
            ['semestre' => 'Octavo', 'clave_semestre' => 'Octavo', 'created_at' => now(), 'updated_at' => now()],
            ['semestre' => 'Noveno', 'clave_semestre' => 'Novenoo', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
