<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use App\Models\Carrera;
use Illuminate\Support\Facades\Auth;
use App\Models\Grupo;
use App\Models\Semestres;
use App\Models\User;
use App\Models\Tutorias_academicas;
use Illuminate\Http\Request;


class tutoriasacademicasController extends Controller
{
    public function index()
    {
        $profesor = Auth::user()->profesor; 
    
        // Verificar si el profesor existe
        if (!$profesor) {
            abort(404, 'Profesor no encontrado');
        }
    
        // Obtener la carrera asociada al profesor
        $carrera = $profesor->carrera;
    
        // Obtener los grupos y semestres para la vista
        $grupos = $profesor->grupos;
        $semestres = Semestres::all();
    
        // Pasar los datos a la vista
        return view('maestro.tutoriasacademicas', compact('profesor', 'carrera', 'grupos', 'semestres'));
    }
    
    

    public function guardar(Request $request)
    {

        //CREACION DE INSTANCIAS PARA INYECTAR DATOS EN LAS TABLAS O MODELOS
        $tutorias_academicas = new Tutorias_academicas;


        $usuario = Auth::user();
        $profesor = $usuario->profesor; // Suponiendo que tienes la relación 'profesor' definida en el modelo User.

        if ($profesor) {
            // Asignamos el id_profesor al modelo de tutorías académicas
            $tutorias_academicas->id_profesor = $profesor->id_profesor;
        }
        //CAMPOS QUE UTILIZAREMOS PARA METER DATOS AL MODELO LLAMADO "TUTORIAS ACADEMICAS"
        $tutorias_academicas->id_semestre = $request->input('semestre_id');
        $tutorias_academicas->id_grupo = $request->input('grupo_id');

        $tutorias_academicas->mes_reporte = $request->input('mes');
        $tutorias_academicas->formacion_academica = $request->input('academica');
        $tutorias_academicas->formacion_personal = $request->input('personal');
        $tutorias_academicas->formacion_profesional = $request->input('profesional');

        $tutorias_academicas->save(); //METODO PARA GUARDAR LOS DATOS, MEDIANTE ELEQUET

        return redirect()->back()->with('success', 'Datos guardados correctamente');
    }
}
