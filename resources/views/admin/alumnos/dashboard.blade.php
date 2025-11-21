<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>ALUMNOS</title>
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
                    <a href="{{ route('admin.grupos.dashboard') }}" class="btn btn-primary">GRUPOS</a>
                </li>

                <li class="elemento-lista">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">LOGOUT
                        </button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>

    <div class="contenedor">
        <!-- Mensajes Flash -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Errores de Validación -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <strong>Error en el formulario:</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <h2 class="titulo">Alumnos</h2>

        <div class="boton-agregar">
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registroModal"><i
                    class="fa-solid fa-circle-plus"></i> Nuevo Alumno</a>
        </div>

        <table class="table table-striped-columns">
            <thead>
                <tr>
                    <th>Matricula</th>
                    <th>Nombre</th>
                    <th>Ap. Paterno</th>
                    <th>Ap. Materno</th>
                    <th>Grupo</th>
                    <th>Carrera</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($alumnos as $alumno)
                    <tr>
                        <td>{{ $alumno->matricula }}</td>
                        <td>{{ $alumno->nombre }}</td>
                        <td>{{ $alumno->ap_paterno ?? 'Sin Ap. Paterno' }}</td>
                        <td>{{ $alumno->ap_materno ?? 'Sin Ap. Materno' }}</td>
                        <td>{{ $alumno->grupo->clave_grupo }}</td>
                        <td>{{ $alumno->carrera->carrera }}</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editaModal" data-id="{{ $alumno->id_alumno }}"
                                data-grupo="{{ $alumno->id_grupo }}" data-carrera="{{ $alumno->id_carrera }}"
                                data-matricula="{{ $alumno->matricula }}"><i class="fa-solid fa-user-pen"></i>
                            </a>
                            <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal" data-id="{{ $alumno->id_alumno }}">
                                <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/Admin/Alumno.js') }}"></script>

    @include('admin.alumnos.registros')
    @include('admin.alumnos.edit')
    @include('admin.alumnos.delete')
</body>

</html>
