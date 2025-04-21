<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirigir según el rol del usuario
            return $this->redirectByRole(Auth::user()->role_id);
        }

        return back()->withErrors([
            'email' => 'Las credenciales no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    protected function redirectByRole($roleId)
    {
        return match ($roleId) {
            1 => redirect()->route('admin.dashboard'), // Admin
            2 => redirect()->route('maestro.dashboard'), // Maestro
            3 => redirect()->route('alumno.dashboard'), // Alumno
            default => redirect('/home'),
        };
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Cierra la sesión

        $request->session()->invalidate(); // Invalida la sesión
        $request->session()->regenerateToken(); // Regenera el token CSRF

        return redirect('/login'); // Redirige a la página principal
    }
}