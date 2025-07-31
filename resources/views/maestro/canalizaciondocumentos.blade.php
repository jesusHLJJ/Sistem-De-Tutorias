<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DOCUMENTOS</title>
</head>

<body>

    <a href="{{ route('maestro.documentos.subir', $datos_alumno->id_alumno) }}">Agregar nuevo documento</a><br>
    <a href="{{ route('maestro.citas_alumno.crear', $datos_alumno->id_alumno) }}">← Volver</a>

    @if (count($archivos))
        <table border="1" cellpadding="10">
            <tr>
                <th>Nombre del archivo</th>
                <th></th>
                <th></th>
            </tr>
            @foreach ($archivos as $archivo)
                <tr>
                    <td>{{ $archivo->getFilename() }}</td>

                    <!-- Botón VER -->
                    <td>
                        <a href="{{ asset($datos_alumno->canalizacion->relacion_documentos_solicitud . '/' . $archivo->getFilename()) }}"
                            target="_blank">VER</a>
                    </td>

                    <!-- Botón ELIMINAR -->
                    <td>
                        <form
                            action="{{ route('maestro.documentos.eliminar', ['id_alumno' => $datos_alumno->id_alumno, 'archivo' => $archivo->getFilename()]) }}"
                            method="POST" onsubmit="return confirm('¿Eliminar este archivo?');">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="archivo" value="{{ $archivo->getFilename() }}">
                            <input type="hidden" name="ruta"
                                value="{{ $datos_alumno->canalizacion->relacion_documentos_solicitud }}">
                            <input type="submit" value="Eliminar">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <p>No hay documentos en la carpeta.</p>
    @endif



</body>

</html>
