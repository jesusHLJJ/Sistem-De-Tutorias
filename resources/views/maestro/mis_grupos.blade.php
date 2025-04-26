<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Grupos</title>
</head>
<body>
    <h1>MIS GRUPOS</h1>

    @if($grupos->isEmpty())
        <p>No tienes grupos asignados.</p>
    @else
        <ul>
            @foreach($grupos as $grupo)
                <li>
                    <a href="{{ route('maestro.grupo.show', $grupo->id_grupo) }}">{{ $grupo->clave_grupo }}</a>
                </li>
            @endforeach
        </ul>
    @endif

    <a href="{{ route('maestro.dashboard') }}">← Volver al inicio</a>
</body>
</html>

