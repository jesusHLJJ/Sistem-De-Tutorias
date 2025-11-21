<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>GRUPOS</title>
</head>

<body>
    <div class="nav">
        <nav class="nevegacion">
            <ul class="lista">
                <li class="elemento-lista">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">INICIO</a>
                </li>

                <li class="elemento-lista">
                    <a href="{{ route('admin.profesores.dashboard') }}" class="btn btn-primary">PROFESORES</a>
                </li>

                <li class="elemento-lista">
                    <a href="{{ route('admin.alumnos.dashboard') }}" class="btn btn-primary">ALUMNOS</a>
                </li>

                <li class="elemento-lista">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Cerrar Sesión
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>

    <div class="contenedor">
        <!-- Mensajes de éxito/error -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Mostrar errores de validación -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h2 class="titulo">Grupos</h2>

        <div class="boton-agregar">
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registroModal"><i
                    class="fa-solid fa-circle-plus"></i> Nuevo Grupo</a>
        </div>

        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Clave de Grupo</th>
                    <th>Carrera</th>
                    <th>Profesor</th>
                    <th>Periodo</th>
                    <th>Salon</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($grupos as $grupo)
                    <tr>
                        <td>{{ $grupo->id_grupo }}</td>
                        <td>{{ $grupo->clave_grupo }}</td>
                        <td>{{ $grupo->carrera->carrera ?? 'Sin Carrera' }}</td>
                        <td>{{ $grupo->profesor->nombre_completo ?? 'Sin Profesor' }}</td>
                        <td>{{ $grupo->periodo->periodo ?? 'Sin Periodo' }}</td>
                        <td>{{ $grupo->salon->clave_salon }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editaModal" data-id="{{ $grupo->id_grupo }}"
                                data-clave_grupo="{{ $grupo->clave_grupo }}" data-carrera="{{ $grupo->id_carrera }}"
                                data-profesor="{{ $grupo->id_profesor }}"
                                data-periodo="{{ $grupo->periodo->periodo }}" data-salon="{{ $grupo->id_salon }}"
                                data-semestre="{{ $grupo->id_semestre }}" data-turno="{{ $grupo->id_turno }}">
                                <i class="fa-solid fa-user-pen"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" data-id="{{ $grupo->id_grupo }}">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/Admin/Grupo.js') }}"></script>

    @include('admin.grupos.registros')
    @include('admin.grupos.edit')
    @include('admin.grupos.delete')
</body>

</html>
