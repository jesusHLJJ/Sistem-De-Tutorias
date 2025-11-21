<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarrerasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('carreras')->insert([
            ['carrera' => 'Ingenieria en Sistemas Computacionales', 'clave_carrera' => 'ISC', 'created_at' => now(), 'updated_at' => now()],
            ['carrera' => 'Ingenieria Ambiental', 'clave_carrera' => 'Ambiental', 'created_at' => now(), 'updated_at' => now()],
            ['carrera' => 'Ingenieria Electronica', 'clave_carrera' => 'Electronica', 'created_at' => now(), 'updated_at' => now()],
            ['carrera' => 'Ingenieria Biomedica', 'clave_carrera' => 'Biomedica', 'created_at' => now(), 'updated_at' => now()],
            ['carrera' => 'Ingenieria Informatica', 'clave_carrera' => 'Informatica', 'created_at' => now(), 'updated_at' => now()],
            ['carrera' => 'Licenciatura en Administracion', 'clave_carrera' => 'Administracion', 'created_at' => now(), 'updated_at' => now()],
            ['carrera' => 'Arquitectura', 'clave_carrera' => 'Arquitectura', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
