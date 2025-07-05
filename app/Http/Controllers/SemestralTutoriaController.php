<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SemestralTutoria;
use App\Models\Grupo;
use App\Models\Alumno;

class SemestralTutoriaController extends Controller
{
    // Mostrar formulario por grupo
    public function formGrupo($id_grupo)
    {
        $grupo = Grupo::with(['semestre', 'periodo'])->findOrFail($id_grupo);
        $profesor = Auth::user()->profesor;

        // Obtener alumnos del grupo
        $alumnos = Alumno::where('id_grupo', $id_grupo)->with('grupo')->get();
        $alumnosIds = $alumnos->pluck('id_alumno');

        // Obtener registros previos por id_alumno
        $tutorias = SemestralTutoria::whereIn('id_alumno', $alumnosIds)->get()->keyBy('id_alumno');

        // Cálculo del índice de reprobación
        $totalAlumnos = $alumnos->count();
        $alumnosReprobados = SemestralTutoria::whereIn('id_alumno', $alumnosIds)
            ->where('materias_reprobadas', '>', 0)
            ->count();

        $indiceReprobacion = $totalAlumnos > 0
            ? round(($alumnosReprobados / $totalAlumnos) * 100, 2)
            : 0;

        return view('maestro.registroTutoria', compact(
            'grupo',
            'profesor',
            'alumnos',
            'tutorias',
            'indiceReprobacion'
        ));
    }

    // Guardar registros enviados del formulario
    public function guardar(Request $request)
    {
        $id_profesor = Auth::user()->profesor->id_profesor;
        $informeGrupal = $request->input('informe_grupal');
        $registros = $request->input('registros');

        foreach ($registros as $registro) {
            $id_alumno = $registro['id_alumno'];

            SemestralTutoria::updateOrCreate(
                ['id_alumno' => $id_alumno],
                [
                    'id_profesor' => $id_profesor,
                    'tutoria_grupal' => isset($registro['tutoria_grupal']) ? 1 : 0,
                    'tutoria_individual' => isset($registro['tutoria_individual']) ? 1 : 0,
                    'asesoria_academica' => isset($registro['asesoria_academica']) ? 1 : 0,
                    'area_psicologica' => isset($registro['area_psicologica']) ? 1 : 0,
                    'crditos_culturales_deportivos' => $registro['crditos_culturales_deportivos'] ?? 0,
                    'crditos_academicos' => $registro['crditos_academicos'] ?? 0,
                    'ingles_cubierto' => $registro['ingles_cubierto'] ?? '',
                    'materias_reprobadas' => $registro['materias_reprobadas'] ?? 0,
                    'informe_grupal' => $informeGrupal,
                ]
            );
        }

        return redirect()->back()->with('success', 'Información guardada correctamente.');
    }
}
