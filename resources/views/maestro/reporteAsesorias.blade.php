<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte Mensual de Asesorías Académicas</title>
    <link rel="stylesheet" href="{{ asset('css/fomularios.css') }}">
</head>
<body>
    <header>
        <div class="logos">
            <img src="{{ asset('multimedia/edomex.png') }}" alt="Logo 1" class="logoedomex">
            <img src="{{ asset('multimedia/tesi.png') }}" alt="Logo 2" class="logotesi">
            <img src="{{ asset('multimedia/isclogo.jpeg') }}" alt="Logo 3" class="logoisc">
        </div>
        <div class="banner">
            <h1>REPORTE MENSUAL DE ASESORÍAS ACADÉMICAS 09</h1>
        </div>
    </header>

    <main>
        <div class="formulariocontenedor">
            <h2 class="titulo-centro">TECNOLÓGICO DE ESTUDIOS SUPERIORES DE IXTAPALUCA</h2>
    <label for="asesor">ASESOR(A):</label>
    <input type="text" id="asesor" name="asesor" value="{{ $profesor->nombre }} {{ $profesor->ap_paterno }} {{ $profesor->ap_materno }}" readonly>

    <label for="carrera">CARRERA:</label>
    <input type="text" id="carrera" name="carrera" value="{{ $profesor->carrera->carrera }}" readonly>

    <label for="mes">MES CORRESPONDIENTE:</label>
    <input type="text" id="mes" name="mes" value="{{ $mes }}" readonly>

    <label for="periodo">PERIODO:</label>
    <input type="text" id="periodo" name="periodo" value="{{ $periodo }}" readonly>


            <table class="tabla-formulario">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nombre del estudiante</th>
                        <th>Matrícula</th>
                        <th>Grupo</th>
                        <th>Materia</th>
                        <th>No. de asesorías</th>
                        <th>Recurso didáctico</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($asesorias as $i => $asesoria)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $asesoria->alumno->nombre_completo }}</td>
                            <td>{{ $asesoria->alumno->matricula }}</td>
                            <td>{{ $asesoria->alumno->grupo->clave_grupo ?? 'N/A' }}</td>
                            <td>{{ $asesoria->materia->nombre }}</td>
                            <td>1</td>
                            <td>{{ $asesoria->medio_didactico_recurso }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <br><br>
            <a href="{{ route('maestro.grupos') }}">← Volver a Mis Grupos</a>
        </div>
    </main>
</body>
</html>
