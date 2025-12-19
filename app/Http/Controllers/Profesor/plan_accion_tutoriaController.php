<?php

namespace App\Http\Controllers\Profesor;

use App\Http\Controllers\Controller;
use App\Models\Grupo;
use App\Models\pat_actividades;
use App\Models\plan_accion_tutoria;
use Illuminate\Http\Request;


class plan_accion_tutoriaController extends Controller
{
    public function mostrarpat($id_grupo)
    {
        $grupo = Grupo::with('carrera', 'semestre', 'profesor', 'periodo')
            ->withCount('alumnos as cantidad_de_alumnos')
            ->withCount(['alumnos as hombres' => function ($query) {
                $query->where('genero', 'M');
            }])
            ->withCount(['alumnos as mujeres' => function ($query) {
                $query->where('genero', 'F');
            }])
            ->where('id_grupo', $id_grupo)
            ->first();

        // Fallback logic: Try to find PAT by professor, period, and semestre associated with the group
        // Note: This assumes one PAT per professor/period/semestre, which might be ambiguous if multiple groups exist.
        // But without id_grupo in PAT table, this is the best guess.
        $status = 0;
        $pat = null;
        
        if ($grupo) {
             $pat = plan_accion_tutoria::where('id_profesor', $grupo->id_profesor)
                                       ->where('id_periodo', $grupo->id_periodo)
                                       ->where('id_semestre', $grupo->id_semestre)
                                       ->first();
             if ($pat) {
                 $status = 1;
             }
        }

        if ($status == 1 && $pat) {
            // $pat is already retrieved above
            $actividades= pat_actividades::where('id_plan_accion',$pat->id_plan_accion)->orderBy('fecha', 'asc')->get();
            return view('maestro.pat_mod', compact('grupo', 'status', 'pat','actividades'));
        } else {
            return view('maestro.pat', compact('grupo'));
        }
    }

    public function guardar_info($id_grupo, request $datos_formulario)
    {
        $datos_formulario->validate([
            'problematica_identificada' => 'required|string',
            'objetivos' => 'required|string',
            'acciones_a_implementar' => 'required|string',
            'cant_alumnos_hombres' => 'required|integer',
            'cant_alumnos_mujeres' => 'required|integer',
        ], [
            'problematica_identificada.required' => 'La problemática identificada es obligatoria.',
            'objetivos.required' => 'Los objetivos son obligatorios.',
            'acciones_a_implementar.required' => 'Las acciones a implementar son obligatorias.',
            'cant_alumnos_hombres.required' => 'La cantidad de hombres es obligatoria.',
            'cant_alumnos_mujeres.required' => 'La cantidad de mujeres es obligatoria.',
        ]);

        $grupo = Grupo::find($id_grupo);
        $agregar = new plan_accion_tutoria();
        $agregar->id_grupo = $id_grupo;
        $agregar->id_profesor = $grupo->id_profesor;
        $agregar->id_periodo = $grupo->id_periodo;
        $agregar->id_semestre = $grupo->id_semestre;
        
        $agregar->no_matricula_grupo =  $datos_formulario->cant_alumnos;
        $agregar->hombres =  $datos_formulario->cant_alumnos_hombres;
        $agregar->mujeres =  $datos_formulario->cant_alumnos_mujeres;
        $agregar->ploblematica_identificada    =  $datos_formulario->problematica_identificada;
        $agregar->objetivos    =  $datos_formulario->objetivos;
        $agregar->acciones_implementar =  $datos_formulario->acciones_a_implementar;
        
        // Default values for legacy required columns
        $agregar->act_1 = 'N/A';
        $agregar->act_2 = 'N/A';
        $agregar->act_3 = 'N/A';
        $agregar->act_4 = 'N/A';
        $agregar->act_5 = 'N/A';
        $agregar->evaluacion_final = 'Pendiente';

        $agregar->save();
        return redirect()->route('maestro.pat', $id_grupo);
    }

    public function modificar_info($id_grupo, Request $datos_formulario)
    {
        $datos_formulario->validate([
            'problematica_identificada' => 'required|string',
            'objetivos' => 'required|string',
            'acciones_a_implementar' => 'required|string',
            'cant_alumnos_hombres' => 'required|integer',
            'cant_alumnos_mujeres' => 'required|integer',
        ], [
            'problematica_identificada.required' => 'La problemática identificada es obligatoria.',
            'objetivos.required' => 'Los objetivos son obligatorios.',
            'acciones_a_implementar.required' => 'Las acciones a implementar son obligatorias.',
            'cant_alumnos_hombres.required' => 'La cantidad de hombres es obligatoria.',
            'cant_alumnos_mujeres.required' => 'La cantidad de mujeres es obligatoria.',
        ]);

        $grupo = Grupo::find($id_grupo);
        $modificar = plan_accion_tutoria::where('id_profesor', $grupo->id_profesor)
                                        ->where('id_periodo', $grupo->id_periodo)
                                        ->where('id_semestre', $grupo->id_semestre)
                                        ->first();

        // Update main fields
        $modificar->ploblematica_identificada = $datos_formulario->problematica_identificada;
        $modificar->objetivos = $datos_formulario->objetivos;
        $modificar->acciones_implementar = $datos_formulario->acciones_a_implementar;
        $modificar->hombres = $datos_formulario->cant_alumnos_hombres;
        $modificar->mujeres = $datos_formulario->cant_alumnos_mujeres;
        $modificar->no_matricula_grupo = $datos_formulario->cant_alumnos_hombres + $datos_formulario->cant_alumnos_mujeres; 

        $modificar->save();
        return redirect()->route('maestro.pat', $id_grupo);
    }

    public function agregar_actividad($id_grupo, $id_plan_accion, request $datos_formulario)
    {
        $agregar_actividad = new pat_actividades();
        $agregar_actividad->id_plan_accion = $id_plan_accion;
        $agregar_actividad->actividad = $datos_formulario->nombre_actividad;
        $agregar_actividad->fecha = $datos_formulario->fecha_actividad;
        $agregar_actividad->save();
        return redirect()->route('maestro.pat', $id_grupo);
    }

    public function borrar_actividad($actividad){
        $borrar=pat_actividades::find($actividad)->first();
        $borrar->delete();
        return redirect()->back();
    }


    public function agregar_actividad_final($id_plan_accion, Request $datos_formulario){
        $modificar=plan_accion_tutoria::find($id_plan_accion);
        $modificar->evaluacion_final=$datos_formulario->nom_act_final;
        $modificar->save();
        return redirect()->route('maestro.pat', $modificar->id_grupo);
    }
}
