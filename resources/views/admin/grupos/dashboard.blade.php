<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GESTIÓN DE GRUPOS</title>

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
                PANEL DE GRUPOS
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

            @if ($errors->any())
                <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-4 rounded shadow-md font-montserrat">
                    <strong><i class="fas fa-exclamation-triangle"></i> Revise los siguientes errores:</strong>
                    <ul class="mt-2 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close float-right" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="mb-3 sm:mb-4">
                <h3 class="text-white font-montserrat font-bold text-lg sm:text-xl md:text-2xl">Buscar Grupos</h3>
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
                    <span id="resultCount">Mostrando <strong>{{ count($grupos) }}</strong> de <strong>{{ count($grupos) }}</strong> grupos</span>
                </div>
            </div>

            <div class="flex flex-wrap justify-between items-center mb-4 sm:mb-6 gap-3">
                <h3 class="text-white font-montserrat font-bold text-lg sm:text-xl md:text-2xl">Listado de Grupos</h3>
                
                <div class="flex flex-wrap gap-2 sm:gap-3">
                    <button type="button" class="bg-[#3B82F6] hover:bg-[#2563EB] text-white font-bold py-2 px-3 sm:px-4 md:px-6 rounded-lg shadow-lg transform hover:-translate-y-1 transition duration-200 flex items-center gap-2 border-none text-xs sm:text-sm md:text-base" 
                            data-bs-toggle="modal" data-bs-target="#registroSalonModal">
                        <i class="fa-solid fa-door-open text-base sm:text-lg md:text-xl"></i>
                        <span class="hidden sm:inline">Registrar Salón</span><span class="sm:hidden">Salón</span>
                    </button>
                    
                    <button type="button" class="bg-[#A3E635] hover:bg-[#84cc16] text-[#044C26] font-bold py-2 px-3 sm:px-4 md:px-6 rounded-lg shadow-lg transform hover:-translate-y-1 transition duration-200 flex items-center gap-2 border-none text-xs sm:text-sm md:text-base" 
                            data-bs-toggle="modal" data-bs-target="#registroModal">
                        <i class="fa-solid fa-circle-plus text-base sm:text-lg md:text-xl"></i>
                        <span class="hidden sm:inline">Nuevo Grupo</span><span class="sm:hidden">Nuevo</span>
                    </button>
                </div>
            </div>

            <div class="overflow-x-auto rounded-lg shadow-lg">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-[#0A8644] text-white font-montserrat uppercase text-xs sm:text-sm">
                        <tr>
                            <th class="py-3 px-3 sm:py-4 sm:px-6">ID</th>
                            <th class="py-3 px-3 sm:py-4 sm:px-6">Clave</th>
                            <th class="py-3 px-3 sm:py-4 sm:px-6">Carrera</th>
                            <th class="py-3 px-3 sm:py-4 sm:px-6">Profesor</th>
                            <th class="py-3 px-3 sm:py-4 sm:px-6">Periodo</th>
                            <th class="py-3 px-3 sm:py-4 sm:px-6">Salón</th>
                            <th class="py-3 px-3 sm:py-4 sm:px-6 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-white font-montserrat text-xs sm:text-sm">
                        @foreach ($grupos as $grupo)
                            <tr class="bg-white/10 hover:bg-white/20 border-b border-white/10 transition-colors grupo-row"
                                data-clave="{{ strtolower($grupo->clave_grupo) }}"
                                data-carrera="{{ strtolower($grupo->carrera->carrera ?? '') }}">
                                <td class="py-2 px-3 sm:py-3 sm:px-6 font-bold">{{ $grupo->id_grupo }}</td>
                                <td class="py-2 px-3 sm:py-3 sm:px-6">
                                    <span class="bg-blue-600/80 text-white py-1 px-2 rounded text-xs font-bold">
                                        {{ $grupo->clave_grupo }}
                                    </span>
                                </td>
                                <td class="py-2 px-3 sm:py-3 sm:px-6">{{ $grupo->carrera->carrera ?? 'Sin Carrera' }}</td>
                                <td class="py-2 px-3 sm:py-3 sm:px-6">{{ $grupo->profesor->nombre_completo ?? 'Sin Profesor' }}</td>
                                <td class="py-2 px-3 sm:py-3 sm:px-6">{{ $grupo->periodo->periodo ?? 'Sin Periodo' }}</td>
                                <td class="py-2 px-3 sm:py-3 sm:px-6">{{ $grupo->salon->clave_salon ?? 'S/A' }}</td>
                                
                                <td class="py-2 px-3 sm:py-3 sm:px-6 text-center">
                                    <div class="flex item-center justify-center gap-1 sm:gap-2">
                                        <a href="#" class="bg-yellow-500 hover:bg-yellow-600 text-white w-8 h-8 sm:w-9 sm:h-9 rounded-lg flex items-center justify-center transition shadow-md no-underline text-xs sm:text-sm"
                                           data-bs-toggle="modal" 
                                           data-bs-target="#editaModal" 
                                           data-id="{{ $grupo->id_grupo }}"
                                           data-clave_grupo="{{ $grupo->clave_grupo }}" 
                                           data-carrera="{{ $grupo->id_carrera }}"
                                           data-profesor="{{ $grupo->id_profesor }}"
                                           data-periodo="{{ $grupo->periodo->periodo ?? '' }}" 
                                           data-salon="{{ $grupo->id_salon }}"
                                           data-semestre="{{ $grupo->id_semestre }}" 
                                           data-turno="{{ $grupo->id_turno }}"
                                           title="Editar">
                                            <i class="fa-solid fa-user-pen"></i>
                                        </a>

                                        <a href="#" class="bg-red-500 hover:bg-red-600 text-white w-8 h-8 sm:w-9 sm:h-9 rounded-lg flex items-center justify-center transition shadow-md no-underline text-xs sm:text-sm"
                                           data-bs-toggle="modal" 
                                           data-bs-target="#deleteModal" 
                                           data-id="{{ $grupo->id_grupo }}"
                                           title="Eliminar">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                @if ($grupos->isEmpty())
                    <div class="p-8 text-center text-white font-montserrat border border-white/10 rounded-b-lg bg-white/5">
                        <i class="fa-solid fa-users-slash text-4xl mb-3 opacity-50"></i>
                        <p>No hay grupos registrados.</p>
                    </div>
                @endif

                <!-- Mensaje cuando no hay resultados de búsqueda -->
                <div id="noResults" class="p-8 text-center text-white font-montserrat border border-white/10 rounded-b-lg bg-white/5 hidden">
                    <i class="fa-solid fa-magnifying-glass text-4xl mb-3 opacity-50"></i>
                    <p>No se encontraron grupos que coincidan con tu búsqueda.</p>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/Admin/Grupo.js') }}"></script>
    <script src="{{ asset('js/Admin/Salon.js') }}"></script>

    <!-- Script de búsqueda -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const searchFilter = document.getElementById('searchFilter');
            const clearButton = document.getElementById('clearSearch');
            const grupoRows = document.querySelectorAll('.grupo-row');
            const resultCount = document.getElementById('resultCount');
            const noResults = document.getElementById('noResults');
            const totalGrupos = grupoRows.length;

            function filterGrupos() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                const filterType = searchFilter.value;
                let visibleCount = 0;

                grupoRows.forEach(row => {
                    const searchValue = row.getAttribute(`data-${filterType}`);
                    
                    if (searchValue.includes(searchTerm)) {
                        row.style.display = '';
                        visibleCount++;
                    } else {
                        row.style.display = 'none';
                    }
                });

                // Actualizar contador
                resultCount.innerHTML = `Mostrando <strong>${visibleCount}</strong> de <strong>${totalGrupos}</strong> grupos`;

                // Mostrar mensaje si no hay resultados
                if (visibleCount === 0 && searchTerm !== '') {
                    noResults.classList.remove('hidden');
                } else {
                    noResults.classList.add('hidden');
                }
            }

            // Event listeners
            searchInput.addEventListener('input', filterGrupos);
            searchFilter.addEventListener('change', filterGrupos);
            
            clearButton.addEventListener('click', function() {
                searchInput.value = '';
                searchFilter.value = 'clave';
                filterGrupos();
            });
        });
    </script>

    @include('admin.grupos.registros')
    @include('admin.grupos.edit')
    @include('admin.grupos.delete')
    
    @include('admin.grupos.registros_salon')
    @include('admin.grupos.edit_salon')
    @include('admin.grupos.delete_salon')

</body>
</html>