<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buscar el rol Admin
        $rolAdmin = DB::table('role')->where('role', 'Admin')->first();

        // 2. Si no existe, crearlo
        if (!$rolAdmin) {
            $id = DB::table('role')->insertGetId([
                'role' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $rolAdmin = DB::table('role')->where('id_role', $id)->first();
        }

        // 3. Insertar usuario administrador
        DB::table('users')->insert([
            [
                'role_id'          => $rolAdmin->id_role,  // ← esta es la clave correcta
                'email'            => 'admin@' . env('APP_DOMAIN', 'correo.com'),
                'email_verified_at'=> now(),
                'password'         => bcrypt(env('ADMIN_PASSWORD', 'P@ssw0rdSeguro123')),
                'created_at'       => now(),
                'updated_at'       => now(),
            ]
        ]);
    }
}
