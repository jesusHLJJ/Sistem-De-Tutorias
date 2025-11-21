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
        $status = plan_accion_tutoria::where('id_grupo', $id_grupo)->count();


        $grupo = Grupo::with('carrera', 'semestre', 'profesor', 'periodo')
            ->withCount('alumnos as cantidad_de_alumnos')
            ->withCount([
                'alumnos as hombres' => function ($query) {
                    $query->where('genero', 'M');
                }
            ])
            ->withCount([
                'alumnos as mujeres' => function ($query) {
                    $query->where('genero', 'F');
                }
            ])
            ->where('id_grupo', $id_grupo)
            ->first();

        if ($status == 1) {
            $pat = plan_accion_tutoria::where('id_grupo', $id_grupo)->first();
            $actividades= pat_actividades::where('id_plan_accion',$pat->id_plan_accion)->orderBy('fecha', 'asc')->get();
            return view('maestro.pat_mod', compact('grupo', 'status', 'pat','actividades'));
        } else {
            return view('maestro.pat', compact('grupo'));
        }
    }

    public function guardar_info($id_grupo, request $datos_formulario)
    {
        $agregar = new plan_accion_tutoria();
        $agregar->id_grupo = $id_grupo;
        $agregar->no_matricula_grupo =  $datos_formulario->cant_alumnos;
        $agregar->hombres =  $datos_formulario->cant_alumnos_hombres;
        $agregar->mujeres =  $datos_formulario->cant_alumnos_mujeres;
        $agregar->ploblematica_identificada    =  $datos_formulario->problematica_identificada;
        $agregar->objetivos    =  $datos_formulario->objetivos;
        $agregar->acciones_implementar =  $datos_formulario->acciones_a_implementar;
        $agregar->save();
        return redirect()->route('maestro.pat', $id_grupo);
    }

    public function modificar_info($id_grupo, Request $datos_formulario)
    {
        $modificar = plan_accion_tutoria::where('id_grupo', $id_grupo)->first();
        $modificar->no_matricula_grupo = $datos_formulario->cant_alumnos;
        $modificar->hombres =  $datos_formulario->cant_alumnos_hombres;
        $modificar->mujeres =  $datos_formulario->cant_alumnos_mujeres;
        $modificar->ploblematica_identificada    =  $datos_formulario->problematica_identificada;
        $modificar->objetivos    =  $datos_formulario->objetivos;
        $modificar->acciones_implementar =  $datos_formulario->acciones_a_implementar;
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
