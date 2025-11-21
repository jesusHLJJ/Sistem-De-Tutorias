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
            ['semestre' => 'Primero',  'clave_semestre' => '1'],
            ['semestre' => 'Segundo',  'clave_semestre' => '2'],
            ['semestre' => 'Tercero',  'clave_semestre' => '3'],
            ['semestre' => 'Cuarto',  'clave_semestre' => '4'],
            ['semestre' => 'Quinto',  'clave_semestre' => '5'],
            ['semestre' => 'Sexto',   'clave_semestre' => '6'],
            ['semestre' => 'Séptimo', 'clave_semestre' => '7'],
            ['semestre' => 'Octavo',  'clave_semestre' => '8'],
            ['semestre' => 'Noveno',  'clave_semestre' => '9'],
            ['semestre' => 'Decimo',  'clave_semestre' => '10'],
        ]);
    }
}
