<?php

namespace App\Http\Controllers\Profesor;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Carrera;
use App\Models\Materias;
use App\Models\Semestres;
use App\Models\solicitudasesoria;
use App\Models\Grupo;
use App\Models\Profesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitudAsesoriaController extends Controller
{

    public function index()
    {
        // Estos por momento serán estáticos en 1
        $user = Auth::user();
        $alumno = $user->alumno;
        $grupo = $alumno->grupo;       // Relación: belongsTo(Grupo::class)
        $carrera = $alumno->carrera;   // Relación: belongsTo(Carrera::class)
        $semestre = $alumno->grupo?->semestre; // Relación: belongsTo(Semestres::class)
    
        // Obtener todas las solicitudes del alumno
        $solicitudes = solicitudasesoria::where('id_alumno', $alumno->id_alumno)->get();
    
        // Obtener los profesores y materias
        $profesores = Profesor::where('id_carrera', $alumno->id_carrera)->get();
        $materias = Materias::all();
    
        // Retornar los datos a la vista
        return view('alumno.SolicitudAsesoria', compact(
            'alumno',
            'grupo',
            'semestre',
            'carrera',
            'materias',
            'profesores',
            'solicitudes'  // Ahora estamos pasando todas las solicitudes
        ));
    }
    

public function guardar(Request $request)
{
    if ($request->has('id_solicitud')) {
        // Estamos editando una solicitud existente
        $solicitud = solicitudasesoria::find($request->input('id_solicitud'));

        if (!$solicitud) {
            return redirect()->back()->with('error', 'La solicitud no fue encontrada.');
        }
    } else {
        // Estamos creando una nueva
        $solicitud = new solicitudasesoria();
        $solicitud->id_alumno = $request->input('alumno_id');
    }

    $solicitud->id_profesor = $request->input('id_profesor');
    $solicitud->id_materia = $request->input('id_materia');
    $solicitud->fecha = $request->input('fecha');
    $solicitud->medio_didactico_recurso = $request->input('medio_asesoria');
    $solicitud->temas_tratar_descripcion = $request->input('descripcion');

    $solicitud->save();

return redirect()->route('alumno.solicitudes.lista', $solicitud->id_alumno)
    ->with('success', $request->has('id_solicitud') ? 'Solicitud actualizada correctamente' : 'Solicitud creada correctamente');
}


    public function ver($id)
    {
        // Cargar la solicitud y las relaciones de materia y profesor
        $solicitud = solicitudasesoria::with('materia', 'profesor')->findOrFail($id);
    
        // Obtener los datos del alumno (relación con el usuario autenticado)
        $user = Auth::user();
        $alumno = $user->alumno;
        $grupo = $alumno->grupo;       // Relación: belongsTo(Grupo::class)
        $carrera = $alumno->carrera;   // Relación: belongsTo(Carrera::class)
        $semestre = $alumno->grupo?->semestre; // Relación: belongsTo(Semestres::class)
    
        // Obtener los profesores y materias, según lo que ya tienes en el método index
        $profesores = Profesor::where('id_carrera', $alumno->id_carrera)->get();
        $materias = Materias::all();
    
        // Pasar todos estos datos a la vista
        return view('alumno.SolicitudAsesoria', compact(
            'alumno',
            'grupo',
            'semestre',
            'carrera',
            'materias',
            'profesores',
            'solicitud'
        ));
    }
    
    
    public function listaSolicitudes()
    {
        $user = Auth::user();
        $alumno = $user->alumno;

        $solicitudes = solicitudasesoria::with('materia')
            ->where('id_alumno', $alumno->id_alumno)
            ->get();

        return view('alumno.ListaSolicitudes', compact('solicitudes', 'alumno'));
    }

    // En el controlador SolicitudAsesoriaController
    public function listaSolicitudes2($id)
    {
        // Obtener el alumno por ID
        $alumno = Alumno::findOrFail($id);
    
        // Obtener las solicitudes de asesoría para el alumno
        $solicitudes = SolicitudAsesoria::where('id_alumno', $id)->get();
    
        // Pasar el alumno y las solicitudes a la vista
        return view('maestro.listaSolicitudes', compact('alumno', 'solicitudes'));
    }


    public function ver2($id)
    {
        // Cargar la solicitud y las relaciones de materia y profesor
        $solicitud = solicitudasesoria::with('materia', 'profesor')->findOrFail($id);
    
        // Obtener los datos del alumno (relación con el usuario autenticado)
        $user = Auth::user();
        $alumno = $solicitud->alumno; // <-- Esto asume que tienes la relación 'alumno' en el modelo solicitudasesoria        
        $grupo = $alumno->grupo;       // Relación: belongsTo(Grupo::class)
        $carrera = $alumno->carrera;   // Relación: belongsTo(Carrera::class)
        $semestre = $alumno->grupo?->semestre; // Relación: belongsTo(Semestres::class)
    
        // Obtener los profesores y materias, según lo que ya tienes en el método index
        $profesores = Profesor::where('id_carrera', $alumno->id_carrera)->get();
        $materias = Materias::all();
    
        // Pasar todos estos datos a la vista
        return view('maestro.SolicitudAsesoria', compact(
            'alumno',
            'grupo',
            'semestre',
            'carrera',
            'materias',
            'profesores',
            'solicitud'
        ));
    }
}
