<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Alumno;
use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function show()
    {
        if (session('session_expired')) {
            return view('auth.login')->with('message', session('session_expired'));
        }

        if (Auth::check()) {
            return $this->redirectByRole(Auth::user()->role_id);
        }

        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        $this->ensureIsNotRateLimited($request);

        $credentials = $this->getCredentials($request);

        if (empty($credentials)) {
            RateLimiter::hit($this->throttleKey($request));
            throw ValidationException::withMessages([
                'login' => __('auth.failed'),
            ]);
        }

        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            RateLimiter::hit($this->throttleKey($request));
            throw ValidationException::withMessages([
                'login' => __('auth.failed'),
            ]);
        }

        RateLimiter::clear($this->throttleKey($request));

        $request->session()->regenerate();

        return $this->redirectByRole(Auth::user()->role_id);
    }

    protected function getCredentials(LoginRequest $request)
    {
        $login = trim(strip_tags($request->input('login')));
        $password = $request->password;

        // 1. Verificar si es un email válido
        $email = filter_var($login, FILTER_VALIDATE_EMAIL);
        if ($email) {
            return ['email' => $email, 'password' => $password];
        }

        // 2. Verificar si es una matrícula (alumnos)
        $alumno = Alumno::where('matricula', $login)->first();
        if ($alumno && $alumno->user_id) {
            return ['id' => $alumno->user_id, 'password' => $password];
        }

        // 3. Verificar si es una clave de profesor
        $profesor = Profesor::where('clave', $login)->first();
        if ($profesor && $profesor->user_id) {
            return ['id' => $profesor->user_id, 'password' => $password];
        }

        return null;
    }

    protected function ensureIsNotRateLimited(Request $request)
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey($request), 5)) {
            return;
        }

        $seconds = RateLimiter::availableIn($this->throttleKey($request));

        throw ValidationException::withMessages([
            'login' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    protected function throttleKey(Request $request)
    {
        return Str::transliterate(Str::lower($request->input('login')) . '|' . $request->ip());
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