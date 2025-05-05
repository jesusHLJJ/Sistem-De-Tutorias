<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta de Habilidades de Estudio</title>
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
            <h1>Encuesta de Habilidades de Estudio </h1>
        </div>
    </header>

    <!-- Encuesta de Organización del Estudio -->
    <main>
        <div class="formulariocontenedor">


            <p>Instrucciones: La presente encuesta está formada por tres breves cuestionarios en los cuales puedes indicar los
                problemas referentes a organización, técnicas y motivación en el estudio que quizá perjudican tu rendimiento
                académico. Si contestas todas las preguntas con sinceridad y reflexión, podrás identificar mucho de tus actuales
                defectos al estudiar.</p>
            <p>Cada cuestionario contiene veinte preguntas a las que se contestará con sí o no al finalizar cada pregunta según
                corresponda tu respuesta. No hay respuestas "correctas" o "incorrectas", ya que la contestación adecuada es tu
                juicio sincero sobre tu modo de actuar y tus actitudes personales respecto al estudio. No omitas ninguna de
                ellas.</p>
        
    <h2>Encuesta de Organización del Estudio</h2>
    <form id="encuestaForm" action="{{ route('alumno.habilidad.guardar') }}" method="POST">
        @csrf
        <!-- Obtenemos el id del alumno para mandarlo en el post despues -->
        <input type="hidden" name="alumno_id" value="{{ $alumno->id_alumno}}">
        <!-- Aqui contamos los no obtenidos para sacar el puntaje -->
        <input type="hidden" name="total_no" id="total_no">

        <table>
            <thead>
                <tr>
                    <th>Preguntas</th>
                    <th>Sí</th>
                    <th>No</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>A.- ¿Sueles dejar para el último la preparación de tus trabajos?</td>
                    <td><input type="radio" name="pregunta1" value="si"
                            {{ isset($organizacion) && $organizacion->pregunta_1_organizacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                    <td><input type="radio" name="pregunta1" value="no"
                            {{ isset($organizacion) && $organizacion->pregunta_1_organizacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                </tr>
                <tr>
                    <td>B.- ¿Crees que el sueño o el cansancio te impidan estudiar eficazmente en muchas ocasiones?</td>
                    <td><input type="radio" name="pregunta2" value="si"
                            {{ isset($organizacion) && $organizacion->pregunta_2_organizacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                    <td><input type="radio" name="pregunta2" value="no"
                            {{ isset($organizacion) && $organizacion->pregunta_2_organizacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                </tr>
                <tr>
                    <td>C.- ¿Es frecuente que no termines tu tarea a tiempo?</td>
                    <td><input type="radio" name="pregunta3" value="si"
                            {{ isset($organizacion) && $organizacion->pregunta_3_organizacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                    <td><input type="radio" name="pregunta3" value="no"
                            {{ isset($organizacion) && $organizacion->pregunta_3_organizacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                </tr>
                <tr>
                    <td>D.- ¿Tiendes a emplear tiempo en leer revistas, ver televisión o charlar cuando debieras
                        estudiar?</td>
                    <td><input type="radio" name="pregunta4" value="si"
                            {{ isset($organizacion) && $organizacion->pregunta_4_organizacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                    <td><input type="radio" name="pregunta4" value="no"
                            {{ isset($organizacion) && $organizacion->pregunta_4_organizacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                </tr>
                <tr>
                    <td>E.- ¿Tus actividades sociales o deportivas te llevan a descuidar tus tareas escolares?</td>
                    <td><input type="radio" name="pregunta5" value="si"
                            {{ isset($organizacion) && $organizacion->pregunta_5_organizacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                    <td><input type="radio" name="pregunta5" value="no"
                            {{ isset($organizacion) && $organizacion->pregunta_5_organizacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                </tr>
                <tr>
                    <td>F.- ¿Sueles dejar pasar un día o más antes de repasar los apuntes tomados en clase?</td>
                    <td><input type="radio" name="pregunta6" value="si"
                            {{ isset($organizacion) && $organizacion->pregunta_6_organizacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                    <td><input type="radio" name="pregunta6" value="no"
                            {{ isset($organizacion) && $organizacion->pregunta_6_organizacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                </tr>
                <tr>
                    <td>G.- ¿Sueles dedicar tu tiempo libre entre las 4:00 de la tarde y las 9:00 de la noche a otras
                        actividades que no sean estudiar?</td>
                    <td><input type="radio" name="pregunta7" value="si"
                            {{ isset($organizacion) && $organizacion->pregunta_7_organizacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                    <td><input type="radio" name="pregunta7" value="no"
                            {{ isset($organizacion) && $organizacion->pregunta_7_organizacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                </tr>
                <tr>
                    <td>H.- ¿Descubres algunas veces de pronto que debes entregar una tarea antes de lo que creías?</td>
                    <td><input type="radio" name="pregunta8" value="si"
                            {{ isset($organizacion) && $organizacion->pregunta_8_organizacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                    <td><input type="radio" name="pregunta8" value="no"
                            {{ isset($organizacion) && $organizacion->pregunta_8_organizacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                </tr>
                <tr>
                    <td>I.- ¿Te retrasas con frecuencia en una asignatura debido a que tienes que estudiar otra?</td>
                    <td><input type="radio" name="pregunta9" value="si"
                            {{ isset($organizacion) && $organizacion->pregunta_9_organizacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                    <td><input type="radio" name="pregunta9" value="no"
                            {{ isset($organizacion) && $organizacion->pregunta_9_organizacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                </tr>
                <tr>
                    <td>J.- ¿Te parece que tu rendimiento es muy bajo en relación con el tiempo que dedicas al estudio?
                    </td>
                    <td><input type="radio" name="pregunta10" value="si"
                            {{ isset($organizacion) && $organizacion->pregunta_10_organizacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                    <td><input type="radio" name="pregunta10" value="no"
                            {{ isset($organizacion) && $organizacion->pregunta_10_organizacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                </tr>
                <tr>
                    <td>K.- ¿Está situado tu escritorio directamente frente a una ventana, puerta u otra fuente de
                        distracción?</td>
                    <td><input type="radio" name="pregunta11" value="si"
                            {{ isset($organizacion) && $organizacion->pregunta_11_organizacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                    <td><input type="radio" name="pregunta11" value="no"
                            {{ isset($organizacion) && $organizacion->pregunta_11_organizacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                </tr>
                <tr>
                    <td>L.- ¿Sueles tener fotografías, trofeos o recuerdos sobre tu mesa de escritorio?</td>
                    <td><input type="radio" name="pregunta12" value="si"
                            {{ isset($organizacion) && $organizacion->pregunta_12_organizacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                    <td><input type="radio" name="pregunta12" value="no"
                            {{ isset($organizacion) && $organizacion->pregunta_12_organizacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                </tr>
                <tr>
                    <td>M.- ¿Sueles estudiar recostado en la cama o arrellanado en un asiento cómodo?</td>
                    <td><input type="radio" name="pregunta13" value="si"
                            {{ isset($organizacion) && $organizacion->pregunta_13_organizacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                    <td><input type="radio" name="pregunta13" value="no"
                            {{ isset($organizacion) && $organizacion->pregunta_13_organizacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                </tr>
                <tr>
                    <td>N.- ¿Produce resplandor la lámpara que utilizas al estudiar?</td>
                    <td><input type="radio" name="pregunta14" value="si"
                            {{ isset($organizacion) && $organizacion->pregunta_14_organizacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                    <td><input type="radio" name="pregunta14" value="no"
                            {{ isset($organizacion) && $organizacion->pregunta_14_organizacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                </tr>
                <tr>
                    <td>O.- Tu mesa de estudio, ¿está tan desordenada y llena de objetos que no dispones de sitio
                        suficiente para estudiar con eficacia?</td>
                    <td><input type="radio" name="pregunta15" value="si"
                            {{ isset($organizacion) && $organizacion->pregunta_15_organizacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                    <td><input type="radio" name="pregunta15" value="no"
                            {{ isset($organizacion) && $organizacion->pregunta_15_organizacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                </tr>
                <tr>
                    <td>P.- ¿Sueles interrumpir tu estudio por personas que vienen a visitarte?</td>
                    <td><input type="radio" name="pregunta16" value="si"
                            {{ isset($organizacion) && $organizacion->pregunta_16_organizacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                    <td><input type="radio" name="pregunta16" value="no"
                            {{ isset($organizacion) && $organizacion->pregunta_16_organizacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                </tr>
                <tr>
                    <td>Q.- ¿Estudias con frecuencia mientras tienes puesta la televisión y/o la radio?</td>
                    <td><input type="radio" name="pregunta17" value="si"
                            {{ isset($organizacion) && $organizacion->pregunta_17_organizacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                    <td><input type="radio" name="pregunta17" value="no"
                            {{ isset($organizacion) && $organizacion->pregunta_17_organizacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                </tr>
                <tr>
                    <td>R.- En el lugar donde estudias, ¿se pueden ver con facilidad revistas, fotos de jóvenes o
                        materiales pertenecientes a tu afición?</td>
                    <td><input type="radio" name="pregunta18" value="si"
                            {{ isset($organizacion) && $organizacion->pregunta_18_organizacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                    <td><input type="radio" name="pregunta18" value="no"
                            {{ isset($organizacion) && $organizacion->pregunta_18_organizacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                </tr>
                <tr>
                    <td>S.- ¿Con frecuencia interrumpen tu estudio actividades o ruidos que provienen del exterior?</td>
                    <td><input type="radio" name="pregunta19" value="si"
                            {{ isset($organizacion) && $organizacion->pregunta_19_organizacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                    <td><input type="radio" name="pregunta19" value="no"
                            {{ isset($organizacion) && $organizacion->pregunta_19_organizacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                </tr>
                <tr>
                    <td>T.- ¿Suele hacerse lento tu estudio debido a que no tienes a la mano los libros y los materiales
                        necesarios?</td>
                    <td><input type="radio" name="pregunta20" value="si"
                            {{ isset($organizacion) && $organizacion->pregunta_20_organizacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                    <td><input type="radio" name="pregunta20" value="no"
                            {{ isset($organizacion) && $organizacion->pregunta_20_organizacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas()"></td>
                </tr>
            </tbody>
        </table>
        <button type="submit">Enviar respuestas de esta encuesta</button>
    </form>
    <p id="resultado"></p>
    <script>
        function contarRespuestas() {
            const form = document.getElementById("encuestaForm");
            let siCount = 0;
            let noCount = 0;

            for (let i = 1; i <= 20; i++) {
                const respuestaSi = form.querySelector(`input[name="pregunta${i}"][value="si"]`);
                const respuestaNo = form.querySelector(`input[name="pregunta${i}"][value="no"]`);

                if (respuestaSi && respuestaSi.checked) siCount++;
                if (respuestaNo && respuestaNo.checked) noCount++;
            }

            document.getElementById("resultado").innerHTML = "Calificación:" + "<br>" +
                "Respuestas Sí: " + siCount + "<br>" +
                "Respuestas No: " + noCount;

            // Asigna el total de respuestas "No" al campo oculto
            document.getElementById("total_no").value = noCount;
        }
    </script>


    <!-- Encuesta sobre Técnicas de Estudio -->
    <h2>Encuesta sobre Técnicas de Estudio</h2>
    <form id="encuestaForm2" action="{{ route('alumno.habilidad.guardar2') }}" method="POST">
        @csrf
        <!-- Obtenemos el id del alumno para mandarlo en el post despues -->
        <input type="hidden" name="alumno_id" value="{{ $alumno->id_alumno}}">

        <!-- Aqui contamos los no obtenidos para sacar el puntaje -->
        <input type="hidden" name="total_no2" id="total_no2">
        <table>
            <thead>
                <tr>
                    <th>Preguntas</th>
                    <th>Sí</th>
                    <th>No</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>A.- ¿Tiendes a comenzar la lectura de un libro de texto sin hojear previamente los subtítulos y
                        las ilustraciones?</td>
                    <td><input type="radio" name="pregunta21" value="si" {{ isset($tecnica) && $tecnica->pregunta_1_tecnica == 'si' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                    <td><input type="radio" name="pregunta21" value="no" {{ isset($tecnica) && $tecnica->pregunta_1_tecnica == 'no' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                </tr>
                <tr>
                    <td>B.- ¿Te saltas por lo general las figuras, gráficas y tablas cuando estudias un tema?</td>
                    <td><input type="radio" name="pregunta22" value="si" {{ isset($tecnica) && $tecnica->pregunta_2_tecnica == 'si' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                    <td><input type="radio" name="pregunta22" value="no" {{ isset($tecnica) && $tecnica->pregunta_2_tecnica == 'no' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                </tr>
                <tr>
                    <td>C.- ¿Suelo serte difícil seleccionar los puntos de los temas de estudio?</td>
                    <td><input type="radio" name="pregunta23" value="si" {{ isset($tecnica) && $tecnica->pregunta_3_tecnica == 'si' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                    <td><input type="radio" name="pregunta23" value="no" {{ isset($tecnica) && $tecnica->pregunta_3_tecnica == 'no' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                </tr>
                <tr>
                    <td>D.- ¿Te sorprendes con cierta frecuencia, pensando en algo que no tiene nada que ver con lo que
                        estudias?</td>
                    <td><input type="radio" name="pregunta24" value="si" {{ isset($tecnica) && $tecnica->pregunta_4_tecnica == 'si' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                    <td><input type="radio" name="pregunta24" value="no" {{ isset($tecnica) && $tecnica->pregunta_4_tecnica == 'no' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                </tr>
                <tr>
                    <td>E.- ¿Sueles tener dificultad en entender tus apuntes de clase cuando tratas de repasarlos,
                        después de cierto tiempo?</td>
                    <td><input type="radio" name="pregunta25" value="si" {{ isset($tecnica) && $tecnica->pregunta_5_tecnica == 'si' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                    <td><input type="radio" name="pregunta25" value="no" {{ isset($tecnica) && $tecnica->pregunta_5_tecnica == 'no' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                </tr>
                <tr>
                    <td>F.- Al tomar notas, ¿te sueles quedar atrás con frecuencia debido a que no puedes escribir con
                        suficiente rapidez?</td>
                    <td><input type="radio" name="pregunta26" value="si" {{ isset($tecnica) && $tecnica->pregunta_6_tecnica == 'si' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                    <td><input type="radio" name="pregunta26" value="no" {{ isset($tecnica) && $tecnica->pregunta_6_tecnica == 'no' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                </tr>
                <tr>
                    <td>G.- Poco después de comenzar un curso, ¿sueles encontrarte con tus apuntes formando un
                        “revoltijo"?</td>
                    <td><input type="radio" name="pregunta27" value="si" {{ isset($tecnica) && $tecnica->pregunta_7_tecnica == 'si' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                    <td><input type="radio" name="pregunta27" value="no" {{ isset($tecnica) && $tecnica->pregunta_7_tecnica == 'no' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                </tr>
                <tr>
                    <td>H.- ¿Tomas normalmente tus apuntes tratando de escribir las palabras exactas del docente?</td>
                    <td><input type="radio" name="pregunta28" value="si" {{ isset($tecnica) && $tecnica->pregunta_8_tecnica == 'si' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                    <td><input type="radio" name="pregunta28" value="no" {{ isset($tecnica) && $tecnica->pregunta_8_tecnica == 'si' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                </tr>
                <tr>
                    <td>I.- Cuando tomas notas de un libro, ¿tienes la costumbre de copiar el material necesario,
                        palabra por Palabra?</td>
                    <td><input type="radio" name="pregunta29" value="si" {{ isset($tecnica) && $tecnica->pregunta_9_tecnica == 'si' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                    <td><input type="radio" name="pregunta29" value="no" {{ isset($tecnica) && $tecnica->pregunta_9_tecnica == 'no' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                </tr>
                <tr>
                    <td>J.- ¿Te es difícil preparar un temario apropiado para una evaluación?</td>
                    <td><input type="radio" name="pregunta30" value="si" {{ isset($tecnica) && $tecnica->pregunta_10_tecnica == 'si' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                    <td><input type="radio" name="pregunta30" value="no" {{ isset($tecnica) && $tecnica->pregunta_10_tecnica == 'no' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                </tr>
                <tr>
                    <td>K.- ¿Tienes problemas para organizar los datos o el contenido de una evaluación?</td>
                    <td><input type="radio" name="pregunta31" value="si" {{ isset($tecnica) && $tecnica->pregunta_11_tecnica == 'si' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                    <td><input type="radio" name="pregunta31" value="no" {{ isset($tecnica) && $tecnica->pregunta_11_tecnica == 'no' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                </tr>
                <tr>
                    <td>L.- ¿Al repasar el temario de una evaluación formulas un resumen de este?</td>
                    <td><input type="radio" name="pregunta32" value="si" {{ isset($tecnica) && $tecnica->pregunta_12_tecnica == 'si' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                    <td><input type="radio" name="pregunta32" value="no" {{ isset($tecnica) && $tecnica->pregunta_12_tecnica == 'no' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                </tr>
                <tr>
                    <td>M.- ¿Te preparas a veces para una evaluación memorizando fórmulas, definiciones o reglas que no
                        entiendes con claridad?</td>
                    <td><input type="radio" name="pregunta33" value="si" {{ isset($tecnica) && $tecnica->pregunta_13_tecnica == 'si' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                    <td><input type="radio" name="pregunta33" value="no" {{ isset($tecnica) && $tecnica->pregunta_13_tecnica == 'no' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                </tr>
                <tr>
                    <td>N.- ¿Te resulta difícil decidir qué estudiar y cómo estudiarlo cuando preparas una evaluación?
                    </td>
                    <td><input type="radio" name="pregunta34" value="si" {{ isset($tecnica) && $tecnica->pregunta_14_tecnica == 'si' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                    <td><input type="radio" name="pregunta34" value="no" {{ isset($tecnica) && $tecnica->pregunta_14_tecnica == 'no' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                </tr>
                <tr>
                    <td>O.- ¿Sueles tener dificultades para organizar, en un orden lógico, las asignaturas que debes
                        estudiar por temas?</td>
                    <td><input type="radio" name="pregunta35" value="si" {{ isset($tecnica) && $tecnica->pregunta_15_tecnica == 'si' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                    <td><input type="radio" name="pregunta35" value="no" {{ isset($tecnica) && $tecnica->pregunta_15_tecnica == 'no' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                </tr>
                <tr>
                    <td>P.- Al preparar evaluación, ¿sueles estudiar toda la asignatura, en el último momento?</td>
                    <td><input type="radio" name="pregunta36" value="si" {{ isset($tecnica) && $tecnica->pregunta_16_tecnica == 'si' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                    <td><input type="radio" name="pregunta36" value="no" {{ isset($tecnica) && $tecnica->pregunta_16_tecnica == 'no' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                </tr>
                <tr>
                    <td>Q.- ¿Sueles entregar tus exámenes sin revisarlos detenidamente, para ver si tienen algún error
                        cometido por descuido?</td>
                    <td><input type="radio" name="pregunta37" value="si" {{ isset($tecnica) && $tecnica->pregunta_17_tecnica == 'si' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                    <td><input type="radio" name="pregunta37" value="no" {{ isset($tecnica) && $tecnica->pregunta_17_tecnica == 'no' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                </tr>
                <tr>
                    <td>R.- ¿Te es posible con frecuencia terminar una evaluación de exposición de un tema en el tiempo
                        prescrito?</td>
                    <td><input type="radio" name="pregunta38" value="si" {{ isset($tecnica) && $tecnica->pregunta_18_tecnica == 'si' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                    <td><input type="radio" name="pregunta38" value="no" {{ isset($tecnica) && $tecnica->pregunta_18_tecnica == 'no' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                </tr>
                <tr>
                    <td>S.- ¿Sueles perder puntos en exámenes con preguntas de “Verdadero - Falso", debido a que no lees
                        detenidamente?</td>
                    <td><input type="radio" name="pregunta39" value="si" {{ isset($tecnica) && $tecnica->pregunta_19_tecnica == 'si' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                    <td><input type="radio" name="pregunta39" value="no" {{ isset($tecnica) && $tecnica->pregunta_19_tecnica == 'no' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                </tr>
                <tr>
                    <td>T.- ¿Empleas normalmente mucho tiempo en contestar la primera mitad de la prueba y tienes que
                        apresurarte en la segunda?</td>
                    <td><input type="radio" name="pregunta40" value="si" {{ isset($tecnica) && $tecnica->pregunta_20_tecnica == 'si' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                    <td><input type="radio" name="pregunta40" value="no" {{ isset($tecnica) && $tecnica->pregunta_20_tecnica == 'no' ? 'checked' : '' }} onchange="contarRespuestas2()"></td>
                </tr>
            </tbody>
        </table>
        <button type="submit">Enviar respuestas de esta encuesta</button>
    </form>
    <p id="resultado2"></p>
    <script>
        function contarRespuestas2() {
            // Selecciona todas las respuestas "sí" y "no" del formulario usando querySelectorAll
            const respuestasSi = document.querySelectorAll('#encuestaForm2 input[type="radio"][value="si"]:checked');
            const respuestasNo = document.querySelectorAll('#encuestaForm2 input[type="radio"][value="no"]:checked');

            // Cuenta las respuestas seleccionadas
            const siCount = respuestasSi.length;
            const noCount = respuestasNo.length;

            // Muestra los resultados
            document.getElementById("resultado2").innerHTML = "Calificacion:" + "<br>" +
                "Respuestas Sí: " + siCount + "<br>" +
                "Respuestas No: " + noCount;
            // Asigna el total de respuestas "No" al campo oculto
            document.getElementById("total_no2").value = noCount;
        }
    </script>

    <!-- Encuesta sobre Motivación para el Estudio -->
    <h2>Encuesta sobre Motivación para el Estudio</h2>
    <form id="encuestaForm3" action="{{ route('alumno.habilidad.guardar3') }}" method="POST">
        @csrf
        <!-- Obtenemos el id del alumno para mandarlo en el post despues -->
        <input type="hidden" name="alumno_id" value="{{ $alumno->id_alumno}}">

        <!-- Aqui contamos los no obtenidos para sacar el puntaje -->
        <input type="hidden" name="total_no3" id="total_no3">
        <table>
            <thead>
                <tr>
                    <th>Preguntas</th>
                    <th>Sí</th>
                    <th>No</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>A.- Después de los primeros días o semanas del curso, ¿tiendes a perder interés por el estudio?
                    </td>
                    <td><input type="radio" name="pregunta41" value="si"
                            {{ isset($motivacion) && $motivacion->pregunta_1_motivacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                    <td><input type="radio" name="pregunta41" value="no"
                            {{ isset($motivacion) && $motivacion->pregunta_2_motivacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                </tr>
                <tr>
                    <td>B.- ¿Crees que en general, basta estudiar lo necesario para obtener un "aprobado” en las
                        asignaturas?</td>
                    <td><input type="radio" name="pregunta42" value="si"
                            {{ isset($motivacion) && $motivacion->pregunta_2_motivacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                    <td><input type="radio" name="pregunta42" value="no"
                            {{ isset($motivacion) && $motivacion->pregunta_2_motivacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                </tr>
                <tr>
                    <td>C.- ¿Te sientes frecuentemente confuso o indeciso sobre cuáles deben ser tus metas formativas y
                        profesionales?</td>
                    <td><input type="radio" name="pregunta43"
                            value="si"{{ isset($motivacion) && $motivacion->pregunta_3_motivacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                    <td><input type="radio" name="pregunta43" value="no"
                            {{ isset($motivacion) && $motivacion->pregunta_3_motivacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                </tr>
                <tr>
                    <td>D.- ¿Sueles pensar que no vale la pena el tiempo y el esfuerzo que son necesarios para lograr
                        una educación universitaria?</td>
                    <td><input type="radio" name="pregunta44" value="si"
                            {{ isset($motivacion) && $motivacion->pregunta_4_motivacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                    <td><input type="radio" name="pregunta44" value="no"
                            {{ isset($motivacion) && $motivacion->pregunta_4_motivacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                </tr>
                <tr>
                    <td>E.- ¿Crees que es más importante divertirte y disfrutar de la vida, que estudiar?</td>
                    <td><input type="radio" name="pregunta45" value="si"
                            {{ isset($motivacion) && $motivacion->pregunta_5_motivacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                    <td><input type="radio" name="pregunta45" value="no"
                            {{ isset($motivacion) && $motivacion->pregunta_5_motivacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                </tr>
                <tr>
                    <td>F.- ¿Sueles pasar el tiempo de clase en divagaciones o soñando despierto en lugar de atender al
                        docente?</td>
                    <td><input type="radio" name="pregunta46" value="si"
                            {{ isset($motivacion) && $motivacion->pregunta_6_motivacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                    <td><input type="radio" name="pregunta46" value="no"
                            {{ isset($motivacion) && $motivacion->pregunta_6_motivacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                </tr>
                <tr>
                    <td>G.- ¿Te sientes habitualmente incapaz de concentrarte en tus estudios debido a que estas
                        inquieto, aburrido o de mal humor?</td>
                    <td><input type="radio" name="pregunta47" value="si"
                            {{ isset($motivacion) && $motivacion->pregunta_7_motivacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                    <td><input type="radio" name="pregunta47" value="no"
                            {{ isset($motivacion) && $motivacion->pregunta_7_motivacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                </tr>
                <tr>
                    <td>H.- ¿Piensas con frecuencia que las asignaturas que estudias tienen poco valor practico para ti?
                    </td>
                    <td><input type="radio" name="pregunta48" value="si"
                            {{ isset($motivacion) && $motivacion->pregunta_8_organizacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                    <td><input type="radio" name="pregunta48" value="no"
                            {{ isset($motivacion) && $motivacion->pregunta_8_motivacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                </tr>
                <tr>
                    <td>I.- ¿Sientes, frecuentes deseos de abandonar la escuela y conseguir un trabajo?</td>
                    <td><input type="radio" name="pregunta49" value="si"
                            {{ isset($motivacion) && $motivacion->pregunta_9_motivacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                    <td><input type="radio" name="pregunta49" value="no"
                            {{ isset($motivacion) && $motivacion->pregunta_9_motivacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                </tr>
                <tr>
                    <td>J.- ¿Sueles tener la sensación de lo que se enseña en los centros docentes no te prepara para
                        afrontar los problemas de la vida adulta?</td>
                    <td><input type="radio" name="pregunta50" value="si"
                            {{ isset($motivacion) && $motivacion->pregunta_10_motivacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                    <td><input type="radio" name="pregunta50" value="no"
                            {{ isset($motivacion) && $motivacion->pregunta_10_motivacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                </tr>
                <tr>
                    <td>K.- ¿Sueles dedicarte de modo casual, según el estado de ánimo en que te encuentres?</td>
                    <td><input type="radio" name="pregunta51" value="si"
                            {{ isset($motivacion) && $motivacion->pregunta_11_motivacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                    <td><input type="radio" name="pregunta51" value="no"
                            {{ isset($motivacion) && $motivacion->pregunta_11_motivacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                </tr>
                <tr>
                    <td>L.- ¿Te horroriza estudiar libros de textos porque son insípidos y aburridos?</td>
                    <td><input type="radio" name="pregunta52" value="si"
                            {{ isset($motivacion) && $motivacion->pregunta_12_motivacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                    <td><input type="radio" name="pregunta52" value="no"
                            {{ isset($motivacion) && $motivacion->pregunta_12_motivacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                </tr>
                <tr>
                    <td>M.- ¿Esperas normalmente a que te fijen la fecha de una evaluación para comenzar a estudiar los
                        textos o repasar tus apuntes de clases?</td>
                    <td><input type="radio" name="pregunta53" value="si"
                            {{ isset($motivacion) && $motivacion->pregunta_13_motivacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                    <td><input type="radio" name="pregunta53" value="no"
                            {{ isset($motivacion) && $motivacion->pregunta_13_motivacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                </tr>
                <tr>
                    <td>N - ¿Sueles pensar que los exámenes son pruebas penosas de las que no se puede escapar y
                        respecto a las cuales lo que debe hacerse es sobrevivir, del modo que sea?</td>
                    <td><input type="radio" name="pregunta54" value="si"
                            {{ isset($motivacion) && $motivacion->pregunta_14_motivacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                    <td><input type="radio" name="pregunta54" value="no"
                            {{ isset($motivacion) && $motivacion->pregunta_14_motivacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                </tr>
                <tr>
                    <td>O.- ¿Sientes con frecuencia que tus docentes no comprenden las necesidades de los estudiantes?
                    </td>
                    <td><input type="radio" name="pregunta55" value="si"
                            {{ isset($motivacion) && $motivacion->pregunta_15_motivacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                    <td><input type="radio" name="pregunta55" value="no"
                            {{ isset($motivacion) && $motivacion->pregunta_15_motivacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                </tr>
                <tr>
                    <td>P.- ¿Tienes normalmente la sensación de que tus docentes exigen demasiadas horas de estudio
                        fuera de clase?</td>
                    <td><input type="radio" name="pregunta56" value="si"
                            {{ isset($motivacion) && $motivacion->pregunta_16_motivacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                    <td><input type="radio" name="pregunta56" value="no"
                            {{ isset($motivacion) && $motivacion->pregunta_16_motivacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                </tr>
                <tr>
                    <td>Q.- ¿Dudas por lo general, en pedir ayuda a tus docentes en tareas que te son difíciles?</td>
                    <td><input type="radio" name="pregunta57" value="si"
                            {{ isset($motivacion) && $motivacion->pregunta_17_motivacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                    <td><input type="radio" name="pregunta57" value="no"
                            {{ isset($motivacion) && $motivacion->pregunta_17_motivacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                </tr>
                <tr>
                    <td>R.- ¿Sueles pensar que tus docentes no tienen contacto con los temas y sucesos de actualidad?
                    </td>
                    <td><input type="radio" name="pregunta58" value="si"
                            {{ isset($motivacion) && $motivacion->pregunta_18_motivacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                    <td><input type="radio" name="pregunta58" value="no"
                            {{ isset($motivacion) && $motivacion->pregunta_18_motivacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                </tr>
                <tr>
                    <td>S.- ¿Te sientes reacio, por lo general, a hablar con tus docentes de tus proyectos futuros, de
                        estudio o profesionales?</td>
                    <td><input type="radio" name="pregunta59" value="si"
                            {{ isset($motivacion) && $motivacion->pregunta_19_motivacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                    <td><input type="radio" name="pregunta59" value="no"
                            {{ isset($motivacion) && $motivacion->pregunta_19_motivacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                </tr>
                <tr>
                    <td>T.- ¿Criticas con frecuencia a tus docentes cuando charlas con tus compañeros?</td>
                    <td><input type="radio" name="pregunta60" value="si"
                            {{ isset($motivacion) && $motivacion->pregunta_20_motivacion == 'si' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                    <td><input type="radio" name="pregunta60" value="no"
                            {{ isset($motivacion) && $motivacion->pregunta_20_motivacion == 'no' ? 'checked' : '' }}
                            onchange="contarRespuestas3()"></td>
                </tr>
            </tbody>
        </table>
        <button type="submit">Enviar respuestas de esta encuesta</button>
    </form>
    <p id="resultado3"></p>
    <script>
        function contarRespuestas3() {
            // Selecciona todas las respuestas "sí" y "no" del formulario usando querySelectorAll
            const respuestasSi = document.querySelectorAll('#encuestaForm3 input[type="radio"][value="si"]:checked');
            const respuestasNo = document.querySelectorAll('#encuestaForm3 input[type="radio"][value="no"]:checked');

            // Cuenta las respuestas seleccionadas
            const siCount = respuestasSi.length;
            const noCount = respuestasNo.length;

            // Muestra los resultados
            document.getElementById("resultado3").innerHTML = "Calificacion:" + "<br>" +
                "Respuestas Sí: " + siCount + "<br>" +
                "Respuestas No: " + noCount;
            // Asigna el total de respuestas "No" al campo oculto
            document.getElementById("total_no3").value = noCount;
        }
    </script>


    <!-- Funciones a considerar el alumno-profesor -->
    <div class="botones">
        <button id="generarPDF" onclick="generarPDF()">Generar PDF</button>
    </div>


    <!-- Calificacion global -->
    <div class="calificacion-global">
        <h2>Calificación Global</h2>
        <p>Se califica cada una de las encuestas por separado. Para calificar tu encuesta sigue el procedimiento que se
            te indica:</p>
        <ol>
            <li>Se cuentan las respuestas a la que contestaste con la palabra NO.</li>
            <li>Se utiliza la tabla de comparación para estudiantes universitarios. (Basada en una muestra de 2873
                estudiantes de la South West Texas State University).</li>
            <li>Prestar atención especial a las calificaciones consideradas como un promedio bajo o incluso peor.</li>
            <li>El paso siguiente ha de consistir en comenzar a corregir adecuadamente las deficiencias identificadas.
            </li>
        </ol>
        <p>En primer lugar, deberá releer todas las preguntas de la encuesta contestada con un SI y preguntarte a ti
            mismo estas cosas acerca de cada una:</p>
        <ul>
            <li>a). ¿Qué tan serio es el problema?</li>
            <li>b). ¿Qué lo causa?</li>
            <li>c). ¿Qué puedo hacer para corregirlo?</li>
        </ul>
        <p>Debo señalarte que las encuestas califican lo siguiente:</p>
        <ul>
            <li>La encuesta de organización del estudio, se refiere a los problemas sobre el uso efectivo del tiempo de
                estudio, así como al lugar donde se estudia.</li>
            <li>La encuesta de técnicas de estudio se refiere a los problemas de: lectura de libros, toma de apuntes,
                preparación de exámenes y la realización de los mismos.</li>
            <li>La encuesta de motivación para el estudio se refiere a los problemas relacionados con la actitud
                indiferente o negativa hacia el valor de la educación, y a los problemas que surgen de la indiferencia
                hacia tus docentes.</li>
        </ul>

        <h3>TABLA COMPARATIVA ENCUESTAS SOBRE HABILIDADES DE ESTUDIO</h3>
        <table border="1">
            <thead>
                <tr>
                    <th>Calificación en organización del estudio (I)</th>
                    <th>Calificación de técnicas de estudio (II)</th>
                    <th>Calificación en motivación para el estudio (III)</th>
                    <th>Calificación total en habilidades GLOBAL (IV)</th>
                    <th>Interpretación (V)</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>20</td>
                    <td>20</td>
                    <td>20</td>
                    <td>57-60</td>
                    <td>Muy alto</td>
                </tr>
                <tr>
                    <td>19</td>
                    <td>18-19</td>
                    <td>19</td>
                    <td>52-56</td>
                    <td>Alto</td>
                </tr>
                <tr>
                    <td>18</td>
                    <td>17</td>
                    <td>18</td>
                    <td>50-51</td>
                    <td>Por encima del promedio</td>
                </tr>
                <tr>
                    <td>16-17</td>
                    <td>16</td>
                    <td>17</td>
                    <td>48-49</td>
                    <td>Promedio alto</td>
                </tr>
                <tr>
                    <td>14-13</td>
                    <td>14-15</td>
                    <td>16</td>
                    <td>43-47</td>
                    <td>Promedio</td>
                </tr>
                <tr>
                    <td>12-13</td>
                    <td>13</td>
                    <td>15</td>
                    <td>39-42</td>
                    <td>Promedio bajo</td>
                </tr>
                <tr>
                    <td>11</td>
                    <td>12</td>
                    <td>13-14</td>
                    <td>37-38</td>
                    <td>Por debajo del promedio</td>
                </tr>
                <tr>
                    <td>10</td>
                    <td>11</td>
                    <td>12</td>
                    <td>34-36</td>
                    <td>Bajo</td>
                </tr>
                <tr>
                    <td>0-9</td>
                    <td>0-10</td>
                    <td>0-11</td>
                    <td>0-33</td>
                    <td>Muy bajo</td>
                </tr>
            </tbody>
        </table>
    </div>

</div>
</main>

</body>

</html>
