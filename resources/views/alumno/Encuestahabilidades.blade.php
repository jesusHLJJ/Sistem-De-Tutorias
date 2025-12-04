<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Encuesta de Habilidades de Estudio - Alumno</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>

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
        .custom-scrollbar::-webkit-scrollbar {
            height: 8px;
            width: 8px;
        }
        .custom-scrollbar::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.3);
            border-radius: 4px;
        }
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.5);
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
        <h2 class="text-white font-bold text-base md:text-2xl tracking-wide">ALUMNO</h2>
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

            <!-- Saludo al Alumno -->
            <div class="text-white mb-4 px-2">
                <p class="text-sm opacity-80">Hola</p>
                <p class="font-bold text-lg leading-tight">{{ optional(auth()->user()->alumno)->nombre ?? 'Alumno' }}</p>
            </div>
            
            <a href="{{ route('alumno.dashboard') }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-home text-base w-4"></i>
                <span>Inicio</span>
            </a>
            
            <div class="border-t border-white/20 my-1"></div>
            
            <a href="{{ route('alumno.fichaidentificacion') }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-id-card text-base w-4"></i>
                <span>Ficha de Identificación</span>
            </a>
            
            <!-- Elemento activo - Encuesta -->
            <div class="text-hover-pink px-4 py-2.5 rounded-lg font-bold text-xs md:text-sm flex items-center gap-2 bg-hover-pink/10">
                <i class="fa-solid fa-clipboard-list text-base w-4"></i>
                <span>Encuesta sobre habilidades</span>
            </div>
            
            <a href="{{ route('alumno.solicitudes.lista') }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-comments text-base w-4"></i>
                <span>Ver mis solicitudes de asesoria</span>
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
        <div id="content-area" class="flex-1 p-4 md:p-10 flex justify-center items-start overflow-y-auto md:ml-64">
            <div class="bg-tec-green-dark/90 backdrop-blur-md rounded-xl md:rounded-2xl p-6 md:p-10 w-full max-w-6xl shadow-[0_8px_32px_rgba(0,0,0,0.3)]">
                
                <h2 class="text-white text-xl md:text-3xl font-bold mb-8 text-center border-b-2 border-white/30 pb-4">
                    ENCUESTA DE HABILIDADES DE ESTUDIO
                </h2>

                <div class="text-white text-sm md:text-base mb-8 space-y-4 bg-white/10 p-6 rounded-xl">
                    <p><strong>Instrucciones:</strong> La presente encuesta está formada por tres breves cuestionarios en los cuales puedes indicar los problemas referentes a organización, técnicas y motivación en el estudio que quizá perjudican tu rendimiento académico. Si contestas todas las preguntas con sinceridad y reflexión, podrás identificar mucho de tus actuales defectos al estudiar.</p>
                    <p>Cada cuestionario contiene veinte preguntas a las que se contestará con <strong>sí</strong> o <strong>no</strong> al finalizar cada pregunta según corresponda tu respuesta. No hay respuestas "correctas" o "incorrectas", ya que la contestación adecuada es tu juicio sincero sobre tu modo de actuar y tus actitudes personales respecto al estudio. No omitas ninguna de ellas.</p>
                </div>

                <!-- Encuesta de Organización del Estudio -->
                <div class="bg-white/5 p-6 rounded-xl border border-white/10 mb-8">
                    <h3 class="text-tec-green text-xl font-bold mb-4 border-b border-white/10 pb-2">Encuesta de Organización del Estudio</h3>
                    <form id="encuestaForm" action="{{ route('alumno.habilidad.guardar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="alumno_id" value="{{ $alumno->id_alumno}}">
                        <input type="hidden" name="total_no" id="total_no">

                        <div class="overflow-x-auto custom-scrollbar">
                            <table class="w-full text-white text-sm min-w-[600px]">
                                <thead>
                                    <tr class="bg-white/10">
                                        <th class="p-3 text-left rounded-tl-lg w-3/4">Preguntas</th>
                                        <th class="p-3 text-center w-1/8">Sí</th>
                                        <th class="p-3 text-center rounded-tr-lg w-1/8">No</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-white/10">
                                    @php
                                        $preguntasOrg = [
                                            1 => 'A.- ¿Sueles dejar para el último la preparación de tus trabajos?',
                                            2 => 'B.- ¿Crees que el sueño o el cansancio te impidan estudiar eficazmente en muchas ocasiones?',
                                            3 => 'C.- ¿Es frecuente que no termines tu tarea a tiempo?',
                                            4 => 'D.- ¿Tiendes a emplear tiempo en leer revistas, ver televisión o charlar cuando debieras estudiar?',
                                            5 => 'E.- ¿Tus actividades sociales o deportivas te llevan a descuidar tus tareas escolares?',
                                            6 => 'F.- ¿Sueles dejar pasar un día o más antes de repasar los apuntes tomados en clase?',
                                            7 => 'G.- ¿Sueles dedicar tu tiempo libre entre las 4:00 de la tarde y las 9:00 de la noche a otras actividades que no sean estudiar?',
                                            8 => 'H.- ¿Descubres algunas veces de pronto que debes entregar una tarea antes de lo que creías?',
                                            9 => 'I.- ¿Te retrasas con frecuencia en una asignatura debido a que tienes que estudiar otra?',
                                            10 => 'J.- ¿Te parece que tu rendimiento es muy bajo en relación con el tiempo que dedicas al estudio?',
                                            11 => 'K.- ¿Está situado tu escritorio directamente frente a una ventana, puerta u otra fuente de distracción?',
                                            12 => 'L.- ¿Sueles tener fotografías, trofeos o recuerdos sobre tu mesa de escritorio?',
                                            13 => 'M.- ¿Sueles estudiar recostado en la cama o arrellanado en un asiento cómodo?',
                                            14 => 'N.- ¿Produce resplandor la lámpara que utilizas al estudiar?',
                                            15 => 'O.- Tu mesa de estudio, ¿está tan desordenada y llena de objetos que no dispones de sitio suficiente para estudiar con eficacia?',
                                            16 => 'P.- ¿Sueles interrumpir tu estudio por personas que vienen a visitarte?',
                                            17 => 'Q.- ¿Estudias con frecuencia mientras tienes puesta la televisión y/o la radio?',
                                            18 => 'R.- En el lugar donde estudias, ¿se pueden ver con facilidad revistas, fotos de jóvenes o materiales pertenecientes a tu afición?',
                                            19 => 'S.- ¿Con frecuencia interrumpen tu estudio actividades o ruidos que provienen del exterior?',
                                            20 => 'T.- ¿Suele hacerse lento tu estudio debido a que no tienes a la mano los libros y los materiales necesarios?'
                                        ];
                                    @endphp
                                    @foreach($preguntasOrg as $i => $pregunta)
                                        <tr class="hover:bg-white/5 transition-colors">
                                            <td class="p-3">{{ $pregunta }}</td>
                                            <td class="p-3 text-center">
                                                <input type="radio" name="pregunta{{ $i }}" value="si"
                                                    {{ isset($organizacion) && $organizacion->{'pregunta_'.$i.'_organizacion'} == 'si' ? 'checked' : '' }}
                                                    onchange="contarRespuestas()" class="accent-tec-green w-4 h-4 cursor-pointer">
                                            </td>
                                            <td class="p-3 text-center">
                                                <input type="radio" name="pregunta{{ $i }}" value="no"
                                                    {{ isset($organizacion) && $organizacion->{'pregunta_'.$i.'_organizacion'} == 'no' ? 'checked' : '' }}
                                                    onchange="contarRespuestas()" class="accent-tec-green w-4 h-4 cursor-pointer">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4 flex justify-between items-center">
                            <p id="resultado" class="text-white font-bold"></p>
                            <button type="submit" class="bg-tec-green text-white font-bold py-2 px-6 rounded-lg hover:bg-tec-green-dark transition-colors">
                                Guardar Sección
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Encuesta sobre Técnicas de Estudio -->
                <div class="bg-white/5 p-6 rounded-xl border border-white/10 mb-8">
                    <h3 class="text-tec-green text-xl font-bold mb-4 border-b border-white/10 pb-2">Encuesta sobre Técnicas de Estudio</h3>
                    <form id="encuestaForm2" action="{{ route('alumno.habilidad.guardar2') }}" method="POST">
                        @csrf
                        <input type="hidden" name="alumno_id" value="{{ $alumno->id_alumno}}">
                        <input type="hidden" name="total_no2" id="total_no2">

                        <div class="overflow-x-auto custom-scrollbar">
                            <table class="w-full text-white text-sm min-w-[600px]">
                                <thead>
                                    <tr class="bg-white/10">
                                        <th class="p-3 text-left rounded-tl-lg w-3/4">Preguntas</th>
                                        <th class="p-3 text-center w-1/8">Sí</th>
                                        <th class="p-3 text-center rounded-tr-lg w-1/8">No</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-white/10">
                                    @php
                                        $preguntasTec = [
                                            21 => 'A.- ¿Tiendes a comenzar la lectura de un libro de texto sin hojear previamente los subtítulos y las ilustraciones?',
                                            22 => 'B.- ¿Te saltas por lo general las figuras, gráficas y tablas cuando estudias un tema?',
                                            23 => 'C.- ¿Suelo serte difícil seleccionar los puntos de los temas de estudio?',
                                            24 => 'D.- ¿Te sorprendes con cierta frecuencia, pensando en algo que no tiene nada que ver con lo que estudias?',
                                            25 => 'E.- ¿Sueles tener dificultad en entender tus apuntes de clase cuando tratas de repasarlos, después de cierto tiempo?',
                                            26 => 'F.- Al tomar notas, ¿te sueles quedar atrás con frecuencia debido a que no puedes escribir con suficiente rapidez?',
                                            27 => 'G.- Poco después de comenzar un curso, ¿sueles encontrarte con tus apuntes formando un “revoltijo"?',
                                            28 => 'H.- ¿Tomas normalmente tus apuntes tratando de escribir las palabras exactas del docente?',
                                            29 => 'I.- Cuando tomas notas de un libro, ¿tienes la costumbre de copiar el material necesario, palabra por Palabra?',
                                            30 => 'J.- ¿Te es difícil preparar un temario apropiado para una evaluación?',
                                            31 => 'K.- ¿Tienes problemas para organizar los datos o el contenido de una evaluación?',
                                            32 => 'L.- ¿Al repasar el temario de una evaluación formulas un resumen de este?',
                                            33 => 'M.- ¿Te preparas a veces para una evaluación memorizando fórmulas, definiciones o reglas que no entiendes con claridad?',
                                            34 => 'N.- ¿Te resulta difícil decidir qué estudiar y cómo estudiarlo cuando preparas una evaluación?',
                                            35 => 'O.- ¿Sueles tener dificultades para organizar, en un orden lógico, las asignaturas que debes estudiar por temas?',
                                            36 => 'P.- Al preparar evaluación, ¿sueles estudiar toda la asignatura, en el último momento?',
                                            37 => 'Q.- ¿Sueles entregar tus exámenes sin revisarlos detenidamente, para ver si tienen algún error cometido por descuido?',
                                            38 => 'R.- ¿Te es posible con frecuencia terminar una evaluación de exposición de un tema en el tiempo prescrito?',
                                            39 => 'S.- ¿Sueles perder puntos en exámenes con preguntas de “Verdadero - Falso", debido a que no lees detenidamente?',
                                            40 => 'T.- ¿Empleas normalmente mucho tiempo en contestar la primera mitad de la prueba y tienes que apresurarte en la segunda?'
                                        ];
                                    @endphp
                                    @foreach($preguntasTec as $i => $pregunta)
                                        <tr class="hover:bg-white/5 transition-colors">
                                            <td class="p-3">{{ $pregunta }}</td>
                                            <td class="p-3 text-center">
                                                <input type="radio" name="pregunta{{ $i }}" value="si"
                                                    {{ isset($tecnica) && $tecnica->{'pregunta_'.($i-20).'_tecnica'} == 'si' ? 'checked' : '' }}
                                                    onchange="contarRespuestas2()" class="accent-tec-green w-4 h-4 cursor-pointer">
                                            </td>
                                            <td class="p-3 text-center">
                                                <input type="radio" name="pregunta{{ $i }}" value="no"
                                                    {{ isset($tecnica) && $tecnica->{'pregunta_'.($i-20).'_tecnica'} == 'no' ? 'checked' : '' }}
                                                    onchange="contarRespuestas2()" class="accent-tec-green w-4 h-4 cursor-pointer">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4 flex justify-between items-center">
                            <p id="resultado2" class="text-white font-bold"></p>
                            <button type="submit" class="bg-tec-green text-white font-bold py-2 px-6 rounded-lg hover:bg-tec-green-dark transition-colors">
                                Guardar Sección
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Encuesta sobre Motivación para el Estudio -->
                <div class="bg-white/5 p-6 rounded-xl border border-white/10 mb-8">
                    <h3 class="text-tec-green text-xl font-bold mb-4 border-b border-white/10 pb-2">Encuesta sobre Motivación para el Estudio</h3>
                    <form id="encuestaForm3" action="{{ route('alumno.habilidad.guardar3') }}" method="POST">
                        @csrf
                        <input type="hidden" name="alumno_id" value="{{ $alumno->id_alumno}}">
                        <input type="hidden" name="total_no3" id="total_no3">

                        <div class="overflow-x-auto custom-scrollbar">
                            <table class="w-full text-white text-sm min-w-[600px]">
                                <thead>
                                    <tr class="bg-white/10">
                                        <th class="p-3 text-left rounded-tl-lg w-3/4">Preguntas</th>
                                        <th class="p-3 text-center w-1/8">Sí</th>
                                        <th class="p-3 text-center rounded-tr-lg w-1/8">No</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-white/10">
                                    @php
                                        $preguntasMot = [
                                            41 => 'A.- Después de los primeros días o semanas del curso, ¿tiendes a perder interés por el estudio?',
                                            42 => 'B.- ¿Crees que en general, basta estudiar lo necesario para obtener un "aprobado” en las asignaturas?',
                                            43 => 'C.- ¿Te sientes frecuentemente confuso o indeciso sobre cuáles deben ser tus metas formativas y profesionales?',
                                            44 => 'D.- ¿Sueles pensar que no vale la pena el tiempo y el esfuerzo que son necesarios para lograr una educación universitaria?',
                                            45 => 'E.- ¿Crees que es más importante divertirte y disfrutar de la vida, que estudiar?',
                                            46 => 'F.- ¿Sueles pasar el tiempo de clase en divagaciones o soñando despierto en lugar de atender al docente?',
                                            47 => 'G.- ¿Te sientes habitualmente incapaz de concentrarte en tus estudios debido a que estas inquieto, aburrido o de mal humor?',
                                            48 => 'H.- ¿Piensas con frecuencia que las asignaturas que estudias tienen poco valor practico para ti?',
                                            49 => 'I.- ¿Sientes, frecuentes deseos de abandonar la escuela y conseguir un trabajo?',
                                            50 => 'J.- ¿Sueles tener la sensación de lo que se enseña en los centros docentes no te prepara para afrontar los problemas de la vida adulta?',
                                            51 => 'K.- ¿Sueles dedicarte de modo casual, según el estado de ánimo en que te encuentres?',
                                            52 => 'L.- ¿Te horroriza estudiar libros de textos porque son insípidos y aburridos?',
                                            53 => 'M.- ¿Esperas normalmente a que te fijen la fecha de una evaluación para comenzar a estudiar los textos o repasar tus apuntes de clases?',
                                            54 => 'N - ¿Sueles pensar que los exámenes son pruebas penosas de las que no se puede escapar y respecto a las cuales lo que debe hacerse es sobrevivir, del modo que sea?',
                                            55 => 'O.- ¿Sientes con frecuencia que tus docentes no comprenden las necesidades de los estudiantes?',
                                            56 => 'P.- ¿Tienes normalmente la sensación de que tus docentes exigen demasiadas horas de estudio fuera de clase?',
                                            57 => 'Q.- ¿Dudas por lo general, en pedir ayuda a tus docentes en tareas que te son difíciles?',
                                            58 => 'R.- ¿Sueles pensar que tus docentes no tienen contacto con los temas y sucesos de actualidad?',
                                            59 => 'S.- ¿Te sientes reacio, por lo general, a hablar con tus docentes de tus proyectos futuros, de estudio o profesionales?',
                                            60 => 'T.- ¿Criticas con frecuencia a tus docentes cuando charlas con tus compañeros?'
                                        ];
                                    @endphp
                                    @foreach($preguntasMot as $i => $pregunta)
                                        <tr class="hover:bg-white/5 transition-colors">
                                            <td class="p-3">{{ $pregunta }}</td>
                                            <td class="p-3 text-center">
                                                <input type="radio" name="pregunta{{ $i }}" value="si"
                                                    {{ isset($motivacion) && $motivacion->{'pregunta_'.($i-40).'_motivacion'} == 'si' ? 'checked' : '' }}
                                                    onchange="contarRespuestas3()" class="accent-tec-green w-4 h-4 cursor-pointer">
                                            </td>
                                            <td class="p-3 text-center">
                                                <input type="radio" name="pregunta{{ $i }}" value="no"
                                                    {{ isset($motivacion) && $motivacion->{'pregunta_'.($i-40).'_motivacion'} == 'no' ? 'checked' : '' }}
                                                    onchange="contarRespuestas3()" class="accent-tec-green w-4 h-4 cursor-pointer">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-4 flex justify-between items-center">
                            <p id="resultado3" class="text-white font-bold"></p>
                            <button type="submit" class="bg-tec-green text-white font-bold py-2 px-6 rounded-lg hover:bg-tec-green-dark transition-colors">
                                Guardar Sección
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Calificación Global -->
                <div class="bg-white/10 p-6 rounded-xl border border-white/20 mb-8">
                    <h2 class="text-white text-xl font-bold mb-4">Calificación Global</h2>
                    <div class="text-white text-sm space-y-3 mb-6">
                        <p>Se califica cada una de las encuestas por separado. Para calificar tu encuesta sigue el procedimiento que se te indica:</p>
                        <ol class="list-decimal list-inside ml-4 space-y-1">
                            <li>Se cuentan las respuestas a la que contestaste con la palabra NO.</li>
                            <li>Se utiliza la tabla de comparación para estudiantes universitarios.</li>
                            <li>Prestar atención especial a las calificaciones consideradas como un promedio bajo o incluso peor.</li>
                            <li>El paso siguiente ha de consistir en comenzar a corregir adecuadamente las deficiencias identificadas.</li>
                        </ol>
                    </div>

                    <h3 class="text-tec-green text-lg font-bold mb-4 text-center">TABLA COMPARATIVA ENCUESTAS SOBRE HABILIDADES DE ESTUDIO</h3>
                    <div class="overflow-x-auto custom-scrollbar">
                        <table class="w-full text-white text-sm text-center">
                            <thead>
                                <tr class="bg-white/20">
                                    <th class="p-3 border border-white/10">Calificación en organización del estudio (I)</th>
                                    <th class="p-3 border border-white/10">Calificación de técnicas de estudio (II)</th>
                                    <th class="p-3 border border-white/10">Calificación en motivación para el estudio (III)</th>
                                    <th class="p-3 border border-white/10">Calificación total en habilidades GLOBAL (IV)</th>
                                    <th class="p-3 border border-white/10">Interpretación (V)</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-white/10">
                                <tr class="hover:bg-white/5"><td class="p-2 border border-white/10">20</td><td class="p-2 border border-white/10">20</td><td class="p-2 border border-white/10">20</td><td class="p-2 border border-white/10">57-60</td><td class="p-2 border border-white/10 font-bold text-green-400">Muy alto</td></tr>
                                <tr class="hover:bg-white/5"><td class="p-2 border border-white/10">19</td><td class="p-2 border border-white/10">18-19</td><td class="p-2 border border-white/10">19</td><td class="p-2 border border-white/10">52-56</td><td class="p-2 border border-white/10 font-bold text-green-300">Alto</td></tr>
                                <tr class="hover:bg-white/5"><td class="p-2 border border-white/10">18</td><td class="p-2 border border-white/10">17</td><td class="p-2 border border-white/10">18</td><td class="p-2 border border-white/10">50-51</td><td class="p-2 border border-white/10 text-green-200">Por encima del promedio</td></tr>
                                <tr class="hover:bg-white/5"><td class="p-2 border border-white/10">16-17</td><td class="p-2 border border-white/10">16</td><td class="p-2 border border-white/10">17</td><td class="p-2 border border-white/10">48-49</td><td class="p-2 border border-white/10">Promedio alto</td></tr>
                                <tr class="hover:bg-white/5"><td class="p-2 border border-white/10">14-13</td><td class="p-2 border border-white/10">14-15</td><td class="p-2 border border-white/10">16</td><td class="p-2 border border-white/10">43-47</td><td class="p-2 border border-white/10">Promedio</td></tr>
                                <tr class="hover:bg-white/5"><td class="p-2 border border-white/10">12-13</td><td class="p-2 border border-white/10">13</td><td class="p-2 border border-white/10">15</td><td class="p-2 border border-white/10">39-42</td><td class="p-2 border border-white/10 text-yellow-200">Promedio bajo</td></tr>
                                <tr class="hover:bg-white/5"><td class="p-2 border border-white/10">11</td><td class="p-2 border border-white/10">12</td><td class="p-2 border border-white/10">13-14</td><td class="p-2 border border-white/10">37-38</td><td class="p-2 border border-white/10 text-orange-300">Por debajo del promedio</td></tr>
                                <tr class="hover:bg-white/5"><td class="p-2 border border-white/10">10</td><td class="p-2 border border-white/10">11</td><td class="p-2 border border-white/10">12</td><td class="p-2 border border-white/10">34-36</td><td class="p-2 border border-white/10 text-red-300">Bajo</td></tr>
                                <tr class="hover:bg-white/5"><td class="p-2 border border-white/10">0-9</td><td class="p-2 border border-white/10">0-10</td><td class="p-2 border border-white/10">0-11</td><td class="p-2 border border-white/10">0-33</td><td class="p-2 border border-white/10 font-bold text-red-500">Muy bajo</td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="flex justify-center pb-8">
                    <button id="generarPDF" onclick="generarPDF()" class="bg-blue-600 text-white font-bold py-3 px-8 rounded-full text-lg shadow-lg hover:bg-blue-700 hover:scale-105 transition-all duration-300 flex items-center gap-2">
                        <i class="fa-solid fa-file-pdf"></i>
                        <span>Generar PDF</span>
                    </button>
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

        const sidebarLinks = sidebar.querySelectorAll('a');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 768) {
                    closeSidebar();
                }
            });
        });

        // Funciones de conteo
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
            document.getElementById("resultado").innerHTML = `Sí: ${siCount} | No: ${noCount}`;
            document.getElementById("total_no").value = noCount;
        }

        function contarRespuestas2() {
            const respuestasSi = document.querySelectorAll('#encuestaForm2 input[type="radio"][value="si"]:checked');
            const respuestasNo = document.querySelectorAll('#encuestaForm2 input[type="radio"][value="no"]:checked');
            document.getElementById("resultado2").innerHTML = `Sí: ${respuestasSi.length} | No: ${respuestasNo.length}`;
            document.getElementById("total_no2").value = respuestasNo.length;
        }

        function contarRespuestas3() {
            const respuestasSi = document.querySelectorAll('#encuestaForm3 input[type="radio"][value="si"]:checked');
            const respuestasNo = document.querySelectorAll('#encuestaForm3 input[type="radio"][value="no"]:checked');
            document.getElementById("resultado3").innerHTML = `Sí: ${respuestasSi.length} | No: ${respuestasNo.length}`;
            document.getElementById("total_no3").value = respuestasNo.length;
        }

        // Inicializar conteos al cargar
        document.addEventListener("DOMContentLoaded", function() {
            contarRespuestas();
            contarRespuestas2();
            contarRespuestas3();
        });

        async function generarPDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            // Configuración de estilos
            const headerColor = [20, 40, 80]; // Azul oscuro tipo "oficial"
            const bodyStyles = { textColor: 0, lineColor: 0, lineWidth: 0.1 };
            const headStyles = { fillColor: headerColor, textColor: 255, fontStyle: 'bold', halign: 'center' };
            const columnStyles = {
                0: { cellWidth: 'auto' }, // Pregunta
                1: { cellWidth: 15, halign: 'center' }, // Sí
                2: { cellWidth: 15, halign: 'center' }  // No
            };

            // Función auxiliar para extraer datos de las tablas
            function extraerDatosTabla(formId) {
                const rows = [];
                const form = document.getElementById(formId);
                const trs = form.querySelectorAll('tbody tr');

                trs.forEach((tr, index) => {
                    const pregunta = tr.querySelector('td:first-child').innerText.trim();
                    const siChecked = tr.querySelector(`input[value="si"]`).checked;
                    const noChecked = tr.querySelector(`input[value="no"]`).checked;

                    rows.push([
                        pregunta,
                        siChecked ? 'X' : '',
                        noChecked ? 'X' : ''
                    ]);
                });
                return rows;
            }

            let finalY = 15;

            // --- SECCIÓN 1: ORGANIZACIÓN ---
            doc.setFontSize(12);
            doc.setFont("helvetica", "bold");
            doc.text("ENCUESTA PARA ORGANIZACIÓN DEL ESTUDIO", 105, finalY, { align: "center" });
            doc.text("_________________________________________", 105, finalY + 1, { align: "center" }); // Subrayado manual
            finalY += 10;

            doc.autoTable({
                startY: finalY,
                head: [['PREGUNTAS', 'SÍ', 'NO']],
                body: extraerDatosTabla('encuestaForm'),
                theme: 'grid',
                styles: bodyStyles,
                headStyles: headStyles,
                columnStyles: columnStyles,
                margin: { top: 15 }
            });

            // Calificación Sección 1
            finalY = doc.lastAutoTable.finalY + 10;
            const score1 = document.getElementById('total_no').value || "___";
            doc.setFontSize(10);
            doc.text(`CALIFICACIÓN: ${score1}`, 180, finalY, { align: "right" });
            
            // --- SECCIÓN 2: TÉCNICAS ---
            doc.addPage();
            finalY = 15;
            doc.setFontSize(12);
            doc.text("ENCUESTA SOBRE TÉCNICAS DE ESTUDIO", 105, finalY, { align: "center" });
            doc.text("_________________________________________", 105, finalY + 1, { align: "center" });
            finalY += 10;

            doc.autoTable({
                startY: finalY,
                head: [['PREGUNTAS', 'SÍ', 'NO']],
                body: extraerDatosTabla('encuestaForm2'),
                theme: 'grid',
                styles: bodyStyles,
                headStyles: headStyles,
                columnStyles: columnStyles,
                margin: { top: 15 }
            });

            // Calificación Sección 2
            finalY = doc.lastAutoTable.finalY + 10;
            const score2 = document.getElementById('total_no2').value || "___";
            doc.text(`CALIFICACIÓN: ${score2}`, 180, finalY, { align: "right" });

            // --- SECCIÓN 3: MOTIVACIÓN ---
            doc.addPage();
            finalY = 15;
            doc.setFontSize(12);
            doc.text("ENCUESTA SOBRE MOTIVACIÓN PARA EL ESTUDIO", 105, finalY, { align: "center" });
            doc.text("_________________________________________", 105, finalY + 1, { align: "center" });
            finalY += 10;

            doc.autoTable({
                startY: finalY,
                head: [['PREGUNTAS', 'SÍ', 'NO']],
                body: extraerDatosTabla('encuestaForm3'),
                theme: 'grid',
                styles: bodyStyles,
                headStyles: headStyles,
                columnStyles: columnStyles,
                margin: { top: 15 }
            });

            // Calificación Sección 3
            finalY = doc.lastAutoTable.finalY + 10;
            const score3 = document.getElementById('total_no3').value || "___";
            doc.text(`CALIFICACIÓN: ${score3}`, 180, finalY, { align: "right" });

            // --- TABLA GLOBAL ---
            doc.addPage();
            finalY = 15;
            doc.setFontSize(12);
            doc.text("CALIFICACIÓN GLOBAL", 105, finalY, { align: "center" });
            finalY += 10;

            // Texto explicativo (resumido para el PDF)
            doc.setFontSize(10);
            doc.setFont("helvetica", "normal");
            const textoGlobal = "Se califica cada una de las encuestas por separado. Para calificar tu encuesta sigue el procedimiento que se te indica:\n1.- Se cuentan las respuestas a la que contestaste con la palabra NO.\n2.- Se utiliza la tabla de comparación para estudiantes universitarios.\n3.- Prestar atención especial a las calificaciones consideradas como un promedio bajo o incluso peor.";
            doc.text(textoGlobal, 14, finalY, { maxWidth: 180 });
            finalY += 30;

            doc.setFont("helvetica", "bold");
            doc.text("TABLA COMPARATIVA ENCUESTAS SOBRE HABILIDADES DE ESTUDIO", 105, finalY, { align: "center" });
            doc.text("_________________________________________________________________", 105, finalY + 1, { align: "center" });
            finalY += 10;

            // Datos estáticos de la tabla global
            const globalData = [
                ['20', '20', '20', '57-60', 'Muy alto'],
                ['19', '18-19', '19', '52-56', 'Alto'],
                ['18', '17', '18', '50-51', 'Por encima del promedio'],
                ['16-17', '16', '17', '48-49', 'Promedio alto'],
                ['14-13', '14-15', '16', '43-47', 'Promedio'],
                ['12-13', '13', '15', '39-42', 'Promedio bajo'],
                ['11', '12', '13-14', '37-38', 'Por debajo del promedio'],
                ['10', '11', '12', '34-36', 'Bajo'],
                ['0-9', '0-10', '0-11', '0-33', 'Muy bajo']
            ];

            doc.autoTable({
                startY: finalY,
                head: [['Calificación en\norganización del\nestudio (I)', 'Calificación de\ntécnicas de estudio (II)', 'Calificación en\nmotivación para el\nestudio (III)', 'Calificación total\nen habilidades\nGLOBAL(IV)', 'Interpretación (V)']],
                body: globalData,
                theme: 'grid',
                styles: { 
                    textColor: 0, 
                    lineColor: 0, 
                    lineWidth: 0.1, 
                    halign: 'center', 
                    valign: 'middle',
                    fontSize: 9
                },
                headStyles: { 
                    fillColor: 255, 
                    textColor: 0, 
                    fontStyle: 'bold', 
                    lineWidth: 0.1,
                    lineColor: 0
                },
                margin: { top: 15 }
            });

            doc.save('Encuesta_Habilidades_Oficial.pdf');
        }
    </script>

</body>

</html>