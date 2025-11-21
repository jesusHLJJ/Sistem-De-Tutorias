<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('role')->insert([
            ['role' => 'Admin', 'created_at' => now(), 'updated_at' => now()],
            ['role' => 'Profesor', 'created_at' => now(), 'updated_at' => now()],
            ['role' => 'Alumno', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}
