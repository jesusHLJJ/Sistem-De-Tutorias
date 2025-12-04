<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes de Asesoría - Maestro</title>
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

            <a href="{{ route('maestro.maestro.maestro.habilidades', $alumno->id_alumno) }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-clipboard-list text-base w-4"></i>
                <span>Habilidades de Estudio</span>
            </a>

            <div class="text-hover-pink px-4 py-2.5 rounded-lg font-bold text-xs md:text-sm flex items-center gap-2 bg-hover-pink/10">
                <i class="fa-solid fa-comments text-base w-4"></i>
                <span>Solicitudes de Asesoría</span>
            </div>

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
        <div id="content-area" class="flex-1 p-4 md:p-10 flex justify-center items-start overflow-y-auto md:ml-64">
            <div class="bg-tec-green-dark/90 backdrop-blur-md rounded-xl md:rounded-2xl p-6 md:p-10 w-full max-w-5xl shadow-[0_8px_32px_rgba(0,0,0,0.3)]">
                
                <div class="flex flex-col md:flex-row justify-between items-center mb-8 border-b-2 border-white/30 pb-4 gap-4">
                    <div class="text-center md:text-left">
                        <h2 class="text-white text-xl md:text-3xl font-bold">
                            HISTORIAL DE SOLICITUDES
                        </h2>
                        <p class="text-white/70 text-lg mt-1">
                            Alumno: <span class="font-bold text-white">{{ $alumno->nombre_completo }}</span>
                        </p>
                    </div>
                    

                </div>

                @if($solicitudes->count())
                    <div class="grid grid-cols-1 gap-4">
                        @foreach($solicitudes as $solicitud)
                            <a href="{{ route('maestro.maestro.solicitud.ver', ['id' => $solicitud->id_solicitud]) }}" 
                               class="group bg-white/10 hover:bg-white/20 border border-white/10 rounded-xl p-6 transition-all duration-300 hover:scale-[1.01] flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <div class="bg-green-500/20 p-3 rounded-full group-hover:bg-green-500/30 transition-colors">
                                        <i class="fa-solid fa-file-alt text-2xl text-green-300"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-white text-lg font-bold">
                                            {{ $solicitud->materia->nombre ?? 'Materia no especificada' }}
                                        </h3>
                                        <p class="text-white/60 text-sm flex items-center gap-2">
                                            <i class="fa-regular fa-calendar"></i>
                                            {{ $solicitud->fecha }}
                                        </p>
                                    </div>
                                </div>
                                <div class="text-white/50 group-hover:text-white group-hover:translate-x-1 transition-all">
                                    <i class="fa-solid fa-chevron-right text-xl"></i>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12 bg-white/5 rounded-xl border border-white/10">
                        <i class="fa-solid fa-folder-open text-6xl text-white/20 mb-4"></i>
                        <p class="text-white/60 text-lg">No hay solicitudes registradas para este alumno.</p>
                    </div>
                @endif

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
