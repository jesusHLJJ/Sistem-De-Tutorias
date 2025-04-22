<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        if (session('session_expired')) {
            return view('auth.login')->with('message', session('session_expired'));
        } else if (Auth::check()) {
            return $this->redirectByRole(Auth::user()->role_id);
        } else {
            return view('auth.login');
        }
    }

    public function login(LoginRequest $request)
    {
        $credentials = $this->getCredentials($request);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            return $this->redirectByRole($user->role_id);
        }

        return back()->withErrors([
            'login' => 'Las credenciales proporcionadas no son válidas.',
        ]);
    }

    protected function getCredentials(LoginRequest $request)
    {
        $login = $request->input('login');

        // Determinar si el login es un email o matrícula
        if (filter_var($login, FILTER_VALIDATE_EMAIL)) {
            return ['email' => $login, 'password' => $request->password];
        }

        // Buscar por matrícula
        $alumno = Alumno::where('matricula', $login)->first();

        if ($alumno) {
            return ['id' => $alumno->user_id, 'password' => $request->password];
        }

        return [];
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

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')
            ->with('status', 'Has cerrado sesión exitosamente');
    }
}