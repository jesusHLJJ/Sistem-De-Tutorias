<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Grupo;
use App\Models\Alumno;
use App\Models\Area_psicopedagogica;
use App\Models\Area_social;
use App\Models\Caracteristicas_personales;
use App\Models\Ficha_area_familiar;
use App\Models\Ficha_identificacion_estado_psicofisiologico;
use App\Models\Periodos;
use Illuminate\Support\Facades\DB;
use App\Models\Carrera;
use App\Models\FichaIdentificacionTutorado;
use Illuminate\Http\Request;

class MaestroController extends Controller
{
    public function show()
    {
        $user = Auth::user();
    
        return view('maestro.dashboard', [
            'maestro' => $user->maestro,
            'rol' => $user->role_id
        ]);
    }

    public function grupos()
    {
        $user = Auth::user();
        $maestro = $user->maestro;
    
        // Asegúrate de que $maestro no es null y tiene el campo id_profesor
        $grupos = Grupo::where('id_profesor', $maestro->id_profesor)->get();
    
        return view('maestro.mis_grupos', compact('grupos'));
    }
    public function mostrarGrupo($grupoId)
    {
        $grupo = Grupo::with('alumnos')->findOrFail($grupoId);
        return view('maestro.detalle_grupo', compact('grupo'));
    }

    public function seleccionarAlumno(Grupo $grupo)
    {
        $grupo->load('alumnos');
        return view('maestro.ficha_identificacion_select', compact('grupo'));
    }

    public function ficha($id_alumno)
    {
        // Buscar el alumno por su ID
        $alumno = Alumno::findOrFail($id_alumno);
    
        // Obtener las carreras y los periodos (si son necesarios)
        $carreras = Carrera::all();
        $periodo = Periodos::all();
        
        // Obtener la ficha del alumno
        $ficha = FichaIdentificacionTutorado::where('id_alumno', $alumno->id_alumno)->first();
    
        // Cargar los datos relacionados con la ficha
        $ficha_psicofisiologica = $ficha ? Ficha_identificacion_estado_psicofisiologico::where('id_ficha', $ficha->id_ficha)->first() : null;
        $ficha_area_familiar = $ficha ? Ficha_area_familiar::where('id_ficha', $ficha->id_ficha)->first() : null;
        $ficha_area_social = $ficha ? Area_social::where('id_ficha', $ficha->id_ficha)->first() : null;
        $ficha_caracteristicas_personales = $ficha ? Caracteristicas_personales::where('id_ficha', $ficha->id_ficha)->first() : null;
        $ficha_psicopedagogica = $ficha ? Area_psicopedagogica::where('id_ficha', $ficha->id_ficha)->first() : null;
    
        // Pasar los datos a la vista
        return view('maestro.ficha_id_profesor', compact(
            'alumno',
            'carreras',
            'periodo',
            'ficha',
            'ficha_psicofisiologica',
            'ficha_area_familiar',
            'ficha_area_social',
            'ficha_caracteristicas_personales',
            'ficha_psicopedagogica'
        ));
    }

