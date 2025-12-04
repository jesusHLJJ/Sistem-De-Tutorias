<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ficha de Identificación - Alumno</title>

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
        /* Custom scrollbar for tables if needed */
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
            
            <!-- Elemento activo - Ficha -->
            <div class="text-hover-pink px-4 py-2.5 rounded-lg font-bold text-xs md:text-sm flex items-center gap-2 bg-hover-pink/10">
                <i class="fa-solid fa-id-card text-base w-4"></i>
                <span>Ficha de Identificación</span>
            </div>
            
            <a href="{{ route('alumno.habilidades') }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-clipboard-list text-base w-4"></i>
                <span>Encuesta sobre habilidades</span>
            </a>
            
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
        <div class="flex-1 p-4 md:p-10 flex justify-center items-start overflow-y-auto md:ml-64">
            <div class="bg-tec-green-dark/90 backdrop-blur-md rounded-xl md:rounded-2xl p-6 md:p-10 w-full max-w-6xl shadow-[0_8px_32px_rgba(0,0,0,0.3)]">
                
                <h2 class="text-white text-xl md:text-3xl font-bold mb-8 text-center border-b-2 border-white/30 pb-4">
                    FICHA DE IDENTIFICACIÓN DEL TUTORADO
                </h2>

                <form method="POST" action="{{ route('alumno.ficha.guardar') }}" class="space-y-8">
                    @csrf
                    
                    <!-- Datos Generales -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-white text-sm font-bold mb-2">Nombre Completo:</label>
                            <input type="text" name="alumno_nombre" value="{{ $alumno->nombre_completo }}" readonly
                                class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-tec-green focus:bg-white/20 transition-all">
                            <input type="hidden" name="alumno_id" value="{{ $alumno->id_alumno }}">
                        </div>
                        <div>
                            <label class="block text-white text-sm font-bold mb-2">Carrera:</label>
                            <input type="text" name="carrera" value="{{ $alumno->carrera->carrera ?? 'No asignada' }}" readonly
                                class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-tec-green focus:bg-white/20 transition-all">
                        </div>
                        <div>
                            <label class="block text-white text-sm font-bold mb-2">Número de matrícula:</label>
                            <input type="text" name="matricula" value="{{ $alumno->matricula }}" readonly
                                class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-tec-green focus:bg-white/20 transition-all">
                        </div>
                        <div>
                            <label class="block text-white text-sm font-bold mb-2">Semestre:</label>
                            <input type="text" name="semestre" value="{{ optional($alumno->grupo->semestre)->semestre }}" readonly
                                class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-tec-green focus:bg-white/20 transition-all">
                        </div>
                        <div>
                            <label class="block text-white text-sm font-bold mb-2">Fecha:</label>
                            <input type="date" id="fecha" name="fecha" readonly
                                class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-tec-green focus:bg-white/20 transition-all">
                        </div>
                        <div>
                            <label class="block text-white text-sm font-bold mb-2">Correo Electrónico:</label>
                            <input type="email" name="correo_electronico" value="{{ $alumno->user?->email }}" readonly
                                class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-tec-green focus:bg-white/20 transition-all">
                        </div>
                    </div>

                    <!-- Estado Psicofisiológico -->
                    <div class="bg-white/5 p-6 rounded-xl border border-white/10">
                        <h3 class="text-tec-green text-xl font-bold mb-4 border-b border-white/10 pb-2">Estado Psicofisiológico</h3>
                        <div class="overflow-x-auto custom-scrollbar">
                            <table class="w-full text-white text-sm min-w-[800px]">
                                <thead>
                                    <tr class="bg-white/10">
                                        <th class="p-3 text-left rounded-tl-lg">Indicadores</th>
                                        <th class="p-3 text-center">Frecuente</th>
                                        <th class="p-3 text-center">Muy Frecuente</th>
                                        <th class="p-3 text-center">Nunca</th>
                                        <th class="p-3 text-center">Antes</th>
                                        <th class="p-3 text-center rounded-tr-lg">A veces</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-white/10">
                                    @php
                                        $indicadores = [
                                            ['label' => 'Manos y/o pies hinchados', 'name' => 'manos_pies', 'key' => 'indicador_psicofisiologico_1'],
                                            ['label' => 'Dolores en el vientre', 'name' => 'dolores_vientre', 'key' => 'indicador_psicofisiologico_2'],
                                            ['label' => 'Dolores de cabeza y/o vómitos', 'name' => 'dolores_cabeza', 'key' => 'indicador_psicofisiologico_3'],
                                            ['label' => 'Pérdida del equilibrio', 'name' => 'equilibrio', 'key' => 'indicador_psicofisiologico_4'],
                                            ['label' => 'Fatiga y agotamiento', 'name' => 'fatiga', 'key' => 'indicador_psicofisiologico_5'],
                                            ['label' => 'Pérdida de vista u oído', 'name' => 'vista_oido', 'key' => 'indicador_psicofisiologico_6'],
                                            ['label' => 'Dificultades para dormir', 'name' => 'dormir', 'key' => 'indicador_psicofisiologico_7'],
                                            ['label' => 'Pesadillas o terrores nocturnos', 'name' => 'pesadillas', 'key' => 'indicador_psicofisiologico_8'],
                                            ['label' => 'Incontinencia (orina/heces)', 'name' => 'incontinencia', 'key' => 'indicador_psicofisiologico_9'],
                                            ['label' => 'Tartamudeos al explicarse', 'name' => 'tartamudeo', 'key' => 'indicador_psicofisiologico_10'],
                                            ['label' => 'Miedos intensos ante cosas', 'name' => 'miedo1', 'key' => 'indicador_psicofisiologico_11'],
                                        ];
                                    @endphp
                                    @foreach($indicadores as $ind)
                                        <tr class="hover:bg-white/5 transition-colors">
                                            <td class="p-3">{{ $ind['label'] }}</td>
                                            @foreach(['frecuente', 'muy_frecuente', 'nunca', 'antes', 'a_veces'] as $val)
                                                <td class="p-3 text-center">
                                                    <input type="radio" name="{{ $ind['name'] }}" value="{{ $val }}" 
                                                        {{ isset($ficha_psicofisiologica) && $ficha_psicofisiologica->{$ind['key']} == $val ? 'checked' : '' }}
                                                        class="accent-tec-green w-4 h-4 cursor-pointer">
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Área Familiar -->
                    <div class="bg-white/5 p-6 rounded-xl border border-white/10">
                        <h3 class="text-tec-green text-xl font-bold mb-4 border-b border-white/10 pb-2">Área Familiar</h3>
                        <div class="space-y-4">
                            @php
                                $preguntasFamilia = [
                                    ['label' => '¿Cómo es la relación con tu familia?', 'name' => 'relacion_familia', 'key' => 'indicador_1'],
                                    ['label' => '¿Existen dificultades?', 'name' => 'dificultades_familia', 'key' => 'indicador_2'],
                                    ['label' => '¿De qué tipo?', 'name' => 'tipo_dificultades', 'key' => 'indicador_3'],
                                    ['label' => '¿Qué actitud tienes con tu familia?', 'name' => 'actitud_familia', 'key' => 'indicador_4'],
                                    ['label' => '¿Cómo te relacionas con tu padre?', 'name' => 'relacion_padre', 'key' => 'indicador_5'],
                                    ['label' => '¿Cómo te relacionas con tu madre?', 'name' => 'relacion_madre', 'key' => 'indicador_6'],
                                    ['label' => '¿Qué actitud tienes hacia tu madre?', 'name' => 'actitud_madre', 'key' => 'indicador_7'],
                                ];
                            @endphp
                            @foreach($preguntasFamilia as $preg)
                                <div>
                                    <label class="block text-white text-sm font-bold mb-2">{{ $preg['label'] }}</label>
                                    <textarea name="{{ $preg['name'] }}" rows="2"
                                        class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-tec-green focus:bg-white/20 transition-all">{{ $ficha_area_familiar->{$preg['key']} ?? '' }}</textarea>
                                </div>
                            @endforeach

                            <div>
                                <label class="block text-white text-sm font-bold mb-2">¿Con quién te sientes más ligado afectivamente?</label>
                                <div class="flex flex-wrap gap-4">
                                    @foreach(['madre' => 'Madre', 'padre' => 'Padre', 'hermanos' => 'Hermanos', 'otros' => 'Otros'] as $val => $label)
                                        <label class="flex items-center gap-2 text-white cursor-pointer">
                                            <input type="checkbox" name="ligado_afectivamente" value="{{ $val }}" 
                                                {{ (isset($ficha_area_familiar) && $ficha_area_familiar->indicador_8 == $val) ? 'checked' : '' }}
                                                class="accent-tec-green w-4 h-4 rounded">
                                            {{ $label }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                <label class="block text-white text-sm font-bold mb-2">Especifica por qué</label>
                                <textarea name="ligado_afectivamente_razon" rows="2"
                                    class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-tec-green focus:bg-white/20 transition-all">{{ $ficha_area_familiar->indicador_9 ?? '' }}</textarea>
                            </div>
                            
                            <div>
                                <label class="block text-white text-sm font-bold mb-2">¿Quién se ocupa más directamente de tu educación?</label>
                                <textarea name="ocupacion_educacion" rows="2"
                                    class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-tec-green focus:bg-white/20 transition-all">{{ $ficha_area_familiar->indicador_10 ?? '' }}</textarea>
                            </div>
                            
                            <div>
                                <label class="block text-white text-sm font-bold mb-2">¿Quién ha influido más en tu decisión para estudiar esta carrera?</label>
                                <textarea name="influencia_carrera" rows="2"
                                    class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-tec-green focus:bg-white/20 transition-all">{{ $ficha_area_familiar->indicador_11 ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Área Social -->
                    <div class="bg-white/5 p-6 rounded-xl border border-white/10">
                        <h3 class="text-tec-green text-xl font-bold mb-4 border-b border-white/10 pb-2">Área Social</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-white text-sm font-bold mb-2">¿Cómo es tu relación con tus compañeros?</label>
                                <div class="flex gap-4">
                                    @foreach(['buena' => 'Buena', 'regular' => 'Regular', 'mala' => 'Mala'] as $val => $label)
                                        <label class="flex items-center gap-2 text-white cursor-pointer">
                                            <input type="radio" name="relacion_companeros" value="{{ $val }}" 
                                                {{ (isset($ficha_area_social) && $ficha_area_social->indicador_1 == $val) ? 'checked' : '' }}
                                                class="accent-tec-green w-4 h-4">
                                            {{ $label }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                <label class="block text-white text-sm font-bold mb-2">¿Por qué?</label>
                                <textarea name="razon_companeros" rows="2"
                                    class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-tec-green focus:bg-white/20 transition-all">{{ $ficha_area_social->indicador_2 ?? '' }}</textarea>
                            </div>

                            <div>
                                <label class="block text-white text-sm font-bold mb-2">¿Tienes pareja?</label>
                                <div class="flex gap-4">
                                    @foreach(['si' => 'Sí', 'no' => 'No'] as $val => $label)
                                        <label class="flex items-center gap-2 text-white cursor-pointer">
                                            <input type="radio" name="tienes_pareja" value="{{ $val }}" 
                                                {{ (isset($ficha_area_social) && $ficha_area_social->indicador_3 == $val) ? 'checked' : '' }}
                                                class="accent-tec-green w-4 h-4">
                                            {{ $label }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            @php
                                $preguntasSocial = [
                                    ['label' => '¿Cómo es tu relación con tu pareja?', 'name' => 'relacion_pareja', 'key' => 'indicador_4'],
                                    ['label' => '¿Cómo es tu relación con tus profesores?', 'name' => 'relacion_profesores', 'key' => 'indicador_5'],
                                    ['label' => '¿Cómo es tu relación con las autoridades académicas?', 'name' => 'relacion_autoridades', 'key' => 'indicador_6'],
                                    ['label' => '¿Qué haces en tu tiempo libre?', 'name' => 'tiempo_libre', 'key' => 'indicador_7'],
                                ];
                            @endphp
                            @foreach($preguntasSocial as $preg)
                                <div>
                                    <label class="block text-white text-sm font-bold mb-2">{{ $preg['label'] }}</label>
                                    <textarea name="{{ $preg['name'] }}" rows="2"
                                        class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-tec-green focus:bg-white/20 transition-all">{{ $ficha_area_social->{$preg['key']} ?? '' }}</textarea>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Características Personales (Tabla) -->
                    <div class="bg-white/5 p-6 rounded-xl border border-white/10">
                        <h3 class="text-tec-green text-xl font-bold mb-4 border-b border-white/10 pb-2">Características Personales</h3>
                        <div class="overflow-x-auto custom-scrollbar">
                            <table class="w-full text-white text-sm min-w-[800px]">
                                <thead>
                                    <tr class="bg-white/10">
                                        <th class="p-3 text-left rounded-tl-lg">Auto percepción</th>
                                        <th class="p-3 text-center">No</th>
                                        <th class="p-3 text-center">Poco</th>
                                        <th class="p-3 text-center">Frecuente</th>
                                        <th class="p-3 text-center">Mucho</th>
                                        <th class="p-3 text-left rounded-tr-lg">Observaciones</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-white/10">
                                    @php
                                        $caracteristicas = [
                                            ['label' => 'Puntual', 'name' => 'puntual', 'key' => 'indicador_1', 'obs' => 'observacion_1'],
                                            ['label' => 'Tímida', 'name' => 'timida', 'key' => 'indicador_2', 'obs' => 'observacion_2'],
                                            ['label' => 'Alegre', 'name' => 'alegre', 'key' => 'indicador_3', 'obs' => 'observacion_3'],
                                            ['label' => 'Agresiva', 'name' => 'agresiva', 'key' => 'indicador_4', 'obs' => 'observacion_4'],
                                            ['label' => 'Abierto/a a las ideas de otros', 'name' => 'abierto', 'key' => 'indicador_5', 'obs' => 'observacion_5'],
                                            ['label' => 'Reflexivo/a', 'name' => 'reflexivo', 'key' => 'indicador_6', 'obs' => 'observacion_6'],
                                            ['label' => 'Constante', 'name' => 'constante', 'key' => 'indicador_7', 'obs' => 'observacion_7'],
                                            ['label' => 'Optimista', 'name' => 'optimista', 'key' => 'indicador_8', 'obs' => 'observacion_8'],
                                            ['label' => 'Impulsivo/a', 'name' => 'impulsivo', 'key' => 'indicador_9', 'obs' => 'observacion_9'],
                                            ['label' => 'Silencioso', 'name' => 'silencioso', 'key' => 'indicador_10', 'obs' => 'observacion_10'],
                                            ['label' => 'Generoso', 'name' => 'generoso', 'key' => 'indicador_11', 'obs' => 'observacion_11'],
                                            ['label' => 'Inquieto', 'name' => 'inquieto', 'key' => 'indicador_12', 'obs' => 'observacion_12'],
                                            ['label' => 'Cambios de humor', 'name' => 'cambios_humor', 'key' => 'indicador_13', 'obs' => 'observacion_13'],
                                            ['label' => 'Dominante', 'name' => 'dominante', 'key' => 'indicador_14', 'obs' => 'observacion_14'],
                                            ['label' => 'Egoísta', 'name' => 'egoista', 'key' => 'indicador_15', 'obs' => 'observacion_15'],
                                            ['label' => 'Sumiso', 'name' => 'sumiso', 'key' => 'indicador_16', 'obs' => 'observacion_16'],
                                            ['label' => 'Confiado en sí mismo', 'name' => 'confiado_en_si', 'key' => 'indicador_17', 'obs' => 'observacion_17'],
                                            ['label' => 'Imaginativo', 'name' => 'imaginativo', 'key' => 'indicador_18', 'obs' => 'observacion_18'],
                                            ['label' => 'Con iniciativa propia', 'name' => 'con_iniciativa', 'key' => 'indicador_19', 'obs' => 'observacion_19'],
                                            ['label' => 'Sociable', 'name' => 'sociable', 'key' => 'indicador_20', 'obs' => 'observacion_20'],
                                            ['label' => 'Responsable', 'name' => 'responsable', 'key' => 'indicador_21', 'obs' => 'observacion_21'],
                                            ['label' => 'Perseverante', 'name' => 'perseverante', 'key' => 'indicador_22', 'obs' => 'observacion_22'],
                                            ['label' => 'Motivado', 'name' => 'motivado', 'key' => 'indicador_23', 'obs' => 'observacion_23'],
                                            ['label' => 'Activo', 'name' => 'activo', 'key' => 'indicador_24', 'obs' => 'observacion_24'],
                                            ['label' => 'Independiente', 'name' => 'independiente', 'key' => 'indicador_25', 'obs' => 'observacion_25'],
                                        ];
                                    @endphp
                                    @foreach($caracteristicas as $car)
                                        <tr class="hover:bg-white/5 transition-colors">
                                            <td class="p-3">{{ $car['label'] }}</td>
                                            @foreach(['no', 'poco', 'frecuente', 'mucho'] as $val)
                                                <td class="p-3 text-center">
                                                    <input type="radio" name="{{ $car['name'] }}" value="{{ $val }}" 
                                                        {{ isset($ficha_caracteristicas_personales) && $ficha_caracteristicas_personales->{$car['key']} == $val ? 'checked' : '' }}
                                                        class="accent-tec-green w-4 h-4 cursor-pointer">
                                                </td>
                                            @endforeach
                                            <td class="p-3">
                                                <input type="text" name="observaciones_{{ $car['name'] }}" value="{{ $ficha_caracteristicas_personales->{$car['obs']} ?? '' }}"
                                                    class="w-full bg-white/10 border border-white/20 rounded px-2 py-1 text-white text-sm focus:outline-none focus:border-tec-green">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Área Psicopedagógica -->
                    <div class="bg-white/5 p-6 rounded-xl border border-white/10">
                        <h3 class="text-tec-green text-xl font-bold mb-4 border-b border-white/10 pb-2">Área Psicopedagógica</h3>
                        <div class="space-y-4">
                            @php
                                $preguntasPsico = [
                                    ['label' => '¿Cómo te gustaría ser?', 'name' => 'como_te_gustaria', 'key' => 'indicador_psicopedagogico_1'],
                                    ['label' => '¿Qué problemas personales intervienen en tus estudios?', 'name' => 'problemas_estudios', 'key' => 'indicador_psicopedagogico_2'],
                                    ['label' => '¿Cuál es tu rendimiento escolar?', 'name' => 'rendimiento_escolar', 'key' => 'indicador_psicopedagogico_3'],
                                    ['label' => 'Menciona las asignaturas que cursas en el semestre actual', 'name' => 'asignaturas_actuales', 'key' => 'indicador_psicopedagogico_4'],
                                    ['label' => '¿Cuál es tu asignatura preferida? ¿Por qué?', 'name' => 'asignatura_preferida', 'key' => 'indicador_psicopedagogico_5'],
                                    ['label' => '¿Cuál es tu asignatura con más bajo promedio del semestre anterior? ¿Por qué?', 'name' => 'asignatura_bajo_promedio', 'key' => 'indicador_psicopedagogico_6'],
                                    ['label' => '¿Por qué escogiste al TESI como opción de estudios?', 'name' => 'motivo_tesi', 'key' => 'indicador_psicopedagogico_7'],
                                ];
                            @endphp
                            @foreach($preguntasPsico as $preg)
                                <div>
                                    <label class="block text-white text-sm font-bold mb-2">{{ $preg['label'] }}</label>
                                    <textarea name="{{ $preg['name'] }}" rows="2"
                                        class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-tec-green focus:bg-white/20 transition-all">{{ $ficha_psicopedagogica->{$preg['key']} ?? '' }}</textarea>
                                </div>
                            @endforeach

                            <div>
                                <label class="block text-white text-sm font-bold mb-2">¿Tienes asignaturas reprobadas?</label>
                                <div class="flex gap-4">
                                    @foreach(['si' => 'Sí', 'no' => 'No'] as $val => $label)
                                        <label class="flex items-center gap-2 text-white cursor-pointer">
                                            <input type="radio" name="asignaturas_reprobadas" value="{{ $val }}" 
                                                {{ (isset($ficha_psicopedagogica) && $ficha_psicopedagogica->indicador_psicopedagogico_8 == $val) ? 'checked' : '' }}
                                                class="accent-tec-green w-4 h-4">
                                            {{ $label }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>

                            <div>
                                <label class="block text-white text-sm font-bold mb-2">En caso que si, ¿Cuáles?</label>
                                <textarea name="cuales_reprobadas" rows="2"
                                    class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-tec-green focus:bg-white/20 transition-all">{{ $ficha_psicopedagogica->indicador_psicopedagogico_9 ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Plan de Vida y Carrera -->
                    <div class="bg-white/5 p-6 rounded-xl border border-white/10">
                        <h3 class="text-tec-green text-xl font-bold mb-4 border-b border-white/10 pb-2">Plan de Vida y Carrera</h3>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-white text-sm font-bold mb-2">¿Cuáles son tus planes inmediatos?</label>
                                <textarea name="planes_inmediatos" rows="2"
                                    class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-tec-green focus:bg-white/20 transition-all">{{ $ficha_psicopedagogica->plan_vida_carrera_1 ?? '' }}</textarea>
                            </div>
                            <div>
                                <label class="block text-white text-sm font-bold mb-2">¿Cuáles son tus metas en la vida?</label>
                                <textarea name="metas_vida" rows="2"
                                    class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-tec-green focus:bg-white/20 transition-all">{{ $ficha_psicopedagogica->plan_vida_carrera_2 ?? '' }}</textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Autodefinición -->
                    <div class="bg-white/5 p-6 rounded-xl border border-white/10">
                        <h3 class="text-tec-green text-xl font-bold mb-4 border-b border-white/10 pb-2">Autodefinición</h3>
                        <div class="space-y-4">
                            @php
                                $autodefinicion = [
                                    ['label' => 'Yo soy...', 'name' => 'yo_soy', 'key' => 'caracteristicas_personales_1'],
                                    ['label' => 'A mí me gusta que...', 'name' => 'me_gusta', 'key' => 'caracteristicas_personales_2'],
                                    ['label' => 'Yo aspiro en la vida...', 'name' => 'aspiracion', 'key' => 'caracteristicas_personales_3'],
                                    ['label' => 'Yo tengo miedo que...', 'name' => 'miedos', 'key' => 'caracteristicas_personales_4'],
                                    ['label' => 'Pero pienso que podrá lograr...', 'name' => 'logro', 'key' => 'caracteristicas_personales_5'],
                                ];
                            @endphp
                            @foreach($autodefinicion as $item)
                                <div>
                                    <label class="block text-white text-sm font-bold mb-2">{{ $item['label'] }}</label>
                                    <textarea name="{{ $item['name'] }}" rows="2"
                                        class="w-full bg-white/10 border border-white/20 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-tec-green focus:bg-white/20 transition-all">{{ $ficha_psicopedagogica->{$item['key']} ?? '' }}</textarea>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Botón Enviar -->
                    <div class="flex justify-center pt-6">
                        <button type="submit" 
                            class="bg-tec-green text-white font-bold py-3 px-8 rounded-full text-lg shadow-lg hover:bg-tec-green-dark hover:scale-105 transition-all duration-300 flex items-center gap-2">
                            <i class="fa-solid fa-save"></i>
                            <span>Guardar Ficha</span>
                        </button>
                    </div>

                </form>
                
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

        // Fecha actual
        document.addEventListener("DOMContentLoaded", function() {
            const hoy = new Date();
            const yyyy = hoy.getFullYear();
            const mm = String(hoy.getMonth() + 1).padStart(2, '0');
            const dd = String(hoy.getDate()).padStart(2, '0');
            const fechaActual = `${yyyy}-${mm}-${dd}`;
            const fechaInput = document.getElementById('fecha');
            if(fechaInput) {
                fechaInput.value = fechaActual;
            }
        });
    </script>

</body>

</html>