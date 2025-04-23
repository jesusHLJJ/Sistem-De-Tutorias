<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Tutorado</title>
</head>

<body>

    <h2>Ficha de Identificación del Tutorado</h2>
    <form action="{{ route('ficha.guardar') }}" method="POST">
        @csrf
        <label for="nombre">Nombre Completo:</label>
        <input type="text" name="alumno_nombre" value="{{ $alumno->nombre_completo }}" readonly>
        <input type="hidden" name="alumno_id" value="{{ $alumno->id_alumno_tutoria }}">

        <label for="carrera">Carrera a la que pertenece:</label>
        <select name="carrera_id" id="carrera" class="form-control" required>
            <option value="">Seleccionar carrera</option>
            @foreach($carreras as $carrera)
                <option value="{{ $carrera->id_carrera }}">{{ $carrera->carrera }}</option>
            @endforeach
        </select>
        
        <label for="periodo">Periodo en curso:</label>
        <select name="periodo_id" id="periodo" class="form-control" required>
            <option value="">Seleccionar el periodo</option>
            @foreach($periodo as $periodo)
                <option value="{{ $periodo->id_periodo }}">{{ $periodo->periodo }}</option>
            @endforeach
        </select>

        <label for="matricula">Número de matrícula:</label>
        <input type="text" name="matricula" value="{{ $alumno->matricula }}" readonly>

        <label for="semestre">Semestre:</label>
        <input type="text" name="semestre" value="{{ $alumno->semestre }}" readonly>

        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" readonly><br><br>
        
        <script>
            // Obtener la fecha actual en formato local
            const today = new Date();
            const options = { year: 'numeric', month: '2-digit', day: '2-digit' };
            const localDate = today.toLocaleDateString('en-CA', options); // 'en-CA' devuelve el formato YYYY-MM-DD
            // Establecer la fecha en el campo de entrada
            document.getElementById('fecha').value = localDate;
        </script>

        <label for="correo_electronico">Correo Electrónico:</label>
        <input type="email" name="correo_electronico" value="{{ $alumno->correo }}" readonly>

        <h2>Estado Psicofisiológico</h2>

        <table border="1">
            <tr>
                <th>Indicadores</th>
                <th>Frecuente</th>
                <th>Muy Frecuente</th>
                <th>Nunca</th>
                <th>Antes</th>
                <th>A veces</th>
            </tr>
            <tr>
                <td>Manos y/o pies hinchados</td>
                <td><input type="radio" name="manos_pies" value="frecuente" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_1 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="manos_pies" value="muy_frecuente" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_1 == 'muy_frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="manos_pies" value="nunca" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_1 == 'nunca' ? 'checked' : '' }}></td>
                <td><input type="radio" name="manos_pies" value="antes" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_1 == 'antes' ? 'checked' : '' }}></td>
                <td><input type="radio" name="manos_pies" value="a_veces" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_1 == 'a_veces' ? 'checked' : '' }}></td>
            </tr>
            <tr>
                <td>Dolores en el vientre</td>
                <td><input type="radio" name="dolores_vientre" value="frecuente" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_2 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="dolores_vientre" value="muy_frecuente" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_2 == 'muy_frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="dolores_vientre" value="nunca" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_2 == 'nunca' ? 'checked' : '' }}></td>
                <td><input type="radio" name="dolores_vientre" value="antes" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_2 == 'antes' ? 'checked' : '' }}></td>
                <td><input type="radio" name="dolores_vientre" value="a_veces" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_2 == 'a_veces' ? 'checked' : '' }}></td>
            </tr>
            <tr>
                <td>Dolores de cabeza y/o vómitos</td>
                <td><input type="radio" name="dolores_cabeza" value="frecuente" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_3 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="dolores_cabeza" value="muy_frecuente" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_3 == 'muy_frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="dolores_cabeza" value="nunca" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_3 == 'nunca' ? 'checked' : '' }}></td>
                <td><input type="radio" name="dolores_cabeza" value="antes" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_3 == 'antes' ? 'checked' : '' }}></td>
                <td><input type="radio" name="dolores_cabeza" value="a_veces" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_3 == 'a_veces' ? 'checked' : '' }}></td>
            </tr>
            <tr>
                <td>Pérdida del equilibrio</td>
                <td><input type="radio" name="equilibrio" value="frecuente" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_4 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="equilibrio" value="muy_frecuente" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_4 == 'muy_frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="equilibrio" value="nunca" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_4 == 'nunca' ? 'checked' : '' }}></td>
                <td><input type="radio" name="equilibrio" value="antes" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_4 == 'antes' ? 'checked' : '' }}></td>
                <td><input type="radio" name="equilibrio" value="a_veces" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_4 == 'a_veces' ? 'checked' : '' }}></td>
            </tr>
            <tr>
                <td>Fatiga y agotamiento</td>
                <td><input type="radio" name="fatiga" value="frecuente" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_5 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="fatiga" value="muy_frecuente" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_5 == 'muy_frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="fatiga" value="nunca" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_5 == 'nunca' ? 'checked' : '' }}></td>
                <td><input type="radio" name="fatiga" value="antes" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_5 == 'antes' ? 'checked' : '' }}></td>
                <td><input type="radio" name="fatiga" value="a_veces"  {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_5 == 'a_veces' ? 'checked' : '' }}></td>
            </tr>
            <tr>
                <td>Pérdida de vista u oído</td>
                <td><input type="radio" name="vista_oido" value="frecuente" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_6 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="vista_oido" value="muy_frecuente" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_6 == 'muy_frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="vista_oido" value="nunca" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_6 == 'nunca' ? 'checked' : '' }}></td>
                <td><input type="radio" name="vista_oido" value="antes" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_6 == 'antes' ? 'checked' : '' }}></td>
                <td><input type="radio" name="vista_oido" value="a_veces"  {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_6 == 'a_veces' ? 'checked' : '' }}></td>
            </tr>
            <tr>
                <td>Dificultades para dormir</td>
                <td><input type="radio" name="dormir" value="frecuente" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_7 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="dormir" value="muy_frecuente" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_7 == 'muy_frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="dormir" value="nunca" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_7 == 'nunca' ? 'checked' : '' }}></td>
                <td><input type="radio" name="dormir" value="antes" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_7 == 'antes' ? 'checked' : '' }}></td>
                <td><input type="radio" name="dormir" value="a_veces"  {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_7 == 'a_veces' ? 'checked' : '' }}></td>
            </tr>
            <tr>
                <td>Pesadillas o terrores nocturnos</td>
                <td><input type="radio" name="pesadillas" value="frecuente" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_8 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="pesadillas" value="muy_frecuente" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_8 == 'muy_frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="pesadillas" value="nunca" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_8 == 'nunca' ? 'checked' : '' }}></td>
                <td><input type="radio" name="pesadillas" value="antes" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_8 == 'antes' ? 'checked' : '' }}></td>
                <td><input type="radio" name="pesadillas" value="a_veces"  {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_8 == 'a_veces' ? 'checked' : '' }}></td>
            </tr>
            <tr>
                <td>Incontinencia (orina/heces)</td>
                <td><input type="radio" name="incontinencia" value="frecuente" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_9 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="incontinencia" value="muy_frecuente" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_9 == 'muy_frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="incontinencia" value="nunca" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_9 == 'nunca' ? 'checked' : '' }}></td>
                <td><input type="radio" name="incontinencia" value="antes" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_9 == 'antes' ? 'checked' : '' }}></td>
                <td><input type="radio" name="incontinencia" value="a_veces"  {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_9 == 'a_veces' ? 'checked' : '' }}></td>
            </tr>
            <tr>
                <td>Tartamudeos al explicarse</td>
                <td><input type="radio" name="tartamudeo" value="frecuente" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_10 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="tartamudeo" value="muy_frecuente" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_10 == 'muy_frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="tartamudeo" value="nunca" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_10 == 'nunca' ? 'checked' : '' }}></td>
                <td><input type="radio" name="tartamudeo" value="antes" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_10 == 'antes' ? 'checked' : '' }}></td>
                <td><input type="radio" name="tartamudeo" value="a_veces"  {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_10 == 'a_veces' ? 'checked' : '' }}></td>
            </tr>
            <tr>
                <td>Miedos intensos ante cosas</td>
                <td><input type="radio" name="miedos" value="frecuente" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_10 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="miedos" value="muy_frecuente" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_10 == 'muy_frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="miedos" value="nunca" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_10 == 'nunca' ? 'checked' : '' }}></td>
                <td><input type="radio" name="miedos" value="antes" {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_10 == 'antes' ? 'checked' : '' }}></td>
                <td><input type="radio" name="miedos" value="a_veces"  {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->indicador_psicofisiologico_10 == 'a_veces' ? 'checked' : '' }}></td>
            </tr>
        </table>

        <h2>Área Familiar</h2>
        <label for="relacion_familia">¿Cómo es la relación con tu familia?</label><br>
        <textarea id="relacion_familia" name="relacion_familia" rows="3" cols="50">{{ $ficha_area_familiar->indicador_1 ?? '' }}</textarea><br><br>
        
        <label for="dificultades_familia">¿Existen dificultades?</label><br>
        <textarea id="dificultades_familia" name="dificultades_familia" rows="3" cols="50">{{ $ficha_area_familiar->indicador_2 ?? '' }}</textarea><br><br>
        
        <label for="tipo_dificultades">¿De qué tipo?</label><br>
        <textarea id="tipo_dificultades" name="tipo_dificultades" rows="3" cols="50">{{ $ficha_area_familiar->indicador_3 ?? '' }}</textarea><br><br>
        
        <label for="actitud_familia">¿Qué actitud tienes con tu familia?</label><br>
        <textarea id="actitud_familia" name="actitud_familia" rows="3" cols="50">{{ $ficha_area_familiar->indicador_4 ?? '' }}</textarea><br><br>
        
        <label for="relacion_padre">¿Cómo te relacionas con tu padre?</label><br>
        <textarea id="relacion_padre" name="relacion_padre" rows="3" cols="50">{{ $ficha_area_familiar->indicador_5 ?? '' }}</textarea><br><br>
        
        <label for="relacion_madre">¿Cómo te relacionas con tu madre?</label><br>
        <textarea id="relacion_madre" name="relacion_madre" rows="3" cols="50">{{ $ficha_area_familiar->indicador_6 ?? '' }}</textarea><br><br>
        
        <label for="actitud_madre">¿Qué actitud tienes hacia tu madre?</label><br>
        <textarea id="actitud_madre" name="actitud_madre" rows="3" cols="50">{{ $ficha_area_familiar->indicador_7 ?? '' }}</textarea><br><br>
        
        <label>¿Con quién te sientes más ligado afectivamente?</label><br>
        <input type="checkbox" name="ligado_afectivamente" value="madre" {{ (isset($ficha_area_familiar) && $ficha_area_familiar->indicador_8 == 'madre') ? 'checked' : '' }}> Madre<br>
        <input type="checkbox" name="ligado_afectivamente" value="padre" {{ (isset($ficha_area_familiar) && $ficha_area_familiar->indicador_8 == 'padre') ? 'checked' : '' }}> Padre<br>
        <input type="checkbox" name="ligado_afectivamente" value="hermanos" {{ (isset($ficha_area_familiar) && $ficha_area_familiar->indicador_8 == 'hermanos') ? 'checked' : '' }}> Hermanos<br>
        <input type="checkbox" name="ligado_afectivamente" value="otros" {{ (isset($ficha_area_familiar) && $ficha_area_familiar->indicador_8 == 'otros') ? 'checked' : '' }}> Otros<br><br>
        
        <label for="ligado_afectivamente_razon">Especifica por qué</label><br>
        <textarea id="ligado_afectivamente_razon" name="ligado_afectivamente_razon" rows="3" cols="50">{{ $ficha_area_familiar->indicador_9 ?? '' }}</textarea><br><br>
        
        <label for="ocupacion_educacion">¿Quién se ocupa más directamente de tu educación?</label><br>
        <textarea id="ocupacion_educacion" name="ocupacion_educacion" rows="3" cols="50">{{ $ficha_area_familiar->indicador_10 ?? '' }}</textarea><br><br>
        
        <label for="influencia_carrera">¿Quién ha influido más en tu decisión para estudiar esta carrera?</label><br>
        <textarea id="influencia_carrera" name="influencia_carrera" rows="3" cols="50">{{ $ficha_area_familiar->indicador_11 ?? '' }}</textarea><br><br>
        

        <h2>Área Social</h2>

        <label>¿Cómo es tu relación con tus compañeros?</label><br>
        <input type="radio" name="relacion_companeros" value="buena" {{ (isset($ficha_area_social) && $ficha_area_social->indicador_1 == 'buena') ? 'checked' : '' }}> Buena<br>
        <input type="radio" name="relacion_companeros" value="regular" {{ (isset($ficha_area_social) && $ficha_area_social->indicador_1 == 'regular') ? 'checked' : '' }}> Regular<br>
        <input type="radio" name="relacion_companeros" value="mala" {{ (isset($ficha_area_social) && $ficha_area_social->indicador_1 == 'mala') ? 'checked' : '' }}> Mala<br><br>
        
        <label for="razon_companeros">¿Por qué?</label><br>
        <textarea id="razon_companeros" name="razon_companeros" rows="3" cols="50">{{ $ficha_area_social->indicador_2 ?? '' }}</textarea><br><br>
        
        <label for="tienes_pareja">¿Tienes pareja?</label><br>
        <input type="radio" name="tienes_pareja" value="si" {{ (isset($ficha_area_social) && $ficha_area_social->indicador_3 == 'si') ? 'checked' : '' }}> Sí<br>
        <input type="radio" name="tienes_pareja" value="no" {{ (isset($ficha_area_social) && $ficha_area_social->indicador_3 == 'no') ? 'checked' : '' }}> No<br><br>
        
        <label for="relacion_pareja">¿Cómo es tu relación con tu pareja?</label><br>
        <textarea id="relacion_pareja" name="relacion_pareja" rows="3" cols="50">{{ $ficha_area_social->indicador_4 ?? '' }}</textarea><br><br>
        
        <label for="relacion_profesores">¿Cómo es tu relación con tus profesores?</label><br>
        <textarea id="relacion_profesores" name="relacion_profesores" rows="3" cols="50">{{ $ficha_area_social->indicador_5 ?? '' }}</textarea><br><br>
        
        <label for="relacion_autoridades">¿Cómo es tu relación con las autoridades académicas?</label><br>
        <textarea id="relacion_autoridades" name="relacion_autoridades" rows="3" cols="50">{{ $ficha_area_social->indicador_6 ?? '' }}</textarea><br><br>
        
        <label for="tiempo_libre">¿Qué haces en tu tiempo libre?</label><br>
        <textarea id="tiempo_libre" name="tiempo_libre" rows="3" cols="50">{{ $ficha_area_social->indicador_7 ?? '' }}</textarea><br><br>
        
        <!-- Características Personales -->
        <h2>Características Personales</h2>

        <table border="1">
            <tr>
                <th>Auto percepción</th>
                <th>No</th>
                <th>Poco</th>
                <th>Frecuente</th>
                <th>Mucho</th>
                <th>Observaciones</th>
            </tr>
            <tr>
                <td>Puntual</td>
                <td><input type="radio" name="puntual" value="no" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_1 == 'no' ? 'checked' : '' }}></td>
                <td><input type="radio" name="puntual" value="poco" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_1  == 'poco' ? 'checked' : '' }}></td>
                <td><input type="radio" name="puntual" value="frecuente" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_1 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="puntual" value="mucho" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_1 == 'mucho' ? 'checked' : '' }}></td>
                <td><input type="text" name="observaciones_puntual"></td>
            </tr>
            <tr>
                <td>Tímida</td>
                <td><input type="radio" name="timida" value="no" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_2 == 'no' ? 'checked' : '' }}></td>
                <td><input type="radio" name="timida" value="poco" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_2 == 'poco' ? 'checked' : '' }}></td>
                <td><input type="radio" name="timida" value="frecuente" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_2 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="timida" value="mucho" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_2 == 'mucho' ? 'checked' : '' }}></td>
                <td><input type="text" name="observaciones_timida"></td>
            </tr>
            <tr>
                <td>Alegre</td>
                <td><input type="radio" name="alegre" value="no" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_3 == 'no' ? 'checked' : '' }}></td>
                <td><input type="radio" name="alegre" value="poco" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_3 == 'poco' ? 'checked' : '' }}></td>
                <td><input type="radio" name="alegre" value="frecuente" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_3 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="alegre" value="mucho" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_3 == 'mucho' ? 'checked' : '' }}></td>
                <td><input type="text" name="observaciones_alegre"></td>
            </tr>
            <tr>
                <td>Agresiva</td>
                <td><input type="radio" name="agresiva" value="no" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_4 == 'no' ? 'checked' : '' }}></td>
                <td><input type="radio" name="agresiva" value="poco" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_4 == 'poco' ? 'checked' : '' }}></td>
                <td><input type="radio" name="agresiva" value="frecuente" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_4 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="agresiva" value="mucho" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_4 == 'mucho' ? 'checked' : '' }}></td>
                <td><input type="text" name="observaciones_agresiva"></td>
            </tr>

            <tr>
                <td>Abierto/a a las ideas de otros</td>
                <td><input type="radio" name="abierto" value="no" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_5 == 'no' ? 'checked' : '' }}></td>
                <td><input type="radio" name="abierto" value="poco" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_5 == 'poco' ? 'checked' : '' }}></td>
                <td><input type="radio" name="abierto" value="frecuente" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_5 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="abierto" value="mucho" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_5 == 'mucho' ? 'checked' : '' }}></td>
                <td><input type="text" name="observaciones_abierto"></td>
            </tr>
            <tr>
                <td>Reflexivo/a</td>
                <td><input type="radio" name="reflexivo" value="no" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_6 == 'no' ? 'checked' : '' }}></td>
                <td><input type="radio" name="reflexivo" value="poco" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_6 == 'poco' ? 'checked' : '' }}></td>
                <td><input type="radio" name="reflexivo" value="frecuente" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_6 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="reflexivo" value="mucho" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_6 == 'mucho' ? 'checked' : '' }}></td>
                <td><input type="text" name="observaciones_reflexivo"></td>
            </tr>
            <tr>
                <td>Constante</td>
                <td><input type="radio" name="constante" value="no" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_7 == 'no' ? 'checked' : '' }}></td>
                <td><input type="radio" name="constante" value="poco" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_7 == 'poco' ? 'checked' : '' }}></td>
                <td><input type="radio" name="constante" value="frecuente" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_7 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="constante" value="mucho" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_7 == 'mucho' ? 'checked' : '' }}></td>
                <td><input type="text" name="observaciones_constante"></td>
            </tr>
            <tr>
                <td>Optimista</td>
                <td><input type="radio" name="optimista" value="no" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_8 == 'no' ? 'checked' : '' }}></td>
                <td><input type="radio" name="optimista" value="poco" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_8 == 'poco' ? 'checked' : '' }}></td>
                <td><input type="radio" name="optimista" value="frecuente" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_8 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="optimista" value="mucho" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_8 == 'mucho' ? 'checked' : '' }}></td>
                <td><input type="text" name="observaciones_optimista"></td>
            </tr>
            <tr>
                <td>Impulsivo/a</td>
                <td><input type="radio" name="impulsivo" value="no" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_9 == 'no' ? 'checked' : '' }}></td>
                <td><input type="radio" name="impulsivo" value="poco" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_9 == 'poco' ? 'checked' : '' }}></td>
                <td><input type="radio" name="impulsivo" value="frecuente" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_9 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="impulsivo" value="mucho" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_9 == 'mucho' ? 'checked' : '' }}></td>
                <td><input type="text" name="observaciones_impulsivo"></td>
            </tr>
            <tr>
                <td>Silencioso</td>
                <td><input type="radio" name="silencioso" value="no" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_10 == 'no' ? 'checked' : '' }}></td>
                <td><input type="radio" name="silencioso" value="poco" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_10 == 'poco' ? 'checked' : '' }}></td>
                <td><input type="radio" name="silencioso" value="frecuente" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_10 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="silencioso" value="mucho" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_10 == 'mucho' ? 'checked' : '' }}></td>
                <td><input type="text" name="observaciones_silencioso"></td>
            </tr>
            <tr>
                <td>Generoso</td>
                <td><input type="radio" name="generoso" value="no" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_11 == 'no' ? 'checked' : '' }}></td>
                <td><input type="radio" name="generoso" value="poco" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_11 == 'poco' ? 'checked' : '' }}></td>
                <td><input type="radio" name="generoso" value="frecuente" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_11 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="generoso" value="mucho" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_11 == 'mucho' ? 'checked' : '' }}></td>
                <td><input type="text" name="observaciones_generoso"></td>
            </tr>
            <tr>
                <td>Inquieto</td>
                <td><input type="radio" name="inquieto" value="no" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_12 == 'no' ? 'checked' : '' }}></td>
                <td><input type="radio" name="inquieto" value="poco" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_12 == 'poco' ? 'checked' : '' }}></td>
                <td><input type="radio" name="inquieto" value="frecuente" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_12 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="inquieto" value="mucho" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_12 == 'mucho' ? 'checked' : '' }}></td>
                <td><input type="text" name="observaciones_inquieto"></td>
            </tr>
            <tr>
                <td>Cambios de humor</td>
                <td><input type="radio" name="cambios_humor" value="no" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_13 == 'no' ? 'checked' : '' }}></td>
                <td><input type="radio" name="cambios_humor" value="poco" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_13 == 'poco' ? 'checked' : '' }}></td>
                <td><input type="radio" name="cambios_humor" value="frecuente" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_13 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="cambios_humor" value="mucho" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_13 == 'mucho' ? 'checked' : '' }}></td>
                <td><input type="text" name="observaciones_cambios_humor"></td>
            </tr>
            <tr>
                <td>Dominante</td>
                <td><input type="radio" name="dominante" value="no" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_14 == 'no' ? 'checked' : '' }}></td>
                <td><input type="radio" name="dominante" value="poco" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_14 == 'poco' ? 'checked' : '' }}></td>
                <td><input type="radio" name="dominante" value="frecuente" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_14 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="dominante" value="mucho" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_14 == 'mucho' ? 'checked' : '' }}></td>
                <td><input type="text" name="observaciones_dominante"></td>
            </tr>
            <tr>
                <td>Egoísta</td>
                <td><input type="radio" name="egoista" value="no" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_15 == 'no' ? 'checked' : '' }}></td>
                <td><input type="radio" name="egoista" value="poco" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_15 == 'poco' ? 'checked' : '' }}></td>
                <td><input type="radio" name="egoista" value="frecuente" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_15 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="egoista" value="mucho" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_15 == 'mucho' ? 'checked' : '' }}></td>
                <td><input type="text" name="observaciones_egoista"></td>
            </tr>
            <tr>
                <td>Sumiso</td>
                <td><input type="radio" name="sumiso" value="no" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_16 == 'no' ? 'checked' : '' }}></td>
                <td><input type="radio" name="sumiso" value="poco" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_16 == 'poco' ? 'checked' : '' }}></td>
                <td><input type="radio" name="sumiso" value="frecuente" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_16 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="sumiso" value="mucho" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_16 == 'mucho' ? 'checked' : '' }}></td>
                <td><input type="text" name="observaciones_sumiso"></td>
            </tr>

            <tr>
                <td>Confiado en sí mismo</td>
                <td><input type="radio" name="confiado_en_si" value="no" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_17 == 'no' ? 'checked' : '' }}></td>
                <td><input type="radio" name="confiado_en_si" value="poco" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_17 == 'poco' ? 'checked' : '' }}></td>
                <td><input type="radio" name="confiado_en_si" value="frecuente" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_17 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="confiado_en_si" value="mucho" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_17 == 'mucho' ? 'checked' : '' }}></td>
                <td><input type="text" name="observaciones_confiado_en_si"></td>
            </tr>
            <tr>
                <td>Imaginativo</td>
                <td><input type="radio" name="imaginativo" value="no" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_18 == 'no' ? 'checked' : '' }}></td>
                <td><input type="radio" name="imaginativo" value="poco" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_18 == 'poco' ? 'checked' : '' }}></td>
                <td><input type="radio" name="imaginativo" value="frecuente" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_18 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="imaginativo" value="mucho" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_18 == 'mucho' ? 'checked' : '' }}></td>
                <td><input type="text" name="observaciones_imaginativo"></td>
            </tr>
            <tr>
                <td>Con iniciativa propia</td>
                <td><input type="radio" name="con_iniciativa" value="no" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_19 == 'no' ? 'checked' : '' }}></td>
                <td><input type="radio" name="con_iniciativa" value="poco" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_19 == 'poco' ? 'checked' : '' }}></td>
                <td><input type="radio" name="con_iniciativa" value="frecuente" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_19 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="con_iniciativa" value="mucho" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_19 == 'mucho' ? 'checked' : '' }}></td>
                <td><input type="text" name="observaciones_con_iniciativa"></td>
            </tr>
            <tr>
                <td>Sociable</td>
                <td><input type="radio" name="sociable" value="no" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_20 == 'no' ? 'checked' : '' }}></td>
                <td><input type="radio" name="sociable" value="poco" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_20 == 'poco' ? 'checked' : '' }}></td>
                <td><input type="radio" name="sociable" value="frecuente" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_20 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="sociable" value="mucho" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_20 == 'mucho' ? 'checked' : '' }}></td>
                <td><input type="text" name="observaciones_sociable"></td>
            </tr>
            <tr>
                <td>Responsable</td>
                <td><input type="radio" name="responsable" value="no" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_21 == 'no' ? 'checked' : '' }}></td>
                <td><input type="radio" name="responsable" value="poco" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_21 == 'poco' ? 'checked' : '' }}></td>
                <td><input type="radio" name="responsable" value="frecuente" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_21 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="responsable" value="mucho" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_21 == 'mucho' ? 'checked' : '' }}></td>
                <td><input type="text" name="observaciones_responsable"></td>
            </tr>
            <tr>
                <td>Perseverante</td>
                <td><input type="radio" name="perseverante" value="no" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_22 == 'no' ? 'checked' : '' }}></td>
                <td><input type="radio" name="perseverante" value="poco" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_22 == 'poco' ? 'checked' : '' }}></td>
                <td><input type="radio" name="perseverante" value="frecuente" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_22 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="perseverante" value="mucho" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_22 == 'mucho' ? 'checked' : '' }}></td>
                <td><input type="text" name="observaciones_perseverante"></td>
            </tr>
            <tr>
                <td>Motivado</td>
                <td><input type="radio" name="motivado" value="no" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_23 == 'no' ? 'checked' : '' }}></td>
                <td><input type="radio" name="motivado" value="poco" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_23 == 'poco' ? 'checked' : '' }}></td>
                <td><input type="radio" name="motivado" value="frecuente" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_23 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="motivado" value="mucho" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_23 == 'mucho' ? 'checked' : '' }}></td>
                <td><input type="text" name="observaciones_motivado"></td>
            </tr>
            <tr>
                <td>Activo</td>
                <td><input type="radio" name="activo" value="no" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_24 == 'no' ? 'checked' : '' }}></td>
                <td><input type="radio" name="activo" value="poco" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_24 == 'poco' ? 'checked' : '' }}></td>
                <td><input type="radio" name="activo" value="frecuente" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_24 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="activo" value="mucho" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_24 == 'mucho' ? 'checked' : '' }}></td>
                <td><input type="text" name="observaciones_activo"></td>
            </tr>
            <tr>
                <td>Independiente</td>
                <td><input type="radio" name="independiente" value="no" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_25 == 'no' ? 'checked' : '' }}></td>
                <td><input type="radio" name="independiente" value="poco" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_25 == 'poco' ? 'checked' : '' }}></td>
                <td><input type="radio" name="independiente" value="frecuente" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_25 == 'frecuente' ? 'checked' : '' }}></td>
                <td><input type="radio" name="independiente" value="mucho" {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->indicador_25 == 'mucho' ? 'checked' : '' }}></td>
                <td><input type="text" name="observaciones_independiente"></td>
            </tr>
        </table>

        <!-- Área Psicopedagógica -->
        <h2>Área Psicopedagógica</h2>

        <label for="como_te_gustaria">¿Cómo te gustaría ser?</label><br>
        <textarea id="como_te_gustaria" name="como_te_gustaria" rows="3" cols="50">{{ $ficha_psicopedagogica->indicador_psicopedagogico_1 ?? '' }}</textarea><br><br>

        <label for="problemas_estudios">¿Qué problemas personales intervienen en tus estudios?</label><br>
        <textarea id="problemas_estudios" name="problemas_estudios" rows="3" cols="50">{{ $ficha_psicopedagogica->indicador_psicopedagogico_2 ?? '' }}</textarea><br><br>

        <label for="rendimiento_escolar">¿Cuál es tu rendimiento escolar?</label><br>
        <textarea id="rendimiento_escolar" name="rendimiento_escolar" rows="3" cols="50">{{ $ficha_psicopedagogica->indicador_psicopedagogico_3 ?? '' }}</textarea><br><br>

        <label for="asignaturas_actuales">Menciona las asignaturas que cursas en el semestre actual</label><br>
        <textarea id="asignaturas_actuales" name="asignaturas_actuales" rows="3" cols="50">{{ $ficha_psicopedagogica->indicador_psicopedagogico_4 ?? '' }}</textarea><br><br>

        <label for="asignatura_preferida">¿Cuál es tu asignatura preferida? ¿Por qué?</label><br>
        <textarea id="asignatura_preferida" name="asignatura_preferida" rows="3" cols="50">{{ $ficha_psicopedagogica->indicador_psicopedagogico_5 ?? '' }}</textarea><br><br>

        <label for="asignatura_bajo_promedio">¿Cuál es tu asignatura con más bajo promedio del semestre anterior? ¿Por
            qué?</label><br>
        <textarea id="asignatura_bajo_promedio" name="asignatura_bajo_promedio" rows="3" cols="50">{{ $ficha_psicopedagogica->indicador_psicopedagogico_6 ?? '' }}</textarea><br><br>

        <label for="motivo_tesi">¿Por qué escogiste al TESI como opción de estudios?</label><br>
        <textarea id="motivo_tesi" name="motivo_tesi" rows="3" cols="50">{{ $ficha_psicopedagogica->indicador_psicopedagogico_7 ?? '' }}</textarea><br><br>

        <label for="asignaturas_reprobadas">¿Tienes asignaturas reprobadas?</label><br>
        <input type="radio" name="asignaturas_reprobadas" value="si" {{ (isset($ficha_psicopedagogica) && $ficha_psicopedagogica->indicador_psicopedagogico_8 == 'si') ? 'checked' : '' }}> Sí<br>
        <input type="radio" name="asignaturas_reprobadas" value="no" {{ (isset($ficha_psicopedagogica) && $ficha_psicopedagogica->indicador_psicopedagogico_8 == 'no') ? 'checked' : '' }}> No<br><br>

        <label for="cuales_reprobadas">En caso que si, ¿Cuáles?</label><br>
        <textarea id="cuales_reprobadas" name="cuales_reprobadas" rows="3" cols="50">{{ $ficha_psicopedagogica->indicador_psicopedagogico_9 ?? '' }}</textarea><br><br>

        <!-- Plan de Vida y Carrera -->
        <h2>Plan de Vida y Carrera</h2>

        <label for="planes_inmediatos">¿Cuáles son tus planes inmediatos?</label><br>
        <textarea id="planes_inmediatos" name="planes_inmediatos" rows="3" cols="50">{{ $ficha_psicopedagogica->plan_vida_carrera_1 ?? '' }}</textarea><br><br>

        <label for="metas_vida">¿Cuáles son tus metas en la vida?</label><br>
        <textarea id="metas_vida" name="metas_vida" rows="3" cols="50">{{ $ficha_psicopedagogica->plan_vida_carrera_2 ?? '' }}</textarea><br><br>

        <h2>Características personales</h2>

        <label for="yo_soy">Yo soy...</label><br>
        <textarea id="yo_soy" name="yo_soy" rows="3" cols="50">{{ $ficha_psicopedagogica->caracteristicas_personales_1 ?? '' }}</textarea><br><br>

        <label for="me_gusta">A mí me gusta que...</label><br>
        <textarea id="me_gusta" name="me_gusta" rows="3" cols="50">{{ $ficha_psicopedagogica->caracteristicas_personales_2 ?? '' }}</textarea><br><br>

        <label for="aspiracion">Yo aspiro en la vida...</label><br>
        <textarea id="aspiracion" name="aspiracion" rows="3" cols="50">{{ $ficha_psicopedagogica->caracteristicas_personales_3 ?? '' }}</textarea><br><br>

        <label for="miedos">Yo tengo miedo que...</label><br>
        <textarea id="miedos" name="miedos" rows="3" cols="50">{{ $ficha_psicopedagogica->caracteristicas_personales_4 ?? '' }}</textarea><br><br>

        <label for="logro">Pero pienso que podrá lograr...</label><br>
        <textarea id="logro" name="logro" rows="3" cols="50">{{ $ficha_psicopedagogica->caracteristicas_personales_5 ?? '' }}</textarea><br><br>

        <button type="submit">Enviar</button>
    </form>
    <a href="{{ route('graficar') }}" class="btn btn-primary">Graficar</a>

</body>
</html>
