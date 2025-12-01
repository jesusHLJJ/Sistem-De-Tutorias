<?php

namespace App\Http\Controllers\Profesor;

use App\Http\Controllers\Controller;
use App\Models\Alumno;
use App\Models\Grupo;
use App\Models\Periodos;
use App\Models\Encuesta_organizacion_estudio;
use App\Models\Encuesta_tecnicas_estudio;
use App\Models\Encuesta_motivacion_estudio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB; // Asegúrate de agregar esto
use Illuminate\Http\Request;

class HabilidadesController extends Controller
{
    public function index()
    {
        //Estos por momento seran estaticos en 1

        $user = Auth::user();
        $alumno = $user->alumno;

        if (!$alumno) {
            abort(404, 'Alumno no encontrado');
        }
        /*Aqui vamos a buscar la encuesta por alumno para obtener las respuestas en caso de que haya contestado ya */
        $organizacion = Encuesta_organizacion_estudio::where('id_alumno', $alumno->id_alumno)->first();
        $tecnica = Encuesta_tecnicas_estudio::where('id_alumno', $alumno->id_alumno)->first();
        $motivacion = Encuesta_motivacion_estudio::where('id_alumno', $alumno->id_alumno)->first();

        return view(
            'alumno.Encuestahabilidades',
            compact(
                'alumno',
                'organizacion',
                'tecnica',
                'motivacion'
            )
        ); //Retornamos a las vistas el alumno (para generar el id_alumno_tutoria) y el id_periodo, en este caso mandaremos el 1
    }

    public function verDesdeMaestro($id_alumno)
    {
        $alumno = Alumno::findOrFail($id_alumno);

        $organizacion = Encuesta_organizacion_estudio::where('id_alumno', $alumno->id_alumno)->first();
        $tecnica = Encuesta_tecnicas_estudio::where('id_alumno', $alumno->id_alumno)->first();
        $motivacion = Encuesta_motivacion_estudio::where('id_alumno', $alumno->id_alumno)->first();

        return view(
            'maestro.Encuestahabilidades',
            compact(
                'alumno',
                'organizacion',
                'tecnica',
                'motivacion'
            )
        );
    }

    public function guardar(Request $request)
    {
        // Buscar o crear el registro con la referencia del id_alumno
        $organizacion = Encuesta_organizacion_estudio::firstOrNew(
            ['id_alumno' => $request->input('alumno_id')]
        );


        //Aqui inyectamos los datos de los id del formulario a la tabla (modelo)
        $organizacion->id_alumno = $request->input('alumno_id');

        //Aqui vamos a inyectar los datos, pero ya del formulario, o sea, lo que responde de si o no

        $organizacion->pregunta_1_organizacion = $request->input('pregunta1');
        $organizacion->pregunta_2_organizacion = $request->input('pregunta2');
        $organizacion->pregunta_3_organizacion = $request->input('pregunta3');
        $organizacion->pregunta_4_organizacion = $request->input('pregunta4');
        $organizacion->pregunta_5_organizacion = $request->input('pregunta5');
        $organizacion->pregunta_6_organizacion = $request->input('pregunta6');
        $organizacion->pregunta_7_organizacion = $request->input('pregunta7');
        $organizacion->pregunta_8_organizacion = $request->input('pregunta8');
        $organizacion->pregunta_9_organizacion = $request->input('pregunta9');
        $organizacion->pregunta_10_organizacion = $request->input('pregunta10');
        $organizacion->pregunta_11_organizacion = $request->input('pregunta11');
        $organizacion->pregunta_12_organizacion = $request->input('pregunta12');
        $organizacion->pregunta_13_organizacion = $request->input('pregunta13');
        $organizacion->pregunta_14_organizacion = $request->input('pregunta14');
        $organizacion->pregunta_15_organizacion = $request->input('pregunta15');
        $organizacion->pregunta_16_organizacion = $request->input('pregunta16');
        $organizacion->pregunta_17_organizacion = $request->input('pregunta17');
        $organizacion->pregunta_18_organizacion = $request->input('pregunta18');
        $organizacion->pregunta_19_organizacion = $request->input('pregunta19');
        $organizacion->pregunta_20_organizacion = $request->input('pregunta20');
        $organizacion->calificacion_final_organizacion = $request->input('total_no'); //obtenemos el total de no
        $organizacion->save(); //guardamos los datos

        return redirect()->back()->with('success', 'Datos guardados correctamente');
    }

