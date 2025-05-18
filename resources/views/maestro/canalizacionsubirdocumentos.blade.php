<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>SUBIR DOCUMENTO</title>
</head>
<body>

    <form action="{{ route('maestro.documentos.subir.guardar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="archivo" required>
        <input type="hidden" name="ruta" value="{{ $datos_alumno->canalizacion->relacion_documentos_solicitud }}">
        <button type="submit">Subir</button>
    </form>

    <br>
    <a href="{{ route('maestro.documentos.ver', $datos_alumno->id_alumno) }}">← Volver</a>
</body>
</html>
