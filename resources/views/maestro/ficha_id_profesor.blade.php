<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha de Identificación - Maestro</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>

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
        
        /* Disable radio button interaction but keep color */
        input[type="radio"]:disabled {
            cursor: not-allowed;
            opacity: 0.8; 
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
            <div class="text-hover-pink px-4 py-2.5 rounded-lg font-bold text-xs md:text-sm flex items-center gap-2 bg-hover-pink/10">
                <i class="fa-solid fa-id-card text-base w-4"></i>
                <span>Ficha de Identificación</span>
            </div>

            <a href="{{ route('maestro.maestro.maestro.habilidades', $alumno->id_alumno) }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-clipboard-list text-base w-4"></i>
                <span>Habilidades de Estudio</span>
            </a>

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
                
                <h2 class="text-white text-xl md:text-3xl font-bold text-center mb-8 border-b-2 border-white/30 pb-4">
                    FICHA DE IDENTIFICACIÓN DEL TUTORADO
                </h2>

                <div class="space-y-8">
                    
                    <!-- Datos Generales -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-white font-bold mb-2 text-sm">Nombre Completo:</label>
                            <input type="text" value="{{ $alumno->nombre_completo }}" readonly disabled
                                class="w-full bg-white/10 border border-white/30 rounded-lg px-4 py-2 text-white focus:outline-none cursor-not-allowed">
                        </div>
                        <div>
                            <label class="block text-white font-bold mb-2 text-sm">Carrera:</label>
                            <input type="text" value="{{ $alumno->carrera->carrera ?? 'No asignada' }}" readonly disabled
                                class="w-full bg-white/10 border border-white/30 rounded-lg px-4 py-2 text-white focus:outline-none cursor-not-allowed">
                        </div>
                        <div>
                            <label class="block text-white font-bold mb-2 text-sm">Matrícula:</label>
                            <input type="text" value="{{ $alumno->matricula }}" readonly disabled
                                class="w-full bg-white/10 border border-white/30 rounded-lg px-4 py-2 text-white focus:outline-none cursor-not-allowed">
                        </div>
                        <div>
                            <label class="block text-white font-bold mb-2 text-sm">Semestre:</label>
                            <input type="text" value="{{ optional($alumno->grupo->semestre)->semestre }}" readonly disabled
                                class="w-full bg-white/10 border border-white/30 rounded-lg px-4 py-2 text-white focus:outline-none cursor-not-allowed">
                        </div>
                        <div>
                            <label class="block text-white font-bold mb-2 text-sm">Correo Electrónico:</label>
                            <input type="text" value="{{ $alumno->user?->email }}" readonly disabled
                                class="w-full bg-white/10 border border-white/30 rounded-lg px-4 py-2 text-white focus:outline-none cursor-not-allowed">
                        </div>
                    </div>

                    <!-- Estado Psicofisiológico -->
                    <div>
                        <h3 class="text-white text-xl font-bold mb-4 border-l-4 border-hover-pink pl-3">Estado Psicofisiológico</h3>
                        <div class="overflow-x-auto">
                            <table class="w-full text-white border-collapse">
                                <thead>
                                    <tr class="bg-white/10">
                                        <th class="p-3 text-left border border-white/20">Indicadores</th>
                                        <th class="p-3 text-center border border-white/20">Frecuente</th>
                                        <th class="p-3 text-center border border-white/20">Muy Frecuente</th>
                                        <th class="p-3 text-center border border-white/20">Nunca</th>
                                        <th class="p-3 text-center border border-white/20">Antes</th>
                                        <th class="p-3 text-center border border-white/20">A veces</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $indicadores = [
                                            ['label' => 'Manos y/o pies hinchados', 'name' => 'manos_pies', 'field' => 'indicador_psicofisiologico_1'],
                                            ['label' => 'Dolores en el vientre', 'name' => 'dolores_vientre', 'field' => 'indicador_psicofisiologico_2'],
                                            ['label' => 'Dolores de cabeza y/o vómitos', 'name' => 'dolores_cabeza', 'field' => 'indicador_psicofisiologico_3'],
                                            ['label' => 'Pérdida del equilibrio', 'name' => 'equilibrio', 'field' => 'indicador_psicofisiologico_4'],
                                            ['label' => 'Fatiga y agotamiento', 'name' => 'fatiga', 'field' => 'indicador_psicofisiologico_5'],
                                            ['label' => 'Pérdida de vista u oído', 'name' => 'vista_oido', 'field' => 'indicador_psicofisiologico_6'],
                                            ['label' => 'Dificultades para dormir', 'name' => 'dormir', 'field' => 'indicador_psicofisiologico_7'],
                                            ['label' => 'Pesadillas o terrores nocturnos', 'name' => 'pesadillas', 'field' => 'indicador_psicofisiologico_8'],
                                            ['label' => 'Incontinencia (orina/heces)', 'name' => 'incontinencia', 'field' => 'indicador_psicofisiologico_9'],
                                            ['label' => 'Tartamudeos al explicarse', 'name' => 'tartamudeo', 'field' => 'indicador_psicofisiologico_10'],
                                            ['label' => 'Miedos intensos ante cosas', 'name' => 'miedo1', 'field' => 'indicador_psicofisiologico_11'],
                                        ];
                                    @endphp
                                    @foreach($indicadores as $ind)
                                        <tr class="hover:bg-white/5">
                                            <td class="p-3 border border-white/20">{{ $ind['label'] }}</td>
                                            @foreach(['frecuente', 'muy_frecuente', 'nunca', 'antes', 'a_veces'] as $val)
                                                <td class="p-3 text-center border border-white/20">
                                                    <input type="radio" name="{{ $ind['name'] }}" value="{{ $val }}" disabled 
                                                        style="accent-color: #13934A;"
                                                        {{ isset($ficha_psicofisiologica) && trim($ficha_psicofisiologica->{$ind['field']}) == $val ? 'checked' : '' }}>
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Área Familiar -->
                    <div>
                        <h3 class="text-white text-xl font-bold mb-4 border-l-4 border-hover-pink pl-3">Área Familiar</h3>
                        <div class="grid grid-cols-1 gap-6">
                            @php
                                $preguntasFamiliar = [
                                    ['label' => '¿Cómo es la relación con tu familia?', 'val' => $ficha_area_familiar->indicador_1 ?? ''],
                                    ['label' => '¿Existen dificultades?', 'val' => $ficha_area_familiar->indicador_2 ?? ''],
                                    ['label' => '¿De qué tipo?', 'val' => $ficha_area_familiar->indicador_3 ?? ''],
                                    ['label' => '¿Qué actitud tienes con tu familia?', 'val' => $ficha_area_familiar->indicador_4 ?? ''],
                                    ['label' => '¿Cómo te relacionas con tu padre?', 'val' => $ficha_area_familiar->indicador_5 ?? ''],
                                    ['label' => '¿Cómo te relacionas con tu madre?', 'val' => $ficha_area_familiar->indicador_6 ?? ''],
                                    ['label' => '¿Qué actitud tienes hacia tu madre?', 'val' => $ficha_area_familiar->indicador_7 ?? ''],
                                ];
                            @endphp
                            @foreach($preguntasFamiliar as $preg)
                                <div>
                                    <label class="block text-white font-bold mb-2 text-sm">{{ $preg['label'] }}</label>
                                    <textarea rows="2" disabled class="w-full bg-white/10 border border-white/30 rounded-lg px-4 py-2 text-white focus:outline-none cursor-not-allowed">{{ $preg['val'] }}</textarea>
                                </div>
                            @endforeach

                            <div>
                                <label class="block text-white font-bold mb-2 text-sm">¿Con quién te sientes más ligado afectivamente?</label>
                                <div class="flex flex-wrap gap-4">
                                    @foreach(['madre' => 'Madre', 'padre' => 'Padre', 'hermanos' => 'Hermanos', 'otros' => 'Otros'] as $val => $label)
                                        <label class="flex items-center gap-2 text-white">
                                            <input type="checkbox" disabled {{ (isset($ficha_area_familiar) && $ficha_area_familiar->indicador_8 == $val) ? 'checked' : '' }}>
                                            {{ $label }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                <label class="block text-white font-bold mb-2 text-sm">Especifica por qué:</label>
                                <textarea rows="2" disabled class="w-full bg-white/10 border border-white/30 rounded-lg px-4 py-2 text-white focus:outline-none cursor-not-allowed">{{ $ficha_area_familiar->indicador_9 ?? '' }}</textarea>
                            </div>
                            
                            <div>
                                <label class="block text-white font-bold mb-2 text-sm">¿Quién se ocupa más directamente de tu educación?</label>
                                <textarea rows="2" disabled class="w-full bg-white/10 border border-white/30 rounded-lg px-4 py-2 text-white focus:outline-none cursor-not-allowed">{{ $ficha_area_familiar->indicador_10 ?? '' }}</textarea>
                            </div>
                            
                            <div>
                                <label class="block text-white font-bold mb-2 text-sm">¿Quién ha influido más en tu decisión para estudiar esta carrera?</label>
                                <textarea rows="2" disabled class="w-full bg-white/10 border border-white/30 rounded-lg px-4 py-2 text-white focus:outline-none cursor-not-allowed">{{ $ficha_area_familiar->indicador_11 ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Área Social -->
                    <div>
                        <h3 class="text-white text-xl font-bold mb-4 border-l-4 border-hover-pink pl-3">Área Social</h3>
                        <div class="grid grid-cols-1 gap-6">
                            <div>
                                <label class="block text-white font-bold mb-2 text-sm">¿Cómo es tu relación con tus compañeros?</label>
                                <div class="flex gap-4">
                                    @foreach(['buena' => 'Buena', 'regular' => 'Regular', 'mala' => 'Mala'] as $val => $label)
                                        <label class="flex items-center gap-2 text-white">
                                            <input type="radio" name="relacion_companeros" value="{{ $val }}" disabled 
                                                style="accent-color: #13934A;"
                                                {{ (isset($ficha_area_social) && trim($ficha_area_social->indicador_1) == $val) ? 'checked' : '' }}>
                                            {{ $label }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                <label class="block text-white font-bold mb-2 text-sm">¿Por qué?</label>
                                <textarea rows="2" disabled class="w-full bg-white/10 border border-white/30 rounded-lg px-4 py-2 text-white focus:outline-none cursor-not-allowed">{{ $ficha_area_social->indicador_2 ?? '' }}</textarea>
                            </div>

                            <div>
                                <label class="block text-white font-bold mb-2 text-sm">¿Tienes pareja?</label>
                                <div class="flex gap-4">
                                    <label class="flex items-center gap-2 text-white">
                                        <input type="radio" name="tienes_pareja" value="si" disabled 
                                            style="accent-color: #13934A;"
                                            {{ (isset($ficha_area_social) && trim($ficha_area_social->indicador_3) == 'si') ? 'checked' : '' }}> Sí
                                    </label>
                                    <label class="flex items-center gap-2 text-white">
                                        <input type="radio" name="tienes_pareja" value="no" disabled 
                                            style="accent-color: #13934A;"
                                            {{ (isset($ficha_area_social) && trim($ficha_area_social->indicador_3) == 'no') ? 'checked' : '' }}> No
                                    </label>
                                </div>
                            </div>

                            @php
                                $preguntasSocial = [
                                    ['label' => '¿Cómo es tu relación con tu pareja?', 'val' => $ficha_area_social->indicador_4 ?? ''],
                                    ['label' => '¿Cómo es tu relación con tus profesores?', 'val' => $ficha_area_social->indicador_5 ?? ''],
                                    ['label' => '¿Cómo es tu relación con las autoridades académicas?', 'val' => $ficha_area_social->indicador_6 ?? ''],
                                    ['label' => '¿Qué haces en tu tiempo libre?', 'val' => $ficha_area_social->indicador_7 ?? ''],
                                ];
                            @endphp
                            @foreach($preguntasSocial as $preg)
                                <div>
                                    <label class="block text-white font-bold mb-2 text-sm">{{ $preg['label'] }}</label>
                                    <textarea rows="2" disabled class="w-full bg-white/10 border border-white/30 rounded-lg px-4 py-2 text-white focus:outline-none cursor-not-allowed">{{ $preg['val'] }}</textarea>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Características Personales -->
                    <div>
                        <h3 class="text-white text-xl font-bold mb-4 border-l-4 border-hover-pink pl-3">Características Personales</h3>
                        <div class="overflow-x-auto">
                            <table class="w-full text-white border-collapse">
                                <thead>
                                    <tr class="bg-white/10">
                                        <th class="p-3 text-left border border-white/20">Auto percepción</th>
                                        <th class="p-3 text-center border border-white/20">No</th>
                                        <th class="p-3 text-center border border-white/20">Poco</th>
                                        <th class="p-3 text-center border border-white/20">Frecuente</th>
                                        <th class="p-3 text-center border border-white/20">Mucho</th>
                                        <th class="p-3 text-left border border-white/20">Observaciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $caracteristicas = [
                                            ['label' => 'Puntual', 'field' => 'indicador_1', 'obs' => 'observacion_1'],
                                            ['label' => 'Tímida', 'field' => 'indicador_2', 'obs' => 'observacion_2'],
                                            ['label' => 'Alegre', 'field' => 'indicador_3', 'obs' => 'observacion_3'],
                                            ['label' => 'Agresiva', 'field' => 'indicador_4', 'obs' => 'observacion_4'],
                                            ['label' => 'Abierto/a a las ideas de otros', 'field' => 'indicador_5', 'obs' => 'observacion_5'],
                                            ['label' => 'Reflexivo/a', 'field' => 'indicador_6', 'obs' => 'observacion_6'],
                                            ['label' => 'Constante', 'field' => 'indicador_7', 'obs' => 'observacion_7'],
                                            ['label' => 'Optimista', 'field' => 'indicador_8', 'obs' => 'observacion_8'],
                                            ['label' => 'Impulsivo/a', 'field' => 'indicador_9', 'obs' => 'observacion_9'],
                                            ['label' => 'Silencioso', 'field' => 'indicador_10', 'obs' => 'observacion_10'],
                                            ['label' => 'Generoso', 'field' => 'indicador_11', 'obs' => 'observacion_11'],
                                            ['label' => 'Inquieto', 'field' => 'indicador_12', 'obs' => 'observacion_12'],
                                            ['label' => 'Cambios de humor', 'field' => 'indicador_13', 'obs' => 'observacion_13'],
                                            ['label' => 'Dominante', 'field' => 'indicador_14', 'obs' => 'observacion_14'],
                                            ['label' => 'Egoísta', 'field' => 'indicador_15', 'obs' => 'observacion_15'],
                                            ['label' => 'Sumiso', 'field' => 'indicador_16', 'obs' => 'observacion_16'],
                                            ['label' => 'Confiado en sí mismo', 'field' => 'indicador_17', 'obs' => 'observacion_17'],
                                            ['label' => 'Imaginativo', 'field' => 'indicador_18', 'obs' => 'observacion_18'],
                                            ['label' => 'Con iniciativa propia', 'field' => 'indicador_19', 'obs' => 'observacion_19'],
                                            ['label' => 'Sociable', 'field' => 'indicador_20', 'obs' => 'observacion_20'],
                                            ['label' => 'Responsable', 'field' => 'indicador_21', 'obs' => 'observacion_21'],
                                            ['label' => 'Perseverante', 'field' => 'indicador_22', 'obs' => 'observacion_22'],
                                            ['label' => 'Motivado', 'field' => 'indicador_23', 'obs' => 'observacion_23'],
                                            ['label' => 'Activo', 'field' => 'indicador_24', 'obs' => 'observacion_24'],
                                            ['label' => 'Independiente', 'field' => 'indicador_25', 'obs' => 'observacion_25'],
                                        ];
                                    @endphp
                                    @foreach($caracteristicas as $car)
                                        <tr class="hover:bg-white/5">
                                            <td class="p-3 border border-white/20">{{ $car['label'] }}</td>
                                            @foreach(['no', 'poco', 'frecuente', 'mucho'] as $val)
                                                <td class="p-3 text-center border border-white/20">
                                                    <input type="radio" name="{{ $car['field'] }}" value="{{ $val }}" disabled 
                                                        style="accent-color: #13934A;"
                                                        {{ isset($ficha_caracteristicas_personales) && trim($ficha_caracteristicas_personales->{$car['field']}) == $val ? 'checked' : '' }}>
                                                </td>
                                            @endforeach
                                            <td class="p-3 border border-white/20">
                                                <input type="text" value="{{ $ficha_caracteristicas_personales->{$car['obs']} ?? '' }}" readonly disabled class="w-full bg-transparent text-white focus:outline-none cursor-not-allowed">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Área Psicopedagógica -->
                    <div>
                        <h3 class="text-white text-xl font-bold mb-4 border-l-4 border-hover-pink pl-3">Área Psicopedagógica</h3>
                        <div class="grid grid-cols-1 gap-6">
                            @php
                                $preguntasPsico = [
                                    ['label' => '¿Cómo te gustaría ser?', 'val' => $ficha_psicopedagogica->indicador_psicopedagogico_1 ?? ''],
                                    ['label' => '¿Qué problemas personales intervienen en tus estudios?', 'val' => $ficha_psicopedagogica->indicador_psicopedagogico_2 ?? ''],
                                    ['label' => '¿Cuál es tu rendimiento escolar?', 'val' => $ficha_psicopedagogica->indicador_psicopedagogico_3 ?? ''],
                                    ['label' => 'Menciona las asignaturas que cursas en el semestre actual', 'val' => $ficha_psicopedagogica->indicador_psicopedagogico_4 ?? ''],
                                    ['label' => '¿Cuál es tu asignatura preferida? ¿Por qué?', 'val' => $ficha_psicopedagogica->indicador_psicopedagogico_5 ?? ''],
                                    ['label' => '¿Cuál es tu asignatura con más bajo promedio del semestre anterior? ¿Por qué?', 'val' => $ficha_psicopedagogica->indicador_psicopedagogico_6 ?? ''],
                                    ['label' => '¿Por qué escogiste al TESI como opción de estudios?', 'val' => $ficha_psicopedagogica->indicador_psicopedagogico_7 ?? ''],
                                ];
                            @endphp
                            @foreach($preguntasPsico as $preg)
                                <div>
                                    <label class="block text-white font-bold mb-2 text-sm">{{ $preg['label'] }}</label>
                                    <textarea rows="2" disabled class="w-full bg-white/10 border border-white/30 rounded-lg px-4 py-2 text-white focus:outline-none cursor-not-allowed">{{ $preg['val'] }}</textarea>
                                </div>
                            @endforeach

                            <div>
                                <label class="block text-white font-bold mb-2 text-sm">¿Tienes asignaturas reprobadas?</label>
                                <div class="flex gap-4">
                                    <label class="flex items-center gap-2 text-white">
                                        <input type="radio" disabled {{ (isset($ficha_psicopedagogica) && $ficha_psicopedagogica->indicador_psicopedagogico_8 == 'si') ? 'checked' : '' }}> Sí
                                    </label>
                                    <label class="flex items-center gap-2 text-white">
                                        <input type="radio" disabled {{ (isset($ficha_psicopedagogica) && $ficha_psicopedagogica->indicador_psicopedagogico_8 == 'no') ? 'checked' : '' }}> No
                                    </label>
                                </div>
                            </div>

                            <div>
                                <label class="block text-white font-bold mb-2 text-sm">En caso que si, ¿Cuáles?</label>
                                <textarea rows="2" disabled class="w-full bg-white/10 border border-white/30 rounded-lg px-4 py-2 text-white focus:outline-none cursor-not-allowed">{{ $ficha_psicopedagogica->indicador_psicopedagogico_9 ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Plan de Vida y Carrera -->
                    <div>
                        <h3 class="text-white text-xl font-bold mb-4 border-l-4 border-hover-pink pl-3">Plan de Vida y Carrera</h3>
                        <div class="grid grid-cols-1 gap-6">
                            @php
                                $preguntasPlan = [
                                    ['label' => '¿Cuáles son tus planes inmediatos?', 'val' => $ficha_psicopedagogica->plan_vida_carrera_1 ?? ''],
                                    ['label' => '¿Cuáles son tus metas en la vida?', 'val' => $ficha_psicopedagogica->plan_vida_carrera_2 ?? ''],
                                    ['label' => 'Yo soy...', 'val' => $ficha_psicopedagogica->caracteristicas_personales_1 ?? ''],
                                    ['label' => 'A mí me gusta que...', 'val' => $ficha_psicopedagogica->caracteristicas_personales_2 ?? ''],
                                    ['label' => 'Yo aspiro en la vida...', 'val' => $ficha_psicopedagogica->caracteristicas_personales_3 ?? ''],
                                    ['label' => 'Yo tengo miedo que...', 'val' => $ficha_psicopedagogica->caracteristicas_personales_4 ?? ''],
                                    ['label' => 'Pero pienso que podrá lograr...', 'val' => $ficha_psicopedagogica->caracteristicas_personales_5 ?? ''],
                                ];
                            @endphp
                            @foreach($preguntasPlan as $preg)
                                <div>
                                    <label class="block text-white font-bold mb-2 text-sm">{{ $preg['label'] }}</label>
                                    <textarea rows="2" disabled class="w-full bg-white/10 border border-white/30 rounded-lg px-4 py-2 text-white focus:outline-none cursor-not-allowed">{{ $preg['val'] }}</textarea>
                                </div>
                            @endforeach
                        </div>
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
    </script>

</body>
</html>