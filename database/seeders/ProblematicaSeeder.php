<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProblematicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $problematicas = [
            ['tipo_problematica' => 'Indiciplina'],
            ['tipo_problematica' => 'Económicos'],
            ['tipo_problematica' => 'Personales'],
            ['tipo_problematica' => 'Académicos'],
        ];

        DB::table('problematica_identificada')->insert($problematicas);
    }
}
