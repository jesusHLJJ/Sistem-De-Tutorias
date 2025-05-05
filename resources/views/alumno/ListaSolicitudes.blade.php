<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solicitudes de Asesoría</title>
    <link rel="stylesheet" href="/css/app.css"> <!-- Asegúrate de que tu archivo CSS esté en la ruta correcta -->
</head>

<body>
    <div class="container">
        <h1>Solicitudes de Asesoría de {{ $alumno->nombre_completo }}</h1>

        <a href="{{ route('alumno.solicitudasesoria.formulario') }}" class="btn btn-primary mb-3">
            Crear nueva solicitud
        </a>

        @if($solicitudes->count())
            <ul class="list-group">
                @foreach($solicitudes as $solicitud)
                    <li class="list-group-item">
                        <a href="{{ route('alumno.solicitudasesoria.ver', ['id' => $solicitud->id_solicitud]) }}">
                            Asesoría en {{ $solicitud->materia->nombre }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No tienes solicitudes aún.</p>
        @endif
    </div>
</body>

</html>
