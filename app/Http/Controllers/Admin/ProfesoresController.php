<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EditProfesorRequest;
use App\Http\Requests\Admin\StoreProfesorRequest;
use App\Models\Carrera;
use App\Models\Profesor;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProfesoresController extends Controller
{
    public function show()
    {
        $profesores = Profesor::with('user', 'carrera')->get();
        $carreras = Carrera::all();
        return view('admin.profesores.dashboard', compact('profesores', 'carreras'));
    }

    public function store(StoreProfesorRequest $request)
    {
        // Verificar unicidad de la clave
        if (Profesor::where('clave', $request->clave)->exists()) {
            return back()->withErrors(['clave' => 'Esta clave ya está registrada'])->withInput();
        }

        // Verificar unicidad del email
        if (User::where('email', $request->email)->exists()) {
            return back()->withErrors(['email' => 'Este email ya está registrado'])->withInput();
        }

        $rolProfesor = Role::where('rol', 'Profesor')->firstOrFail();

        DB::transaction(function () use ($request, $rolProfesor) {
            // Crear el usuario
            $user = User::create([
                'rol_id' => $rolProfesor->id_rol,
                'email' => filter_var(trim($request->email), FILTER_SANITIZE_EMAIL),
                'password' => bcrypt($request->password),
            ]);

            // Crear el profesor
            $profesor = Profesor::create([
                'user_id' => $user->id,
                'id_carrera' => $request->carrera,
                'clave' => $request->clave,
                'nombre' => htmlspecialchars(trim($request->nombre), ENT_QUOTES, 'UTF-8'),
                'ap_paterno' => htmlspecialchars(trim($request->ap_paterno), ENT_QUOTES, 'UTF-8'),
                'ap_materno' => htmlspecialchars(trim($request->ap_materno), ENT_QUOTES, 'UTF-8'),
            ]);

            // Registrar la acción
            Log::channel('admin')->info('Profesor creado', [
                'admin_id' => Auth::id(),
                'profesor_id' => $profesor->id,
                'action' => 'create'
            ]);
        });

        return redirect()->route('admin.profesores.dashboard')
            ->with('success', 'Profesor registrado exitosamente');
    }

    public function edit(Profesor $profesor)
    {
        $carreras = Carrera::all();

        return response()->json([
            'profesor' => $profesor->load('user', 'carrera'),
            'carreras' => $carreras,
            'version' => $profesor->updated_at->timestamp
        ]);
    }

    public function update(EditProfesorRequest $request, Profesor $profesor)
    {
        // Verificar concurrencia
        if ($request->filled('version') && $profesor->updated_at->gt($request->version)) {
            return back()->with('error', 'El registro fue modificado por otro usuario. Por favor refresque la página.');
        }

        // Verificar unicidad de la clave
        if (Profesor::where('clave', $request->clave)
            ->where('id_profesor', '!=', $profesor->id_profesor)
            ->exists()
        ) {
            return back()->withErrors(['clave' => 'Esta clave ya está registrada'])->withInput();
        }

        $profesorData = [
            'clave' => $request->clave,
            'id_carrera' => $request->carrera,
            'nombre' => htmlspecialchars(trim($request->nombre), ENT_QUOTES, 'UTF-8'),
            'ap_paterno' => htmlspecialchars(trim($request->ap_paterno), ENT_QUOTES, 'UTF-8'),
            'ap_materno' => htmlspecialchars(trim($request->ap_materno), ENT_QUOTES, 'UTF-8')
        ];

        DB::transaction(function () use ($request, $profesor, $profesorData) {
            $userData = [
                'email' => filter_var(trim($request->email), FILTER_SANITIZE_EMAIL)
            ];

            if ($request->filled('password')) {
                $userData['password'] = bcrypt($request->password);
            }

            $profesor->user->update($userData);
            $profesor->update($profesorData);

            // Registrar la acción
            Log::channel('admin')->info('Profesor actualizado', [
                'admin_id' => Auth::id(),
                'profesor_id' => $profesor->id,
                'action' => 'update'
            ]);
        });

        return redirect()->route('admin.profesores.dashboard')
            ->with('success', 'Profesor actualizado exitosamente');
    }

    public function destroy(Profesor $profesor)
    {
        DB::transaction(function () use ($profesor) {
            $profesorId = $profesor->id_profesor;

            // Desvincular al profesor de los grupos (establecer profesor_id a null)
            $profesor->grupos()->update(['id_profesor' => null]);

            // Eliminar el usuario asociado
            $profesor->user()->delete();

            // Finalmente eliminar el profesor
            $profesor->delete();

            // Registrar la acción
            Log::channel('admin')->info('Profesor eliminado', [
                'admin_id' => Auth::id(),
                'profesor_id' => $profesorId,
                'action' => 'delete'
            ]);
        });

        return back()->with('success', 'Profesor eliminado exitosamente');
    }
}