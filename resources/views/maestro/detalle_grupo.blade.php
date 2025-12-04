<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Grupo {{ $grupo->clave_grupo }} - Sistema de Tutorías</title>

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
    <div class="bg-tec-green shadow-[0_12px_14px_rgba(0,0,0,0.25)] h-16 md:h-24 flex items-center justify-between md:justify-center relative z-40 px-4">
        <!-- Botón hamburguesa (solo móvil) -->
        <button id="menuToggle" class="md:hidden text-white text-2xl z-50">
            <i class="fa-solid fa-bars"></i>
        </button>
        
        <div class="absolute left-5 hidden md:flex gap-4 items-center">
            <img src="{{ asset('multimedia/tesi.png') }}" alt="Logo TESI" class="h-12 md:h-16">
            <img src="{{ asset('multimedia/isclogo.png') }}" alt="Logo ISC" class="h-12 md:h-16">
        </div>
        <h1 class="text-white font-bold text-lg md:text-4xl tracking-wider">SISTEMA DE TUTORIAS</h1>
        
        <!-- Espacio para balance en móvil -->
        <div class="md:hidden w-8"></div>
    </div>

    <!-- Subheader -->
    <div class="bg-tec-green shadow-[0_12px_14px_rgba(0,0,0,0.25)] h-10 md:h-12 flex items-center justify-center relative z-20">
        <h2 class="text-white font-bold text-base md:text-2xl tracking-wide">GRUPO {{ $grupo->clave_grupo }}</h2>
    </div>

    <!-- Main Container -->
    <div class="flex flex-1 overflow-hidden relative">
        
        <!-- Overlay para cerrar menú en móvil -->
        <div id="overlay" class="hidden fixed inset-0 bg-black/50 z-30 md:hidden"></div>
        
        <!-- Sidebar -->
        <div id="sidebar" class="bg-sidebar-dark w-64 flex flex-col gap-1.5 md:gap-2 shadow-[4px_0_10px_rgba(0,0,0,0.3)]
            fixed md:absolute top-0 left-0 h-full z-40 md:z-30
            transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out
            p-4 md:p-6 overflow-y-auto">
            
            <!-- Botón cerrar (solo móvil) -->
            <button id="closeMenu" class="md:hidden self-end text-white text-2xl mb-3">
                <i class="fa-solid fa-times"></i>
            </button>
            
            <!-- Elemento activo - Grupo actual -->
            <div class="text-hover-pink px-4 py-2.5 rounded-lg font-bold text-xs md:text-sm flex items-center gap-2 bg-hover-pink/10">
                <i class="fa-solid fa-users text-base w-4"></i>
                <span>Grupo {{ $grupo->clave_grupo }}</span>
            </div>
            
            <!-- Separador -->
            <div class="border-t border-white/20 my-1"></div>
            
            <a href="{{ route('maestro.graficar', $grupo->clave_grupo) }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-chart-column text-base w-4"></i>
                <span>Graficar Ficha</span>
            </a>
            
            <a href="{{ route('maestro.graficar2', $grupo->clave_grupo) }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-chart-pie text-base w-4"></i>
                <span>Graficar Habilidades</span>
            </a>
            
            <a href="{{ route('maestro.pat', $grupo->id_grupo) }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-clipboard-list text-base w-4"></i>
                <span>Plan de Acción</span>
            </a>
            
            <a href="{{ route('maestro.semestral.form', $grupo->id_grupo) }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-file-pen text-base w-4"></i>
                <span>Llenar Reporte</span>
            </a>
            
            <!-- Separador -->
            <div class="border-t border-white/20 my-1"></div>
            
            <a href="{{ route('maestro.grupos') }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-arrow-left text-base w-4"></i>
                <span>Volver a Mis Grupos</span>
            </a>
        </div>

        <!-- Content Area -->
        <div class="flex-1 p-4 md:p-10 flex justify-center items-start overflow-y-auto md:ml-64">
            <div class="bg-tec-green-dark/85 backdrop-blur-md rounded-xl md:rounded-2xl p-4 md:p-10 w-full max-w-5xl shadow-[0_8px_32px_rgba(0,0,0,0.3)]">
                
                <!-- Información del Grupo -->
                <div class="mb-6 md:mb-8 pb-4 md:pb-6 border-b-2 border-white/30">
                    <h2 class="text-white text-xl md:text-3xl font-bold mb-3 md:mb-4 text-center">
                        GRUPO SELECCIONADO
                    </h2>
                    <div class="bg-white/10 rounded-lg p-4 md:p-6 text-center">
                        <p class="text-white text-base md:text-lg mb-2">
                            <span class="font-semibold">ID del Grupo:</span> 
                            <span class="text-white font-bold">{{ $grupo->id_grupo }}</span>
                        </p>
                        <p class="text-white text-base md:text-lg">
                            <span class="font-semibold">Clave del Grupo:</span> 
                            <span class="text-white font-bold text-xl md:text-2xl">{{ $grupo->clave_grupo }}</span>
                        </p>
                    </div>
                </div>

                <!-- Lista de Alumnos -->
                <h3 class="text-white text-lg md:text-2xl font-bold mb-4 md:mb-6 text-center">
                    SELECCIONA UN ALUMNO DEL GRUPO
                </h3>

                @if ($grupo->alumnos->isEmpty())
                    <div class="text-white text-center text-base md:text-lg p-8 md:p-10 bg-white/10 rounded-xl">
                        <i class="fa-solid fa-user-slash text-4xl md:text-6xl mb-4 md:mb-5 block opacity-50"></i>
                        <p>No hay alumnos en este grupo.</p>
                    </div>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-4">
                        @foreach ($grupo->alumnos as $alumno)
                            <a href="{{ route('maestro.alumno.seleccionar', $alumno->id_alumno) }}" 
                               class="bg-white/10 border-2 border-white/20 rounded-lg md:rounded-xl p-4 md:p-5 transition-all duration-300 cursor-pointer no-underline block hover:bg-white/20 hover:border-tec-green hover:-translate-y-1 hover:shadow-[0_8px_20px_rgba(19,147,74,0.4)] group">
                                <div class="flex items-center gap-3">
                                    <div class="bg-tec-green text-white p-2 md:p-3 rounded-full group-hover:bg-tec-green transition-colors">
                                        <i class="fa-solid fa-user text-lg md:text-xl"></i>
                                    </div>
                                    <div class="flex-1">
                                        <p class="text-white text-sm md:text-base font-bold group-hover:text-tec-green transition-colors">
                                            {{ $alumno->nombre }}
                                        </p>
                                        <p class="text-white/70 text-xs md:text-sm">
                                            ID: {{ $alumno->id_alumno }}
                                        </p>
                                    </div>
                                    <i class="fa-solid fa-chevron-right text-white/50 group-hover:text-tec-green transition-colors"></i>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
                
            </div>
        </div>
    </div>

    <!-- JavaScript para el menú hamburguesa -->
    <script>
        const menuToggle = document.getElementById('menuToggle');
        const closeMenu = document.getElementById('closeMenu');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        // Abrir menú
        menuToggle.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        });

        // Cerrar menú
        const closeSidebar = () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
            document.body.style.overflow = '';
        };

        closeMenu.addEventListener('click', closeSidebar);
        overlay.addEventListener('click', closeSidebar);

        // Cerrar menú al hacer clic en un enlace (en móvil)
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
