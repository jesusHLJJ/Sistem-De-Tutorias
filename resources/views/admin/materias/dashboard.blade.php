<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.bootstrap5.min.css') }}">
    <title>MATERIAS</title>
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

    <h2 class="titulo">MATERIAS</h2>

    <div class="container my-4">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <table class="table table-striped" id="datatable_Materias">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>GRUPO</th>
                            <th># DE MATERIAS</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody id="tableBody_Materias">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>

    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.min.js') }}"></script>
    <script src="{{ asset('js/es-ES.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('js/responsive.bootstrap5.min.js') }}"></script>
    <script>
        const API_URL = "{{ route('admin.materias.api') }}";
    </script>
    <script src="{{ asset('js/Admin/Materia.js') }}"></script>
    @include('admin.materias.registros')
    @include('admin.materias.edit')
    @include('admin.materias.delete')
</body>

</html>
