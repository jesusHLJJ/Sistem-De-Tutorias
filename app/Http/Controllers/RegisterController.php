<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        // Obtener los datos validados
        $validatedData = $request->validated();

        // Verificar si es el primer usuario registrado
        $isFirstUser = User::count() === 0;

        // Asignar role_id según la condición
        $validatedData['role_id'] = $isFirstUser ? 1 : 3; // 1=Admin, 3=Alumno

        $user = User::create($validatedData);
    }
}