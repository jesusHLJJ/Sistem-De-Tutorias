<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Mensual de Asesorías Académicas</title>
    
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

<body class="font-montserrat bg-cover bg-center bg-fixed min-h-screen md:h-screen md:overflow-hidden flex flex-col bg-[url('{{ asset('multimedia/fondo.jpg') }}')]">

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
        <h2 class="text-white font-bold text-base md:text-2xl tracking-wide">REPORTE DE ASESORÍAS</h2>
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
            
            <a href="{{ route('maestro.tutorias_academicas') }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-book text-base w-4"></i>
                <span>Mensual Tutoría</span>
            </a>
            
            <div class="text-hover-pink px-4 py-2.5 rounded-lg font-bold text-xs md:text-sm flex items-center gap-2 bg-hover-pink/10">
                <i class="fa-solid fa-chart-line text-base w-4"></i>
                <span>Reporte de Asesorías</span>
            </div>
            
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
            <div class="bg-tec-green-dark/85 backdrop-blur-md rounded-xl md:rounded-2xl p-4 md:p-8 w-full max-w-7xl shadow-[0_8px_32px_rgba(0,0,0,0.3)] mb-8">
                
                <h2 class="text-white text-lg sm:text-xl md:text-3xl font-bold mb-4 md:mb-6 text-center border-b-2 border-white/30 pb-3 md:pb-4">
                    REPORTE MENSUAL DE ASESORÍAS ACADÉMICAS
                </h2>

                <!-- Información del Asesor -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4 mb-4 md:mb-6">
                    <div>
                        <label for="asesor" class="block text-white font-semibold mb-2 text-sm md:text-base">ASESOR(A):</label>
                        <input type="text" id="asesor" name="asesor" value="{{ $profesor->nombre }} {{ $profesor->ap_paterno }} {{ $profesor->ap_materno }}" readonly
                            class="w-full px-3 md:px-4 py-3 md:py-2 text-base md:text-sm rounded-lg bg-white/20 text-white border border-white/30">
                    </div>

                    <div>
                        <label for="carrera" class="block text-white font-semibold mb-2 text-sm md:text-base">CARRERA:</label>
                        <input type="text" id="carrera" name="carrera" value="{{ $profesor->carrera->carrera }}" readonly
                            class="w-full px-3 md:px-4 py-3 md:py-2 text-base md:text-sm rounded-lg bg-white/20 text-white border border-white/30">
                    </div>

                    <div>
                        <label for="mes" class="block text-white font-semibold mb-2 text-sm md:text-base">MES CORRESPONDIENTE:</label>
                        <input type="text" id="mes" name="mes" value="{{ ucfirst(strtolower($mes)) }}" readonly
                            class="w-full px-3 md:px-4 py-3 md:py-2 text-base md:text-sm rounded-lg bg-white/20 text-white border border-white/30">
                    </div>

                    <div>
                        <label for="periodo" class="block text-white font-semibold mb-2 text-sm md:text-base">PERIODO:</label>
                        <input type="text" id="periodo" name="periodo" value="{{ $periodo }}" readonly
                            class="w-full px-3 md:px-4 py-3 md:py-2 text-base md:text-sm rounded-lg bg-white/20 text-white border border-white/30">
                    </div>
                </div>

                <!-- Vista de Cards (Móvil) -->
                <div class="md:hidden space-y-3">
                    @foreach($asesorias as $i => $asesoria)
                        <div class="bg-white/10 rounded-lg p-4 border border-white/30">
                            <div class="flex justify-between items-start mb-3">
                                <span class="bg-tec-green text-white px-3 py-1 rounded-full text-sm font-bold">{{ $i + 1 }}</span>
                            </div>
                            
                            <div class="space-y-2">
                                <div>
                                    <span class="text-white/70 text-xs font-semibold block mb-1">ESTUDIANTE:</span>
                                    <span class="text-white text-base font-medium">{{ $asesoria->alumno->nombre_completo }}</span>
                                </div>
                                
                                <div class="grid grid-cols-2 gap-2">
                                    <div>
                                        <span class="text-white/70 text-xs font-semibold block mb-1">MATRÍCULA:</span>
                                        <span class="text-white text-sm">{{ $asesoria->alumno->matricula }}</span>
                                    </div>
                                    <div>
                                        <span class="text-white/70 text-xs font-semibold block mb-1">GRUPO:</span>
                                        <span class="text-white text-sm">{{ $asesoria->alumno->grupo->clave_grupo ?? 'N/A' }}</span>
                                    </div>
                                </div>
                                
                                <div>
                                    <span class="text-white/70 text-xs font-semibold block mb-1">MATERIA:</span>
                                    <span class="text-white text-sm">{{ $asesoria->materia->nombre }}</span>
                                </div>
                                
                                <div class="grid grid-cols-2 gap-2">
                                    <div>
                                        <span class="text-white/70 text-xs font-semibold block mb-1">ASESORÍAS:</span>
                                        <span class="text-white text-sm font-bold">1</span>
                                    </div>
                                    <div>
                                        <span class="text-white/70 text-xs font-semibold block mb-1">RECURSO:</span>
                                        <span class="text-white text-sm">{{ $asesoria->medio_didactico_recurso }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Vista de Tabla (Desktop) -->
                <div class="hidden md:block overflow-x-auto">
                    <table class="w-full border-collapse bg-white/10 rounded-lg overflow-hidden">
                        <thead>
                            <tr class="bg-tec-green">
                                <th class="border border-white/30 px-3 py-2 text-white font-bold text-sm">No.</th>
                                <th class="border border-white/30 px-3 py-2 text-white font-bold text-sm">Nombre del estudiante</th>
                                <th class="border border-white/30 px-3 py-2 text-white font-bold text-sm">Matrícula</th>
                                <th class="border border-white/30 px-3 py-2 text-white font-bold text-sm">Grupo</th>
                                <th class="border border-white/30 px-3 py-2 text-white font-bold text-sm">Materia</th>
                                <th class="border border-white/30 px-3 py-2 text-white font-bold text-sm">No. de asesorías</th>
                                <th class="border border-white/30 px-3 py-2 text-white font-bold text-sm">Recurso didáctico</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($asesorias as $i => $asesoria)
                                <tr class="hover:bg-white/5">
                                    <td class="border border-white/30 px-3 py-2 text-white text-center text-sm">{{ $i + 1 }}</td>
                                    <td class="border border-white/30 px-3 py-2 text-white text-sm">{{ $asesoria->alumno->nombre_completo }}</td>
                                    <td class="border border-white/30 px-3 py-2 text-white text-center text-sm">{{ $asesoria->alumno->matricula }}</td>
                                    <td class="border border-white/30 px-3 py-2 text-white text-center text-sm">{{ $asesoria->alumno->grupo->clave_grupo ?? 'N/A' }}</td>
                                    <td class="border border-white/30 px-3 py-2 text-white text-sm">{{ $asesoria->materia->nombre }}</td>
                                    <td class="border border-white/30 px-3 py-2 text-white text-center text-sm">1</td>
                                    <td class="border border-white/30 px-3 py-2 text-white text-sm">{{ $asesoria->medio_didactico_recurso }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Botón optimizado -->
                <div class="flex justify-center mt-4 md:mt-6">
                    <button onclick="generarPDFAsesorias()"
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

        function generarPDFAsesorias() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF({ orientation: "landscape" });

            doc.setFontSize(12);
            doc.text("TECNOLÓGICO DE ESTUDIOS SUPERIORES DE IXTAPALUCA", 148, 10, { align: 'center' });
            doc.setFontSize(10);
            doc.text("REPORTE MENSUAL DE ASESORÍAS ACADÉMICAS", 148, 17, { align: 'center' });

            let y = 25;

            const asesor = document.getElementById("asesor").value;
            const carrera = document.getElementById("carrera").value;
            const mes = document.getElementById("mes").value;
            const periodo = document.getElementById("periodo").value;

            doc.setFontSize(9);
            doc.text(`ASESOR(A): ${asesor}`, 10, y); y += 6;
            doc.text(`CARRERA: ${carrera}`, 10, y); y += 6;
            doc.text(`MES CORRESPONDIENTE: ${mes}`, 10, y); y += 6;
            doc.text(`PERIODO: ${periodo}`, 10, y); y += 10;

            const headers = [[
                "No.",
                "Nombre del estudiante",
                "Matrícula",
                "Grupo",
                "Materia",
                "No. de asesorías",
                "Recurso didáctico"
            ]];

            const body = [];
            const rows = document.querySelectorAll("table tbody tr");

            rows.forEach(row => {
                const cells = row.querySelectorAll("td");
                const rowData = Array.from(cells).map(td => td.innerText.trim());
                body.push(rowData);
            });

            doc.autoTable({
                startY: y,
                head: headers,
                body: body,
                styles: { fontSize: 7, cellPadding: 2 },
                headStyles: { fillColor: [22, 160, 133], textColor: 255 },
                margin: { top: y }
            });

            doc.save('Reporte_Asesorias_Mensual.pdf');
        }
    </script>

</body>

</html>
