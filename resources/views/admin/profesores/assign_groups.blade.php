<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ASIGNAR PROFESORES A GRUPOS</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
        /* Estilos para Select2 */
        .select2-container--default .select2-selection--multiple {
            border-color: #d1d5db;
            border-radius: 0.5rem;
            min-height: 42px;
        }
        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border-color: #13934A;
            box-shadow: 0 0 0 2px rgba(19, 147, 74, 0.2);
        }
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
                ASIGNAR PROFESORES A GRUPOS
            </h2>
        </div>
    </header>

    <div class="w-11/12 max-w-7xl mx-auto py-8 flex flex-col items-center flex-grow">
        
        <div class="bg-[#044C26]/90 w-full rounded-xl shadow-2xl p-6 md:p-8 backdrop-blur-sm">

            <div class="flex flex-wrap justify-between items-center mb-6 border-b border-white/20 pb-4 gap-4">
                <a href="{{ route('admin.profesores.dashboard') }}" class="bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-lg font-montserrat font-bold transition flex items-center gap-2 no-underline">
                    <i class="fa-solid fa-arrow-left"></i> Volver a Profesores
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
                <h3 class="text-white font-montserrat font-bold text-lg sm:text-xl md:text-2xl">Buscar Grupos</h3>
            </div>

            <!-- Barra de Búsqueda -->
            <div class="mb-4 sm:mb-6 bg-white/10 rounded-lg p-3 sm:p-4 backdrop-blur-sm">
                <div class="flex flex-col sm:flex-row gap-3 sm:gap-4 items-stretch sm:items-end">
                    <div class="flex-[2] min-w-0">
                        <label for="searchInput" class="text-white font-montserrat font-medium text-xs sm:text-sm mb-1 sm:mb-2 block">
                            <i class="fa-solid fa-magnifying-glass"></i> Buscar por Clave o Carrera:
                        </label>
                        <input type="text" id="searchInput" placeholder="Escribe para buscar..." 
                               class="w-full px-3 sm:px-4 py-2 rounded-lg border border-gray-300 bg-white font-montserrat text-xs sm:text-sm focus:ring-2 focus:ring-[#13934A] focus:border-transparent outline-none">
                    </div>

                    <button type="button" id="clearSearch" class="bg-gray-500 hover:bg-gray-600 text-white px-3 sm:px-4 py-2 rounded-lg font-montserrat font-bold transition flex items-center justify-center gap-2 border-none text-xs sm:text-sm whitespace-nowrap">
                        <i class="fa-solid fa-xmark"></i> Limpiar
                    </button>
                </div>
            </div>

            <div class="flex flex-wrap justify-between items-center mb-4 sm:mb-6 gap-3">
                <h3 class="text-white font-montserrat font-bold text-lg sm:text-xl md:text-2xl">Listado de Grupos</h3>
            </div>

            <div class="overflow-x-auto rounded-lg shadow-lg">
                <table class="w-full text-left border-collapse" id="gruposTable">
                    <thead class="bg-[#0A8644] text-white font-montserrat uppercase text-xs sm:text-sm">
                        <tr>
                            <th class="py-3 px-3 sm:py-4 sm:px-6">ID</th>
                            <th class="py-3 px-3 sm:py-4 sm:px-6">Clave</th>
                            <th class="py-3 px-3 sm:py-4 sm:px-6">Carrera</th>
                            <th class="py-3 px-3 sm:py-4 sm:px-6">Tutor (Asignado)</th>
                            <th class="py-3 px-3 sm:py-4 sm:px-6 text-center">Profesores Adicionales</th>
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
                                <td class="py-2 px-3 sm:py-3 sm:px-6 font-medium text-yellow-300">
                                    {{ $grupo->profesor->nombre_completo ?? 'Sin Tutor' }}
                                </td>
                                <td class="py-2 px-3 sm:py-3 sm:px-6 text-center">
                                    <span class="badge {{ $grupo->profesores_count > 0 ? 'bg-green-500' : 'bg-red-500' }} text-white px-2 py-1 rounded-full text-xs">
                                        {{ $grupo->profesores_count }} / 5
                                    </span>
                                </td>
                                <td class="py-2 px-3 sm:py-3 sm:px-6 text-center">
                                    <button type="button" class="bg-yellow-500 hover:bg-yellow-600 text-white w-8 h-8 sm:w-9 sm:h-9 rounded-lg flex items-center justify-center transition shadow-md border-none text-xs sm:text-sm edit-assignments-btn"
                                            data-bs-toggle="modal" data-bs-target="#editAssignmentsModal"
                                            data-clave="{{ $grupo->clave_grupo }}"
                                            title="Asignar Profesores">
                                        <i class="fa-solid fa-user-plus"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                @if ($grupos->isEmpty())
                    <div class="p-8 text-center text-white font-montserrat border border-white/10 rounded-b-lg bg-white/5">
                        <i class="fa-solid fa-folder-open text-4xl mb-3 opacity-50"></i>
                        <p>No hay grupos registrados en el sistema.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @include('admin.profesores.edit_assignments')

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('js/Admin/ProfesorAssignment.js') }}?v=1000"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchInput');
            const clearButton = document.getElementById('clearSearch');
            const grupoRows = document.querySelectorAll('.grupo-row');

            function filterGrupos() {
                const searchTerm = searchInput.value.toLowerCase().trim();

                grupoRows.forEach(row => {
                    const clave = row.getAttribute('data-clave');
                    const carrera = row.getAttribute('data-carrera');
                    
                    if (clave.includes(searchTerm) || carrera.includes(searchTerm)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            searchInput.addEventListener('input', filterGrupos);
            
            clearButton.addEventListener('click', function() {
                searchInput.value = '';
                filterGrupos();
            });
        });
    </script>

</body>
</html>
