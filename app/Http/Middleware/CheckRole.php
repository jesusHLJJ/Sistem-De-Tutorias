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

        // 2. Procesar los roles correctamente
        $roles = collect(func_get_args())->slice(2)->toArray();

        // 3. Verificar si el rol del usuario está autorizado
        if (!in_array(Auth::user()->role_id, $roles)) {
            abort(403, 'Acceso no autorizado para tu rol');
        }
        return $next($request);
    }
}