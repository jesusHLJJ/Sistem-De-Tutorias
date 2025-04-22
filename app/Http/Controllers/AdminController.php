<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMaestroRequest;
use App\Models\Profesor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function show()
    {
        return view('admin.dashboard');
    }

    public function registro()
    {
        $maestros = User::where('role_id', 2) // Rol de maestro
            ->with('maestro')
            ->get()
            ->map(function ($user) {
                return (object)[
                    'id' => $user->id,
                    'clave' => $user->clave,
                    'nombre' => $user->nombre,
                    'ap_paterno' => $user->ap_paterno,
                    'ap_materno' => $user->ap_materno,
                    'email' => $user->email,
                ];
            });

        return view('admin.registros', compact('maestros'));
    }

    /**
     * Almacena un nuevo maestro
     */
    public function storeMaestro(StoreMaestroRequest $request)
    {
        dd($request->all());
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 2, // Rol de maestro
        ]);

        Profesor::create([
            'user_id' => $user->id,
            'clave' => $request->clave,
            'nombre' => $request->nombre,
            'ap_paterno' => $request->ap_paterno,
            'ap_materno' => $request->ap_materno,
        ]);

        return redirect()
            ->route('admin.registros')
            ->with('success', 'Maestro creado exitosamente');
    }

    /**
     * Actualiza un maestro existente
     */
    public function updateMaestro(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ap_paterno' => 'required|string|max:255',
            'ap_materno' => 'required|string|max:255',
            'clave' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ]);

        $profesor = Profesor::findOrFail($id);
        $profesor->update([
            'clave' => $request->clave,
            'nombre' => $request->nombre,
            'ap_paterno' => $request->ap_paterno,
            'ap_materno' => $request->ap_materno,
        ]);

        $profesor->user->update([
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $profesor->user->password,
        ]);

        return redirect()
            ->route('admin.registros')
            ->with('success', 'Maestro actualizado exitosamente');
    }

    /**
     * Elimina un maestro
     */
    public function destroyMaestro($id)
    {
        $user = User::findOrFail($id);
        $user->maestro()->delete();
        $user->delete();

        return redirect()->route('admin.registros')->with('success', 'Maestro eliminado exitosamente');
    }
}
