<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DASHBOARD</title>
</head>

<body>
    <a href="{{ route('alumno.fichaidentificacion') }}">Ir a mi perfil</a>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger">
            <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
        </button>
    </form>

    <h1>ALUMNO</h1>
    {{-- Ejemplo en alumno/dashboard.blade.php --}}
    <div class="debug-info">
        <h3>Datos de prueba (debug):</h3>
        <p>ID de Usuario: {{ auth()->user()->id }}</p>
        <p>Rol:
            @switch(auth()->user()->role_id)
                @case(1)
                    Administrador
                @break

                @case(2)
                    Maestro
                @break

                @case(3)
                    Alumno
                @break
            @endswitch
        </p>

        {{-- Si necesitas datos de la tabla alumnos --}}
        @if (auth()->user()->role_id == 3 && auth()->user()->alumno)
            <p>ID de Alumno: {{ auth()->user()->alumno->id_alumno }}</p>
            <p>Matrícula: {{ auth()->user()->alumno->matricula ?? 'N/A' }}</p>
        @endif

        {{-- Verifica toda la estructura del usuario --}}
        <pre>{{ print_r(auth()->user()->toArray(), true) }}</pre>

        {{-- Verifica los datos del alumno relacionado --}}
        @if (auth()->user()->alumno)
            <pre>{{ print_r(auth()->user()->alumno->toArray(), true) }}</pre>
        @endif

        
    </div>
</body>

</html>
