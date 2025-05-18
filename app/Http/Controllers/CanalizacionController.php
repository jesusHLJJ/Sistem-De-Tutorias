<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Canalizacion;
use Illuminate\Support\Facades\Storage;
use App\Models\Canalizacioncita;
use Illuminate\Support\Facades\File;


class CanalizacionController extends Controller
{
    public function index($id_alumno)
    {
        $crear_canalizacion = '';
        $administrar_citas = '';


        $datos_alumno = Alumno::with('grupo.profesor', 'grupo.carrera.jefecarrera')->where('id_alumno', $id_alumno)->first();
        $estatus_canalizacion = Alumno::select('estatus_canalizacion')->where('id_alumno', $id_alumno)->first();
        if ($estatus_canalizacion->estatus_canalizacion == "PROCESO") {
            $crear_canalizacion = 'hidden';
            $administrar_citas = '';
        } else {
            $crear_canalizacion = '';
            $administrar_citas = 'hidden';
        }

        return view('maestro.canalizacion', compact('datos_alumno', 'crear_canalizacion', 'administrar_citas'));
    }

    public function crear(Request $datos_formulario, $id_alumno)
    {

        $datos_alumno = Alumno::where('id_alumno', $id_alumno)->first();
        $nombre_carpeta = $datos_alumno->matricula . strtolower($datos_alumno->nombre) . strtolower($datos_alumno->ap_paterno);
        $ruta_carpeta = 'canalizaciones/' . $nombre_carpeta;

        if (!Storage::disk('public')->exists($ruta_carpeta)) {
            Storage::disk('public')->makeDirectory($ruta_carpeta);
        }

        $datos_formulario->validate([
            'f_creacion' => 'required|date',
            'factores_motivan' => 'required|string',
            'observaciones' => 'nullable|string',
            'documentos_solicitud.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png,doc,docx',
        ]);

        $canalizacion = new Canalizacion();
        $canalizacion->id_alumno = $id_alumno;
        $canalizacion->fecha = $datos_formulario->f_creacion;
        $canalizacion->factores_motivacion = $datos_formulario->factores_motivan;
        $canalizacion->observaciones_problematica = $datos_formulario->observaciones;
        $canalizacion->save();

        if ($datos_formulario->hasFile('documentos_solicitud')) {
            foreach ($datos_formulario->file('documentos_solicitud') as $archivo) {
                $nombreOriginal = $archivo->getClientOriginalName();
                $archivo->storeAs($ruta_carpeta, $nombreOriginal, 'public');
            }
            $canalizacion->relacion_documentos_solicitud = $ruta_carpeta;
        }
        $canalizacion->save();
        $datos_alumno->estatus_canalizacion = 'PROCESO';
        $datos_alumno->save();

        return redirect()->back();
    }


    public function citas($id_alumno)
    {
        $datos_alumno = Alumno::with('canalizacion')->where('id_alumno', $id_alumno)->first();

        return view('maestro.canalizacioncitas', compact('datos_alumno'));
    }

    public function crearcita(Request $datos_formulario, $id_alumno)
    {
        $datos_alumno = Alumno::with('canalizacion.canalizacioncitas')->where('id_alumno', $id_alumno)->first();
        $id_canalizacion = $datos_alumno->canalizacion->id_canalizacion;




        $datos_formulario->validate([
            'fecha' => 'required|date',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
        ]);
        $agregar_cita_canalizacion = new Canalizacioncita();
        $agregar_cita_canalizacion->id_canalizacion = $id_canalizacion;
        $agregar_cita_canalizacion->fecha_cita_programada = $datos_formulario->fecha;
        $agregar_cita_canalizacion->horario_inicio = $datos_formulario->hora_inicio;
        $agregar_cita_canalizacion->horario_fin = $datos_formulario->hora_fin;
        $agregar_cita_canalizacion->save();
        return redirect()->back();
    }

    public function eliminarcita($id_cita)
    {
        Canalizacioncita::where('id_canalizacion_cita', $id_cita)->delete();
        return back();
    }

    public function verDocumentos($id_alumno)
    {

        $datos_alumno = Alumno::with('canalizacion')->findOrFail($id_alumno);
        $rutaCarpeta = storage_path('app/public/' . $datos_alumno->canalizacion->relacion_documentos_solicitud);
        $archivos = File::exists($rutaCarpeta) ? File::files($rutaCarpeta) : [];
        return view('maestro.canalizaciondocumentos', compact('datos_alumno', 'archivos'));
    }

    public function eliminarDocumento(Request $request)
    {
        $request->validate([
            'archivo' => 'required|string',
            'ruta' => 'required|string',
        ]);

        $rutaCompleta = storage_path('app/public/' . $request->ruta . '/' . $request->archivo);

        if (File::exists($rutaCompleta)) {
            File::delete($rutaCompleta);
            return back()->with('success', 'Documento eliminado correctamente.');
        } else {
            return back()->with('error', 'El archivo no existe.');
        }
    }

    public function subirDocumentoVista($id_alumno)
    {
        $datos_alumno = Alumno::with('canalizacion')->findOrFail($id_alumno);
        return view('maestro.canalizacionsubirdocumentos', compact('datos_alumno'));
    }

    public function subirDocumentoGuardar(Request $request)
    {
        $request->validate([
            'archivo' => 'required|file|mimes:pdf,doc,docx,png,jpg,jpeg',
            'ruta' => 'required|string'
        ]);

        $archivo = $request->file('archivo');
        $nombre = $archivo->getClientOriginalName();
        // $archivo->move(storage_path($request->ruta), $nombre);
        $destino = storage_path('app/public/' . $request->ruta); // se asume que $request->ruta contiene solo la parte después de 'public/'
        if (!file_exists($destino)) {
            mkdir($destino, 0755, true);
        }
        $archivo->move($destino, $nombre);

        return redirect()->back()->with('success', 'Documento subido correctamente.');
    }
}
