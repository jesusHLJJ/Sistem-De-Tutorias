<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumnoController extends Controller
{
    public function show()
    {
        return view('alumno.dashboard');
    }

    public function dashboard()
    {
        $user = Auth::user();
        return view('alumno.dashboard', [
            'alumno' => $user->alumno, // Asume que tienes la relación definida
            'rol' => $user->role_id
        ]);
    }

    public function fichaidentificacion()
    {
        $user = Auth::user();
        return view('alumno.fichaIdenTutorado'); // Blade: resources/views/alumno/perfil.blade.php
    }
}