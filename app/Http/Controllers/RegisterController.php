<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\Alumno;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        // Obtener los datos validados
        $validatedData = $request->validated();

        // Verificar si es el primer usuario registrado
        $isFirstUser = User::count() === 0;

        // Asignar role_id según la condición
        $validatedData['role_id'] = $isFirstUser ? 1 : 3;

        // Crear el usuario
        $user = User::create($validatedData);

        // Si es alumno (role_id = 3), crear registro en tabla alumnos
        if ($user->role_id == 3) {
            $this->createAlumnoRecord($user);
        }

        Auth::login($user);
        return match ($user->role_id) {
            1 => redirect()->route('admin.dashboard'),
            2 => redirect()->route('maestro.dashboard'),
            default => redirect()->route('alumno.dashboard'),
        };
    }

    protected function createAlumnoRecord(User $user)
    {
        Alumno::create([
            'user_id' => $user->id,
        ]);
    }
}