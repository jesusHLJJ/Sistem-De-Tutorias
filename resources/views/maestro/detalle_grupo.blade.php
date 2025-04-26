<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecciona un Alumno - Grupo {{ $grupo->clave_grupo }}</title>
</head>
<body>
    <h1>Selecciona un Alumno del Grupo {{ $grupo->clave_grupo }}</h1>

    @if($grupo->alumnos->isEmpty())
        <p>No hay alumnos en este grupo.</p>
    @else
        <ul>
            @foreach($grupo->alumnos as $alumno)
                <li>
                    <a href="{{ route('maestro.maestro.ficha_id_profesor', $alumno->id_alumno) }}">
                        {{ $alumno->nombre }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

    <br>
    <a href="{{ route('maestro.grupos') }}">← Volver a Mis Grupos</a>

    <a href="{{ route('maestro.graficar') }}" class="btn btn-primary">Graficar</a>

</body>
</html>