    public function guardar2(Request $request)
    {

        $tecnica = Encuesta_tecnicas_estudio::firstOrNew(
            ['id_alumno' => $request->input('alumno_id')]
        );
        //Aqui inyectamos los datos de los id del formulario a la tabla (modelo)
        $tecnica->id_alumno = $request->input('alumno_id');

        //Aqui vamos a inyectar los datos, pero ya del formulario, o sea, lo que responde de si o no

        $tecnica->pregunta_1_tecnica = $request->input('pregunta21');
        $tecnica->pregunta_2_tecnica = $request->input('pregunta22');
        $tecnica->pregunta_3_tecnica = $request->input('pregunta23');
        $tecnica->pregunta_4_tecnica = $request->input('pregunta24');
        $tecnica->pregunta_5_tecnica = $request->input('pregunta25');
        $tecnica->pregunta_6_tecnica = $request->input('pregunta26');
        $tecnica->pregunta_7_tecnica = $request->input('pregunta27');
        $tecnica->pregunta_8_tecnica = $request->input('pregunta28');
        $tecnica->pregunta_9_tecnica = $request->input('pregunta29');
        $tecnica->pregunta_10_tecnica = $request->input('pregunta30');
        $tecnica->pregunta_11_tecnica = $request->input('pregunta31');
        $tecnica->pregunta_12_tecnica = $request->input('pregunta32');
        $tecnica->pregunta_13_tecnica = $request->input('pregunta33');
        $tecnica->pregunta_14_tecnica = $request->input('pregunta34');
        $tecnica->pregunta_15_tecnica = $request->input('pregunta35');
        $tecnica->pregunta_16_tecnica = $request->input('pregunta36');
        $tecnica->pregunta_17_tecnica = $request->input('pregunta37');
        $tecnica->pregunta_18_tecnica = $request->input('pregunta38');
        $tecnica->pregunta_19_tecnica = $request->input('pregunta39');
        $tecnica->pregunta_20_tecnica = $request->input('pregunta40');
        $tecnica->calificacion_final_tecnica = $request->input('total_no2'); //obtenemos el total de no
        $tecnica->save(); //guardamos los datos


        return redirect()->back()->with('success', 'Datos guardados correctamente');
    }

    public function guardar3(Request $request)
    {

        $motivacion = Encuesta_motivacion_estudio::firstOrNew(
            ['id_alumno' => $request->input('alumno_id')]
        );
        //Aqui inyectamos los datos de los id del formulario a la tabla (modelo)
        $motivacion->id_alumno = $request->input('alumno_id');

        //Aqui vamos a inyectar los datos, pero ya del formulario, o sea, lo que responde de si o no

        $motivacion->pregunta_1_motivacion = $request->input('pregunta41');
        $motivacion->pregunta_2_motivacion = $request->input('pregunta42');
        $motivacion->pregunta_3_motivacion = $request->input('pregunta43');
        $motivacion->pregunta_4_motivacion = $request->input('pregunta44');
        $motivacion->pregunta_5_motivacion = $request->input('pregunta45');
        $motivacion->pregunta_6_motivacion = $request->input('pregunta46');
        $motivacion->pregunta_7_motivacion = $request->input('pregunta47');
        $motivacion->pregunta_8_motivacion = $request->input('pregunta48');
        $motivacion->pregunta_9_motivacion = $request->input('pregunta49');
        $motivacion->pregunta_10_motivacion = $request->input('pregunta50');
        $motivacion->pregunta_11_motivacion = $request->input('pregunta51');
        $motivacion->pregunta_12_motivacion = $request->input('pregunta52');
        $motivacion->pregunta_13_motivacion = $request->input('pregunta53');
        $motivacion->pregunta_14_motivacion = $request->input('pregunta54');
        $motivacion->pregunta_15_motivacion = $request->input('pregunta55');
        $motivacion->pregunta_16_motivacion = $request->input('pregunta56');
        $motivacion->pregunta_17_motivacion = $request->input('pregunta57');
        $motivacion->pregunta_18_motivacion = $request->input('pregunta58');
        $motivacion->pregunta_19_motivacion = $request->input('pregunta59');
        $motivacion->pregunta_20_motivacion = $request->input('pregunta60');
        $motivacion->calificacion_final_motivacion = $request->input('total_no3'); //obtenemos el total de no
        $motivacion->save(); //guardamos los datos

        return redirect()->back()->with('success', 'Datos guardados correctamente');
    }

