<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Habilidades de Estudio - Maestro</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.29/jspdf.plugin.autotable.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        montserrat: ['Montserrat', 'sans-serif'],
                    },
                    colors: {
                        'sidebar-dark': '#2C2C2C',
                        'hover-pink': '#FF9898',
                        'tec-green': '#13934A',
                        'tec-green-dark': '#044C26',
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom Scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
        }
        
        input[type="radio"]:disabled {
            cursor: not-allowed;
            opacity: 0.8;
            accent-color: #13934A;
        }
    </style>
</head>

<body class="font-montserrat bg-cover bg-center bg-fixed min-h-screen md:h-[125vh] md:overflow-hidden flex flex-col bg-[url('{{ asset('multimedia/fondo.jpg') }}')] md:[zoom:80%]">

    <!-- Header -->
    <div class="bg-tec-green shadow-[0_12px_14px_rgba(0,0,0,0.25)] h-16 md:h-24 shrink-0 flex items-center justify-between md:justify-center relative z-40 px-4">
        <button id="menuToggle" class="md:hidden text-white text-2xl z-50">
            <i class="fa-solid fa-bars"></i>
        </button>
        
        <div class="absolute left-5 hidden md:flex gap-4 items-center">
            <img src="{{ asset('multimedia/tesi.png') }}" alt="Logo TESI" class="h-12 md:h-16">
            <img src="{{ asset('multimedia/isclogo.png') }}" alt="Logo ISC" class="h-12 md:h-16">
        </div>
        <h1 class="text-white font-bold text-lg md:text-4xl tracking-wider">SISTEMA DE TUTORIAS</h1>
        <div class="md:hidden w-8"></div>
    </div>

    <!-- Subheader -->
    <div class="bg-tec-green shadow-[0_12px_14px_rgba(0,0,0,0.25)] h-10 md:h-12 shrink-0 flex items-center justify-center relative z-20">
        <h2 class="text-white font-bold text-base md:text-2xl tracking-wide">MAESTRO - VISTA DE ALUMNO</h2>
    </div>

    <!-- Main Container -->
    <div class="flex flex-1 overflow-hidden relative">
        
        <div id="overlay" class="hidden fixed inset-0 bg-black/50 z-30 md:hidden"></div>
        
        <!-- Sidebar -->
        <div id="sidebar" class="bg-sidebar-dark w-64 flex flex-col gap-1.5 md:gap-2 shadow-[4px_0_10px_rgba(0,0,0,0.3)]
            fixed md:absolute top-0 left-0 h-full z-40 md:z-30
            transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out
            p-4 md:p-6 overflow-y-auto">
            
            <button id="closeMenu" class="md:hidden self-end text-white text-2xl mb-3">
                <i class="fa-solid fa-times"></i>
            </button>

            <!-- Menú de Navegación -->
            <a href="{{ route('maestro.alumno.seleccionar', $alumno->id_alumno) }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1 mb-2">
                <i class="fa-solid fa-home text-base w-4"></i>
                <span>Inicio</span>
            </a>

            <div class="border-t border-white/20 my-2"></div>

            <!-- Opciones del Alumno -->
            <a href="{{ route('maestro.maestro.ficha_id_profesor', $alumno->id_alumno) }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-id-card text-base w-4"></i>
                <span>Ficha de Identificación</span>
            </a>

            <div class="text-hover-pink px-4 py-2.5 rounded-lg font-bold text-xs md:text-sm flex items-center gap-2 bg-hover-pink/10">
                <i class="fa-solid fa-clipboard-list text-base w-4"></i>
                <span>Habilidades de Estudio</span>
            </div>

            <a href="{{ route('maestro.maestro.solicitudes.lista', $alumno->id_alumno) }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-comments text-base w-4"></i>
                <span>Solicitudes de Asesoría</span>
            </a>

            <a href="{{ route('maestro.canalizacion_alumno', $alumno->id_alumno) }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-share-nodes text-base w-4"></i>
                <span>Canalización</span>
            </a>

            <div class="border-t border-white/20 my-2"></div>

            <a href="{{ route('maestro.grupo.show', $alumno->id_grupo) }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-arrow-left text-base w-4"></i>
                <span>Volver al Grupo</span>
            </a>

            <div class="mt-8">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="w-full bg-red-600 text-white font-bold py-2.5 px-4 rounded-lg hover:bg-red-700 transition-colors flex items-center justify-center gap-2 shadow-md">
                        <i class="fa-solid fa-right-from-bracket"></i>
                        <span>Cerrar Sesión</span>
                    </button>
                </form>
            </div>
        </div>

        <!-- Content Area -->
        <div id="content-area" class="flex-1 p-4 md:p-10 flex justify-center items-start overflow-y-auto md:ml-64 custom-scrollbar">
            <div class="bg-tec-green-dark/90 backdrop-blur-md rounded-xl md:rounded-2xl p-6 md:p-10 w-full max-w-6xl shadow-[0_8px_32px_rgba(0,0,0,0.3)]">
                
                <div class="flex flex-col md:flex-row justify-between items-center mb-8 border-b-2 border-white/30 pb-4 gap-4">
                    <h2 class="text-white text-xl md:text-3xl font-bold text-center md:text-left">
                        ENCUESTA DE HABILIDADES DE ESTUDIO
                    </h2>
                    <button onclick="generarPDF()" 
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-lg transition-all duration-300 flex items-center gap-2 hover:scale-105">
                        <i class="fa-solid fa-file-pdf"></i>
                        <span>Generar PDF</span>
                    </button>
                </div>

                <div class="text-white/90 mb-8 space-y-4 text-justify">
                    <p><strong>Resultados del Alumno:</strong> {{ $alumno->nombre_completo }}</p>
                    <p>A continuación se muestran las respuestas del alumno a los cuestionarios de organización, técnicas y motivación en el estudio.</p>
                </div>

                <!-- Encuesta de Organización -->
                <div class="mb-12">
                    <h3 class="text-white text-xl font-bold mb-4 border-l-4 border-hover-pink pl-3">I. Organización del Estudio</h3>
                    <div class="overflow-x-auto rounded-lg border border-white/20">
                        <table class="w-full text-white border-collapse" id="tabla-organizacion">
                            <thead>
                                <tr class="bg-white/10">
                                    <th class="p-3 text-left border-b border-white/20 w-3/4">Preguntas</th>
                                    <th class="p-3 text-center border-b border-white/20">Sí</th>
                                    <th class="p-3 text-center border-b border-white/20">No</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $preguntasOrg = [
                                        'A.- ¿Sueles dejar para el último la preparación de tus trabajos?',
                                        'B.- ¿Crees que el sueño o el cansancio te impidan estudiar eficazmente en muchas ocasiones?',
                                        'C.- ¿Es frecuente que no termines tu tarea a tiempo?',
                                        'D.- ¿Tiendes a emplear tiempo en leer revistas, ver televisión o charlar cuando debieras estudiar?',
                                        'E.- ¿Tus actividades sociales o deportivas te llevan a descuidar tus tareas escolares?',
                                        'F.- ¿Sueles dejar pasar un día o más antes de repasar los apuntes tomados en clase?',
                                        'G.- ¿Sueles dedicar tu tiempo libre entre las 4:00 de la tarde y las 9:00 de la noche a otras actividades que no sean estudiar?',
                                        'H.- ¿Descubres algunas veces de pronto que debes entregar una tarea antes de lo que creías?',
                                        'I.- ¿Te retrasas con frecuencia en una asignatura debido a que tienes que estudiar otra?',
                                        'J.- ¿Te parece que tu rendimiento es muy bajo en relación con el tiempo que dedicas al estudio?',
                                        'K.- ¿Está situado tu escritorio directamente frente a una ventana, puerta u otra fuente de distracción?',
                                        'L.- ¿Sueles tener fotografías, trofeos o recuerdos sobre tu mesa de escritorio?',
                                        'M.- ¿Sueles estudiar recostado en la cama o arrellanado en un asiento cómodo?',
                                        'N.- ¿Produce resplandor la lámpara que utilizas al estudiar?',
                                        'O.- Tu mesa de estudio, ¿está tan desordenada y llena de objetos que no dispones de sitio suficiente para estudiar con eficacia?',
                                        'P.- ¿Sueles interrumpir tu estudio por personas que vienen a visitarte?',
                                        'Q.- ¿Estudias con frecuencia mientras tienes puesta la televisión y/o la radio?',
                                        'R.- En el lugar donde estudias, ¿se pueden ver con facilidad revistas, fotos de jóvenes o materiales pertenecientes a tu afición?',
                                        'S.- ¿Con frecuencia interrumpen tu estudio actividades o ruidos que provienen del exterior?',
                                        'T.- ¿Suele hacerse lento tu estudio debido a que no tienes a la mano los libros y los materiales necesarios?'
                                    ];
                                @endphp
                                @foreach($preguntasOrg as $index => $pregunta)
                                    @php $i = $index + 1; @endphp
                                    <tr class="hover:bg-white/5 border-b border-white/10">
                                        <td class="p-3 border-r border-white/10">{{ $pregunta }}</td>
                                        <td class="p-3 text-center border-r border-white/10">
                                            <input type="radio" name="org_p{{$i}}" value="si" disabled {{ isset($organizacion) && $organizacion->{'pregunta_'.$i.'_organizacion'} == 'si' ? 'checked' : '' }}>
                                        </td>
                                        <td class="p-3 text-center">
                                            <input type="radio" name="org_p{{$i}}" value="no" disabled {{ isset($organizacion) && $organizacion->{'pregunta_'.$i.'_organizacion'} == 'no' ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Encuesta de Técnicas -->
                <div class="mb-12">
                    <h3 class="text-white text-xl font-bold mb-4 border-l-4 border-hover-pink pl-3">II. Técnicas de Estudio</h3>
                    <div class="overflow-x-auto rounded-lg border border-white/20">
                        <table class="w-full text-white border-collapse" id="tabla-tecnicas">
                            <thead>
                                <tr class="bg-white/10">
                                    <th class="p-3 text-left border-b border-white/20 w-3/4">Preguntas</th>
                                    <th class="p-3 text-center border-b border-white/20">Sí</th>
                                    <th class="p-3 text-center border-b border-white/20">No</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $preguntasTec = [
                                        'A.- ¿Tiendes a comenzar la lectura de un libro de texto sin hojear previamente los subtítulos y las ilustraciones?',
                                        'B.- ¿Te saltas por lo general las figuras, gráficas y tablas cuando estudias un tema?',
                                        'C.- ¿Suelo serte difícil seleccionar los puntos de los temas de estudio?',
                                        'D.- ¿Te sorprendes con cierta frecuencia, pensando en algo que no tiene nada que ver con lo que estudias?',
                                        'E.- ¿Sueles tener dificultad en entender tus apuntes de clase cuando tratas de repasarlos, después de cierto tiempo?',
                                        'F.- Al tomar notas, ¿te sueles quedar atrás con frecuencia debido a que no puedes escribir con suficiente rapidez?',
                                        'G.- Poco después de comenzar un curso, ¿sueles encontrarte con tus apuntes formando un “revoltijo"?',
                                        'H.- ¿Tomas normalmente tus apuntes tratando de escribir las palabras exactas del docente?',
                                        'I.- Cuando tomas notas de un libro, ¿tienes la costumbre de copiar el material necesario, palabra por Palabra?',
                                        'J.- ¿Te es difícil preparar un temario apropiado para una evaluación?',
                                        'K.- ¿Tienes problemas para organizar los datos o el contenido de una evaluación?',
                                        'L.- ¿Al repasar el temario de una evaluación formulas un resumen de este?',
                                        'M.- ¿Te preparas a veces para una evaluación memorizando fórmulas, definiciones o reglas que no entiendes con claridad?',
                                        'N.- ¿Te resulta difícil decidir qué estudiar y cómo estudiarlo cuando preparas una evaluación?',
                                        'O.- ¿Sueles tener dificultades para organizar, en un orden lógico, las asignaturas que debes estudiar por temas?',
                                        'P.- Al preparar evaluación, ¿sueles estudiar toda la asignatura, en el último momento?',
                                        'Q.- ¿Sueles entregar tus exámenes sin revisarlos detenidamente, para ver si tienen algún error cometido por descuido?',
                                        'R.- ¿Te es posible con frecuencia terminar una evaluación de exposición de un tema en el tiempo prescrito?',
                                        'S.- ¿Sueles perder puntos en exámenes con preguntas de “Verdadero - Falso", debido a que no lees detenidamente?',
                                        'T.- ¿Empleas normalmente mucho tiempo en contestar la primera mitad de la prueba y tienes que apresurarte en la segunda?'
                                    ];
                                @endphp
                                @foreach($preguntasTec as $index => $pregunta)
                                    @php $i = $index + 1; @endphp
                                    <tr class="hover:bg-white/5 border-b border-white/10">
                                        <td class="p-3 border-r border-white/10">{{ $pregunta }}</td>
                                        <td class="p-3 text-center border-r border-white/10">
                                            <input type="radio" name="tec_p{{$i}}" value="si" disabled {{ isset($tecnica) && $tecnica->{'pregunta_'.$i.'_tecnica'} == 'si' ? 'checked' : '' }}>
                                        </td>
                                        <td class="p-3 text-center">
                                            <input type="radio" name="tec_p{{$i}}" value="no" disabled {{ isset($tecnica) && $tecnica->{'pregunta_'.$i.'_tecnica'} == 'no' ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Encuesta de Motivación -->
                <div class="mb-12">
                    <h3 class="text-white text-xl font-bold mb-4 border-l-4 border-hover-pink pl-3">III. Motivación para el Estudio</h3>
                    <div class="overflow-x-auto rounded-lg border border-white/20">
                        <table class="w-full text-white border-collapse" id="tabla-motivacion">
                            <thead>
                                <tr class="bg-white/10">
                                    <th class="p-3 text-left border-b border-white/20 w-3/4">Preguntas</th>
                                    <th class="p-3 text-center border-b border-white/20">Sí</th>
                                    <th class="p-3 text-center border-b border-white/20">No</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $preguntasMot = [
                                        'A.- Después de los primeros días o semanas del curso, ¿tiendes a perder interés por el estudio?',
                                        'B.- ¿Crees que en general, basta estudiar lo necesario para obtener un "aprobado” en las asignaturas?',
                                        'C.- ¿Te sientes frecuentemente confuso o indeciso sobre cuáles deben ser tus metas formativas y profesionales?',
                                        'D.- ¿Sueles pensar que no vale la pena el tiempo y el esfuerzo que son necesarios para lograr una educación universitaria?',
                                        'E.- ¿Crees que es más importante divertirte y disfrutar de la vida, que estudiar?',
                                        'F.- ¿Sueles pasar el tiempo de clase en divagaciones o soñando despierto en lugar de atender al docente?',
                                        'G.- ¿Te sientes habitualmente incapaz de concentrarte en tus estudios debido a que estas inquieto, aburrido o de mal humor?',
                                        'H.- ¿Piensas con frecuencia que las asignaturas que estudias tienen poco valor practico para ti?',
                                        'I.- ¿Sientes, frecuentes deseos de abandonar la escuela y conseguir un trabajo?',
                                        'J.- ¿Sueles tener la sensación de lo que se enseña en los centros docentes no te prepara para afrontar los problemas de la vida adulta?',
                                        'K.- ¿Sueles dedicarte de modo casual, según el estado de ánimo en que te encuentres?',
                                        'L.- ¿Te horroriza estudiar libros de textos porque son insípidos y aburridos?',
                                        'M.- ¿Esperas normalmente a que te fijen la fecha de una evaluación para comenzar a estudiar los textos o repasar tus apuntes de clases?',
                                        'N - ¿Sueles pensar que los exámenes son pruebas penosas de las que no se puede escapar y respecto a las cuales lo que debe hacerse es sobrevivir, del modo que sea?',
                                        'O.- ¿Sientes con frecuencia que tus docentes no comprenden las necesidades de los estudiantes?',
                                        'P.- ¿Tienes normalmente la sensación de que tus docentes exigen demasiadas horas de estudio fuera de clase?',
                                        'Q.- ¿Dudas por lo general, en pedir ayuda a tus docentes en tareas que te son difíciles?',
                                        'R.- ¿Sueles pensar que tus docentes no tienen contacto con los temas y sucesos de actualidad?',
                                        'S.- ¿Te sientes reacio, por lo general, a hablar con tus docentes de tus proyectos futuros, de estudio o profesionales?',
                                        'T.- ¿Criticas con frecuencia a tus docentes cuando charlas con tus compañeros?'
                                    ];
                                @endphp
                                @foreach($preguntasMot as $index => $pregunta)
                                    @php $i = $index + 1; @endphp
                                    <tr class="hover:bg-white/5 border-b border-white/10">
                                        <td class="p-3 border-r border-white/10">{{ $pregunta }}</td>
                                        <td class="p-3 text-center border-r border-white/10">
                                            <input type="radio" name="mot_p{{$i}}" value="si" disabled {{ isset($motivacion) && $motivacion->{'pregunta_'.$i.'_motivacion'} == 'si' ? 'checked' : '' }}>
                                        </td>
                                        <td class="p-3 text-center">
                                            <input type="radio" name="mot_p{{$i}}" value="no" disabled {{ isset($motivacion) && $motivacion->{'pregunta_'.$i.'_motivacion'} == 'no' ? 'checked' : '' }}>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Tabla Comparativa -->
                <div class="mb-8">
                    <h3 class="text-white text-xl font-bold mb-4 border-l-4 border-hover-pink pl-3">Tabla Comparativa de Resultados</h3>
                    <div class="overflow-x-auto rounded-lg border border-white/20">
                        <table class="w-full text-white border-collapse text-center text-sm">
                            <thead>
                                <tr class="bg-white/10">
                                    <th class="p-2 border border-white/20">Organización (I)</th>
                                    <th class="p-2 border border-white/20">Técnicas (II)</th>
                                    <th class="p-2 border border-white/20">Motivación (III)</th>
                                    <th class="p-2 border border-white/20">Total Global (IV)</th>
                                    <th class="p-2 border border-white/20">Interpretación (V)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="hover:bg-white/5"><td class="p-2 border border-white/20">20</td><td class="p-2 border border-white/20">20</td><td class="p-2 border border-white/20">20</td><td class="p-2 border border-white/20">57-60</td><td class="p-2 border border-white/20">Muy alto</td></tr>
                                <tr class="hover:bg-white/5"><td class="p-2 border border-white/20">19</td><td class="p-2 border border-white/20">18-19</td><td class="p-2 border border-white/20">19</td><td class="p-2 border border-white/20">52-56</td><td class="p-2 border border-white/20">Alto</td></tr>
                                <tr class="hover:bg-white/5"><td class="p-2 border border-white/20">18</td><td class="p-2 border border-white/20">17</td><td class="p-2 border border-white/20">18</td><td class="p-2 border border-white/20">50-51</td><td class="p-2 border border-white/20">Por encima del promedio</td></tr>
                                <tr class="hover:bg-white/5"><td class="p-2 border border-white/20">16-17</td><td class="p-2 border border-white/20">16</td><td class="p-2 border border-white/20">17</td><td class="p-2 border border-white/20">48-49</td><td class="p-2 border border-white/20">Promedio alto</td></tr>
                                <tr class="hover:bg-white/5"><td class="p-2 border border-white/20">14-13</td><td class="p-2 border border-white/20">14-15</td><td class="p-2 border border-white/20">16</td><td class="p-2 border border-white/20">43-47</td><td class="p-2 border border-white/20">Promedio</td></tr>
                                <tr class="hover:bg-white/5"><td class="p-2 border border-white/20">12-13</td><td class="p-2 border border-white/20">13</td><td class="p-2 border border-white/20">15</td><td class="p-2 border border-white/20">39-42</td><td class="p-2 border border-white/20">Promedio bajo</td></tr>
                                <tr class="hover:bg-white/5"><td class="p-2 border border-white/20">11</td><td class="p-2 border border-white/20">12</td><td class="p-2 border border-white/20">13-14</td><td class="p-2 border border-white/20">37-38</td><td class="p-2 border border-white/20">Por debajo del promedio</td></tr>
                                <tr class="hover:bg-white/5"><td class="p-2 border border-white/20">10</td><td class="p-2 border border-white/20">11</td><td class="p-2 border border-white/20">12</td><td class="p-2 border border-white/20">34-36</td><td class="p-2 border border-white/20">Bajo</td></tr>
                                <tr class="hover:bg-white/5"><td class="p-2 border border-white/20">0-9</td><td class="p-2 border border-white/20">0-10</td><td class="p-2 border border-white/20">0-11</td><td class="p-2 border border-white/20">0-33</td><td class="p-2 border border-white/20">Muy bajo</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>



            </div>
        </div>
    </div>

    <script>
        // Menú hamburguesa
        const menuToggle = document.getElementById('menuToggle');
        const closeMenu = document.getElementById('closeMenu');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        });

        const closeSidebar = () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
            document.body.style.overflow = '';
        };

        closeMenu.addEventListener('click', closeSidebar);
        overlay.addEventListener('click', closeSidebar);

        // Función Generar PDF
        function generarPDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            // Configuración de fuentes y colores
            doc.setFont("helvetica", "bold");
            doc.setFontSize(18);
            doc.setTextColor(44, 62, 80); // Color oscuro
            doc.text('Encuesta de Habilidades de Estudio', 105, 20, null, null, 'center');
            
            doc.setFontSize(12);
            doc.setTextColor(100);
            doc.text('Alumno: {{ $alumno->nombre_completo }}', 14, 30);
            
            let yPos = 40;

            // Función auxiliar para agregar tablas
            const agregarTabla = (titulo, idTabla) => {
                doc.setFontSize(14);
                doc.setTextColor(19, 147, 74); // Tec Green
                doc.text(titulo, 14, yPos);
                yPos += 5;

                const tabla = document.getElementById(idTabla);
                const filas = [];
                
                // Recorrer filas de la tabla HTML
                tabla.querySelectorAll('tbody tr').forEach(tr => {
                    const pregunta = tr.cells[0].innerText;
                    const siChecked = tr.cells[1].querySelector('input').checked ? 'X' : '';
                    const noChecked = tr.cells[2].querySelector('input').checked ? 'X' : '';
                    filas.push([pregunta, siChecked, noChecked]);
                });

                doc.autoTable({
                    startY: yPos,
                    head: [['Pregunta', 'Sí', 'No']],
                    body: filas,
                    theme: 'grid',
                    headStyles: { fillColor: [19, 147, 74], textColor: 255 },
                    columnStyles: {
                        0: { cellWidth: 130 },
                        1: { cellWidth: 20, halign: 'center' },
                        2: { cellWidth: 20, halign: 'center' }
                    },
                    margin: { top: 10 },
                });

                yPos = doc.lastAutoTable.finalY + 15;
            };

            agregarTabla('I. Organización del Estudio', 'tabla-organizacion');
            
            // Verificar si necesitamos nueva página
            if (yPos > 250) { doc.addPage(); yPos = 20; }
            agregarTabla('II. Técnicas de Estudio', 'tabla-tecnicas');

            if (yPos > 250) { doc.addPage(); yPos = 20; }
            agregarTabla('III. Motivación para el Estudio', 'tabla-motivacion');

            doc.save('Encuesta_Habilidades_{{ $alumno->matricula }}.pdf');
        }
    </script>

</body>
</html>
