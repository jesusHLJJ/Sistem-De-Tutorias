<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>PROFESORES</title>
</head>

<body>

    <body>
        <div class="nav">
            <nav class="nevegacion">
                <ul class="lista">
                    <li class="elemento-lista">
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">INICIO</a>
                    </li>

                    <li class="elemento-lista">
                        <a href="{{ route('admin.grupos.dashboard') }}" class="btn btn-primary">GRUPOS</a>
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
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <h2 class="titulo">Profesores</h2>

            <div class="boton-agregar">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registroModal">
                    <i class="fa-solid fa-circle-plus"></i> Nuevo Registro
                </a>
            </div>

            <table class="table table-striped-columns">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Carrera</th>
                        <th>Clave</th>
                        <th>Nombre</th>
                        <th>Ap. Paterno</th>
                        <th>Ap. Materno</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($profesores as $profesor)
                        <tr>
                            <td>{{ $profesor->id_profesor }}</td>
                            <td>{{ $profesor->carrera->carrera ?? 'Sin carrera' }}</td>
                            <td>{{ $profesor->clave }}</td>
                            <td>{{ $profesor->nombre }}</td>
                            <td>{{ $profesor->ap_paterno }}</td>
                            <td>{{ $profesor->ap_materno }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                    data-bs-target="#editaModal" data-id="{{ $profesor->id_profesor }}"
                                    data-carrera="{{ $profesor->id_carrera }}" data-clave="{{ $profesor->clave }}"
                                    data-nombre="{{ $profesor->nombre }}"
                                    data-ap_paterno="{{ $profesor->ap_paterno }}"
                                    data-ap_materno="{{ $profesor->ap_materno }}"
                                    data-email="{{ $profesor->user->email }}">
                                    <i class="fa-solid fa-user-pen"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal" data-id="{{ $profesor->id_profesor }}">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/Admin/Profesor.js') }}"></script>
        @include('admin.profesores.registros')
        @include('admin.profesores.edit')
        @include('admin.profesores.delete')
    </body>
</body>

</html>
