<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>GESTIÓN DE ALUMNOS</title>

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

<body class="bg-cover bg-center min-h-screen flex flex-col bg-[url('{{ asset('multimedia/fondo.jpg') }}')]">

    <header class="w-full shadow-[0_12px_14px_rgba(0,0,0,0.25)] z-20 relative">
        
        <div class="bg-[#13934A] w-full h-24 flex items-center justify-between px-4 lg:justify-center relative">
            
            <div class="hidden md:flex lg:absolute lg:left-4 h-full items-center gap-4">
                <img src="{{ asset('multimedia/tesi.png') }}" alt="Logo TESI" class="h-16">
                <img src="{{ asset('multimedia/isclogo.png') }}" alt="Logo ISC" class="h-16">
            </div>

            <img src="{{ asset('multimedia/tesi.png') }}" alt="Logo TESI" class="md:hidden h-10">
            
            <h1 class="text-white font-montserrat font-bold text-[18px] md:text-[35px] tracking-wider text-right md:text-center leading-none flex-1 md:flex-none">
                SISTEMA DE TUTORIAS
            </h1>
        </div>

        <div class="bg-[#13934A] w-full h-12 flex items-center justify-center border-t border-white/20">
            <h2 class="text-white font-montserrat font-bold text-[16px] md:text-[24px] tracking-wide">
                PANEL DE ALUMNO
            </h2>
        </div>
    </header>

    <div class="w-11/12 max-w-7xl mx-auto py-8 flex flex-col items-center flex-grow">
        
        <div class="bg-[#044C26]/90 w-full rounded-xl shadow-2xl p-6 md:p-8 backdrop-blur-sm">

            <div class="flex flex-wrap justify-between items-center mb-6 border-b border-white/20 pb-4 gap-4">
                <a href="{{ route('admin.dashboard') }}" class="bg-white/20 hover:bg-white/30 text-white px-4 py-2 rounded-lg font-montserrat font-bold transition flex items-center gap-2 no-underline">
                    <i class="fa-solid fa-arrow-left"></i> Volver al Panel
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

            <div class="flex flex-wrap justify-between items-center mb-6">
                <h3 class="text-white font-montserrat font-bold text-2xl">Listado de Alumnos</h3>
                
                <button type="button" class="bg-[#A3E635] hover:bg-[#84cc16] text-[#044C26] font-bold py-2 px-6 rounded-lg shadow-lg transform hover:-translate-y-1 transition duration-200 flex items-center gap-2 border-none" 
                        data-bs-toggle="modal" data-bs-target="#registroModal">
                    <i class="fa-solid fa-circle-plus text-xl"></i>
                    Nuevo Alumno
                </button>
            </div>

            <div class="overflow-x-auto rounded-lg shadow-lg">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-[#0A8644] text-white font-montserrat uppercase text-sm">
                        <tr>
                            <th class="py-4 px-6">Matrícula</th>
                            <th class="py-4 px-6">Nombre</th>
                            <th class="py-4 px-6">Ap. Paterno</th>
                            <th class="py-4 px-6">Ap. Materno</th>
                            <th class="py-4 px-6">Grupo</th>
                            <th class="py-4 px-6">Carrera</th>
                            <th class="py-4 px-6 text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-white font-montserrat text-sm">
                        @foreach ($alumnos as $alumno)
                            <tr class="bg-white/10 hover:bg-white/20 border-b border-white/10 transition-colors">
                                <td class="py-3 px-6 font-bold">{{ $alumno->matricula }}</td>
                                <td class="py-3 px-6">{{ $alumno->nombre }}</td>
                                <td class="py-3 px-6">{{ $alumno->ap_paterno ?? '-' }}</td>
                                <td class="py-3 px-6">{{ $alumno->ap_materno ?? '-' }}</td>
                                <td class="py-3 px-6">
                                    <span class="bg-blue-600/80 text-white py-1 px-2 rounded text-xs font-bold">
                                        {{ $alumno->grupo->clave_grupo }}
                                    </span>
                                </td>
                                <td class="py-3 px-6">{{ $alumno->carrera->carrera }}</td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center gap-2">
                                        <a href="#" class="bg-yellow-500 hover:bg-yellow-600 text-white w-9 h-9 rounded-lg flex items-center justify-center transition shadow-md no-underline"
                                           data-bs-toggle="modal" data-bs-target="#editaModal"
                                           data-id="{{ $alumno->id_alumno }}"
                                           data-grupo="{{ $alumno->id_grupo }}"
                                           data-carrera="{{ $alumno->id_carrera }}"
                                           data-matricula="{{ $alumno->matricula }}"
                                           data-nombre="{{ $alumno->nombre }}"
                                           title="Editar">
                                            <i class="fa-solid fa-user-pen"></i>
                                        </a>
                                        <a href="#" class="bg-red-500 hover:bg-red-600 text-white w-9 h-9 rounded-lg flex items-center justify-center transition shadow-md no-underline"
                                           data-bs-toggle="modal" data-bs-target="#deleteModal"
                                           data-id="{{ $alumno->id_alumno }}"
                                           title="Eliminar">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
                @if ($alumnos->isEmpty())
                    <div class="p-8 text-center text-white font-montserrat border border-white/10 rounded-b-lg bg-white/5">
                        <i class="fa-solid fa-folder-open text-4xl mb-3 opacity-50"></i>
                        <p>No hay alumnos registrados en el sistema.</p>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/Admin/Alumno.js') }}?v=3000"></script>

    @include('admin.alumnos.registros')
    @include('admin.alumnos.edit')
    @include('admin.alumnos.delete')

</body>
</html>