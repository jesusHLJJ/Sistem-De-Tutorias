<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckSessionExpiration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && $request->session()->has('last_activity')) {
            $sessionLifetime = config('session.lifetime') * 60; // Convertir a segundos
            $lastActivity = $request->session()->get('last_activity');

            if (time() - $lastActivity > $sessionLifetime) {
                Auth::logout();
                $request->session()->invalidate();
                return redirect()->route('login')->with('session_expired', 'Tu sesión ha expirado por inactividad');
            }
        }

        $request->session()->put('last_activity', time());
        return $next($request);
    }
}