    public function seleccionarVistaAlumno($id)
    {
        $alumno = Alumno::findOrFail($id);
        return view('maestro.seleccion', compact('alumno'));
    }
    public function graficar()
    {
        // Recuperar los datos que deseas graficar, por ejemplo, el indicador psicofisiológico 1
        $data = Ficha_identificacion_estado_psicofisiologico::select('indicador_psicofisiologico_1', DB::raw('count(*) as total'))
            ->groupBy('indicador_psicofisiologico_1')
            ->get();

        $data_1 = Ficha_identificacion_estado_psicofisiologico::select('indicador_psicofisiologico_2', DB::raw('count(*) as total'))
            ->groupBy('indicador_psicofisiologico_2')
            ->get();

        $data_2 = Ficha_identificacion_estado_psicofisiologico::select('indicador_psicofisiologico_3', DB::raw('count(*) as total'))
            ->groupBy('indicador_psicofisiologico_3')
            ->get();

        $data_3 = Ficha_identificacion_estado_psicofisiologico::select('indicador_psicofisiologico_4', DB::raw('count(*) as total'))
            ->groupBy('indicador_psicofisiologico_4')
            ->get();

        $data_4 = Ficha_identificacion_estado_psicofisiologico::select('indicador_psicofisiologico_5', DB::raw('count(*) as total'))
            ->groupBy('indicador_psicofisiologico_5')
            ->get();

        $data_5 = Ficha_identificacion_estado_psicofisiologico::select('indicador_psicofisiologico_6', DB::raw('count(*) as total'))
            ->groupBy('indicador_psicofisiologico_6')
            ->get();

        $data_6 = Ficha_identificacion_estado_psicofisiologico::select('indicador_psicofisiologico_7', DB::raw('count(*) as total'))
            ->groupBy('indicador_psicofisiologico_7')
            ->get();

        $data_7 = Ficha_identificacion_estado_psicofisiologico::select('indicador_psicofisiologico_8', DB::raw('count(*) as total'))
            ->groupBy('indicador_psicofisiologico_8')
            ->get();

        $data_8 = Ficha_identificacion_estado_psicofisiologico::select('indicador_psicofisiologico_9', DB::raw('count(*) as total'))
            ->groupBy('indicador_psicofisiologico_9')
            ->get();

        $data_9 = Ficha_identificacion_estado_psicofisiologico::select('indicador_psicofisiologico_10', DB::raw('count(*) as total'))
            ->groupBy('indicador_psicofisiologico_10')
            ->get();

        $data_10 = Ficha_identificacion_estado_psicofisiologico::select('indicador_psicofisiologico_11', DB::raw('count(*) as total'))
            ->groupBy('indicador_psicofisiologico_11')
            ->get();

        //Area familiar indicador numero: 8

        $data_11 = Ficha_area_familiar::select('indicador_8', DB::raw('count(*) as total'))
            ->groupBy('indicador_8')
            ->get();

        //Area Social indicador 1, 3, 
        $data_12 = Area_social::select('indicador_1', DB::raw('count(*) as total'))
            ->groupBy('indicador_1')
            ->get();

        $data_13 = Area_social::select('indicador_3', DB::raw('count(*) as total'))
            ->groupBy('indicador_3')
            ->get();

            //caracteristicas personales 

            $data_14 = Caracteristicas_personales::select('indicador_1', DB::raw('count(*) as total'))
            ->groupBy('indicador_1')
            ->get();
    
            $data_15 = Caracteristicas_personales::select('indicador_2', DB::raw('count(*) as total'))
            ->groupBy('indicador_2')
            ->get();
    
            $data_16 = Caracteristicas_personales::select('indicador_3', DB::raw('count(*) as total'))
            ->groupBy('indicador_3')
            ->get();
    
            $data_17 = Caracteristicas_personales::select('indicador_4', DB::raw('count(*) as total'))
            ->groupBy('indicador_4')
            ->get();
    
            $data_18 = Caracteristicas_personales::select('indicador_5', DB::raw('count(*) as total'))
            ->groupBy('indicador_5')
            ->get();
    
            $data_19 = Caracteristicas_personales::select('indicador_6', DB::raw('count(*) as total'))
            ->groupBy('indicador_6')
            ->get();
    
            $data_20 = Caracteristicas_personales::select('indicador_7', DB::raw('count(*) as total'))
            ->groupBy('indicador_7')
            ->get();
    
            $data_21 = Caracteristicas_personales::select('indicador_8', DB::raw('count(*) as total'))
            ->groupBy('indicador_8')
            ->get();
    
            $data_22 = Caracteristicas_personales::select('indicador_9', DB::raw('count(*) as total'))
            ->groupBy('indicador_9')
            ->get();
    
            $data_23 = Caracteristicas_personales::select('indicador_10', DB::raw('count(*) as total'))
            ->groupBy('indicador_10')
            ->get();
    
            $data_24 = Caracteristicas_personales::select('indicador_11', DB::raw('count(*) as total'))
            ->groupBy('indicador_11')
            ->get();
    
            $data_25 = Caracteristicas_personales::select('indicador_12', DB::raw('count(*) as total'))
            ->groupBy('indicador_12')
            ->get();
    
            $data_26 = Caracteristicas_personales::select('indicador_13', DB::raw('count(*) as total'))
            ->groupBy('indicador_13')
            ->get();
    
            $data_27 = Caracteristicas_personales::select('indicador_14', DB::raw('count(*) as total'))
            ->groupBy('indicador_14')
            ->get();
    
            $data_28 = Caracteristicas_personales::select('indicador_15', DB::raw('count(*) as total'))
            ->groupBy('indicador_15')
            ->get();
    
            $data_29 = Caracteristicas_personales::select('indicador_16', DB::raw('count(*) as total'))
            ->groupBy('indicador_16')
            ->get();
    
            $data_30 = Caracteristicas_personales::select('indicador_17', DB::raw('count(*) as total'))
            ->groupBy('indicador_17')
            ->get();
    
            $data_31 = Caracteristicas_personales::select('indicador_18', DB::raw('count(*) as total'))
            ->groupBy('indicador_18')
            ->get();
    
            $data_32 = Caracteristicas_personales::select('indicador_19', DB::raw('count(*) as total'))
            ->groupBy('indicador_19')
            ->get();
    
            $data_33 = Caracteristicas_personales::select('indicador_20', DB::raw('count(*) as total'))
            ->groupBy('indicador_20')
            ->get();
    
            $data_34 = Caracteristicas_personales::select('indicador_21', DB::raw('count(*) as total'))
            ->groupBy('indicador_21')
            ->get();
    
            $data_35 = Caracteristicas_personales::select('indicador_22', DB::raw('count(*) as total'))
            ->groupBy('indicador_22')
            ->get();
    
            $data_36 = Caracteristicas_personales::select('indicador_23', DB::raw('count(*) as total'))
            ->groupBy('indicador_23')
            ->get();
    
            $data_37 = Caracteristicas_personales::select('indicador_24', DB::raw('count(*) as total'))
            ->groupBy('indicador_24')
            ->get();
    
            $data_38 = Caracteristicas_personales::select('indicador_25', DB::raw('count(*) as total'))
            ->groupBy('indicador_25')
            ->get();
    
            //AREA Psicopedagógica IDICADOR: 8
            $data_39 = Area_psicopedagogica::select('indicador_psicopedagogico_8', DB::raw('count(*) as total'))
            ->groupBy('indicador_psicopedagogico_8')
            ->get();
   

        // Pasar los datos a la vista
        return view('maestro.graficarVista', compact(
            'data',
            'data_1',
            'data_2',
            'data_3',
            'data_4',
            'data_5',
            'data_6',
            'data_7',
            'data_8',
            'data_9',
            'data_10',
            'data_11',
            'data_12',
            'data_13',

            'data_14',
            'data_15',
            'data_16',
            'data_17',
            'data_18',
            'data_19',
            'data_20',
            'data_21',
            'data_22',
            'data_23',
            'data_24',
            'data_25',
            'data_26',
            'data_27',
            'data_28',
            'data_29',
            'data_30',
            'data_31',
            'data_32',
            'data_33',
            'data_34',
            'data_35',
            'data_36',
            'data_37',
            'data_38',
            'data_39'

        ));
    }
}