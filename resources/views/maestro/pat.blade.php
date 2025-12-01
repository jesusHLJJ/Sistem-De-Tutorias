<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Plan de Acción - Sistema de Tutorías</title>
    
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

<body class="font-montserrat bg-cover bg-center bg-fixed min-h-screen flex flex-col bg-[url('{{ asset('multimedia/fondo.jpg') }}')]">

    <!-- Header -->
    <div class="bg-tec-green shadow-[0_12px_14px_rgba(0,0,0,0.25)] h-16 md:h-24 flex items-center justify-between md:justify-center relative z-40 px-4">
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
    <div class="bg-tec-green shadow-[0_12px_14px_rgba(0,0,0,0.25)] h-10 md:h-12 flex items-center justify-center relative z-20">
        <h2 class="text-white font-bold text-base md:text-2xl tracking-wide">PLAN DE ACCIÓN TUTORIAL</h2>
    </div>

    <!-- Main Container -->
    <div class="flex flex-1 overflow-hidden relative">
        
        <!-- Overlay -->
        <div id="overlay" class="hidden fixed inset-0 bg-black/50 z-30 md:hidden"></div>
        
        <!-- Sidebar -->
        <div id="sidebar" class="bg-sidebar-dark w-64 flex flex-col gap-1.5 md:gap-2 shadow-[4px_0_10px_rgba(0,0,0,0.3)]
            fixed md:absolute top-0 left-0 h-full z-40 md:z-30
            transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out
            p-4 md:p-6 overflow-y-auto">
            
            <button id="closeMenu" class="md:hidden self-end text-white text-2xl mb-3">
                <i class="fa-solid fa-times"></i>
            </button>
            
            <!-- Grupo (siempre en rosa) -->
            <div class="text-hover-pink px-5 py-3 md:py-4 rounded-lg font-bold text-sm md:text-base flex items-center gap-2 md:gap-3 bg-hover-pink/10">
                <i class="fa-solid fa-users text-lg w-5"></i>
                <span>Grupo {{ $grupo->clave_grupo }}</span>
            </div>
            
            <div class="border-t border-white/20 my-2"></div>
            
            <a href="{{ route('maestro.graficar', $grupo->clave_grupo) }}" 
               class="text-white no-underline px-5 py-3 md:py-4 rounded-lg transition-all duration-300 font-medium text-sm md:text-base flex items-center gap-2 md:gap-3 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-chart-column text-lg w-5"></i>
                <span>Graficar Ficha</span>
            </a>
            
            <a href="{{ route('maestro.graficar2', $grupo->clave_grupo) }}" 
               class="text-white no-underline px-5 py-3 md:py-4 rounded-lg transition-all duration-300 font-medium text-sm md:text-base flex items-center gap-2 md:gap-3 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-chart-pie text-lg w-5"></i>
                <span>Graficar Habilidades</span>
            </a>
            
            <!-- Plan de Acción (activo) -->
            <div class="text-hover-pink px-5 py-3 md:py-4 rounded-lg font-bold text-sm md:text-base flex items-center gap-2 md:gap-3 bg-hover-pink/10">
                <i class="fa-solid fa-clipboard-list text-lg w-5"></i>
                <span>Plan de Acción</span>
            </div>
            
            <a href="{{ route('maestro.semestral.form', $grupo->id_grupo) }}" 
               class="text-white no-underline px-5 py-3 md:py-4 rounded-lg transition-all duration-300 font-medium text-sm md:text-base flex items-center gap-2 md:gap-3 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-file-pen text-lg w-5"></i>
                <span>Llenar Reporte</span>
            </a>
            
            <div class="border-t border-white/20 my-2"></div>
            
            <a href="{{ route('maestro.grupos') }}" 
               class="text-white no-underline px-5 py-3 md:py-4 rounded-lg transition-all duration-300 font-medium text-sm md:text-base flex items-center gap-2 md:gap-3 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-arrow-left text-lg w-5"></i>
                <span>Volver a Mis Grupos</span>
            </a>
        </div>

        <!-- Content Area -->
        <div class="flex-1 p-4 md:p-8 overflow-y-auto md:ml-64">
            <div class="bg-tec-green-dark/85 backdrop-blur-md rounded-xl md:rounded-2xl p-4 md:p-8 w-full max-w-6xl mx-auto shadow-[0_8px_32px_rgba(0,0,0,0.3)] mb-8">
                
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-6">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('maestro.pat_guardar', $grupo->id_grupo) }}" method="POST">
                    @csrf

                    <!-- Vista Desktop (Tabla) -->
                    <div class="hidden md:block overflow-x-auto">
                        <table class="w-full border-2 border-white/30 text-white">
                            <tr class="bg-tec-green">
                                <td colspan="5" class="border-2 border-white/30 p-3 text-center font-bold text-lg">DATOS GENERALES</td>
                            </tr>
                            <tr>
                                <td colspan="5" class="border-2 border-white/30 p-3">
                                    <span class="font-semibold">NOMBRE DEL TUTOR:</span> 
                                    {{ $grupo->profesor->ap_paterno }} {{ $grupo->profesor->ap_materno }} {{ $grupo->profesor->nombre }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" class="border-2 border-white/30 p-3">
                                    <span class="font-semibold">PERIODO ESCOLAR:</span> {{ $grupo->periodo->periodo }}
                                </td>
                                <td colspan="3" class="border-2 border-white/30 p-3">
                                    <span class="font-semibold">CARRERA:</span> {{ $grupo->carrera->carrera }}
                                </td>
                            </tr>
                            <tr>
                                <td class="border-2 border-white/30 p-3">
                                    <span class="font-semibold">GRUPO:</span> {{ $grupo->clave_grupo }}
                                </td>
                                <td class="border-2 border-white/30 p-3">
                                    <span class="font-semibold">NO. MATRÍCULA:</span> 
                                    <input type="text" name="cant_alumnos" readonly value="{{ $grupo->cantidad_de_alumnos }}" 
                                           class="bg-white/10 border border-white/30 rounded px-2 py-1 w-16 text-center">
                                </td>
                                <td class="border-2 border-white/30 p-3">
                                    <span class="font-semibold">M:</span> 
                                    <input type="text" name="cant_alumnos_hombres" readonly value="{{ $grupo->hombres }}" 
                                           class="bg-white/10 border border-white/30 rounded px-2 py-1 w-16 text-center">
                                </td>
                                <td class="border-2 border-white/30 p-3">
                                    <span class="font-semibold">F:</span> 
                                    <input type="text" name="cant_alumnos_mujeres" readonly value="{{ $grupo->mujeres }}" 
                                           class="bg-white/10 border border-white/30 rounded px-2 py-1 w-16 text-center">
                                </td>
                                <td class="border-2 border-white/30 p-3">
                                    <span class="font-semibold">SEMESTRE:</span> {{ $grupo->semestre->semestre }}
                                </td>
                            </tr>
                            <tr class="bg-tec-green">
                                <td colspan="7" class="border-2 border-white/30 p-3 text-center font-bold">PROBLEMÁTICA IDENTIFICADA</td>
                            </tr>
                            <tr>
                                <td colspan="7" class="border-2 border-white/30 p-3">
                                    <textarea rows="4" name="problematica_identificada" 
                                              class="w-full bg-white/10 border border-white/30 rounded p-3 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-hover-pink"
                                              placeholder="Describe la problemática identificada en el grupo..."></textarea>
                                </td>
                            </tr>
                            <tr class="bg-tec-green">
                                <td colspan="7" class="border-2 border-white/30 p-3 text-center font-bold">OBJETIVOS</td>
                            </tr>
                            <tr>
                                <td colspan="7" class="border-2 border-white/30 p-3">
                                    <textarea rows="4" name="objetivos" 
                                              class="w-full bg-white/10 border border-white/30 rounded p-3 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-hover-pink"
                                              placeholder="Define los objetivos del plan de acción..."></textarea>
                                </td>
                            </tr>
                            <tr class="bg-tec-green">
                                <td colspan="7" class="border-2 border-white/30 p-3 text-center font-bold">ACCIONES A IMPLEMENTAR</td>
                            </tr>
                            <tr>
                                <td colspan="7" class="border-2 border-white/30 p-3">
                                    <textarea rows="4" name="acciones_a_implementar" 
                                              class="w-full bg-white/10 border border-white/30 rounded p-3 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-hover-pink"
                                              placeholder="Especifica las acciones a implementar..."></textarea>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <!-- Vista Móvil (Cards) -->
                    <div class="md:hidden space-y-4">
                        <!-- Sección: Datos Generales -->
                        <div class="bg-white/10 rounded-lg border border-white/30 overflow-hidden">
                            <div class="bg-tec-green p-3 text-center font-bold text-white">
                                DATOS GENERALES
                            </div>
                            <div class="p-4 space-y-3 text-white">
                                <div>
                                    <label class="block text-white/70 text-xs font-semibold mb-1">NOMBRE DEL TUTOR:</label>
                                    <p class="text-white text-sm">{{ $grupo->profesor->ap_paterno }} {{ $grupo->profesor->ap_materno }} {{ $grupo->profesor->nombre }}</p>
                                </div>
                                
                                <div>
                                    <label class="block text-white/70 text-xs font-semibold mb-1">PERIODO ESCOLAR:</label>
                                    <p class="text-white text-sm">{{ $grupo->periodo->periodo }}</p>
                                </div>
                                
                                <div>
                                    <label class="block text-white/70 text-xs font-semibold mb-1">CARRERA:</label>
                                    <p class="text-white text-sm">{{ $grupo->carrera->carrera }}</p>
                                </div>
                                
                                <div>
                                    <label class="block text-white/70 text-xs font-semibold mb-1">GRUPO:</label>
                                    <p class="text-white text-sm">{{ $grupo->clave_grupo }}</p>
                                </div>
                                
                                <div class="grid grid-cols-3 gap-3">
                                    <div>
                                        <label class="block text-white/70 text-xs font-semibold mb-1">NO. MATRÍCULA:</label>
                                        <input type="text" name="cant_alumnos" readonly value="{{ $grupo->cantidad_de_alumnos }}" 
                                               class="w-full bg-white/10 border border-white/30 rounded px-2 py-2 text-center text-white">
                                    </div>
                                    <div>
                                        <label class="block text-white/70 text-xs font-semibold mb-1">M:</label>
                                        <input type="text" name="cant_alumnos_hombres" readonly value="{{ $grupo->hombres }}" 
                                               class="w-full bg-white/10 border border-white/30 rounded px-2 py-2 text-center text-white">
                                    </div>
                                    <div>
                                        <label class="block text-white/70 text-xs font-semibold mb-1">F:</label>
                                        <input type="text" name="cant_alumnos_mujeres" readonly value="{{ $grupo->mujeres }}" 
                                               class="w-full bg-white/10 border border-white/30 rounded px-2 py-2 text-center text-white">
                                    </div>
                                </div>
                                
                                <div>
                                    <label class="block text-white/70 text-xs font-semibold mb-1">SEMESTRE:</label>
                                    <p class="text-white text-sm">{{ $grupo->semestre->semestre }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Sección: Problemática Identificada -->
                        <div class="bg-white/10 rounded-lg border border-white/30 overflow-hidden">
                            <div class="bg-tec-green p-3 text-center font-bold text-white">
                                PROBLEMÁTICA IDENTIFICADA
                            </div>
                            <div class="p-4">
                                <textarea rows="5" name="problematica_identificada" 
                                          class="w-full bg-white/10 border border-white/30 rounded p-3 text-white text-base placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-hover-pink"
                                          placeholder="Describe la problemática identificada en el grupo..."></textarea>
                            </div>
                        </div>

                        <!-- Sección: Objetivos -->
                        <div class="bg-white/10 rounded-lg border border-white/30 overflow-hidden">
                            <div class="bg-tec-green p-3 text-center font-bold text-white">
                                OBJETIVOS
                            </div>
                            <div class="p-4">
                                <textarea rows="5" name="objetivos" 
                                          class="w-full bg-white/10 border border-white/30 rounded p-3 text-white text-base placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-hover-pink"
                                          placeholder="Define los objetivos del plan de acción..."></textarea>
                            </div>
                        </div>

                        <!-- Sección: Acciones a Implementar -->
                        <div class="bg-white/10 rounded-lg border border-white/30 overflow-hidden">
                            <div class="bg-tec-green p-3 text-center font-bold text-white">
                                ACCIONES A IMPLEMENTAR
                            </div>
                            <div class="p-4">
                                <textarea rows="5" name="acciones_a_implementar" 
                                          class="w-full bg-white/10 border border-white/30 rounded p-3 text-white text-base placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-hover-pink"
                                          placeholder="Especifica las acciones a implementar..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-center">
                        <button type="submit" 
                                class="w-full md:w-auto bg-tec-green hover:bg-tec-green/80 text-white font-bold py-3 px-8 rounded-lg transition-all duration-300 transform hover:scale-105 shadow-lg">
                            <i class="fa-solid fa-save mr-2"></i>
                            AÑADIR INFORMACIÓN
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- JavaScript para el menú hamburguesa -->
    <script>
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
