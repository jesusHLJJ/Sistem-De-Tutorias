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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

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
        <h2 class="text-white font-bold text-base md:text-2xl tracking-wide">ADMINISTRACIÓN PLAN DE ACCIÓN</h2>
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
            
            <!-- Plan de Acción (activo) -->
            <div class="text-hover-pink px-4 py-2.5 rounded-lg font-bold text-xs md:text-sm flex items-center gap-2 bg-hover-pink/10">
                <i class="fa-solid fa-clipboard-list text-base w-4"></i>
                <span>Plan de Acción</span>
            </div>
            
            <a href="{{ route('maestro.semestral.form', $grupo->id_grupo) }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-file-pen text-base w-4"></i>
                <span>Llenar Reporte</span>
            </a>
            
            <div class="border-t border-white/20 my-1"></div>
            
            <a href="{{ route('maestro.grupos') }}" 
               class="text-white no-underline px-4 py-2.5 rounded-lg transition-all duration-300 font-medium text-xs md:text-sm flex items-center gap-2 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-arrow-left text-base w-4"></i>
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

                <!-- Formulario de Modificación -->
                <form id="patModForm" action="{{ route('maestro.pat_modificar', $grupo->id_grupo) }}" method="POST" class="mb-8" novalidate>
                    @csrf

                    <!-- Vista Desktop (Tabla) -->
                    <div class="hidden md:block overflow-x-auto mb-6">
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
                                    <input type="number" name="cant_alumnos_hombres" value="{{ $pat->hombres }}" 
                                           class="bg-white/10 border border-white/30 rounded px-2 py-1 w-16 text-center focus:outline-none focus:ring-2 focus:ring-hover-pink">
                                </td>
                                <td class="border-2 border-white/30 p-3">
                                    <span class="font-semibold">F:</span> 
                                    <input type="number" name="cant_alumnos_mujeres" value="{{ $pat->mujeres }}" 
                                           class="bg-white/10 border border-white/30 rounded px-2 py-1 w-16 text-center focus:outline-none focus:ring-2 focus:ring-hover-pink">
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
                                    <textarea rows="3" name="problematica_identificada" required
                                              class="w-full bg-white/10 border border-white/30 rounded p-3 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-hover-pink">{{ $pat->ploblematica_identificada }}</textarea>
                                </td>
                            </tr>
                            <tr class="bg-tec-green">
                                <td colspan="7" class="border-2 border-white/30 p-3 text-center font-bold">OBJETIVOS</td>
                            </tr>
                            <tr>
                                <td colspan="7" class="border-2 border-white/30 p-3">
                                    <textarea rows="3" name="objetivos" required
                                              class="w-full bg-white/10 border border-white/30 rounded p-3 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-hover-pink">{{ $pat->objetivos }}</textarea>
                                </td>
                            </tr>
                            <tr class="bg-tec-green">
                                <td colspan="7" class="border-2 border-white/30 p-3 text-center font-bold">ACCIONES A IMPLEMENTAR</td>
                            </tr>
                            <tr>
                                <td colspan="7" class="border-2 border-white/30 p-3">
                                    <textarea rows="3" name="acciones_a_implementar" required
                                              class="w-full bg-white/10 border border-white/30 rounded p-3 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-hover-pink">{{ $pat->acciones_implementar }}</textarea>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <!-- Vista Móvil (Cards) -->
                    <div class="md:hidden space-y-4 mb-6">
                        <!-- Reutilizar estructura de cards de pat.blade.php pero con valores -->
                        <!-- Datos Generales -->
                        <div class="bg-white/10 rounded-lg border border-white/30 overflow-hidden">
                            <div class="bg-tec-green p-3 text-center font-bold text-white">DATOS GENERALES</div>
                            <div class="p-4 space-y-3 text-white">
                                <!-- ... Campos similares a pat.blade.php ... -->
                                <div class="grid grid-cols-3 gap-3">
                                    <div>
                                        <label class="block text-white/70 text-xs font-semibold mb-1">M:</label>
                                        <input type="number" name="cant_alumnos_hombres" value="{{ $pat->hombres }}" 
                                               class="w-full bg-white/10 border border-white/30 rounded px-2 py-2 text-center text-white focus:outline-none focus:ring-2 focus:ring-hover-pink">
                                    </div>
                                    <div>
                                        <label class="block text-white/70 text-xs font-semibold mb-1">F:</label>
                                        <input type="number" name="cant_alumnos_mujeres" value="{{ $pat->mujeres }}" 
                                               class="w-full bg-white/10 border border-white/30 rounded px-2 py-2 text-center text-white focus:outline-none focus:ring-2 focus:ring-hover-pink">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Textareas móviles -->
                        <div class="bg-white/10 rounded-lg border border-white/30 p-4">
                            <label class="block text-white font-bold mb-2">PROBLEMÁTICA IDENTIFICADA</label>
                            <textarea rows="4" name="problematica_identificada" required class="w-full bg-white/10 border border-white/30 rounded p-3 text-white">{{ $pat->ploblematica_identificada }}</textarea>
                        </div>
                        <div class="bg-white/10 rounded-lg border border-white/30 p-4">
                            <label class="block text-white font-bold mb-2">OBJETIVOS</label>
                            <textarea rows="4" name="objetivos" required class="w-full bg-white/10 border border-white/30 rounded p-3 text-white">{{ $pat->objetivos }}</textarea>
                        </div>
                        <div class="bg-white/10 rounded-lg border border-white/30 p-4">
                            <label class="block text-white font-bold mb-2">ACCIONES A IMPLEMENTAR</label>
                            <textarea rows="4" name="acciones_a_implementar" required class="w-full bg-white/10 border border-white/30 rounded p-3 text-white">{{ $pat->acciones_implementar }}</textarea>
                        </div>
                    </div>

                    <div class="flex justify-center no-pdf">
                        <button type="submit" class="bg-tec-green hover:bg-tec-green/80 text-white font-bold py-2 px-6 rounded-lg shadow-lg transition-transform hover:scale-105">
                            MODIFICAR INFORMACIÓN
                        </button>
                    </div>
                </form>

                <script>
                    document.getElementById('patModForm').addEventListener('submit', function(e) {
                        e.preventDefault();
                        const inputs = this.querySelectorAll('input, select, textarea');
                        
                        // Validar campos visibles
                        let isValid = true;
                        inputs.forEach(input => {
                            if (input.offsetParent !== null && input.hasAttribute('required') && !input.value.trim()) {
                                isValid = false;
                                input.classList.add('border-red-500');
                            } else {
                                input.classList.remove('border-red-500');
                            }
                        });

                        if (!isValid) {
                            alert('Por favor complete todos los campos requeridos.');
                            return;
                        }

                        // Deshabilitar ocultos
                        inputs.forEach(input => {
                            if (input.offsetParent === null && input.name !== '_token') {
                                input.disabled = true;
                            }
                        });
                        
                        this.submit();
                    });
                </script>

                <!-- Sección de Actividades -->
                <div class="border-t border-white/30 pt-6 mb-8">
                    <h3 class="text-white text-xl font-bold mb-4 text-center">ACTIVIDADES</h3>
                    
                    <!-- Formulario para agregar actividad -->
                    <form action="{{ route('maestro.pat_agregar_actividad', ['grupo' => $grupo->id_grupo, 'pat' => $pat->id_plan_accion]) }}" method="POST" class="bg-white/10 rounded-lg p-4 mb-6 no-pdf">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 items-end">
                            <div>
                                <label class="block text-white text-sm font-bold mb-2">NOMBRE DE LA ACTIVIDAD</label>
                                <input type="text" name="nombre_actividad" required class="w-full bg-white/20 border border-white/30 rounded p-2 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-hover-pink">
                            </div>
                            <div>
                                <label class="block text-white text-sm font-bold mb-2">FECHA DE ENTREGA</label>
                                <input type="date" name="fecha_actividad" required class="w-full bg-white/20 border border-white/30 rounded p-2 text-white focus:outline-none focus:ring-2 focus:ring-hover-pink">
                            </div>
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition-colors h-10">
                                <i class="fa-solid fa-plus mr-2"></i>AGREGAR ACTIVIDAD
                            </button>
                        </div>
                    </form>

                    <!-- Tabla de Actividades -->
                    <div class="overflow-x-auto">
                        <table class="w-full text-white border-collapse border border-white/30">
                            <thead>
                                <tr class="bg-tec-green text-white">
                                    <th class="p-3 border border-white/30">#</th>
                                    <th class="p-3 border border-white/30 w-1/2">NOMBRE DE ACTIVIDAD</th>
                                    <th class="p-3 border border-white/30">FECHA DE REALIZACIÓN</th>
                                    <th class="p-3 border border-white/30 no-pdf">ACCIÓN</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($actividades as $index => $actividad)
                                    <tr class="hover:bg-white/5">
                                        <td class="p-3 border border-white/30 text-center">{{ $index + 1 }}</td>
                                        <td class="p-3 border border-white/30">{{ $actividad->actividad }}</td>
                                        <td class="p-3 border border-white/30 text-center">{{ \Carbon\Carbon::parse($actividad->fecha)->format('d/m/Y') }}</td>
                                        <td class="p-3 border border-white/30 text-center no-pdf">
                                            <form action="{{ route('maestro.pat_borrar_actividad', $actividad->id_actividad) }}" method="POST" onsubmit="return confirm('¿ESTAS SEGURO DE ELIMINAR ESTA ACTIVIDAD?');">
                                                @csrf
                                                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-3 rounded transition-colors text-sm">
                                                    ELIMINAR
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="p-4 text-center border border-white/30">No hay actividades registradas.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Actividad Final -->
                <div class="border-t border-white/30 pt-6">
                    <h3 class="text-white text-xl font-bold mb-4 text-center">ACTIVIDAD FINAL</h3>
                    
                    <div class="bg-white/10 rounded-lg p-4 mb-4 text-center text-white border border-white/30">
                        @if (isset($pat->evaluacion_final))
                            <p class="font-bold text-lg">{{ $pat->evaluacion_final }}</p>
                        @else
                            <p class="italic opacity-70">NO HAY EVALUACIÓN FINAL REGISTRADA</p>
                        @endif
                    </div>

                    <h3 class="text-white text-lg font-bold mb-2 no-pdf">AGREGAR/MODIFICAR ACTIVIDAD FINAL</h3>
                    <form action="{{ route('maestro.pat_agregar_act_final', $pat->id_plan_accion) }}" method="post" class="flex flex-col md:flex-row gap-4 no-pdf items-end">
                        @csrf
                        <div class="flex-1 w-full">
                            <label class="block text-white text-sm font-bold mb-2">NOMBRE DE LA ACTIVIDAD</label>
                            <input type="text" name="nom_act_final" required placeholder="Nombre de la actividad final" 
                                   class="w-full bg-white/20 border border-white/30 rounded p-2 text-white placeholder-white/50 focus:outline-none focus:ring-2 focus:ring-hover-pink">
                        </div>
                        <button type="submit" class="bg-purple-600 hover:bg-purple-700 text-white font-bold py-2 px-6 rounded transition-colors h-10 whitespace-nowrap">
                            AGREGAR/MODIFICAR ACTIVIDAD FINAL
                        </button>
                    </form>
                </div>

                <!-- Botones de Acción -->
                <div class="mt-8 flex justify-end items-center no-pdf">
                    <button onclick="generarPDF()" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 px-8 rounded-lg shadow-lg transition-transform hover:scale-105 flex items-center gap-2">
                        Descargar como PDF
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- Scripts -->
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

        async function generarPDF() {
            const { jsPDF } = window.jspdf;
            
            // Ocultar elementos no deseados (usando la clase no-pdf)
            const noPdfElements = document.querySelectorAll('.no-pdf');
            noPdfElements.forEach(el => el.style.display = 'none');
            
            // Capturar el body completo como en el código original
            const element = document.body; 

            await html2canvas(element, {
                scale: 2,
                useCORS: true,
                // backgroundColor: '#044C26' // Opcional: si se necesita forzar fondo
            }).then(canvas => {
                const imgData = canvas.toDataURL('image/png');
                
                // Dimensiones carta en mm [215.9, 279.4]
                const pdf = new jsPDF('p', 'mm', [215.9, 279.4]);
                
                const imgProps = pdf.getImageProperties(imgData);
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;
                
                pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
                pdf.save("plan_accion_tutorial_{{ $grupo->clave_grupo }}.pdf");
            });

            // Restaurar elementos
            noPdfElements.forEach(el => el.style.display = '');
        }
    </script>

</body>
</html>
