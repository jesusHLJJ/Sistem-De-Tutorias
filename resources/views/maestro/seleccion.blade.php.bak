<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Selecciona una opción - {{ $alumno->nombre }}</title>
</head>

<body>
    <h1>Opciones para {{ $alumno->nombre }}</h1>

    <ul>
        <li>
            <a href="{{ route('maestro.maestro.ficha_id_profesor', $alumno->id_alumno) }}">Ver Ficha del Alumno</a>
        </li>
        <li>
            <a href="{{ route('maestro.maestro.maestro.habilidades', $alumno->id_alumno) }}">Ver Habilidades del
                Alumno</a>
        </li>

        <li>
            <a href="{{ route('maestro.maestro.solicitudes.lista', $alumno->id_alumno) }}">
                Ver solicitudes de asesoría
            </a>
        </li>


        <li>
            <a href="{{ route('maestro.canalizacion_alumno', $alumno->id_alumno) }}">
                Canalización
            </a>
        </li>


    </ul>

    <a href="{{ route('maestro.grupo.show', $alumno->id_grupo) }}">← Volver al Grupo</a>
</body>

</html>
