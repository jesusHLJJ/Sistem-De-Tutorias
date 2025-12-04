<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solicitudes de Asesoría</title>
    <link rel="stylesheet" href="/css/app.css">
</head>

<body>
    <div class="container">
        <h1>Solicitudes de Asesoría de {{ $alumno->nombre_completo }}</h1>

        @if($solicitudes->count())
            <ul class="list-group">
                @foreach($solicitudes as $solicitud)
                    <li class="list-group-item">
                    <a href="{{ route('maestro.maestro.solicitud.ver', ['id' => $solicitud->id_solicitud]) }}">
                    Solicitud de {{ $solicitud->materia->nombre }} - {{ $solicitud->fecha }}
                    </a>
                    </li>
                @endforeach
            </ul>
        @else
            <p>No hay solicitudes para este alumno.</p>
        @endif
    </div>
    <a href="{{ route('maestro.grupos') }}">← Volver al Grupo</a>

</body>

</html>
