<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GESTIÓN DE PROFESORES</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        montserrat: ['Montserrat', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        .btn { display: inline-flex; align-items: center; justify-content: center; }
        body { margin: 0; }
        a { text-decoration: none; }
        .modal-backdrop { 
            background-color: rgba(0, 0, 0, 0.5) !important; 
            width: 125% !important; 
            height: 125% !important; 
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            z-index: 1040 !important;
        }
        .modal-content { overflow: hidden; }
    </style>
</head>

<body class="bg-cover bg-center min-h-screen md:min-h-[125vh] flex flex-col bg-[url('{{ asset('multimedia/fondo.jpg') }}')] md:[zoom:80%]">

    <header class="w-full z-20 relative">
        
        <div class="bg-[#13934A] w-full h-24 flex items-center justify-between px-4 lg:justify-center relative shadow-[0_12px_14px_rgba(0,0,0,0.25)]" style="box-shadow: 0 12px 14px rgba(0,0,0,0.25);">
            
            <div class="hidden md:flex lg:absolute lg:left-4 h-full items-center gap-4">
                <img src="{{ asset('multimedia/tesi.png') }}" alt="Logo TESI" class="h-16">
                <img src="{{ asset('multimedia/isclogo.png') }}" alt="Logo ISC" class="h-16">
            </div>

            <img src="{{ asset('multimedia/tesi.png') }}" alt="Logo TESI" class="md:hidden h-10">
            
            <h1 class="text-white font-montserrat font-bold text-[18px] md:text-[35px] tracking-wider text-right md:text-center leading-none flex-1 md:flex-none">
                SISTEMA DE TUTORIAS
            </h1>
        </div>

        <div class="bg-[#13934A] w-full h-12 flex items-center justify-center border-t border-white/20 shadow-[0_12px_14px_rgba(0,0,0,0.25)]" style="box-shadow: 0 12px 14px rgba(0,0,0,0.25);">
            <h2 class="text-white font-montserrat font-bold text-[16px] md:text-[24px] tracking-wide">
                PANEL DE PROFESORES
            </h2>
        </div>
    </header>

    <div class="w-11/12 max-w-7xl mx-auto py-8 flex flex-col items-center flex-grow">
        
        <div class="bg-[#044C26]/90 w-full rounded-xl shadow-2xl p-6 md:p-8 backdrop-blur-sm">

            <div class="flex flex-wrap justify-between items-center mb-6 border-b border-white/20 pb-4 gap-4">
                <a href="{{ route('admin.dashboard') }}" class="bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-lg font-montserrat font-bold transition flex items-center gap-2 no-underline">
                    <i class="fa-solid fa-arrow-left"></i> Volver al Inicio
                </a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg font-montserrat font-bold transition flex items-center gap-2 shadow-lg border-none">
                        <i class="fa-solid fa-right-from-bracket"></i> Salir
                    </button>
                </form>
            </div>

            @if (session('success'))
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded shadow-md flex justify-between items-center font-montserrat">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-check-circle"></i> {{ session('success') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded shadow-md flex justify-between items-center font-montserrat">
                    <div class="flex items-center gap-2">
                        <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="mb-3 sm:mb-4">
                <h3 class="text-white font-montserrat font-bold text-lg sm:text-xl md:text-2xl">Buscar Profesores</h3>
            </div>

            <!-- Barra de Búsqueda con Filtros -->
            <div class="mb-4 sm:mb-6 bg-white/10 rounded-lg p-3 sm:p-4 backdrop-blur-sm">
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 items-stretch sm:items-end">
                    <!-- Selector de Filtro -->
                    <div class="flex-1 min-w-0">
                        <label for="searchFilter" class="text-white font-montserrat font-medium text-xs sm:text-sm mb-1 sm:mb-2 block">
                            <i class="fa-solid fa-filter"></i> Buscar por:
                        </label>
                        <select id="searchFilter" class="w-full px-3 sm:px-4 py-2 rounded-lg border border-gray-300 bg-white font-montserrat text-xs sm:text-sm focus:ring-2 focus:ring-[#13934A] focus:border-transparent outline-none">
                            <option value="nombre">Nombre</option>
                            <option value="clave">Clave</option>
                            <option value="carrera">Carrera</option>
                        </select>
                    </div>

                    <!-- Campo de Búsqueda -->
                    <div class="flex-[2] min-w-0">
                        <label for="searchInput" class="text-white font-montserrat font-medium text-xs sm:text-sm mb-1 sm:mb-2 block">
                            <i class="fa-solid fa-magnifying-glass"></i> Término de búsqueda:
                        </label>
                        <input type="text" id="searchInput" placeholder="Escribe para buscar..." 
                               class="w-full px-3 sm:px-4 py-2 rounded-lg border border-gray-300 bg-white font-montserrat text-xs sm:text-sm focus:ring-2 focus:ring-[#13934A] focus:border-transparent outline-none">
                    </div>

                    <!-- Botón Limpiar -->
                    <button type="button" id="clearSearch" class="bg-gray-500 hover:bg-gray-600 text-white px-3 sm:px-4 py-2 rounded-lg font-montserrat font-bold transition flex items-center justify-center gap-2 border-none text-xs sm:text-sm whitespace-nowrap">
                        <i class="fa-solid fa-xmark"></i> <span class="hidden sm:inline">Limpiar</span><span class="sm:hidden">Limpiar</span>
                    </button>
                </div>

                <!-- Contador de resultados -->
                <div class="mt-2 sm:mt-3 text-white font-montserrat text-xs sm:text-sm">
                    <span id="resultCount">Mostrando <strong>{{ count($profesores) }}</strong> de <strong>{{ count($profesores) }}</strong> profesores</span>
                </div>
            </div>

            <div class="flex flex-wrap justify-between items-center mb-4 sm:mb-6 gap-3">
                <h3 class="text-white font-montserrat font-bold text-lg sm:text-xl md:text-2xl">Listado de Profesores</h3>
                
                <div class="flex gap-2">
                    <a href="{{ route('admin.profesores.assign_groups') }}" class="bg-[#13934A] hover:bg-[#0e6b35] text-white font-bold py-2 px-4 sm:px-6 rounded-lg shadow-lg transform hover:-translate-y-1 transition duration-200 flex items-center gap-2 no-underline text-sm sm:text-base">
                        <i class="fa-solid fa-users-gear text-lg sm:text-xl"></i>
                        <span class="hidden xs:inline">Asignar a Grupos</span><span class="xs:hidden">Asignar</span>
                    </a>
                    <button type="button" class="bg-[#A3E635] hover:bg-[#84cc16] text-[#044C26] font-bold py-2 px-4 sm:px-6 rounded-lg shadow-lg transform hover:-translate-y-1 transition duration-200 flex items-center gap-2 border-none text-sm sm:text-base" 
                            data-bs-toggle="modal" data-bs-target="#registroModal">
                        <i class="fa-solid fa-circle-plus text-lg sm:text-xl"></i>
                        <span class="hidden xs:inline">Nuevo Registro</span><span class="xs:hidden">Nuevo</span>
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto rounded-lg shadow-lg">
                <table class="w-full text-left border-collapse" id="profesoresTable">
                    <thead class="bg-[#0A8644] text-white font-montserrat uppercase text-xs sm:text-sm">
                        <tr>
                            <th class="py-3 px-3 sm:py-4 sm:px-6">ID</th>
                            <th class="py-3 px-3 sm:py-4 sm:px-6">Carrera</th>
                            <th class="py-3 px-3 sm:py-4 sm:px-6">Clave</th>
                            <th class="py-3 px-3 sm:py-4 sm:px-6">Nombre</th>
                            <th class="py-3 px-3 sm:py-4 sm:px-6">Ap. Paterno</th>
                            <th class="py-3 px-3 sm:py-4 sm:px-6">Ap. Materno</th>
                            <th class="py-3 px-3 sm:py-4 sm:px-6 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-white font-montserrat text-xs sm:text-sm">
                        @foreach ($profesores as $profesor)
                            <tr class="bg-white/10 hover:bg-white/20 border-b border-white/10 transition-colors profesor-row" 
                                data-nombre="{{ strtolower($profesor->nombre . ' ' . ($profesor->ap_paterno ?? '') . ' ' . ($profesor->ap_materno ?? '')) }}"
                                data-clave="{{ strtolower($profesor->clave) }}"
                                data-carrera="{{ strtolower($profesor->carrera->carrera ?? '') }}">
                                <td class="py-2 px-3 sm:py-3 sm:px-6 font-bold">{{ $profesor->id_profesor }}</td>
                                <td class="py-2 px-3 sm:py-3 sm:px-6">{{ $profesor->carrera->carrera ?? 'Sin Carrera' }}</td>
                                <td class="py-2 px-3 sm:py-3 sm:px-6">
                                    <span class="bg-blue-600/80 text-white py-1 px-2 rounded text-xs font-bold">
                                        {{ $profesor->clave }}
                                    </span>
                                </td>
                                <td class="py-2 px-3 sm:py-3 sm:px-6">{{ $profesor->nombre }}</td>
                                <td class="py-2 px-3 sm:py-3 sm:px-6">{{ $profesor->ap_paterno ?? '-' }}</td>
                                <td class="py-2 px-3 sm:py-3 sm:px-6">{{ $profesor->ap_materno ?? '-' }}</td>
                                <td class="py-2 px-3 sm:py-3 sm:px-6 text-center">
                                    <div class="flex item-center justify-center gap-1 sm:gap-2">
                                        <a href="#" class="bg-yellow-500 hover:bg-yellow-600 text-white w-8 h-8 sm:w-9 sm:h-9 rounded-lg flex items-center justify-center transition shadow-md no-underline text-xs sm:text-sm"
                                           data-bs-toggle="modal" data-bs-target="#editaModal"
                                           data-id="{{ $profesor->id_profesor }}"
                                           data-clave="{{ $profesor->clave }}"
                                           data-carrera="{{ $profesor->id_carrera }}"
                                           data-nombre="{{ $profesor->nombre }}"
                                           data-ap_paterno="{{ $profesor->ap_paterno }}"
                                           data-ap_materno="{{ $profesor->ap_materno }}"
                                           data-email="{{ $profesor->user->email }}"
                                           title="Editar">
                                            <i class="fa-solid fa-user-pen"></i>
                                        </a>
                                        <a href="#" class="bg-red-500 hover:bg-red-600 text-white w-8 h-8 sm:w-9 sm:h-9 rounded-lg flex items-center justify-center transition shadow-md no-underline text-xs sm:text-sm"
                                           data-bs-toggle="modal" data-bs-target="#deleteModal"
                                           data-id="{{ $profesor->id_profesor }}"
                                           title="Eliminar">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                @if ($profesores->isEmpty())
                    <div class="p-8 text-center text-white font-montserrat border border-white/10 rounded-b-lg bg-white/5">
                        <i class="fa-solid fa-folder-open text-4xl mb-3 opacity-50"></i>
                        <p>No hay profesores registrados en el sistema.</p>
                    </div>
                @endif

                <!-- Mensaje cuando no hay resultados de búsqueda -->
                <div id="noResults" class="p-8 text-center text-white font-montserrat border border-white/10 rounded-b-lg bg-white/5 hidden">
                    <i class="fa-solid fa-magnifying-glass text-4xl mb-3 opacity-50"></i>
                    <p>No se encontraron profesores que coincidan con tu búsqueda.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/Admin/Profesor.js') }}?v=3000"></script>

    <!-- Script de búsqueda -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const searchFilter = document.getElementById('searchFilter');
            const clearButton = document.getElementById('clearSearch');
            const profesorRows = document.querySelectorAll('.profesor-row');
            const resultCount = document.getElementById('resultCount');
            const noResults = document.getElementById('noResults');
            const totalProfesores = profesorRows.length;

            function filterProfesores() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                const filterType = searchFilter.value;
                let visibleCount = 0;

                profesorRows.forEach(row => {
                    const searchValue = row.getAttribute(`data-${filterType}`);
                    
                    if (searchValue.includes(searchTerm)) {
                        row.style.display = '';
                        visibleCount++;
                    } else {
                        row.style.display = 'none';
                    }
                });

                // Actualizar contador
                resultCount.innerHTML = `Mostrando <strong>${visibleCount}</strong> de <strong>${totalProfesores}</strong> profesores`;

                // Mostrar mensaje si no hay resultados
                if (visibleCount === 0 && searchTerm !== '') {
                    noResults.classList.remove('hidden');
                } else {
                    noResults.classList.add('hidden');
                }
            }

            // Event listeners
            searchInput.addEventListener('input', filterProfesores);
            searchFilter.addEventListener('change', filterProfesores);
            
            clearButton.addEventListener('click', function() {
                searchInput.value = '';
                searchFilter.value = 'nombre';
                filterProfesores();
            });
        });
    </script>

    @include('admin.profesores.registros')
    @include('admin.profesores.edit')
    @include('admin.profesores.delete')

</body>
</html>
