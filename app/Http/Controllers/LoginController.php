<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show()
    {
        return view('welcome');
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
            /*1 => redirect()->route('admin.dashboard'), // Admin
            2 => redirect()->route('maestro.dashboard'), // Maestro
            3 => redirect()->route('alumno.dashboard'), // Alumno*/
            default => redirect('/home'),
        };
    }
}