<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Tutorado</title>
    <link rel="stylesheet" href="{{ asset('css/fomularios.css')}}">
</head>
<body>
<header>
        <div class="logos">
            <img src="{{ asset('multimedia/edomex.png') }}" alt="Logo 1" class="logoedomex">
            <img src="{{ asset('multimedia/tesi.png') }}" alt="Logo 2" class="logotesi">
            <img src="{{ asset('multimedia/isclogo.jpeg') }}" alt="Logo 3" class="logoisc">
        </div>
        <div class="banner">
            <h1>Ficha de Identificación del Tutorado</h1>
        </div>
    </header>
    <main>
    <div class="formulariocontenedor">
    <form method="POST" action="{{ route('alumno.ficha.guardar') }}">
        @csrf
        <label for="nombre">Nombre Completo:</label>
        <input type="text" name="alumno_nombre" value="{{ $alumno->nombre_completo }}" readonly>
        <input type="hidden" name="alumno_id" value="{{ $alumno->id_alumno }}">

        <label for="carrera">Carrera a la que pertenece:</label>
        <input type="text" id="carrera" name="carrera" class="form-control" value="{{ $alumno->carrera->carrera ?? 'No asignada' }}" readonly>

        
        <label for="matricula">Número de matrícula:</label>
        <input type="text" name="matricula" value="{{ $alumno->matricula }}" readonly>

        <label for="semestre">Semestre:</label>
        <input type="text" name="semestre" value="{{ optional($alumno->grupo->semestre)->semestre }}" readonly>


        <label for="fecha">Fecha:</label>
        <input type="date" id="fecha" name="fecha" readonly><br><br>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const hoy = new Date();
                const yyyy = hoy.getFullYear();
                const mm = String(hoy.getMonth() + 1).padStart(2, '0');
                const dd = String(hoy.getDate()).padStart(2, '0');
                const fechaActual = `${yyyy}-${mm}-${dd}`;
                document.getElementById('fecha').value = fechaActual;
            });
        </script>

        <label for="correo_electronico">Correo Electrónico:</label>
        <input type="email" name="correo_electronico" value="{{ $alumno->user?->email }}" readonly>
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
                <td><input type="radio" name="manos_pies" value="frecuente"></td>
                <td><input type="radio" name="manos_pies" value="muy_frecuente"></td>
                <td><input type="radio" name="manos_pies" value="nunca"></td>
                <td><input type="radio" name="manos_pies" value="antes"></td>
                <td><input type="radio" name="manos_pies" value="a_veces"></td>
            </tr>
            <tr>
                <td>Dolores en el vientre</td>
                <td><input type="radio" name="dolores_vientre" value="frecuente"></td>
                <td><input type="radio" name="dolores_vientre" value="muy_frecuente"></td>
                <td><input type="radio" name="dolores_vientre" value="nunca"></td>
                <td><input type="radio" name="dolores_vientre" value="antes"></td>
                <td><input type="radio" name="dolores_vientre" value="a_veces"></td>
            </tr>
            <tr>
                <td>Dolores de cabeza y/o vómitos</td>
                <td><input type="radio" name="dolores_cabeza" value="frecuente"></td>
                <td><input type="radio" name="dolores_cabeza" value="muy_frecuente"></td>
                <td><input type="radio" name="dolores_cabeza" value="nunca"></td>
                <td><input type="radio" name="dolores_cabeza" value="antes"></td>
                <td><input type="radio" name="dolores_cabeza" value="a_veces"></td>
            </tr>
            <tr>
                <td>Pérdida del equilibrio</td>
                <td><input type="radio" name="equilibrio" value="frecuente"></td>
                <td><input type="radio" name="equilibrio" value="muy_frecuente"></td>
                <td><input type="radio" name="equilibrio" value="nunca"></td>
                <td><input type="radio" name="equilibrio" value="antes"></td>
                <td><input type="radio" name="equilibrio" value="a_veces"></td>
            </tr>
            <tr>
                <td>Fatiga y agotamiento</td>
                <td><input type="radio" name="fatiga" value="frecuente"></td>
                <td><input type="radio" name="fatiga" value="muy_frecuente"></td>
                <td><input type="radio" name="fatiga" value="nunca"></td>
                <td><input type="radio" name="fatiga" value="antes"></td>
                <td><input type="radio" name="fatiga" value="a_veces"></td>
            </tr>
            <tr>
                <td>Pérdida de vista u oído</td>
                <td><input type="radio" name="vista_oido" value="frecuente"></td>
                <td><input type="radio" name="vista_oido" value="muy_frecuente"></td>
                <td><input type="radio" name="vista_oido" value="nunca"></td>
                <td><input type="radio" name="vista_oido" value="antes"></td>
                <td><input type="radio" name="vista_oido" value="a_veces"></td>
            </tr>
            <tr>
                <td>Dificultades para dormir</td>
                <td><input type="radio" name="dormir" value="frecuente"></td>
                <td><input type="radio" name="dormir" value="muy_frecuente"></td>
                <td><input type="radio" name="dormir" value="nunca"></td>
                <td><input type="radio" name="dormir" value="antes"></td>
                <td><input type="radio" name="dormir" value="a_veces"></td>
            </tr>
            <tr>
                <td>Pesadillas o terrores nocturnos</td>
                <td><input type="radio" name="pesadillas" value="frecuente"></td>
                <td><input type="radio" name="pesadillas" value="muy_frecuente"></td>
                <td><input type="radio" name="pesadillas" value="nunca"></td>
                <td><input type="radio" name="pesadillas" value="antes"></td>
                <td><input type="radio" name="pesadillas" value="a_veces"></td>
            </tr>
            <tr>
                <td>Incontinencia (orina/heces)</td>
                <td><input type="radio" name="incontinencia" value="frecuente"></td>
                <td><input type="radio" name="incontinencia" value="muy_frecuente"></td>
                <td><input type="radio" name="incontinencia" value="nunca"></td>
                <td><input type="radio" name="incontinencia" value="antes"></td>
                <td><input type="radio" name="incontinencia" value="a_veces"></td>
            </tr>
            <tr>
                <td>Tartamudeos al explicarse</td>
                <td><input type="radio" name="tartamudeo" value="frecuente"></td>
                <td><input type="radio" name="tartamudeo" value="muy_frecuente"></td>
                <td><input type="radio" name="tartamudeo" value="nunca"></td>
                <td><input type="radio" name="tartamudeo" value="antes"></td>
                <td><input type="radio" name="tartamudeo" value="a_veces"></td>
            </tr>
            <tr>
                <td>Miedos intensos ante cosas</td>
                <td><input type="radio" name="miedos" value="frecuente"></td>
                <td><input type="radio" name="miedos" value="muy_frecuente"></td>
                <td><input type="radio" name="miedos" value="nunca"></td>
                <td><input type="radio" name="miedos" value="antes"></td>
                <td><input type="radio" name="miedos" value="a_veces"></td>
            </tr>
        </table>

        <h2>Área Familiar</h2>
        <label for="relacion_familia">¿Cómo es la relación con tu familia?</label><br>
        <textarea id="relacion_familia" name="relacion_familia" rows="3" cols="50"></textarea><br><br>

        <label for="dificultades_familia">¿Existen dificultades?</label><br>
        <textarea id="dificultades_familia" name="dificultades_familia" rows="3" cols="50"></textarea><br><br>

        <label for="tipo_dificultades">¿De qué tipo?</label><br>
        <textarea id="tipo_dificultades" name="tipo_dificultades" rows="3" cols="50"></textarea><br><br>

        <label for="actitud_familia">¿Qué actitud tienes con tu familia?</label><br>
        <textarea id="actitud_familia" name="actitud_familia" rows="3" cols="50"></textarea><br><br>

        <label for="relacion_padre">¿Cómo te relacionas con tu padre?</label><br>
        <textarea id="relacion_padre" name="relacion_padre" rows="3" cols="50"></textarea><br><br>

        <label for="relacion_madre">¿Cómo te relacionas con tu madre?</label><br>
        <textarea id="relacion_madre" name="relacion_madre" rows="3" cols="50"></textarea><br><br>

        <label for="actitud_madre">¿Qué actitud tienes hacia tu madre?</label><br>
        <textarea id="actitud_madre" name="actitud_madre" rows="3" cols="50"></textarea><br><br>

        <label>¿Con quién te sientes más ligado afectivamente?</label><br>
        <input type="checkbox" name="ligado_afectivamente" value="madre"> Madre<br>
        <input type="checkbox" name="ligado_afectivamente" value="padre"> Padre<br>
        <input type="checkbox" name="ligado_afectivamente" value="hermanos"> Hermanos<br>
        <input type="checkbox" name="ligado_afectivamente" value="otros"> Otros<br><br>

        <label for="ligado_afectivamente_razon">Especifica por qué</label><br>
        <textarea id="ligado_afectivamente_razon" name="ligado_afectivamente_razon" rows="3" cols="50"></textarea><br><br>

        <label for="ocupacion_educacion">¿Quién se ocupa más directamente de tu educación?</label><br>
        <textarea id="ocupacion_educacion" name="ocupacion_educacion" rows="3" cols="50"></textarea><br><br>

        <label for="influencia_carrera">¿Quién ha influido más en tu decisión para estudiar esta carrera?</label><br>
        <textarea id="influencia_carrera" name="influencia_carrera" rows="3" cols="50"></textarea><br><br>

        <h2>Área Social</h2>

        <label>¿Cómo es tu relación con tus compañeros?</label><br>
        <input type="radio" name="relacion_companeros" value="buena"> Buena<br>
        <input type="radio" name="relacion_companeros" value="regular"> Regular<br>
        <input type="radio" name="relacion_companeros" value="mala"> Mala<br><br>

        <label for="razon_companeros">¿Por qué?</label><br>
        <textarea id="razon_companeros" name="razon_companeros" rows="3" cols="50"></textarea><br><br>

        <label for="tienes_pareja">¿Tienes pareja?</label><br>
        <input type="radio" name="tienes_pareja" value="si"> Sí<br>
        <input type="radio" name="tienes_pareja" value="no"> No<br><br>

        <label for="relacion_pareja">¿Cómo es tu relación con tu pareja?</label><br>
        <textarea id="relacion_pareja" name="relacion_pareja" rows="3" cols="50"></textarea><br><br>

        <label for="relacion_profesores">¿Cómo es tu relación con tus profesores?</label><br>
        <textarea id="relacion_profesores" name="relacion_profesores" rows="3" cols="50"></textarea><br><br>

        <label for="relacion_autoridades">¿Cómo es tu relación con las autoridades académicas?</label><br>
        <textarea id="relacion_autoridades" name="relacion_autoridades" rows="3" cols="50"></textarea><br><br>

        <label for="tiempo_libre">¿Qué haces en tu tiempo libre?</label><br>
        <textarea id="tiempo_libre" name="tiempo_libre" rows="3" cols="50"></textarea><br><br>

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
                <td><input type="radio" name="puntual" value="no"></td>
                <td><input type="radio" name="puntual" value="poco"></td>
                <td><input type="radio" name="puntual" value="frecuente"></td>
                <td><input type="radio" name="puntual" value="mucho"></td>
                <td><input type="text" name="observaciones_puntual"></td>
            </tr>
            <tr>
                <td>Tímida</td>
                <td><input type="radio" name="timida" value="no"></td>
                <td><input type="radio" name="timida" value="poco"></td>
                <td><input type="radio" name="timida" value="frecuente"></td>
                <td><input type="radio" name="timida" value="mucho"></td>
                <td><input type="text" name="observaciones_timida"></td>
            </tr>
            <tr>
                <td>Alegre</td>
                <td><input type="radio" name="alegre" value="no"></td>
                <td><input type="radio" name="alegre" value="poco"></td>
                <td><input type="radio" name="alegre" value="frecuente"></td>
                <td><input type="radio" name="alegre" value="mucho"></td>
                <td><input type="text" name="observaciones_alegre"></td>
            </tr>
            <tr>
                <td>Agresiva</td>
                <td><input type="radio" name="agresiva" value="no"></td>
                <td><input type="radio" name="agresiva" value="poco"></td>
                <td><input type="radio" name="agresiva" value="frecuente"></td>
                <td><input type="radio" name="agresiva" value="mucho"></td>
                <td><input type="text" name="observaciones_agresiva"></td>
            </tr>

            <tr>
                <td>Abierto/a a las ideas de otros</td>
                <td><input type="radio" name="abierto" value="no"></td>
                <td><input type="radio" name="abierto" value="poco"></td>
                <td><input type="radio" name="abierto" value="frecuente"></td>
                <td><input type="radio" name="abierto" value="mucho"></td>
                <td><input type="text" name="observaciones_abierto"></td>
            </tr>
            <tr>
                <td>Reflexivo/a</td>
                <td><input type="radio" name="reflexivo" value="no"></td>
                <td><input type="radio" name="reflexivo" value="poco"></td>
                <td><input type="radio" name="reflexivo" value="frecuente"></td>
                <td><input type="radio" name="reflexivo" value="mucho"></td>
                <td><input type="text" name="observaciones_reflexivo"></td>
            </tr>
            <tr>
                <td>Constante</td>
                <td><input type="radio" name="constante" value="no"></td>
                <td><input type="radio" name="constante" value="poco"></td>
                <td><input type="radio" name="constante" value="frecuente"></td>
                <td><input type="radio" name="constante" value="mucho"></td>
                <td><input type="text" name="observaciones_constante"></td>
            </tr>
            <tr>
                <td>Optimista</td>
                <td><input type="radio" name="optimista" value="no"></td>
                <td><input type="radio" name="optimista" value="poco"></td>
                <td><input type="radio" name="optimista" value="frecuente"></td>
                <td><input type="radio" name="optimista" value="mucho"></td>
                <td><input type="text" name="observaciones_optimista"></td>
            </tr>
            <tr>
                <td>Impulsivo/a</td>
                <td><input type="radio" name="impulsivo" value="no"></td>
                <td><input type="radio" name="impulsivo" value="poco"></td>
                <td><input type="radio" name="impulsivo" value="frecuente"></td>
                <td><input type="radio" name="impulsivo" value="mucho"></td>
                <td><input type="text" name="observaciones_impulsivo"></td>
            </tr>
            <tr>
                <td>Silencioso</td>
                <td><input type="radio" name="silencioso" value="no"></td>
                <td><input type="radio" name="silencioso" value="poco"></td>
                <td><input type="radio" name="silencioso" value="frecuente"></td>
                <td><input type="radio" name="silencioso" value="mucho"></td>
                <td><input type="text" name="observaciones_silencioso"></td>
            </tr>
            <tr>
                <td>Generoso</td>
                <td><input type="radio" name="generoso" value="no"></td>
                <td><input type="radio" name="generoso" value="poco"></td>
                <td><input type="radio" name="generoso" value="frecuente"></td>
                <td><input type="radio" name="generoso" value="mucho"></td>
                <td><input type="text" name="observaciones_generoso"></td>
            </tr>
            <tr>
                <td>Inquieto</td>
                <td><input type="radio" name="inquieto" value="no"></td>
                <td><input type="radio" name="inquieto" value="poco"></td>
                <td><input type="radio" name="inquieto" value="frecuente"></td>
                <td><input type="radio" name="inquieto" value="mucho"></td>
                <td><input type="text" name="observaciones_inquieto"></td>
            </tr>
            <tr>
                <td>Cambios de humor</td>
                <td><input type="radio" name="cambios_humor" value="no"></td>
                <td><input type="radio" name="cambios_humor" value="poco"></td>
                <td><input type="radio" name="cambios_humor" value="frecuente"></td>
                <td><input type="radio" name="cambios_humor" value="mucho"></td>
                <td><input type="text" name="observaciones_cambios_humor"></td>
            </tr>
            <tr>
                <td>Dominante</td>
                <td><input type="radio" name="dominante" value="no"></td>
                <td><input type="radio" name="dominante" value="poco"></td>
                <td><input type="radio" name="dominante" value="frecuente"></td>
                <td><input type="radio" name="dominante" value="mucho"></td>
                <td><input type="text" name="observaciones_dominante"></td>
            </tr>
            <tr>
                <td>Egoísta</td>
                <td><input type="radio" name="egoista" value="no"></td>
                <td><input type="radio" name="egoista" value="poco"></td>
                <td><input type="radio" name="egoista" value="frecuente"></td>
                <td><input type="radio" name="egoista" value="mucho"></td>
                <td><input type="text" name="observaciones_egoista"></td>
            </tr>
            <tr>
                <td>Sumiso</td>
                <td><input type="radio" name="sumiso" value="no"></td>
                <td><input type="radio" name="sumiso" value="poco"></td>
                <td><input type="radio" name="sumiso" value="frecuente"></td>
                <td><input type="radio" name="sumiso" value="mucho"></td>
                <td><input type="text" name="observaciones_sumiso"></td>
            </tr>

            <tr>
                <td>Confiado en sí mismo</td>
                <td><input type="radio" name="confiado_en_si" value="no"></td>
                <td><input type="radio" name="confiado_en_si" value="poco"></td>
                <td><input type="radio" name="confiado_en_si" value="frecuente"></td>
                <td><input type="radio" name="confiado_en_si" value="mucho"></td>
                <td><input type="text" name="observaciones_confiado_en_si"></td>
            </tr>
            <tr>
                <td>Imaginativo</td>
                <td><input type="radio" name="imaginativo" value="no"></td>
                <td><input type="radio" name="imaginativo" value="poco"></td>
                <td><input type="radio" name="imaginativo" value="frecuente"></td>
                <td><input type="radio" name="imaginativo" value="mucho"></td>
                <td><input type="text" name="observaciones_imaginativo"></td>
            </tr>
            <tr>
                <td>Con iniciativa propia</td>
                <td><input type="radio" name="con_iniciativa" value="no"></td>
                <td><input type="radio" name="con_iniciativa" value="poco"></td>
                <td><input type="radio" name="con_iniciativa" value="frecuente"></td>
                <td><input type="radio" name="con_iniciativa" value="mucho"></td>
                <td><input type="text" name="observaciones_con_iniciativa"></td>
            </tr>
            <tr>
                <td>Sociable</td>
                <td><input type="radio" name="sociable" value="no"></td>
                <td><input type="radio" name="sociable" value="poco"></td>
                <td><input type="radio" name="sociable" value="frecuente"></td>
                <td><input type="radio" name="sociable" value="mucho"></td>
                <td><input type="text" name="observaciones_sociable"></td>
            </tr>
            <tr>
                <td>Responsable</td>
                <td><input type="radio" name="responsable" value="no"></td>
                <td><input type="radio" name="responsable" value="poco"></td>
                <td><input type="radio" name="responsable" value="frecuente"></td>
                <td><input type="radio" name="responsable" value="mucho"></td>
                <td><input type="text" name="observaciones_responsable"></td>
            </tr>
            <tr>
                <td>Perseverante</td>
                <td><input type="radio" name="perseverante" value="no"></td>
                <td><input type="radio" name="perseverante" value="poco"></td>
                <td><input type="radio" name="perseverante" value="frecuente"></td>
                <td><input type="radio" name="perseverante" value="mucho"></td>
                <td><input type="text" name="observaciones_perseverante"></td>
            </tr>
            <tr>
                <td>Motivado</td>
                <td><input type="radio" name="motivado" value="no"></td>
                <td><input type="radio" name="motivado" value="poco"></td>
                <td><input type="radio" name="motivado" value="frecuente"></td>
                <td><input type="radio" name="motivado" value="mucho"></td>
                <td><input type="text" name="observaciones_motivado"></td>
            </tr>
            <tr>
                <td>Activo</td>
                <td><input type="radio" name="activo" value="no"></td>
                <td><input type="radio" name="activo" value="poco"></td>
                <td><input type="radio" name="activo" value="frecuente"></td>
                <td><input type="radio" name="activo" value="mucho"></td>
                <td><input type="text" name="observaciones_activo"></td>
            </tr>
            <tr>
                <td>Independiente</td>
                <td><input type="radio" name="independiente" value="no"></td>
                <td><input type="radio" name="independiente" value="poco"></td>
                <td><input type="radio" name="independiente" value="frecuente"></td>
                <td><input type="radio" name="independiente" value="mucho"></td>
                <td><input type="text" name="observaciones_independiente"></td>
            </tr>
        </table>

        <!-- Área Psicopedagógica -->
        <h2>Área Psicopedagógica</h2>

        <label for="como_te_gustaria">¿Cómo te gustaría ser?</label><br>
        <textarea id="como_te_gustaria" name="como_te_gustaria" rows="3" cols="50"></textarea><br><br>

        <label for="problemas_estudios">¿Qué problemas personales intervienen en tus estudios?</label><br>
        <textarea id="problemas_estudios" name="problemas_estudios" rows="3" cols="50"></textarea><br><br>

        <label for="rendimiento_escolar">¿Cuál es tu rendimiento escolar?</label><br>
        <textarea id="rendimiento_escolar" name="rendimiento_escolar" rows="3" cols="50"></textarea><br><br>

        <label for="asignaturas_actuales">Menciona las asignaturas que cursas en el semestre actual</label><br>
        <textarea id="asignaturas_actuales" name="asignaturas_actuales" rows="3" cols="50"></textarea><br><br>

        <label for="asignatura_preferida">¿Cuál es tu asignatura preferida? ¿Por qué?</label><br>
        <textarea id="asignatura_preferida" name="asignatura_preferida" rows="3" cols="50"></textarea><br><br>

        <label for="asignatura_bajo_promedio">¿Cuál es tu asignatura con más bajo promedio del semestre anterior? ¿Por
            qué?</label><br>
        <textarea id="asignatura_bajo_promedio" name="asignatura_bajo_promedio" rows="3" cols="50"></textarea><br><br>

        <label for="motivo_tesi">¿Por qué escogiste al TESI como opción de estudios?</label><br>
        <textarea id="motivo_tesi" name="motivo_tesi" rows="3" cols="50"></textarea><br><br>

        <label for="asignaturas_reprobadas">¿Tienes asignaturas reprobadas?</label><br>
        <input type="radio" name="asignaturas_reprobadas" value="si"> Sí<br>
        <input type="radio" name="asignaturas_reprobadas" value="no"> No<br><br>

        <label for="cuales_reprobadas">En caso que si, ¿Cuáles?</label><br>
        <textarea id="cuales_reprobadas" name="cuales_reprobadas" rows="3" cols="50"></textarea><br><br>

        <!-- Plan de Vida y Carrera -->
        <h2>Plan de Vida y Carrera</h2>

        <label for="planes_inmediatos">¿Cuáles son tus planes inmediatos?</label><br>
        <textarea id="planes_inmediatos" name="planes_inmediatos" rows="3" cols="50"></textarea><br><br>

        <label for="metas_vida">¿Cuáles son tus metas en la vida?</label><br>
        <textarea id="metas_vida" name="metas_vida" rows="3" cols="50"></textarea><br><br>

        <h2>Características personales</h2>

        <label for="yo_soy">Yo soy...</label><br>
        <textarea id="yo_soy" name="yo_soy" rows="3" cols="50"></textarea><br><br>

        <label for="me_gusta">A mí me gusta que...</label><br>
        <textarea id="me_gusta" name="me_gusta" rows="3" cols="50"></textarea><br><br>

        <label for="aspiracion">Yo aspiro en la vida...</label><br>
        <textarea id="aspiracion" name="aspiracion" rows="3" cols="50"></textarea><br><br>

        <label for="miedos">Yo tengo miedo que...</label><br>
        <textarea id="miedos" name="miedos" rows="3" cols="50"></textarea><br><br>

        <label for="logro">Pero pienso que podrá lograr...</label><br>
        <textarea id="logro" name="logro" rows="3" cols="50"></textarea><br><br>

        <button type="submit">Enviar</button>
    </form>
    </div>
    </main>
    <footer>
        <p>© 2024 Tecnológico de Estudios Superiores de Ixtapaluca</p>
    </footer>
    <script>
        function cerrarSesion() {
            window.location.href = "/Tutorias/login.html";
        }
    </script>
</body>
</html>