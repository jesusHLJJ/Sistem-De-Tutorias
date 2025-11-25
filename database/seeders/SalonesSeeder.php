<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SalonesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $salones = [];

        // Generar salones desde A hasta Z
        for ($letra = 'A'; $letra <= 'Z'; $letra++) {
            for ($numero = 1; $numero <= 10; $numero++) {
                $salones[] = [
                    'clave_salon' => $letra . '-' . str_pad($numero, 2, '0', STR_PAD_LEFT),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insertar todos los salones en la base de datos
        DB::table('salones')->insert($salones);

        $this->command->info('Salones desde A-01 hasta Z-10 insertados correctamente.');
    }
}