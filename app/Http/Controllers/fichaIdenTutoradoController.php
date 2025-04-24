<?php

namespace App\Http\Controllers;

use App\Models\Area_psicopedagogica;
use App\Models\Area_social;
use App\Models\Caracteristicas_personales;
use App\Models\Ficha_area_familiar;
use App\Models\Ficha_identificacion_estado_psicofisiologico;
use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Periodos;
use Illuminate\Support\Facades\Auth;
use App\Models\Carrera;
use App\Models\FichaIdentificacionTutorado;
use Illuminate\Support\Facades\DB; // Asegúrate de agregar esto
use Symfony\Component\Console\Input\Input;

class fichaIdenTutoradoController extends Controller
{

    public function index()
    {
        $user = Auth::user();
    $alumno = $user->alumno;
    
    if (!$alumno) {
        abort(404, 'Alumno no encontrado');
    }

    $carreras = Carrera::all();
    $periodo = Periodos::all();
    
    // Obtener la ficha existente, si la hay
    $ficha = FichaIdentificacionTutorado::where('id_alumno', $alumno->id_alumno_tutoria)->first();

    // Cargar datos relacionados
    $ficha_psicofisiologica = $ficha ? Ficha_identificacion_estado_psicofisiologico::where('id_ficha', $ficha->id_ficha)->first() : null;
    $ficha_area_familiar = $ficha ? Ficha_area_familiar::where('id_ficha', $ficha->id_ficha)->first() : null;
    $ficha_area_social = $ficha ? Area_social::where('id_ficha', $ficha->id_ficha)->first() : null;
    $ficha_caracteristicas_personales = $ficha ? Caracteristicas_personales::where('id_ficha', $ficha->id_ficha)->first() : null;
    $ficha_psicopedagogica = $ficha ? Area_psicopedagogica::where('id_ficha', $ficha->id_ficha)->first() : null;

    return view('alumno.fichaIdenTutorado', compact(
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
    public function guardar(Request $request)
    {

        // Buscar o crear una ficha para el alumno
        $ficha = FichaIdentificacionTutorado::firstOrNew(
            ['id_alumno' => $request->input('alumno_id')]
        );

        // Asignar o actualizar los valores de FichaIdentificacionTutorado

        $ficha->id_alumno = $request->input('alumno_id');
        $ficha->fecha = $request->input('fecha');
        $ficha->save();

        // Obtener el ID de ficha guardada
        $id_ficha = $ficha->id_ficha;

        // Guardar o actualizar datos en Ficha_identificacion_estado_psicofisiologico
        $ficha_1 = Ficha_identificacion_estado_psicofisiologico::firstOrNew(['id_ficha' => $id_ficha]);
        $ficha_1->indicador_psicofisiologico_1 = $request->input('manos_pies');
        $ficha_1->indicador_psicofisiologico_2 = $request->input('dolores_vientre');
        $ficha_1->indicador_psicofisiologico_3 = $request->input('dolores_cabeza');
        $ficha_1->indicador_psicofisiologico_4 = $request->input('equilibrio');
        $ficha_1->indicador_psicofisiologico_5 = $request->input('fatiga');
        $ficha_1->indicador_psicofisiologico_6 = $request->input('vista_oido');
        $ficha_1->indicador_psicofisiologico_7 = $request->input('dormir');
        $ficha_1->indicador_psicofisiologico_8 = $request->input('pesadillas');
        $ficha_1->indicador_psicofisiologico_9 = $request->input('incontinencia');
        $ficha_1->indicador_psicofisiologico_10 = $request->input('tartamudeo');
        $ficha_1->indicador_psicofisiologico_11 = $request->input('miedos');
        $ficha_1->save();

        // Guardar o actualizar datos en Ficha_area_familiar
        $ficha_2 = Ficha_area_familiar::firstOrNew(['id_ficha' => $id_ficha]);
        $ficha_2->indicador_1 = $request->input('relacion_familia');
        $ficha_2->indicador_2 = $request->input('dificultades_familia');
        $ficha_2->indicador_3 = $request->input('tipo_dificultades');
        $ficha_2->indicador_4 = $request->input('actitud_familia');
        $ficha_2->indicador_5 = $request->input('relacion_padre');
        $ficha_2->indicador_6 = $request->input('relacion_madre');
        $ficha_2->indicador_7 = $request->input('actitud_madre');
        $ficha_2->indicador_8 = $request->input('ligado_afectivamente');
        $ficha_2->indicador_9 = $request->input('ligado_afectivamente_razon');
        $ficha_2->indicador_10 = $request->input('ocupacion_educacion');
        $ficha_2->indicador_11 = $request->input('influencia_carrera');
        $ficha_2->save();

        // Guardar o actualizar datos en Area_social
        $ficha_3 = Area_social::firstOrNew(['id_ficha' => $id_ficha]);
        $ficha_3->indicador_1 = $request->input('relacion_companeros');
        $ficha_3->indicador_2 = $request->input('razon_companeros');
        $ficha_3->indicador_3 = $request->input('tienes_pareja');
        $ficha_3->indicador_4 = $request->input('relacion_pareja');
        $ficha_3->indicador_5 = $request->input('relacion_profesores');
        $ficha_3->indicador_6 = $request->input('relacion_autoridades');
        $ficha_3->indicador_7 = $request->input('tiempo_libre');
        $ficha_3->save();

        // Guardar o actualizar datos en Caracteristicas_personales
        $ficha_4 = Caracteristicas_personales::firstOrNew(['id_ficha' => $id_ficha]);
        $ficha_4->indicador_1 = $request->input('puntual');
        $ficha_4->indicador_2 = $request->input('timida');
        $ficha_4->indicador_3 = $request->input('alegre');
        $ficha_4->indicador_4 = $request->input('agresiva');
        $ficha_4->indicador_5 = $request->input('abierto');
        $ficha_4->indicador_6 = $request->input('reflexivo');
        $ficha_4->indicador_7 = $request->input('constante');
        $ficha_4->indicador_8 = $request->input('optimista');
        $ficha_4->indicador_9 = $request->input('impulsivo');
        $ficha_4->indicador_10 = $request->input('silencioso');
        $ficha_4->indicador_11 = $request->input('generoso');
        $ficha_4->indicador_12 = $request->input('inquieto');
        $ficha_4->indicador_13 = $request->input('cambios_humor');
        $ficha_4->indicador_14 = $request->input('dominante');
        $ficha_4->indicador_15 = $request->input('egoista');
        $ficha_4->indicador_16 = $request->input('sumiso');
        $ficha_4->indicador_17 = $request->input('confiado_en_si');
        $ficha_4->indicador_18 = $request->input('imaginativo');
        $ficha_4->indicador_19 = $request->input('con_iniciativa');
        $ficha_4->indicador_20 = $request->input('sociable');
        $ficha_4->indicador_21 = $request->input('responsable');
        $ficha_4->indicador_22 = $request->input('perseverante');
        $ficha_4->indicador_23 = $request->input('motivado');
        $ficha_4->indicador_24 = $request->input('activo');
        $ficha_4->indicador_25 = $request->input('independiente');
        $ficha_4->save();

        // Guardar o actualizar datos en Area_psicopedagogica
        $ficha_5 = Area_psicopedagogica::firstOrNew(['id_ficha' => $id_ficha]);
        $ficha_5->indicador_psicopedagogico_1 = $request->input('como_te_gustaria');
        $ficha_5->indicador_psicopedagogico_2 = $request->input('problemas_estudios');
        $ficha_5->indicador_psicopedagogico_3 = $request->input('rendimiento_escolar');
        $ficha_5->indicador_psicopedagogico_4 = $request->input('asignaturas_actuales');
        $ficha_5->indicador_psicopedagogico_5 = $request->input('asignatura_preferida');
        $ficha_5->indicador_psicopedagogico_6 = $request->input('asignatura_bajo_promedio');
        $ficha_5->indicador_psicopedagogico_7 = $request->input('motivo_tesi');
        $ficha_5->indicador_psicopedagogico_8 = $request->input('asignaturas_reprobadas');
        $ficha_5->indicador_psicopedagogico_9 = $request->input('cuales_reprobadas');
        $ficha_5->plan_vida_carrera_1 = $request->input('planes_inmediatos');
        $ficha_5->plan_vida_carrera_2 = $request->input('metas_vida');
        $ficha_5->caracteristicas_personales_1 =
            $request->input('yo_soy');
        $ficha_5->caracteristicas_personales_2 = $request->input('me_gusta');
        $ficha_5->caracteristicas_personales_3 = $request->input('aspiracion');
        $ficha_5->caracteristicas_personales_4 = $request->input('miedos');
        $ficha_5->caracteristicas_personales_5 = $request->input('logro');
        $ficha_5->save();

        return redirect()->back()->with('success', 'Datos guardados correctamente');
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
        return view('graficarVista', compact(
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
