<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROGRAMA DE TUTORÍAS ACADÉMICAS</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

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
        <h2 class="text-white font-bold text-base md:text-2xl tracking-wide">MENSUAL TUTORÍA</h2>
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
            
            <a href="{{ route('maestro.grupos') }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-users text-base w-4"></i>
                <span>Mis Grupos</span>
            </a>
            
            <div class="border-t border-white/20 my-1"></div>
            
            <div class="text-hover-pink px-4 py-2.5 rounded-lg font-bold text-xs md:text-sm flex items-center gap-2 bg-hover-pink/10">
                <i class="fa-solid fa-book text-base w-4"></i>
                <span>Mensual Tutoría</span>
            </div>
            
            <a href="{{ route('maestro.maestro.reporte.asesorias') }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-chart-line text-base w-4"></i>
                <span>Reporte de Asesorías</span>
            </a>
            
            <a href="{{ route('maestro.maestro.tutoria.registro') }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-pen-to-square text-base w-4"></i>
                <span>Registrar Tutoría</span>
            </a>
            
            <div class="border-t border-white/20 my-1"></div>
            
            <a href="{{ route('maestro.dashboard') }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-home text-base w-4"></i>
                <span>Volver al Inicio</span>
            </a>
        </div>

        <!-- Content Area -->
        <div class="flex-1 p-4 md:p-8 flex justify-center items-start overflow-y-auto md:ml-64">
            <div class="bg-tec-green-dark/85 backdrop-blur-md rounded-xl md:rounded-2xl p-4 md:p-8 w-full max-w-6xl shadow-[0_8px_32px_rgba(0,0,0,0.3)] mb-8">
                
                <h2 class="text-white text-lg sm:text-xl md:text-3xl font-bold mb-4 md:mb-6 text-center border-b-2 border-white/30 pb-3 md:pb-4">
                    REPORTE - PROGRAMA DE TUTORÍAS ACADÉMICAS
                </h2>

                <form id="tutoriaForm" action="{{ route('maestro.guardar_tutorias_academicas') }}" method="POST" class="space-y-4 md:space-y-6">
                    @csrf
                    
                    <!-- Campos de información -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4">
                        <div>
                            <label for="tutor" class="block text-white font-semibold mb-2 text-sm md:text-base">TUTOR:</label>
                            <input type="text" name="tutor" value="{{ $profesor->nombre }} {{ $profesor->ap_paterno }} {{ $profesor->ap_materno }}" readonly
                                class="w-full px-3 md:px-4 py-3 md:py-2 text-base md:text-sm rounded-lg bg-white/20 text-white border border-white/30 focus:outline-none focus:ring-2 focus:ring-tec-green">
                        </div>

                        <div>
                            <label for="grupo" class="block text-white font-semibold mb-2 text-sm md:text-base">GRUPO:</label>
                            <select name="grupo_id" id="grupo" required
                                class="w-full px-3 md:px-4 py-3 md:py-2 text-base md:text-sm rounded-lg bg-white/20 text-white border border-white/30 focus:outline-none focus:ring-2 focus:ring-tec-green">
                                <option value="">Seleccionar Grupo</option>
                                @foreach ($grupos as $grupo)
                                    <option value="{{ $grupo->id_grupo }}" class="text-gray-900">{{ $grupo->clave_grupo }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label for="carrera" class="block text-white font-semibold mb-2 text-sm md:text-base">CARRERA:</label>
                            <input type="text" name="carrera" value="{{ $carrera->carrera ?? '' }}" readonly
                                class="w-full px-3 md:px-4 py-3 md:py-2 text-base md:text-sm rounded-lg bg-white/20 text-white border border-white/30 focus:outline-none focus:ring-2 focus:ring-tec-green">
                        </div>

                        <div>
                            <label for="semestre" class="block text-white font-semibold mb-2 text-sm md:text-base">SEMESTRE:</label>
                            <select name="semestre_id" id="semestre" required
                                class="w-full px-3 md:px-4 py-3 md:py-2 text-base md:text-sm rounded-lg bg-white/20 text-white border border-white/30 focus:outline-none focus:ring-2 focus:ring-tec-green">
                                <option value="">Seleccionar semestre</option>
                                @foreach ($semestres as $semestre)
                                    <option value="{{ $semestre->id_semestre }}" class="text-gray-900">{{ $semestre->semestre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <!-- Selector de Mes (móvil) -->
                    <div class="md:hidden">
                        <label for="mes_mobile" class="block text-white font-semibold mb-2 text-sm">MES:</label>
                        <select id="mes_mobile" name="mes" required
                            class="w-full px-3 py-3 text-base rounded-lg bg-white/20 text-white border border-white/30 focus:outline-none focus:ring-2 focus:ring-tec-green">
                            <option value="Enero" class="text-gray-900">Enero</option>
                            <option value="Febrero" class="text-gray-900">Febrero</option>
                            <option value="Marzo" class="text-gray-900">Marzo</option>
                            <option value="Abril" class="text-gray-900">Abril</option>
                            <option value="Mayo" class="text-gray-900">Mayo</option>
                            <option value="Junio" class="text-gray-900">Junio</option>
                            <option value="Julio" class="text-gray-900">Julio</option>
                            <option value="Agosto" class="text-gray-900">Agosto</option>
                            <option value="Septiembre" class="text-gray-900">Septiembre</option>
                            <option value="Octubre" class="text-gray-900">Octubre</option>
                            <option value="Noviembre" class="text-gray-900">Noviembre</option>
                            <option value="Diciembre" class="text-gray-900">Diciembre</option>
                        </select>
                    </div>

                    <!-- Título Formación (móvil) -->
                    <div class="md:hidden">
                        <h3 class="text-white font-bold text-lg text-center py-3 border-b border-white/30">FORMACIÓN</h3>
                    </div>

                    <!-- Vista de Cards (Móvil) -->
                    <div class="md:hidden space-y-4">
                        <div class="bg-white/10 rounded-lg p-4 border border-white/30">
                            <h3 class="text-white font-bold mb-3 text-base">ACADÉMICA</h3>
                            <textarea autocapitalize="characters" rows="6" id="academica_mobile" name="academica" required
                                class="w-full px-3 py-3 text-base rounded-lg bg-white/20 text-white border border-white/30 focus:outline-none focus:ring-2 focus:ring-tec-green resize-y"></textarea>
                        </div>

                        <div class="bg-white/10 rounded-lg p-4 border border-white/30">
                            <h3 class="text-white font-bold mb-3 text-base">PERSONAL</h3>
                            <textarea autocapitalize="characters" rows="6" id="personal_mobile" name="personal" required
                                class="w-full px-3 py-3 text-base rounded-lg bg-white/20 text-white border border-white/30 focus:outline-none focus:ring-2 focus:ring-tec-green resize-y"></textarea>
                        </div>

                        <div class="bg-white/10 rounded-lg p-4 border border-white/30">
                            <h3 class="text-white font-bold mb-3 text-base">PROFESIONAL</h3>
                            <textarea autocapitalize="characters" rows="6" id="profesional_mobile" name="profesional" required
                                class="w-full px-3 py-3 text-base rounded-lg bg-white/20 text-white border border-white/30 focus:outline-none focus:ring-2 focus:ring-tec-green resize-y"></textarea>
                        </div>
                    </div>

                    <!-- Vista de Tabla (Desktop) -->
                    <div class="hidden md:block overflow-x-auto">
                        <table class="w-full border-collapse bg-white/10 rounded-lg overflow-hidden">
                            <thead>
                                <tr class="bg-tec-green">
                                    <th class="border border-white/30 px-4 py-3 text-white font-bold">Formación</th>
                                    <th class="border border-white/30 px-4 py-3 text-white font-bold">
                                        <label for="mes" class="inline-block mr-2">Mes:</label>
                                        <select id="mes" name="mes" required
                                            class="px-3 py-1 rounded bg-white/20 text-white border border-white/30 focus:outline-none focus:ring-2 focus:ring-white">
                                            <option value="Enero" class="text-gray-900">Enero</option>
                                            <option value="Febrero" class="text-gray-900">Febrero</option>
                                            <option value="Marzo" class="text-gray-900">Marzo</option>
                                            <option value="Abril" class="text-gray-900">Abril</option>
                                            <option value="Mayo" class="text-gray-900">Mayo</option>
                                            <option value="Junio" class="text-gray-900">Junio</option>
                                            <option value="Julio" class="text-gray-900">Julio</option>
                                            <option value="Agosto" class="text-gray-900">Agosto</option>
                                            <option value="Septiembre" class="text-gray-900">Septiembre</option>
                                            <option value="Octubre" class="text-gray-900">Octubre</option>
                                            <option value="Noviembre" class="text-gray-900">Noviembre</option>
                                            <option value="Diciembre" class="text-gray-900">Diciembre</option>
                                        </select>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="border border-white/30 px-4 py-3 text-white font-semibold">ACADÉMICA</td>
                                    <td class="border border-white/30 px-4 py-3">
                                        <textarea autocapitalize="characters" rows="8" id="academica" name="academica" required
                                            class="w-full px-3 py-2 rounded-lg bg-white/20 text-white border border-white/30 focus:outline-none focus:ring-2 focus:ring-tec-green resize-y"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border border-white/30 px-4 py-3 text-white font-semibold">PERSONAL</td>
                                    <td class="border border-white/30 px-4 py-3">
                                        <textarea autocapitalize="characters" rows="8" id="personal" name="personal" required
                                            class="w-full px-3 py-2 rounded-lg bg-white/20 text-white border border-white/30 focus:outline-none focus:ring-2 focus:ring-tec-green resize-y"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="border border-white/30 px-4 py-3 text-white font-semibold">PROFESIONAL</td>
                                    <td class="border border-white/30 px-4 py-3">
                                        <textarea autocapitalize="characters" rows="8" id="profesional" name="profesional" required
                                            class="w-full px-3 py-2 rounded-lg bg-white/20 text-white border border-white/30 focus:outline-none focus:ring-2 focus:ring-tec-green resize-y"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Botones optimizados -->
                    <div class="flex flex-col sm:flex-row gap-3 justify-center sm:justify-start pt-4">
                        <button type="submit"
                            class="w-full sm:w-auto px-6 py-3 md:py-3 text-base md:text-sm bg-tec-green hover:bg-tec-green/80 text-white font-bold rounded-lg shadow-lg transition-all duration-300 hover:-translate-y-1">
                            <i class="fa-solid fa-paper-plane mr-2"></i>Enviar
                        </button>
                        <button type="button" onclick="generatePDF()"
                            class="w-full sm:w-auto px-6 py-3 md:py-3 text-base md:text-sm bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg shadow-lg transition-all duration-300 hover:-translate-y-1">
                            <i class="fa-solid fa-file-pdf mr-2"></i>Generar PDF
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

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

        function generatePDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();
            let content = `
                PROGRAMA DE TUTORÍAS ACADÉMICAS

                TUTOR: ${document.querySelector('input[name="tutor"]').value}
                GRUPO: ${document.querySelector('select[name="grupo_id"]').options[document.querySelector('select[name="grupo_id"]').selectedIndex].text}
                CARRERA: ${document.querySelector('input[name="carrera"]').value}
                SEMESTRE: ${document.querySelector('select[name="semestre_id"]').options[document.querySelector('select[name="semestre_id"]').selectedIndex].text}
                MES: ${document.querySelector('select[name="mes"]').value}
                
                ACADÉMICA:
                ${document.querySelector('textarea[name="academica"]').value}

                PERSONAL:
                ${document.querySelector('textarea[name="personal"]').value}

                PROFESIONAL:
                ${document.querySelector('textarea[name="profesional"]').value}
            `;

            doc.text(content, 10, 10);
            doc.save('tutoria.pdf');
        }
    </script>

</body>

</html>
