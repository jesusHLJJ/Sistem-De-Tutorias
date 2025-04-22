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
        if (Auth::check()) {
            return $this->redirectByRole(Auth::user()->role_id);
        }

        return view('auth.register', [
            'showMatriculaField' => User::count() > 0
        ]);
    }

    public function register(RegisterRequest $request)
    {
        // Obtener los datos validados
        $validatedData = $request->validated();

        // Determinar el rol del usuario
        $roleId = User::count() === 0 ? 1 : 3; // 1=admin (primer usuario), 3=alumno

        // Crear el usuario
        $user = User::create([
            'email' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'role_id' => $roleId,
        ]);

        // Si es alumno (rol 3), crear registro en tabla alumnos
        if ($roleId === 3) {
            $this->createAlumnoRecord($user, $validatedData['matricula']);
        }

        Auth::login($user);

        return match ($user->role_id) {
            1 => redirect()->route('admin.dashboard')->with('success', 'Administrador creado exitosamente'),
            3 => redirect()->route('alumno.dashboard')->with('success', 'Alumno registrado exitosamente'),
            default => redirect()->route('home'),
        };
    }

    protected function createAlumnoRecord(User $user, string $matricula)
    {
        Alumno::create([
            'user_id' => $user->id,
            'matricula' => $matricula,
        ]);
    }

    protected function redirectByRole($roleId)
    {
        $route = match ($roleId) {
            1 => 'admin.dashboard',
            2 => 'maestro.dashboard',
            3 => 'alumno.dashboard',
            default => 'login',
        };

        return redirect()->route($route);
    }
}