<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solicitud de Asesoría - Maestro</title>
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

            <a href="{{ route('maestro.maestro.solicitudes.lista', $alumno->id_alumno) }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-comments text-base w-4"></i>
                <span>Solicitudes de Asesoría</span>
            </a>

            <div class="text-hover-pink px-4 py-2.5 rounded-lg font-bold text-xs md:text-sm flex items-center gap-2 bg-hover-pink/10">
                <i class="fa-solid fa-file-alt text-base w-4"></i>
                <span>Detalle Solicitud</span>
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
            <div class="bg-tec-green-dark/90 backdrop-blur-md rounded-xl md:rounded-2xl p-6 md:p-10 w-full max-w-4xl shadow-[0_8px_32px_rgba(0,0,0,0.3)]">
                
                <h2 class="text-white text-xl md:text-3xl font-bold text-center mb-8 border-b-2 border-white/30 pb-4">
                    SOLICITUD DE ASESORÍA
                </h2>

                <form action="{{ route('maestro.maestro.solicitudes.lista', $alumno->id_alumno) }}" method="GET" class="space-y-6">
                    <input type="hidden" name="alumno_id" value="{{ $alumno->id_alumno }}">
                    <input type="hidden" name="semestre_id" value="{{ $semestre->id_semestre}}">
                    <input type="hidden" name="carrera_id" value="{{ $carrera->id_carrera}}">
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- División Académica -->
                        <div>
                            <label for="division" class="block text-white font-bold mb-2 text-sm">DIVISIÓN ACADÉMICA:</label>
                            <input type="text" id="division" name="division" value="{{ $carrera->carrera }}" readonly
                                class="w-full bg-white/10 border border-white/30 rounded-lg px-4 py-2 text-white focus:outline-none cursor-not-allowed">
                        </div>

                        <!-- Fecha -->
                        <div>
                            <label for="fecha" class="block text-white font-bold mb-2 text-sm">FECHA:</label>
                            <input type="date" id="fecha" name="fecha" readonly
                                class="w-full bg-white/10 border border-white/30 rounded-lg px-4 py-2 text-white focus:outline-none cursor-not-allowed">
                        </div>

                        <!-- Semestre -->
                        <div>
                            <label for="semestre" class="block text-white font-bold mb-2 text-sm">SEMESTRE:</label>
                            <input type="text" id="semestre" name="semestre" value="{{ $semestre->semestre }}" readonly
                                class="w-full bg-white/10 border border-white/30 rounded-lg px-4 py-2 text-white focus:outline-none cursor-not-allowed">
                        </div>

                        <!-- Profesor -->
                        <div>
                            <label class="block text-white font-bold mb-2 text-sm">PROFESOR:</label>
                            <select id="id_profesor_display" disabled
                                class="w-full bg-white/10 border border-white/30 rounded-lg px-4 py-2 text-white focus:outline-none cursor-not-allowed appearance-none">
                                <option value="">-- Selecciona --</option>
                                @foreach ($profesores as $profesor)
                                    <option value="{{ $profesor->id_profesor }}"
                                        {{ (isset($solicitud) && $solicitud->id_profesor == $profesor->id_profesor) ? 'selected' : '' }}>
                                        {{ $profesor->nombre }} {{ $profesor->ap_paterno }} {{ $profesor->ap_materno }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="hidden" name="id_profesor" value="{{ $solicitud->id_profesor ?? '' }}">
                        </div>

                        <!-- Materia -->
                        <div>
                            <label for="id_materia" class="block text-white font-bold mb-2 text-sm">MATERIA:</label>
                            <select id="id_materia_display" disabled
                                class="w-full bg-white/10 border border-white/30 rounded-lg px-4 py-2 text-white focus:outline-none cursor-not-allowed appearance-none">
                                <option value="">-- Selecciona una materia --</option>
                                @foreach ($materias as $materia)
                                    <option value="{{ $materia->id_materia }}" 
                                        {{ isset($solicitud) && $solicitud->id_materia == $materia->id_materia ? 'selected' : '' }}>
                                        {{ $materia->nombre }}
                                    </option>
                                @endforeach
                            </select>
                            <input type="hidden" name="id_materia" value="{{ $solicitud->id_materia ?? '' }}">
                        </div>

                        @csrf

                        <!-- Estudiante -->
                        <div>
                            <label for="estudiante" class="block text-white font-bold mb-2 text-sm">ESTUDIANTE:</label>
                            <input type="text" id="alumno" name="alumno" value="{{ $alumno->nombre_completo }}" readonly
                                class="w-full bg-white/10 border border-white/30 rounded-lg px-4 py-2 text-white focus:outline-none cursor-not-allowed">
                        </div>

                        <!-- Matrícula -->
                        <div>
                            <label for="matricula" class="block text-white font-bold mb-2 text-sm">MATRÍCULA:</label>
                            <input type="text" id="matricula" name="matricula" value="{{ $alumno->matricula }}" readonly
                                class="w-full bg-white/10 border border-white/30 rounded-lg px-4 py-2 text-white focus:outline-none cursor-not-allowed">
                        </div>

                        <!-- Grupo -->
                        <div>
                            <label for="grupo" class="block text-white font-bold mb-2 text-sm">GRUPO:</label>
                            <input type="text" id="grupo" name="grupo" value="{{ $alumno->grupo?->clave_grupo ?? 'No asignado' }}" readonly
                                class="w-full bg-white/10 border border-white/30 rounded-lg px-4 py-2 text-white focus:outline-none cursor-not-allowed">
                        </div>
                    </div>

                    <!-- Medio de Asesoría -->
                    <div>
                        <label for="medio_asesoria" class="block text-white font-bold mb-2 text-sm">MEDIO POR EL QUE RECIBE LA ASESORÍA:</label>
                        <textarea id="medio_asesoria" name="medio_asesoria" rows="2" readonly
                            class="w-full bg-white/10 border border-white/30 rounded-lg px-4 py-2 text-white focus:outline-none cursor-not-allowed">{{ $solicitud->medio_didactico_recurso ?? '' }}</textarea>
                    </div>

                    <!-- Descripción -->
                    <div>
                        <label for="descripcion" class="block text-white font-bold mb-2 text-sm">DESCRIPCIÓN DE LA ASESORÍA:</label>
                        <textarea id="descripcion" name="descripcion" rows="4" readonly
                            class="w-full bg-white/10 border border-white/30 rounded-lg px-4 py-2 text-white focus:outline-none cursor-not-allowed">{{ $solicitud->temas_tratar_descripcion ?? '' }}</textarea>
                    </div>

                    <!-- Botones -->
                    <div class="flex flex-col md:flex-row gap-4 justify-end pt-4">
                        <button type="submit" 
                            class="bg-tec-green hover:bg-green-600 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition-all duration-300 flex items-center justify-center gap-2 hover:scale-105">
                            <i class="fa-solid fa-arrow-left"></i>
                            <span>Regresar</span>
                        </button>

                        <button type="button" onclick="generatePDF()" 
                            class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded-lg shadow-lg transition-all duration-300 flex items-center justify-center gap-2 hover:scale-105">
                            <i class="fa-solid fa-file-pdf"></i>
                            <span>Generar PDF</span>
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

        // Establece la fecha actual en el campo de fecha
        window.onload = function() {
            const dateInput = document.getElementById('fecha');
            if (dateInput && !dateInput.value) {
                const today = new Date().toISOString().split('T')[0];
                dateInput.value = today;
            }
        };

        // Función para generar el PDF
        function generatePDF() {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            // Obtener datos del formulario
            const division = document.querySelector('input[name="division"]').value;
            const fecha = document.querySelector('input[name="fecha"]').value;
            const semestre = document.querySelector('input[name="semestre"]').value;
            const profesor = document.querySelector('#id_profesor_display option:checked').textContent.trim();
            const asignatura = document.querySelector('#id_materia_display option:checked').textContent.trim();
            const alumno = document.querySelector('input[name="alumno"]').value;
            const matricula = document.querySelector('input[name="matricula"]').value;
            const grupo = document.querySelector('input[name="grupo"]').value;
            const medio_asesoria = document.querySelector('textarea[name="medio_asesoria"]').value.trim();
            const descripcion = document.querySelector('textarea[name="descripcion"]').value.trim();

            let y = 10; // Espaciado vertical

            // Encabezado
            doc.setFontSize(12);
            doc.text("TECNOLÓGICO DE ESTUDIOS SUPERIORES DE IXTAPALUCA", 105, y, { align: "center" }); y += 7;
            doc.text("SOLICITUD DE ASESORÍA", 105, y, { align: "center" }); y += 7;
            doc.text("Código: SGI-FO-TU-05", 105, y, { align: "center" }); y += 7;
            doc.text("Autorizado: 10/07/2023", 105, y, { align: "center" }); y += 7;
            doc.text("Referencia a la Norma: ISO 9001:2015. 8.1, 8.5", 105, y, { align: "center" }); y += 10;

            // Información de la solicitud
            doc.setFontSize(10);
            doc.text(`DIVISIÓN ACADÉMICA: ${division}`, 10, y); y += 6;
            doc.text(`FECHA: ${fecha}    SEMESTRE: ${semestre}`, 10, y); y += 6;

            doc.text(`PROFESOR(A): ${profesor}    FIRMA: ____________________`, 10, y); y += 6;
            doc.text(`ASIGNATURA DE LA ASESORÍA: ${asignatura}`, 10, y); y += 6;

            doc.text(`ESTUDIANTE: ${alumno}    FIRMA: ____________________`, 10, y); y += 6;
            doc.text(`MATRÍCULA: ${matricula}    GRUPO: ${grupo}    MEDIO: ${medio_asesoria}`, 10, y); y += 10;

            // Descripción de temas
            doc.text("TEMAS PARA TRATAR Y DESCRIPCIÓN:", 10, y); y += 6;

            const splitDescripcion = doc.splitTextToSize(descripcion, 190);
            doc.text(splitDescripcion, 10, y);
            y += splitDescripcion.length * 6;

            y += 10;

            // Firmas finales
            doc.text("ELABORÓ: ____________", 10, y);
            doc.text("REVISÓ: ____________", 75, y);
            doc.text("AUTORIZÓ: ____________", 140, y);

            // Guardar PDF
            doc.save('Solicitud_Asesoria.pdf');
        }
    </script>

</body>
</html>
