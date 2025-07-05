<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecciona un Alumno - Grupo {{ $grupo->clave_grupo }}</title>
</head>

<body>
    <h1>Selecciona un Alumno del Grupo {{ $grupo->clave_grupo }}</h1>

    @if ($grupo->alumnos->isEmpty())
        <p>No hay alumnos en este grupo.</p>
    @else
        <ul>
            @foreach ($grupo->alumnos as $alumno)
                <li>
                <a href="{{ route('maestro.alumno.seleccionar', $alumno->id_alumno) }}">
                {{ $alumno->nombre }}
                    </a>
                </li>
            @endforeach
        </ul>
    @endif

    <br>
    <a href="{{ route('maestro.grupos') }}">← Volver a Mis Grupos</a>
    <h1>El grupo seleccionado es: {{ $grupo->id_grupo }}</h1>
    <h2>La clave del grupo seleccionado es: {{$grupo->clave_grupo}}</h2>


    <br>
    <br>
    <a href="{{ route('maestro.graficar', $grupo->clave_grupo) }}" class="btn btn-primary">Graficar ficha de identificacion</a>
    <br>
    <br>
    <a href="{{ route('maestro.graficar2', $grupo->clave_grupo) }}" class="btn btn-primary">Graficar encuesta sobre habilidades</a><br>
    
    <a href="{{ route('maestro.semestral.form', $grupo->id_grupo) }}">Llenar reporte</a>


</body>

</html>