<?php

namespace App\Http\Controllers\Profesor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MensualTutoria;
use App\Models\ProblematicaIdentificada;
use App\Models\Alumno;
use App\Models\Periodos;
use Illuminate\Support\Facades\Auth;

class MensualTutoriaController extends Controller
{
    //


public function index()
{
    $profesor = Auth::user()->profesor;
    $grupos = $profesor->grupos->pluck('id_grupo');
    $alumnos = Alumno::whereIn('id_grupo', $grupos)->get();
    $problematicas = ProblematicaIdentificada::all();

    return view('maestro.reporteTutoria', compact('profesor', 'alumnos', 'problematicas'));
}


public function guardar(Request $request)
{
    $request->validate([
        'id_alumno' => 'required|exists:alumnos,id_alumno',
        'id_problematica' => 'required|exists:problematica_identificada,id_problematica',
        'mes_entrega' => 'required|string',
        'analisis_metodo_aplicado' => 'required|string',
        'area_canalizar' => 'required|string',
    ]);

    // Buscar o crear
    $registro = MensualTutoria::firstOrNew([
        'id_profesor' => Auth::user()->profesor->id_profesor,
        'id_alumno' => $request->id_alumno,
    ]);

    $registro->fill([
        'id_problematica' => $request->id_problematica,
        'mes_entrega' => $request->mes_entrega,
        'analisis_metodo_aplicado' => $request->analisis_metodo_aplicado,
        'area_canalizar' => $request->area_canalizar,
    ])->save();

    return redirect()->back()->with('success', 'Datos guardados');
}


public function reporte()
{
    $profesor = Auth::user()->profesor;

    $registros = MensualTutoria::with(['alumno.grupo', 'problematica'])
        ->where('id_profesor', $profesor->id_profesor)
        ->get();

    return view('maestro.registroTutoria', compact('profesor', 'registros'));
}



public function actualizar(Request $request, $id)
{
    $request->validate([
        'mes_entrega' => 'required|string',
        'id_problematica' => 'required|exists:problematica_identificada,id_problematica',
        'analisis_metodo_aplicado' => 'required|string',
        'area_canalizar' => 'required|string',
    ]);

    $registro = MensualTutoria::findOrFail($id);
    $registro->update([
        'mes_entrega' => $request->mes_entrega,
        'id_problematica' => $request->id_problematica,
        'analisis_metodo_aplicado' => $request->analisis_metodo_aplicado,
        'area_canalizar' => $request->area_canalizar,
    ]);

    return redirect()->back()->with('success', 'Registro actualizado correctamente.');
}


public function vistaRegistro()
{
    $profesor = Auth::user()->profesor;
    $grupos = $profesor->grupos->pluck('id_grupo');

    // Alumnos que pertenecen a los grupos del profesor
    $alumnos = Alumno::with('grupo')
        ->whereIn('id_grupo', $grupos)
        ->get();

    // Problemáticas disponibles
    $problematicas = ProblematicaIdentificada::all();

    // Tutorías existentes del profesor
    $registros = MensualTutoria::where('id_profesor', $profesor->id_profesor)->get()->keyBy('id_alumno');

    $mesNombre = now()->locale('es')->monthName;
    $periodo = '2024-2025/2';

    return view('maestro.reporteTutoria', compact(
        'profesor', 'alumnos', 'problematicas', 'registros', 'mesNombre', 'periodo'
    ));
}

}
