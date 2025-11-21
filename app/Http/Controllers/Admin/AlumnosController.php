<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EditAlumnoRequest;
use App\Http\Requests\Admin\StoreAlumnoRequest;
use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\Grupo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AlumnosController extends Controller
{
    public function show()
    {
        $alumnos = Alumno::with([
            'grupo',
            'carrera',
        ])
            ->get();

        $carreras = Carrera::get();
        $grupos = Grupo::get();

        return view('admin.alumnos.dashboard', compact(
            'alumnos',
            'carreras',
            'grupos'
        ));
    }

    public function store(StoreAlumnoRequest $request)
    {
        // Validar matrícula única
        if (Alumno::where('matricula', $request->matricula)->exists()) {
            return back()->withErrors(['matricula' => 'Esta matrícula ya está registrada'])->withInput();
        }

        DB::transaction(function () use ($request) {

            // Crear el alumno
            $alumno = Alumno::create([
                'id_grupo' => $request->grupo,
                'id_carrera' => $request->carrera,
                'matricula' => $request->matricula,
                'nombre' => htmlspecialchars(trim($request->nombre), ENT_QUOTES, 'UTF-8'),
            ]);

            Log::channel('admin')->info('Alumno creado', [
                'admin_id' => Auth::id(),
                'alumno_id' => $alumno->id_alumno,
                'matricula' => $alumno->matricula
            ]);
        });

        return redirect()->route('admin.alumnos.dashboard')
            ->with('success', 'Alumno registrado exitosamente');
    }

    public function edit(Alumno $alumno)
    {
        $carreras = Carrera::all();
        $grupos = Grupo::all();

        return response()->json([
            'grupo' => $alumno->load(
                'grupos',
                'carreras',
            ),
            'carreras' => $carreras,
            'grupos' => $grupos,
        ]);
    }

    public function update(EditAlumnoRequest $request, Alumno $alumno)
    {
        // Validar matrícula única excluyendo al alumno actual
        if (Alumno::where('matricula', $request->matricula)
            ->where('id_alumno', '!=', $alumno->id_alumno)
            ->exists()
        ) {
            return back()->withErrors(['matricula' => 'Esta matrícula ya está registrada'])->withInput();
        }

        $alumnoData = [
            'matricula' => $request->matricula,
            'id_carrera' => $request->carrera,
            'id_grupo' => $request->grupo,
            'nombre' => htmlspecialchars(trim($request->nombre), ENT_QUOTES, 'UTF-8'),
        ];

        DB::transaction(function () use ($alumno, $alumnoData) {
            $alumno->update($alumnoData);

            Log::channel('admin')->info('Alumno actualizado', [
                'admin_id' => Auth::id(),
                'alumno_id' => $alumno->id_alumno,
                'changes' => $alumno->getChanges()
            ]);
        });

        return redirect()->route('admin.alumnos.dashboard')
            ->with('success', 'Datos del alumno actualizados correctamente');
    }

    public function destroy(Alumno $alumno)
    {
        // Verificar si el alumno tiene registros asociados
        if ($alumno->calificaciones()->exists() || $alumno->asistencias()->exists()) {
            return back()->with('error', 'No se puede eliminar el alumno porque tiene registros académicos asociados');
        }

        DB::transaction(function () use ($alumno) {
            $alumnoData = [
                'id_alumno' => $alumno->id_alumno,
                'matricula' => $alumno->matricula
            ];

            // Eliminar usuario si existe
            if ($alumno->user) {
                $alumno->user->delete();
            }

            $alumno->delete();

            Log::channel('admin')->info('Alumno eliminado', [
                'admin_id' => Auth::id(),
                'alumno_data' => $alumnoData
            ]);
        });

        return back()->with('success', 'Alumno eliminado correctamente');
    }
}