    public function graficar($grupo)
    {
        // Recuperar los datos que deseas graficar
        /* $data = Encuesta_organizacion_estudio::select('pregunta_1_organizacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_1_organizacion')
            ->get();*/
        $data = Encuesta_organizacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_organizacion_estudio.pregunta_1_organizacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_organizacion_estudio.pregunta_1_organizacion')
            ->get();


        /*$data_1 = Encuesta_organizacion_estudio::select('pregunta_2_organizacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_2_organizacion')
            ->get();*/
        $data_1 = Encuesta_organizacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_organizacion_estudio.pregunta_2_organizacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_organizacion_estudio.pregunta_2_organizacion')
            ->get();



        /*$data_2 = Encuesta_organizacion_estudio::select('pregunta_3_organizacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_3_organizacion')
            ->get();*/
        $data_2 = Encuesta_organizacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_organizacion_estudio.pregunta_3_organizacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_organizacion_estudio.pregunta_3_organizacion')
            ->get();



        /*$data_3 = Encuesta_organizacion_estudio::select('pregunta_4_organizacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_4_organizacion')
            ->get();*/
        $data_3 = Encuesta_organizacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_organizacion_estudio.pregunta_4_organizacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_organizacion_estudio.pregunta_4_organizacion')
            ->get();

        /*$data_4 = Encuesta_organizacion_estudio::select('pregunta_5_organizacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_5_organizacion')
            ->get();*/
        $data_4 = Encuesta_organizacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_organizacion_estudio.pregunta_5_organizacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_organizacion_estudio.pregunta_5_organizacion')
            ->get();


        /*$data_5 = Encuesta_organizacion_estudio::select('pregunta_6_organizacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_6_organizacion')
            ->get();*/
        $data_5 = Encuesta_organizacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_organizacion_estudio.pregunta_6_organizacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_organizacion_estudio.pregunta_6_organizacion')
            ->get();


        /*$data_6 = Encuesta_organizacion_estudio::select('pregunta_7_organizacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_7_organizacion')
            ->get();*/
        $data_6 = Encuesta_organizacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_organizacion_estudio.pregunta_7_organizacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_organizacion_estudio.pregunta_7_organizacion')
            ->get();


        /*$data_7 = Encuesta_organizacion_estudio::select('pregunta_8_organizacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_8_organizacion')
            ->get();*/
        $data_7 = Encuesta_organizacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_organizacion_estudio.pregunta_8_organizacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_organizacion_estudio.pregunta_8_organizacion')
            ->get();

        /*$data_8 = Encuesta_organizacion_estudio::select('pregunta_9_organizacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_9_organizacion')
            ->get();*/
        $data_8 = Encuesta_organizacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_organizacion_estudio.pregunta_9_organizacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_organizacion_estudio.pregunta_9_organizacion')
            ->get();


        /*$data_9 = Encuesta_organizacion_estudio::select('pregunta_10_organizacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_10_organizacion')
            ->get();*/
        $data_9 = Encuesta_organizacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_organizacion_estudio.pregunta_10_organizacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_organizacion_estudio.pregunta_10_organizacion')
            ->get();


        /*$data_10 = Encuesta_organizacion_estudio::select('pregunta_11_organizacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_11_organizacion')
            ->get();*/
        $data_10 = Encuesta_organizacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_organizacion_estudio.pregunta_11_organizacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_organizacion_estudio.pregunta_11_organizacion')
            ->get();



        /*$data_11 = Encuesta_organizacion_estudio::select('pregunta_12_organizacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_12_organizacion')
            ->get();*/
        $data_11 = Encuesta_organizacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_organizacion_estudio.pregunta_12_organizacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_organizacion_estudio.pregunta_12_organizacion')
            ->get();




        /*$data_12 = Encuesta_organizacion_estudio::select('pregunta_13_organizacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_13_organizacion')
            ->get();*/
        $data_12 = Encuesta_organizacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_organizacion_estudio.pregunta_13_organizacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_organizacion_estudio.pregunta_13_organizacion')
            ->get();


        /*$data_13 = Encuesta_organizacion_estudio::select('pregunta_14_organizacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_14_organizacion')
            ->get();*/
        $data_13 = Encuesta_organizacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_organizacion_estudio.pregunta_14_organizacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_organizacion_estudio.pregunta_14_organizacion')
            ->get();


        /*$data_14 = Encuesta_organizacion_estudio::select('pregunta_15_organizacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_15_organizacion')
            ->get();*/
        $data_14 = Encuesta_organizacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_organizacion_estudio.pregunta_15_organizacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_organizacion_estudio.pregunta_15_organizacion')
            ->get();



        /*$data_15 = Encuesta_organizacion_estudio::select('pregunta_16_organizacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_16_organizacion')
            ->get();*/
        $data_15 = Encuesta_organizacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_organizacion_estudio.pregunta_16_organizacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_organizacion_estudio.pregunta_16_organizacion')
            ->get();


        /*$data_16 = Encuesta_organizacion_estudio::select('pregunta_17_organizacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_17_organizacion')
            ->get();*/
        $data_16 = Encuesta_organizacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_organizacion_estudio.pregunta_17_organizacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_organizacion_estudio.pregunta_17_organizacion')
            ->get();


        /*$data_17 = Encuesta_organizacion_estudio::select('pregunta_18_organizacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_18_organizacion')
            ->get();*/
        $data_17 = Encuesta_organizacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_organizacion_estudio.pregunta_18_organizacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_organizacion_estudio.pregunta_18_organizacion')
            ->get();



        /*$data_18 = Encuesta_organizacion_estudio::select('pregunta_19_organizacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_19_organizacion')
            ->get();*/
        $data_18 = Encuesta_organizacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_organizacion_estudio.pregunta_19_organizacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_organizacion_estudio.pregunta_19_organizacion')
            ->get();

        /*$data_19 = Encuesta_organizacion_estudio::select('pregunta_20_organizacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_20_organizacion')
            ->get();*/
        $data_19 = Encuesta_organizacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_organizacion_estudio.pregunta_20_organizacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_organizacion_estudio.pregunta_20_organizacion')
            ->get();

        //tecnicas de estudios 

        /*$data_20 = Encuesta_tecnicas_estudio::select('pregunta_1_tecnica', DB::raw('count(*) as total'))
            ->groupBy('pregunta_1_tecnica')
            ->get();*/
        $data_20 = Encuesta_tecnicas_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_tecnicas_estudio.pregunta_1_tecnica', DB::raw('count(*) as total'))
            ->groupBy('encuesta_tecnicas_estudio.pregunta_1_tecnica')
            ->get();

        /*$data_21 = Encuesta_tecnicas_estudio::select('pregunta_2_tecnica', DB::raw('count(*) as total'))
            ->groupBy('pregunta_2_tecnica')
            ->get();*/
        $data_21 = Encuesta_tecnicas_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_tecnicas_estudio.pregunta_2_tecnica', DB::raw('count(*) as total'))
            ->groupBy('encuesta_tecnicas_estudio.pregunta_2_tecnica')
            ->get();

        /*$data_22 = Encuesta_tecnicas_estudio::select('pregunta_3_tecnica', DB::raw('count(*) as total'))
            ->groupBy('pregunta_3_tecnica')
            ->get();*/
        $data_22 = Encuesta_tecnicas_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_tecnicas_estudio.pregunta_3_tecnica', DB::raw('count(*) as total'))
            ->groupBy('encuesta_tecnicas_estudio.pregunta_3_tecnica')
            ->get();


        /*$data_23 = Encuesta_tecnicas_estudio::select('pregunta_4_tecnica', DB::raw('count(*) as total'))
            ->groupBy('pregunta_4_tecnica')
            ->get();*/
        $data_23 = Encuesta_tecnicas_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_tecnicas_estudio.pregunta_4_tecnica', DB::raw('count(*) as total'))
            ->groupBy('encuesta_tecnicas_estudio.pregunta_4_tecnica')
            ->get();



        /*$data_24 = Encuesta_tecnicas_estudio::select('pregunta_5_tecnica', DB::raw('count(*) as total'))
            ->groupBy('pregunta_5_tecnica')
            ->get();*/
        $data_24 = Encuesta_tecnicas_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_tecnicas_estudio.pregunta_5_tecnica', DB::raw('count(*) as total'))
            ->groupBy('encuesta_tecnicas_estudio.pregunta_5_tecnica')
            ->get();

        /*$data_25 = Encuesta_tecnicas_estudio::select('pregunta_6_tecnica', DB::raw('count(*) as total'))
            ->groupBy('pregunta_6_tecnica')
            ->get();*/
        $data_25 = Encuesta_tecnicas_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_tecnicas_estudio.pregunta_6_tecnica', DB::raw('count(*) as total'))
            ->groupBy('encuesta_tecnicas_estudio.pregunta_6_tecnica')
            ->get();

        /*$data_26 = Encuesta_tecnicas_estudio::select('pregunta_7_tecnica', DB::raw('count(*) as total'))
            ->groupBy('pregunta_7_tecnica')
            ->get();*/
        $data_26 = Encuesta_tecnicas_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_tecnicas_estudio.pregunta_7_tecnica', DB::raw('count(*) as total'))
            ->groupBy('encuesta_tecnicas_estudio.pregunta_7_tecnica')
            ->get();

        /*$data_27 = Encuesta_tecnicas_estudio::select('pregunta_8_tecnica', DB::raw('count(*) as total'))
            ->groupBy('pregunta_8_tecnica')
            ->get();*/
        $data_27 = Encuesta_tecnicas_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_tecnicas_estudio.pregunta_8_tecnica', DB::raw('count(*) as total'))
            ->groupBy('encuesta_tecnicas_estudio.pregunta_8_tecnica')
            ->get();

        /*$data_28 = Encuesta_tecnicas_estudio::select('pregunta_9_tecnica', DB::raw('count(*) as total'))
            ->groupBy('pregunta_9_tecnica')
            ->get();*/
        $data_28 = Encuesta_tecnicas_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_tecnicas_estudio.pregunta_9_tecnica', DB::raw('count(*) as total'))
            ->groupBy('encuesta_tecnicas_estudio.pregunta_9_tecnica')
            ->get();

        /*$data_29 = Encuesta_tecnicas_estudio::select('pregunta_10_tecnica', DB::raw('count(*) as total'))
            ->groupBy('pregunta_10_tecnica')
            ->get();*/
        $data_29 = Encuesta_tecnicas_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_tecnicas_estudio.pregunta_10_tecnica', DB::raw('count(*) as total'))
            ->groupBy('encuesta_tecnicas_estudio.pregunta_10_tecnica')
            ->get();


        /*$data_30 = Encuesta_tecnicas_estudio::select('pregunta_11_tecnica', DB::raw('count(*) as total'))
            ->groupBy('pregunta_11_tecnica')
            ->get();*/
        $data_30 = Encuesta_tecnicas_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_tecnicas_estudio.pregunta_11_tecnica', DB::raw('count(*) as total'))
            ->groupBy('encuesta_tecnicas_estudio.pregunta_11_tecnica')
            ->get();


        /*$data_31 = Encuesta_tecnicas_estudio::select('pregunta_12_tecnica', DB::raw('count(*) as total'))
            ->groupBy('pregunta_12_tecnica')
            ->get();*/
        $data_31 = Encuesta_tecnicas_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_tecnicas_estudio.pregunta_12_tecnica', DB::raw('count(*) as total'))
            ->groupBy('encuesta_tecnicas_estudio.pregunta_12_tecnica')
            ->get();

        /*$data_32 = Encuesta_tecnicas_estudio::select('pregunta_13_tecnica', DB::raw('count(*) as total'))
            ->groupBy('pregunta_13_tecnica')
            ->get();*/
        $data_32 = Encuesta_tecnicas_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_tecnicas_estudio.pregunta_13_tecnica', DB::raw('count(*) as total'))
            ->groupBy('encuesta_tecnicas_estudio.pregunta_13_tecnica')
            ->get();

        /*$data_33 = Encuesta_tecnicas_estudio::select('pregunta_14_tecnica', DB::raw('count(*) as total'))
            ->groupBy('pregunta_14_tecnica')
            ->get();*/
        $data_33 = Encuesta_tecnicas_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_tecnicas_estudio.pregunta_14_tecnica', DB::raw('count(*) as total'))
            ->groupBy('encuesta_tecnicas_estudio.pregunta_14_tecnica')
            ->get();

        /*$data_34 = Encuesta_tecnicas_estudio::select('pregunta_15_tecnica', DB::raw('count(*) as total'))
            ->groupBy('pregunta_15_tecnica')
            ->get();*/
        $data_34 = Encuesta_tecnicas_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_tecnicas_estudio.pregunta_15_tecnica', DB::raw('count(*) as total'))
            ->groupBy('encuesta_tecnicas_estudio.pregunta_15_tecnica')
            ->get();

        /*$data_35 = Encuesta_tecnicas_estudio::select('pregunta_16_tecnica', DB::raw('count(*) as total'))
            ->groupBy('pregunta_16_tecnica')
            ->get();*/
        $data_35 = Encuesta_tecnicas_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_tecnicas_estudio.pregunta_16_tecnica', DB::raw('count(*) as total'))
            ->groupBy('encuesta_tecnicas_estudio.pregunta_16_tecnica')
            ->get();

        /*$data_36 = Encuesta_tecnicas_estudio::select('pregunta_17_tecnica', DB::raw('count(*) as total'))
            ->groupBy('pregunta_17_tecnica')
            ->get();*/
        $data_36 = Encuesta_tecnicas_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_tecnicas_estudio.pregunta_17_tecnica', DB::raw('count(*) as total'))
            ->groupBy('encuesta_tecnicas_estudio.pregunta_17_tecnica')
            ->get();


        /*$data_37 = Encuesta_tecnicas_estudio::select('pregunta_18_tecnica', DB::raw('count(*) as total'))
            ->groupBy('pregunta_18_tecnica')
            ->get();*/
        $data_37 = Encuesta_tecnicas_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_tecnicas_estudio.pregunta_18_tecnica', DB::raw('count(*) as total'))
            ->groupBy('encuesta_tecnicas_estudio.pregunta_18_tecnica')
            ->get();


        /*$data_38 = Encuesta_tecnicas_estudio::select('pregunta_19_tecnica', DB::raw('count(*) as total'))
            ->groupBy('pregunta_19_tecnica')
            ->get();*/
        $data_38 = Encuesta_tecnicas_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_tecnicas_estudio.pregunta_19_tecnica', DB::raw('count(*) as total'))
            ->groupBy('encuesta_tecnicas_estudio.pregunta_19_tecnica')
            ->get();


        /*$data_39 = Encuesta_tecnicas_estudio::select('pregunta_20_tecnica', DB::raw('count(*) as total'))
            ->groupBy('pregunta_20_tecnica')
            ->get();*/
        $data_39 = Encuesta_tecnicas_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_tecnicas_estudio.pregunta_20_tecnica', DB::raw('count(*) as total'))
            ->groupBy('encuesta_tecnicas_estudio.pregunta_20_tecnica')
            ->get();


        //motivacion

        /*$data_40 = Encuesta_motivacion_estudio::select('pregunta_1_motivacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_1_motivacion')
            ->get();*/
        $data_40 = Encuesta_motivacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_motivacion_estudio.pregunta_1_motivacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_motivacion_estudio.pregunta_1_motivacion')
            ->get();

        /*$data_41 = Encuesta_motivacion_estudio::select('pregunta_2_motivacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_2_motivacion')
            ->get();*/
        $data_41 = Encuesta_motivacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_motivacion_estudio.pregunta_2_motivacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_motivacion_estudio.pregunta_2_motivacion')
            ->get();

        /*$data_42 = Encuesta_motivacion_estudio::select('pregunta_3_motivacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_3_motivacion')
            ->get();*/
        $data_42 = Encuesta_motivacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_motivacion_estudio.pregunta_3_motivacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_motivacion_estudio.pregunta_3_motivacion')
            ->get();

        /*$data_43 = Encuesta_motivacion_estudio::select('pregunta_4_motivacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_4_motivacion')
            ->get();*/
        $data_43 = Encuesta_motivacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_motivacion_estudio.pregunta_4_motivacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_motivacion_estudio.pregunta_4_motivacion')
            ->get();


        /*$data_44 = Encuesta_motivacion_estudio::select('pregunta_5_motivacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_5_motivacion')
            ->get();*/
        $data_44 = Encuesta_motivacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_motivacion_estudio.pregunta_5_motivacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_motivacion_estudio.pregunta_5_motivacion')
            ->get();

        /*$data_45 = Encuesta_motivacion_estudio::select('pregunta_6_motivacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_6_motivacion')
            ->get();*/
        $data_45 = Encuesta_motivacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_motivacion_estudio.pregunta_6_motivacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_motivacion_estudio.pregunta_6_motivacion')
            ->get();

        /*$data_46 = Encuesta_motivacion_estudio::select('pregunta_7_motivacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_7_motivacion')
            ->get();*/
        $data_46 = Encuesta_motivacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_motivacion_estudio.pregunta_7_motivacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_motivacion_estudio.pregunta_7_motivacion')
            ->get();

        /*$data_47 = Encuesta_motivacion_estudio::select('pregunta_8_motivacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_8_motivacion')
            ->get();*/
        $data_47 = Encuesta_motivacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_motivacion_estudio.pregunta_8_motivacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_motivacion_estudio.pregunta_8_motivacion')
            ->get();



        /*$data_48 = Encuesta_motivacion_estudio::select('pregunta_9_motivacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_9_motivacion')
            ->get();*/
        $data_48 = Encuesta_motivacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_motivacion_estudio.pregunta_9_motivacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_motivacion_estudio.pregunta_9_motivacion')
            ->get();


        /*$data_49 = Encuesta_motivacion_estudio::select('pregunta_10_motivacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_10_motivacion')
            ->get();*/
        $data_49 = Encuesta_motivacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_motivacion_estudio.pregunta_10_motivacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_motivacion_estudio.pregunta_10_motivacion')
            ->get();


        /*$data_50 = Encuesta_motivacion_estudio::select('pregunta_11_motivacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_11_motivacion')
            ->get();*/
        $data_50 = Encuesta_motivacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_motivacion_estudio.pregunta_11_motivacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_motivacion_estudio.pregunta_11_motivacion')
            ->get();


        /*$data_51 = Encuesta_motivacion_estudio::select('pregunta_12_motivacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_12_motivacion')
            ->get();*/
        $data_51 = Encuesta_motivacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_motivacion_estudio.pregunta_12_motivacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_motivacion_estudio.pregunta_12_motivacion')
            ->get();

        /*$data_52 = Encuesta_motivacion_estudio::select('pregunta_13_motivacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_13_motivacion')
            ->get();*/
        $data_52 = Encuesta_motivacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_motivacion_estudio.pregunta_13_motivacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_motivacion_estudio.pregunta_13_motivacion')
            ->get();


        /*$data_53 = Encuesta_motivacion_estudio::select('pregunta_14_motivacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_14_motivacion')
            ->get();*/
        $data_53 = Encuesta_motivacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_motivacion_estudio.pregunta_14_motivacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_motivacion_estudio.pregunta_14_motivacion')
            ->get();


        /*$data_54 = Encuesta_motivacion_estudio::select('pregunta_15_motivacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_15_motivacion')
            ->get();*/
        $data_54 = Encuesta_motivacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_motivacion_estudio.pregunta_15_motivacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_motivacion_estudio.pregunta_15_motivacion')
            ->get();


        /*$data_55 = Encuesta_motivacion_estudio::select('pregunta_16_motivacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_16_motivacion')
            ->get();*/
        $data_55 = Encuesta_motivacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_motivacion_estudio.pregunta_16_motivacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_motivacion_estudio.pregunta_16_motivacion')
            ->get();


        /*$data_56 = Encuesta_motivacion_estudio::select('pregunta_17_motivacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_17_motivacion')
            ->get();*/
        $data_56 = Encuesta_motivacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_motivacion_estudio.pregunta_17_motivacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_motivacion_estudio.pregunta_17_motivacion')
            ->get();


        /*$data_57 = Encuesta_motivacion_estudio::select('pregunta_18_motivacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_18_motivacion')
            ->get();*/
        $data_57 = Encuesta_motivacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_motivacion_estudio.pregunta_18_motivacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_motivacion_estudio.pregunta_18_motivacion')
            ->get();


        /*$data_58 = Encuesta_motivacion_estudio::select('pregunta_19_motivacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_19_motivacion')
            ->get();*/
        $data_58 = Encuesta_motivacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_motivacion_estudio.pregunta_19_motivacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_motivacion_estudio.pregunta_19_motivacion')
            ->get();


        /* $data_59 = Encuesta_motivacion_estudio::select('pregunta_20_motivacion', DB::raw('count(*) as total'))
            ->groupBy('pregunta_20_motivacion')
            ->get();*/
        $data_59 = Encuesta_motivacion_estudio::whereHas('alumno.grupo', function ($query) use ($grupo) {
            $query->where('clave_grupo', $grupo);
        })
            ->select('encuesta_motivacion_estudio.pregunta_20_motivacion', DB::raw('count(*) as total'))
            ->groupBy('encuesta_motivacion_estudio.pregunta_20_motivacion')
            ->get();


        // Buscar el objeto Grupo para pasarlo a la vista
        $grupo = Grupo::where('clave_grupo', $grupo)->firstOrFail();

        // Pasar los datos a la vista
        return view('maestro.graficarVista2', compact(
            'grupo',
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
            'data_39',
            'data_40',
            'data_41',
            'data_42',
            'data_43',
            'data_44',
            'data_45',
            'data_46',
            'data_47',
            'data_48',
            'data_49',
            'data_50',
            'data_51',
            'data_52',
            'data_53',
            'data_54',
            'data_55',
            'data_56',
            'data_57',
            'data_58',
            'data_59'
        ));
    }
}
