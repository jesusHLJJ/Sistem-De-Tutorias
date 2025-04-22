<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // 1. Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Obtener el rol del usuario
        $userRole = Auth::user()->role_id;

        // Verificar si el usuario tiene un rol permitido
        if (!in_array($userRole, $roles)) {
            // Redirigir a la ruta correspondiente según su rol
            return $this->silentRedirect($userRole);
        }

        return $next($request);
    }

    protected function silentRedirect($roleId)
    {
        $route = match ($roleId) {
            1 => 'admin.dashboard',
            2 => 'maestro.dashboard',
            3 => 'alumno.dashboard',
            default => 'home',
        };

        return redirect()->route($route);
    }
}