<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Semestral de Tutoría Académica</title>
    
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
        <h2 class="text-white font-bold text-base md:text-2xl tracking-wide">REGISTRO DE TUTORÍA</h2>
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
            <div class="text-hover-pink px-4 py-2.5 rounded-lg font-bold text-xs md:text-sm flex items-center gap-2 bg-hover-pink/10">
                <i class="fa-solid fa-users text-base w-4"></i>
                <span>Grupo {{ $grupo->clave_grupo }}</span>
            </div>
            
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
            
            <!-- Plan de Acción -->
            <a href="{{ route('maestro.pat', $grupo->id_grupo) }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-clipboard-list text-base w-4"></i>
                <span>Plan de Acción</span>
            </a>
            
            <!-- Llenar Reporte (activo) -->
            <div class="text-hover-pink px-4 py-2.5 rounded-lg font-bold text-xs md:text-sm flex items-center gap-2 bg-hover-pink/10">
                <i class="fa-solid fa-file-pen text-base w-4"></i>
                <span>Llenar Reporte</span>
            </div>
            
            <div class="border-t border-white/20 my-1"></div>
            
            <a href="{{ route('maestro.grupos') }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-arrow-left text-base w-4"></i>
                <span>Volver a Mis Grupos</span>
            </a>
        </div>

        <!-- Content Area -->
        <div class="flex-1 p-4 md:p-8 flex justify-center items-start overflow-y-auto md:ml-64">
            <div class="bg-tec-green-dark/85 backdrop-blur-md rounded-xl md:rounded-2xl p-4 md:p-8 w-full max-w-[1400px] shadow-[0_8px_32px_rgba(0,0,0,0.3)] mb-8">
                
                <h2 class="text-white text-lg sm:text-xl md:text-3xl font-bold mb-4 md:mb-6 text-center border-b-2 border-white/30 pb-3 md:pb-4">
                    REPORTE SEMESTRAL DE TUTORÍA ACADÉMICA
                </h2>

                <form action="{{ route('maestro.semestral.guardar') }}" method="POST" class="space-y-4 md:space-y-6">
                    @csrf
                    <input type="hidden" name="id_grupo" value="{{ $grupo->id_grupo }}">

                    <!-- Información del Docente y Grupo -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-3 md:gap-4">
                        <div>
                            <label class="block text-white font-semibold mb-2 text-sm md:text-base">DOCENTE TUTOR(A):</label>
                            <input type="text" value="{{ $profesor->nombre }} {{ $profesor->ap_paterno }} {{ $profesor->ap_materno }}" readonly
                                class="w-full px-3 md:px-4 py-3 md:py-2 text-base md:text-sm rounded-lg bg-white/20 text-white border border-white/30">
                        </div>

                        <div>
                            <label class="block text-white font-semibold mb-2 text-sm md:text-base">PERIODO:</label>
                            <input type="text" value="{{ $grupo->periodo->periodo ?? 'N/A' }}" readonly
                                class="w-full px-3 md:px-4 py-3 md:py-2 text-base md:text-sm rounded-lg bg-white/20 text-white border border-white/30">
                        </div>

                        <div>
                            <label class="block text-white font-semibold mb-2 text-sm md:text-base">GRUPO:</label>
                            <input type="text" value="{{ $grupo->clave_grupo }}" readonly
                                class="w-full px-3 md:px-4 py-3 md:py-2 text-base md:text-sm rounded-lg bg-white/20 text-white border border-white/30">
                        </div>

                        <div>
                            <label class="block text-white font-semibold mb-2 text-sm md:text-base">SEMESTRE:</label>
                            <input type="text" value="{{ $grupo->semestre->semestre }}" readonly
                                class="w-full px-3 md:px-4 py-3 md:py-2 text-base md:text-sm rounded-lg bg-white/20 text-white border border-white/30">
                        </div>
                    </div>

                    <!-- Vista de Cards (Móvil) -->
                    <div class="md:hidden space-y-4">
                        @foreach($alumnos as $i => $alumno)
                            @php
                                $registro = $tutorias[$alumno->id_alumno] ?? null;
                            @endphp
                            <div class="bg-white/10 rounded-lg border border-white/30 overflow-hidden">
                                <input type="hidden" name="registros[{{ $i }}][id_alumno]" value="{{ $alumno->id_alumno }}">
                                
                                <!-- Encabezado del alumno (clickeable) -->
                                <div class="p-4 cursor-pointer hover:bg-white/5 transition-colors" onclick="toggleAlumnoForm({{ $i }})">
                                    <div class="flex justify-between items-start mb-2">
                                        <span class="bg-tec-green text-white px-3 py-1 rounded-full text-sm font-bold">{{ $i + 1 }}</span>
                                        <i id="icon-{{ $i }}" class="fa-solid fa-chevron-down text-white text-lg transition-transform duration-300"></i>
                                    </div>
                                    <h3 class="text-white font-bold text-base mb-1">{{ $alumno->nombre_completo }}</h3>
                                    <p class="text-white/70 text-sm">Matrícula: <span class="text-white font-medium">{{ $alumno->matricula }}</span></p>
                                </div>

                                <!-- Formulario colapsable -->
                                <div id="form-{{ $i }}" class="hidden px-4 pb-4 border-t border-white/30">
                                    <!-- Checkboxes -->
                                    <div class="grid grid-cols-2 gap-3 mb-4 mt-4">
                                        <label class="flex items-center gap-2 bg-white/5 p-3 rounded-lg border border-white/20">
                                            <input type="checkbox" name="registros[{{ $i }}][tutoria_grupal]" value="1"
                                                {{ $registro && $registro->tutoria_grupal ? 'checked' : '' }}
                                                class="w-5 h-5 rounded bg-white/20 border-white/30">
                                            <span class="text-white text-sm font-medium">Tut. Grupal</span>
                                        </label>

                                        <label class="flex items-center gap-2 bg-white/5 p-3 rounded-lg border border-white/20">
                                            <input type="checkbox" name="registros[{{ $i }}][tutoria_individual]" value="1"
                                                {{ $registro && $registro->tutoria_individual ? 'checked' : '' }}
                                                class="w-5 h-5 rounded bg-white/20 border-white/30">
                                            <span class="text-white text-sm font-medium">Tut. Individual</span>
                                        </label>

                                        <label class="flex items-center gap-2 bg-white/5 p-3 rounded-lg border border-white/20">
                                            <input type="checkbox" name="registros[{{ $i }}][asesoria_academica]" value="1"
                                                {{ $registro && $registro->asesoria_academica ? 'checked' : '' }}
                                                class="w-5 h-5 rounded bg-white/20 border-white/30">
                                            <span class="text-white text-sm font-medium">Asesoría Acad.</span>
                                        </label>

                                        <label class="flex items-center gap-2 bg-white/5 p-3 rounded-lg border border-white/20">
                                            <input type="checkbox" name="registros[{{ $i }}][area_psicologica]" value="1"
                                                {{ $registro && $registro->area_psicologica ? 'checked' : '' }}
                                                class="w-5 h-5 rounded bg-white/20 border-white/30">
                                            <span class="text-white text-sm font-medium">Psicología</span>
                                        </label>
                                    </div>

                                    <!-- Inputs numéricos -->
                                    <div class="space-y-3">
                                        <div>
                                            <label class="block text-white/70 text-xs font-semibold mb-1">CRÉDITOS CULTURALES/DEPORTIVOS:</label>
                                            <input type="number" name="registros[{{ $i }}][crditos_culturales_deportivos]" min="0"
                                                value="{{ $registro->crditos_culturales_deportivos ?? '' }}"
                                                class="w-full px-3 py-3 text-base rounded-lg bg-white/20 text-white border border-white/30 text-center">
                                        </div>

                                        <div>
                                            <label class="block text-white/70 text-xs font-semibold mb-1">CRÉDITOS ACADÉMICOS:</label>
                                            <input type="number" name="registros[{{ $i }}][crditos_academicos]" min="0"
                                                value="{{ $registro->crditos_academicos ?? '' }}"
                                                class="w-full px-3 py-3 text-base rounded-lg bg-white/20 text-white border border-white/30 text-center">
                                        </div>

                                        <div>
                                            <label class="block text-white/70 text-xs font-semibold mb-1">INGLÉS CUBIERTO (%):</label>
                                            <input type="text" name="registros[{{ $i }}][ingles_cubierto]" placeholder="Ej. 100%"
                                                value="{{ $registro->ingles_cubierto ?? '' }}"
                                                class="w-full px-3 py-3 text-base rounded-lg bg-white/20 text-white border border-white/30 text-center">
                                        </div>

                                        <div>
                                            <label class="block text-white/70 text-xs font-semibold mb-1">MATERIAS REPROBADAS:</label>
                                            <input type="number" name="registros[{{ $i }}][materias_reprobadas]" min="0"
                                                value="{{ $registro->materias_reprobadas ?? '' }}"
                                                class="w-full px-3 py-3 text-base rounded-lg bg-white/20 text-white border border-white/30 text-center">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <!-- Vista de Tabla (Desktop) -->
                    <div class="hidden md:block overflow-x-auto">
                        <table class="w-full border-collapse bg-white/10 rounded-lg overflow-hidden text-xs">
                            <thead>
                                <tr class="bg-tec-green">
                                    <th class="border border-white/30 px-2 py-2 text-white font-bold">No.</th>
                                    <th class="border border-white/30 px-2 py-2 text-white font-bold">Nombre del estudiante</th>
                                    <th class="border border-white/30 px-2 py-2 text-white font-bold">Matrícula</th>
                                    <th class="border border-white/30 px-2 py-2 text-white font-bold">Tut. Grupal</th>
                                    <th class="border border-white/30 px-2 py-2 text-white font-bold">Tut. Individual</th>
                                    <th class="border border-white/30 px-2 py-2 text-white font-bold">Asesoría Acad.</th>
                                    <th class="border border-white/30 px-2 py-2 text-white font-bold">Psicología</th>
                                    <th class="border border-white/30 px-2 py-2 text-white font-bold">Créd. Cultural</th>
                                    <th class="border border-white/30 px-2 py-2 text-white font-bold">Créd. Académica</th>
                                    <th class="border border-white/30 px-2 py-2 text-white font-bold">Inglés 100%</th>
                                    <th class="border border-white/30 px-2 py-2 text-white font-bold">Mat. Reprob.</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($alumnos as $i => $alumno)
                                    @php
                                        $registro = $tutorias[$alumno->id_alumno] ?? null;
                                    @endphp
                                    <tr class="hover:bg-white/5">
                                        <input type="hidden" name="registros[{{ $i }}][id_alumno]" value="{{ $alumno->id_alumno }}">
                                        <td class="border border-white/30 px-2 py-2 text-white text-center">{{ $i + 1 }}</td>
                                        <td class="border border-white/30 px-2 py-2 text-white">{{ $alumno->nombre_completo }}</td>
                                        <td class="border border-white/30 px-2 py-2 text-white text-center">{{ $alumno->matricula }}</td>
                                        <td class="border border-white/30 px-2 py-2 text-center">
                                            <input type="checkbox" name="registros[{{ $i }}][tutoria_grupal]" value="1"
                                                {{ $registro && $registro->tutoria_grupal ? 'checked' : '' }}
                                                class="w-4 h-4 rounded bg-white/20 border-white/30">
                                        </td>
                                        <td class="border border-white/30 px-2 py-2 text-center">
                                            <input type="checkbox" name="registros[{{ $i }}][tutoria_individual]" value="1"
                                                {{ $registro && $registro->tutoria_individual ? 'checked' : '' }}
                                                class="w-4 h-4 rounded bg-white/20 border-white/30">
                                        </td>
                                        <td class="border border-white/30 px-2 py-2 text-center">
                                            <input type="checkbox" name="registros[{{ $i }}][asesoria_academica]" value="1"
                                                {{ $registro && $registro->asesoria_academica ? 'checked' : '' }}
                                                class="w-4 h-4 rounded bg-white/20 border-white/30">
                                        </td>
                                        <td class="border border-white/30 px-2 py-2 text-center">
                                            <input type="checkbox" name="registros[{{ $i }}][area_psicologica]" value="1"
                                                {{ $registro && $registro->area_psicologica ? 'checked' : '' }}
                                                class="w-4 h-4 rounded bg-white/20 border-white/30">
                                        </td>
                                        <td class="border border-white/30 px-2 py-2">
                                            <input type="number" name="registros[{{ $i }}][crditos_culturales_deportivos]" min="0"
                                                value="{{ $registro->crditos_culturales_deportivos ?? '' }}"
                                                class="w-full px-2 py-1 rounded bg-white/20 text-white border border-white/30 text-center">
                                        </td>
                                        <td class="border border-white/30 px-2 py-2">
                                            <input type="number" name="registros[{{ $i }}][crditos_academicos]" min="0"
                                                value="{{ $registro->crditos_academicos ?? '' }}"
                                                class="w-full px-2 py-1 rounded bg-white/20 text-white border border-white/30 text-center">
                                        </td>
                                        <td class="border border-white/30 px-2 py-2">
                                            <input type="text" name="registros[{{ $i }}][ingles_cubierto]" placeholder="Ej. 100%"
                                                value="{{ $registro->ingles_cubierto ?? '' }}"
                                                class="w-full px-2 py-1 rounded bg-white/20 text-white border border-white/30 text-center">
                                        </td>
                                        <td class="border border-white/30 px-2 py-2">
                                            <input type="number" name="registros[{{ $i }}][materias_reprobadas]" min="0"
                                                value="{{ $registro->materias_reprobadas ?? '' }}"
                                                class="w-full px-2 py-1 rounded bg-white/20 text-white border border-white/30 text-center">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Informe Grupal -->
                    <div>
                        <label class="block text-white font-semibold mb-2 text-sm md:text-base">Informe Grupal Ejecutivo del Periodo Escolar:</label>
                        <textarea name="informe_grupal" rows="4" required
                            class="w-full px-3 md:px-4 py-3 text-base md:text-sm rounded-lg bg-white/20 text-white border border-white/30 focus:outline-none focus:ring-2 focus:ring-tec-green resize-y">{{ $tutorias->first()->informe_grupal ?? '' }}</textarea>
                    </div>

                    <!-- Índice de Reprobación -->
                    <div class="bg-white/10 rounded-lg p-4 border border-white/30">
                        <p class="text-white text-base md:text-lg"><strong>Índice de reprobación del grupo:</strong> <span class="text-hover-pink font-bold text-lg md:text-xl">{{ $indiceReprobacion }}%</span></p>
                    </div>

                    <!-- Botones optimizados -->
                    <div class="flex flex-col sm:flex-row gap-3 justify-center sm:justify-start pt-4">
                        <button type="submit"
                            class="w-full sm:w-auto px-6 py-3 text-base md:text-sm bg-tec-green hover:bg-tec-green/80 text-white font-bold rounded-lg shadow-lg transition-all duration-300 hover:-translate-y-1">
                            <i class="fa-solid fa-save mr-2"></i>Guardar Reporte
                        </button>
                        <button type="button" onclick="generarReporteSemestral()"
                            class="w-full sm:w-auto px-6 py-3 text-base md:text-sm bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg shadow-lg transition-all duration-300 hover:-translate-y-1">
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

        // Función para expandir/colapsar formularios de alumnos en vista móvil
        function toggleAlumnoForm(index) {
            const form = document.getElementById(`form-${index}`);
            const icon = document.getElementById(`icon-${index}`);
            
            if (form.classList.contains('hidden')) {
                form.classList.remove('hidden');
                icon.classList.add('rotate-180');
            } else {
                form.classList.add('hidden');
                icon.classList.remove('rotate-180');
            }
        }

        function generarReporteSemestral() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF('landscape');

            let y = 15;

            doc.setFontSize(12);
            doc.text("TECNOLÓGICO DE ESTUDIOS SUPERIORES DE IXTAPALUCA", 148, 10, { align: 'center' });
            doc.setFontSize(10);
            doc.text("REPORTE SEMESTRAL DE TUTORÍA ACADÉMICA", 148, y, { align: 'center' });
            y += 10;

            const docente = document.querySelector('input[value*="{{ $profesor->nombre }}"]')?.value || "";
            const periodo = document.querySelector('input[value*="{{ $grupo->periodo->periodo }}"]')?.value || "";
            const grupo = document.querySelector('input[value*="{{ $grupo->clave_grupo }}"]')?.value || "";
            const semestre = document.querySelector('input[value*="{{ $grupo->semestre->semestre }}"]')?.value || "";

            doc.setFontSize(9);
            doc.text(`DOCENTE TUTOR(A): ${docente}`, 10, y); y += 6;
            doc.text(`PERIODO: ${periodo}`, 10, y); y += 6;
            doc.text(`GRUPO: ${grupo}`, 10, y); y += 6;
            doc.text(`SEMESTRE: ${semestre}`, 10, y); y += 10;

            const headers = [[
                "No.",
                "Estudiante",
                "Matrícula",
                "Tut. Grupal",
                "Tut. Individual",
                "Asesoría Acad.",
                "Psicología",
                "Créditos Culturales",
                "Créditos Académicos",
                "Inglés 100%",
                "Mat. Reprobadas"
            ]];

            const body = [];
            const filas = document.querySelectorAll('table tbody tr');

            filas.forEach((tr, index) => {
                const tds = tr.querySelectorAll('td');
                const nombre = tds[1]?.textContent.trim() || "";
                const matricula = tds[2]?.textContent.trim() || "";
                const tutorGrupal = tds[3]?.querySelector('input')?.checked ? 'Sí' : 'No';
                const tutorIndiv = tds[4]?.querySelector('input')?.checked ? 'Sí' : 'No';
                const asesoria = tds[5]?.querySelector('input')?.checked ? 'Sí' : 'No';
                const psicologia = tds[6]?.querySelector('input')?.checked ? 'Sí' : 'No';
                const creditosCult = tds[7]?.querySelector('input')?.value || "0";
                const creditosAcad = tds[8]?.querySelector('input')?.value || "0";
                const ingles = tds[9]?.querySelector('input')?.value || "";
                const reprobadas = tds[10]?.querySelector('input')?.value || "0";

                body.push([
                    index + 1,
                    nombre,
                    matricula,
                    tutorGrupal,
                    tutorIndiv,
                    asesoria,
                    psicologia,
                    creditosCult,
                    creditosAcad,
                    ingles,
                    reprobadas
                ]);
            });

            doc.autoTable({
                head: headers,
                body: body,
                startY: y,
                styles: { fontSize: 7 },
                headStyles: { fillColor: [41, 128, 185] },
            });

            y = doc.lastAutoTable.finalY + 10;

            const informe = document.querySelector('textarea[name="informe_grupal"]').value;
            doc.setFontSize(9);
            doc.text("Informe Grupal Ejecutivo del Periodo Escolar:", 10, y); y += 6;
            const textoDividido = doc.splitTextToSize(informe, 270);
            doc.text(textoDividido, 10, y);
            y += textoDividido.length * 5;

            const indice = "{{ $indiceReprobacion }}";
            doc.text(`Índice de reprobación del grupo: ${indice}%`, 10, y + 10);

            doc.save("Reporte_Semestral_Tutoria.pdf");
        }
    </script>

</body>

</html>
