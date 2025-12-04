<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Solicitudes - Alumno</title>
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
            
            <a href="{{ route('alumno.habilidades') }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-clipboard-list text-base w-4"></i>
                <span>Encuesta sobre habilidades</span>
            </a>
            
            <!-- Elemento activo - Solicitudes -->
            <div class="text-hover-pink px-4 py-2.5 rounded-lg font-bold text-xs md:text-sm flex items-center gap-2 bg-hover-pink/10">
                <i class="fa-solid fa-comments text-base w-4"></i>
                <span>Ver mis solicitudes de asesoria</span>
            </div>

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
                
                <div class="flex flex-col md:flex-row justify-between items-center mb-8 border-b-2 border-white/30 pb-4 gap-4">
                    <h2 class="text-white text-xl md:text-3xl font-bold text-center md:text-left">
                        MIS SOLICITUDES DE ASESORÍA
                    </h2>
                    
                    <!-- Botón Crear Nueva Solicitud -->
                    <a href="{{ route('alumno.solicitudasesoria.formulario') }}" 
                       class="bg-tec-green hover:bg-green-600 text-white font-bold py-2 px-6 rounded-lg shadow-lg transition-all duration-300 flex items-center gap-2 hover:scale-105">
                        <i class="fa-solid fa-plus"></i>
                        <span>Crear nueva solicitud</span>
                    </a>
                </div>

                @if($solicitudes->count())
                    <div class="grid grid-cols-1 gap-4">
                        @foreach($solicitudes as $solicitud)
                            <div class="bg-white/10 rounded-xl p-4 md:p-6 border border-white/10 hover:bg-white/20 transition-all duration-300 group">
                                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
                                    <div class="flex-1">
                                        <h3 class="text-white text-lg font-bold mb-1 group-hover:text-hover-pink transition-colors">
                                            <i class="fa-solid fa-book-open mr-2 text-tec-green"></i>
                                            {{ $solicitud->materia->nombre }}
                                        </h3>
                                        <div class="text-white/70 text-sm space-y-1">
                                            <p><i class="fa-solid fa-calendar-days w-5"></i> Fecha: {{ \Carbon\Carbon::parse($solicitud->fecha)->format('d/m/Y') }}</p>
                                            <p><i class="fa-solid fa-chalkboard-user w-5"></i> Profesor: {{ $solicitud->profesor->nombre ?? 'Asignado por sistema' }}</p>
                                        </div>
                                    </div>
                                    
                                    <a href="{{ route('alumno.solicitudasesoria.ver', ['id' => $solicitud->id_solicitud]) }}" 
                                       class="w-full md:w-auto bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-lg transition-colors text-center text-sm flex items-center justify-center gap-2">
                                        <i class="fa-solid fa-eye"></i>
                                        Ver Detalles
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center py-12 bg-white/5 rounded-xl border border-white/10">
                        <i class="fa-solid fa-folder-open text-6xl text-white/20 mb-4"></i>
                        <p class="text-white text-lg font-medium">No tienes solicitudes registradas aún.</p>
                        <p class="text-white/60 text-sm mt-2">Utiliza el botón superior para crear tu primera solicitud.</p>
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

        const sidebarLinks = sidebar.querySelectorAll('a');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 768) {
                    closeSidebar();
                }
            });
        });
    </script>

</body>

</html>
