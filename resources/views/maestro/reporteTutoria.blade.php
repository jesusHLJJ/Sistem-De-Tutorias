<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Mensual de Tutoría Académica</title>
    
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
        <h2 class="text-white font-bold text-base md:text-2xl tracking-wide">REPORTE MENSUAL</h2>
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
               class="text-white no-underline px-5 py-3 md:py-4 rounded-lg transition-all duration-300 font-medium text-sm md:text-base flex items-center gap-2 md:gap-3 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-users text-lg w-5"></i>
                <span>Mis Grupos</span>
            </a>
            
            <div class="border-t border-white/20 my-2"></div>
            
            <a href="{{ route('maestro.tutorias_academicas') }}" 
               class="text-white no-underline px-5 py-3 md:py-4 rounded-lg transition-all duration-300 font-medium text-sm md:text-base flex items-center gap-2 md:gap-3 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-book text-lg w-5"></i>
                <span>Mensual Tutoría</span>
            </a>
            
            <a href="{{ route('maestro.maestro.reporte.asesorias') }}" 
               class="text-white no-underline px-5 py-3 md:py-4 rounded-lg transition-all duration-300 font-medium text-sm md:text-base flex items-center gap-2 md:gap-3 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-chart-line text-lg w-5"></i>
                <span>Reporte de Asesorías</span>
            </a>

            <div class="text-hover-pink px-5 py-3 md:py-4 rounded-lg font-bold text-sm md:text-base flex items-center gap-2 md:gap-3 bg-hover-pink/10">
                <i class="fa-solid fa-pen-to-square text-lg w-5"></i>
                <span>Registrar Tutoría</span>
            </div>
            

            
            <div class="border-t border-white/20 my-2"></div>
            
            <a href="{{ route('maestro.dashboard') }}" 
               class="text-white no-underline px-5 py-3 md:py-4 rounded-lg transition-all duration-300 font-medium text-sm md:text-base flex items-center gap-2 md:gap-3 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-home text-lg w-5"></i>
                <span>Volver al Inicio</span>
            </a>
        </div>

        <!-- Content Area -->
        <div class="flex-1 p-4 md:p-8 flex justify-center items-start overflow-y-auto md:ml-64">
            <div class="bg-tec-green-dark/85 backdrop-blur-md rounded-xl md:rounded-2xl p-4 md:p-8 w-full max-w-[1400px] shadow-[0_8px_32px_rgba(0,0,0,0.3)] mb-8">
                
                <h2 class="text-white text-lg sm:text-xl md:text-3xl font-bold mb-4 md:mb-6 text-center border-b-2 border-white/30 pb-3 md:pb-4">
                    REPORTE MENSUAL DE TUTORÍA ACADÉMICA
                </h2>

                @if(session('success'))
                    <div class="bg-green-500/20 border border-green-500 text-white px-4 py-3 rounded-lg mb-4">
                        <i class="fa-solid fa-check-circle mr-2"></i>{{ session('success') }}
                    </div>
                @endif

                <!-- Información del Asesor -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-4 mb-4 md:mb-6">
                    <div>
                        <label class="block text-white font-semibold mb-2 text-sm md:text-base">ASESOR(A):</label>
                        <input type="text" value="{{ $profesor->nombre }} {{ $profesor->ap_paterno }} {{ $profesor->ap_materno }}" readonly
                            class="w-full px-3 md:px-4 py-3 md:py-2 text-base md:text-sm rounded-lg bg-white/20 text-white border border-white/30">
                    </div>

                    <div>
                        <label class="block text-white font-semibold mb-2 text-sm md:text-base">CARRERA:</label>
                        <input type="text" value="{{ $profesor->carrera->carrera }}" readonly
                            class="w-full px-3 md:px-4 py-3 md:py-2 text-base md:text-sm rounded-lg bg-white/20 text-white border border-white/30">
                    </div>

                    <div>
                        <label class="block text-white font-semibold mb-2 text-sm md:text-base">PERIODO:</label>
                        <input type="text" value="{{ $periodo }}" readonly
                            class="w-full px-3 md:px-4 py-3 md:py-2 text-base md:text-sm rounded-lg bg-white/20 text-white border border-white/30">
                    </div>
                </div>

                <!-- Vista de Cards (Móvil) -->
                <div class="md:hidden space-y-3">
                    @foreach($alumnos as $i => $alumno)
                        @php
                            $registro = $registros[$alumno->id_alumno] ?? null;
                        @endphp
                        <div class="bg-white/10 rounded-lg border border-white/30 overflow-hidden">
                            <!-- Header colapsable -->
                            <button type="button" 
                                onclick="toggleAccordion({{ $i }})"
                                class="w-full p-4 flex items-center justify-between hover:bg-white/5 transition-colors">
                                <div class="flex items-center gap-3">
                                    <span class="bg-tec-green text-white px-3 py-1 rounded-full text-sm font-bold">{{ $i + 1 }}</span>
                                    <div class="text-left">
                                        <h3 class="text-white font-bold text-base">{{ $alumno->nombre_completo }}</h3>
                                        <p class="text-white/70 text-xs">{{ $alumno->matricula }} • {{ $alumno->grupo->clave_grupo ?? '' }}</p>
                                    </div>
                                </div>
                                <i id="icon-{{ $i }}" class="fa-solid fa-chevron-down text-white transition-transform duration-300"></i>
                            </button>

                            <!-- Contenido colapsable -->
                            <div id="accordion-{{ $i }}" class="hidden">
                                <form action="{{ route('maestro.maestro.tutoria.guardar') }}" method="POST" class="p-4 pt-0 border-t border-white/20">
                                    @csrf
                                    <input type="hidden" name="id_alumno" value="{{ $alumno->id_alumno }}">

                                    <!-- Campos del formulario -->
                                    <div class="space-y-3 mt-4">
                                        <div>
                                            <label class="block text-white/70 text-xs font-semibold mb-1">MES:</label>
                                            <select name="mes_entrega" required
                                                class="w-full px-3 py-3 text-base rounded-lg bg-white/20 text-white border border-white/30">
                                                <option value="">--Selecciona mes--</option>
                                                @foreach(['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'] as $mes)
                                                    <option value="{{ $mes }}" class="text-gray-900"
                                                        {{ ($registro->mes_entrega ?? '') === $mes ? 'selected' : '' }}>
                                                        {{ $mes }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block text-white/70 text-xs font-semibold mb-1">PROBLEMÁTICA:</label>
                                            <select name="id_problematica" required
                                                class="w-full px-3 py-3 text-base rounded-lg bg-white/20 text-white border border-white/30">
                                                <option value="">--Selecciona--</option>
                                                @foreach($problematicas as $p)
                                                    <option value="{{ $p->id_problematica }}" class="text-gray-900"
                                                        {{ (isset($registro) && $registro->id_problematica == $p->id_problematica) ? 'selected' : '' }}>
                                                        {{ $p->tipo_problematica }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div>
                                            <label class="block text-white/70 text-xs font-semibold mb-1">ANÁLISIS:</label>
                                            <textarea name="analisis_metodo_aplicado" rows="4" required
                                                class="w-full px-3 py-3 text-base rounded-lg bg-white/20 text-white border border-white/30 resize-y">{{ $registro->analisis_metodo_aplicado ?? '' }}</textarea>
                                        </div>

                                        <div>
                                            <label class="block text-white/70 text-xs font-semibold mb-1">ÁREA A CANALIZAR:</label>
                                            <input type="text" name="area_canalizar" value="{{ $registro->area_canalizar ?? '' }}" required
                                                class="w-full px-3 py-3 text-base rounded-lg bg-white/20 text-white border border-white/30">
                                        </div>
                                    </div>

                                    <!-- Botón guardar -->
                                    <button type="submit"
                                        class="w-full mt-4 px-6 py-3 bg-tec-green hover:bg-tec-green/80 text-white font-bold rounded-lg shadow-lg transition-all duration-300">
                                        <i class="fa-solid fa-save mr-2"></i>Guardar
                                    </button>
                                </form>
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
                                <th class="border border-white/30 px-2 py-2 text-white font-bold">Estudiante</th>
                                <th class="border border-white/30 px-2 py-2 text-white font-bold">Matrícula</th>
                                <th class="border border-white/30 px-2 py-2 text-white font-bold">Grupo</th>
                                <th class="border border-white/30 px-2 py-2 text-white font-bold">Mes</th>
                                <th class="border border-white/30 px-2 py-2 text-white font-bold">Problemática</th>
                                <th class="border border-white/30 px-2 py-2 text-white font-bold">Análisis</th>
                                <th class="border border-white/30 px-2 py-2 text-white font-bold">Área a canalizar</th>
                                <th class="border border-white/30 px-2 py-2 text-white font-bold">Guardar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($alumnos as $i => $alumno)
                                @php
                                    $registro = $registros[$alumno->id_alumno] ?? null;
                                @endphp
                                <tr class="hover:bg-white/5">
                                    <form action="{{ route('maestro.maestro.tutoria.guardar') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="id_alumno" value="{{ $alumno->id_alumno }}">

                                        <td class="border border-white/30 px-2 py-2 text-white text-center">{{ $i + 1 }}</td>
                                        <td class="border border-white/30 px-2 py-2 text-white">{{ $alumno->nombre_completo }}</td>
                                        <td class="border border-white/30 px-2 py-2 text-white text-center">{{ $alumno->matricula }}</td>
                                        <td class="border border-white/30 px-2 py-2 text-white text-center">{{ $alumno->grupo->clave_grupo ?? '' }}</td>
                                        <td class="border border-white/30 px-2 py-2">
                                            <select name="mes_entrega" required
                                                class="w-full px-2 py-1 rounded bg-white/20 text-white border border-white/30 text-xs">
                                                <option value="">--</option>
                                                @foreach(['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'] as $mes)
                                                    <option value="{{ $mes }}" class="text-gray-900"
                                                        {{ ($registro->mes_entrega ?? '') === $mes ? 'selected' : '' }}>
                                                        {{ $mes }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="border border-white/30 px-2 py-2">
                                            <select name="id_problematica" required
                                                class="w-full px-2 py-1 rounded bg-white/20 text-white border border-white/30 text-xs">
                                                <option value="">--</option>
                                                @foreach($problematicas as $p)
                                                    <option value="{{ $p->id_problematica }}" class="text-gray-900"
                                                        {{ (isset($registro) && $registro->id_problematica == $p->id_problematica) ? 'selected' : '' }}>
                                                        {{ $p->tipo_problematica }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td class="border border-white/30 px-2 py-2">
                                            <textarea name="analisis_metodo_aplicado" rows="2" required
                                                class="w-full px-2 py-1 rounded bg-white/20 text-white border border-white/30 text-xs resize-y">{{ $registro->analisis_metodo_aplicado ?? '' }}</textarea>
                                        </td>
                                        <td class="border border-white/30 px-2 py-2">
                                            <input type="text" name="area_canalizar" value="{{ $registro->area_canalizar ?? '' }}" required
                                                class="w-full px-2 py-1 rounded bg-white/20 text-white border border-white/30 text-xs">
                                        </td>
                                        <td class="border border-white/30 px-2 py-2 text-center">
                                            <button type="submit"
                                                class="px-3 py-1 bg-tec-green hover:bg-tec-green/80 text-white font-bold rounded text-xs">
                                                <i class="fa-solid fa-save"></i>
                                            </button>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Botón PDF -->
                <div class="flex justify-center mt-4 md:mt-6">
                    <button onclick="generarReportePDF()"
                        class="w-full sm:w-auto px-6 py-3 text-base md:text-sm bg-orange-500 hover:bg-orange-600 text-white font-bold rounded-lg shadow-lg transition-all duration-300 hover:-translate-y-1">
                        <i class="fa-solid fa-file-pdf mr-2"></i>Generar PDF
                    </button>
                </div>

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

        // Función para toggle del acordeón
        function toggleAccordion(index) {
            const accordion = document.getElementById(`accordion-${index}`);
            const icon = document.getElementById(`icon-${index}`);
            
            if (accordion.classList.contains('hidden')) {
                // Cerrar todos los demás acordeones
                document.querySelectorAll('[id^="accordion-"]').forEach(acc => {
                    if (acc !== accordion) {
                        acc.classList.add('hidden');
                    }
                });
                document.querySelectorAll('[id^="icon-"]').forEach(ic => {
                    if (ic !== icon) {
                        ic.classList.remove('rotate-180');
                    }
                });
                
                // Abrir el acordeón actual
                accordion.classList.remove('hidden');
                icon.classList.add('rotate-180');
            } else {
                // Cerrar el acordeón actual
                accordion.classList.add('hidden');
                icon.classList.remove('rotate-180');
            }
        }

        function generarReportePDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF({ orientation: 'landscape' });

            let y = 20;

            doc.setFontSize(12);
            doc.text("TECNOLÓGICO DE ESTUDIOS SUPERIORES DE IXTAPALUCA", 148, 10, { align: 'center' });
            doc.setFontSize(10);
            doc.text("REPORTE MENSUAL DE TUTORÍA ACADÉMICA", 148, 17, { align: 'center' });

            const asesor = document.querySelector('input[value*="{{ $profesor->nombre }}"]')?.value || "";
            const carrera = document.querySelector('input[value*="{{ $profesor->carrera->carrera }}"]')?.value || "";
            const periodo = document.querySelector('input[value*="{{ $periodo }}"]')?.value || "";

            doc.setFontSize(9);
            doc.text(`ASESOR(A): ${asesor}`, 10, y); y += 6;
            doc.text(`CARRERA: ${carrera}`, 10, y); y += 6;
            doc.text(`PERIODO: ${periodo}`, 10, y); y += 10;

            doc.setFontSize(8);
            const headers = [
                ["No", "Estudiante", "Matrícula", "Grupo", "Mes", "Problemática", "Análisis", "Área a canalizar"]
            ];

            const body = [];
            const rows = document.querySelectorAll('table tbody tr');

            rows.forEach((tr, index) => {
                const tds = tr.querySelectorAll('td');
                if (tds.length < 8) return;

                const num = tds[0].innerText.trim();
                const estudiante = tds[1].innerText.trim();
                const matricula = tds[2].innerText.trim();
                const grupo = tds[3].innerText.trim();
                const mes = tds[4].querySelector('select')?.value || '';
                const problematica = tds[5].querySelector('select')?.selectedOptions[0]?.text || '';
                const analisis = tds[6].querySelector('textarea')?.value || '';
                const canalizar = tds[7].querySelector('input')?.value || '';

                body.push([num, estudiante, matricula, grupo, mes, problematica, analisis, canalizar]);
            });

            doc.autoTable({
                startY: y,
                head: headers,
                body: body,
                styles: { fontSize: 6, cellWidth: 'wrap' },
                headStyles: { fillColor: [41, 128, 185] },
                margin: { top: y }
            });

            doc.save('Reporte_Mensual_Tutoria.pdf');
        }
    </script>

</body>

</html>
