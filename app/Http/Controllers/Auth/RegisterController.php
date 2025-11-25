<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\Alumno;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function show()
    {
        if (Auth::check()) {
            return $this->redirectByRole(Auth::user()->role_id);
        }

        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        // Validación adicional del email
        $cleanEmail = filter_var(trim($request->email), FILTER_SANITIZE_EMAIL);

        // Verificar unicidad del email
        if (User::where('email', $cleanEmail)->exists()) {
            return back()->withErrors(['email' => 'Este correo ya está registrado'])->withInput();
        }

        // Buscar alumno con transacción para evitar condiciones de carrera
        $alumnoExistente = DB::transaction(function () use ($request, $cleanEmail) {
            return Alumno::where('matricula', $request->matricula)
                ->lockForUpdate()
                ->first();
        });

        if (!$alumnoExistente) {
            Log::warning('Intento de registro con matrícula no existente', ['matricula' => $request->matricula]);
            return back()->withErrors(['matricula' => 'Registro no disponible'])->withInput();
        }

        if ($alumnoExistente->user_id !== null) {
            Log::warning('Intento de registro de matrícula ya asociada', ['matricula' => $request->matricula]);
            return back()->withErrors(['matricula' => 'Esta matrícula ya tiene una cuenta registrada'])->withInput();
        }

        $rolAlumno = Role::where('role', 'Alumno')->firstOrFail();

        // Transacción para creación de usuario y actualización de alumno
        DB::transaction(function () use ($request, $cleanEmail, $alumnoExistente, $rolAlumno) {
            $user = User::create([
                'email' => $cleanEmail,
                'password' => bcrypt($request->password),
                'role_id' => $rolAlumno->id_role,
            ]);

            $alumnoExistente->update([
                'user_id' => $user->id,
            ]);

            Log::info('Nuevo usuario registrado', [
                'user_id' => $user->id,
                'alumno_id' => $alumnoExistente->id_alumno,
                'matricula' => $request->matricula
            ]);
            Auth::login($user);
        });

        return redirect()->route('alumno.dashboard')
            ->with('success', 'Registro completado exitosamente. Bienvenido!');
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