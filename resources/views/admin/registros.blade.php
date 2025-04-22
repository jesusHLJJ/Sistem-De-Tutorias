<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REGISTRO DE MAESTROS</title>
</head>

<body>
    <div class="nav">
        <nav class="nevegacion">
            <ul class="lista">
                <li class="elemento-lista">
                    <a href="{{ route('admin.dashboard') }}">DASHBOARD</a>
                </li>

                <li class="elemento-lista">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Cerrar Sesión</button>
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</body>

</html>
