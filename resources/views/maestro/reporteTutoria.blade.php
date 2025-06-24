<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte Mensual de Tutoría Académica</title>
    <link rel="stylesheet" href="{{ asset('css/fomularios.css') }}">
</head>
<body>
    <header>
        <div class="logos">
            <img src="{{ asset('multimedia/edomex.png') }}" class="logoedomex">
            <img src="{{ asset('multimedia/tesi.png') }}" class="logotesi">
            <img src="{{ asset('multimedia/isclogo.jpeg') }}" class="logoisc">
        </div>
        <div class="banner">
            <h1>REPORTE MENSUAL DE TUTORÍA ACADÉMICA</h1>
        </div>
    </header>

    <main>
        <div class="formulariocontenedor">

            @if(session('success'))
                <div style="color: green; margin-bottom: 1em;">
                    {{ session('success') }}
                </div>
            @endif

            <label>ASESOR(A):</label>
    <input type="text" value="{{ $profesor->nombre }} {{ $profesor->ap_paterno }} {{ $profesor->ap_materno }}" readonly>

    <label>CARRERA:</label>
    <input type="text" value="{{ $profesor->carrera->carrera }}" readonly>

    <label>PERIODO:</label>
    <input type="text" value="{{ $periodo }}" readonly>

    <table class="tabla-formulario">
        <thead>
            <tr>
                <th>No.</th>
                <th>Estudiante</th>
                <th>Matrícula</th>
                <th>Grupo</th>
                <th>Mes</th>
                <th>Problemática</th>
                <th>Análisis</th>
                <th>Área a canalizar</th>
                <th>Guardar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alumnos as $i => $alumno)
                @php
                    $registro = $registros[$alumno->id_alumno] ?? null;
                @endphp
                <tr>
                    <form action="{{ route('maestro.maestro.tutoria.guardar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_alumno" value="{{ $alumno->id_alumno }}">

                        <td>{{ $i + 1 }}</td>
                        <td>{{ $alumno->nombre_completo }}</td>
                        <td>{{ $alumno->matricula }}</td>
                        <td>{{ $alumno->grupo->clave_grupo ?? '' }}</td>
                        <td>
                            <select name="mes_entrega" required>
                                <option value="">--Selecciona mes--</option>
                                @foreach(['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'] as $mes)
                                    <option value="{{ $mes }}"
                                        {{ ($registro->mes_entrega ?? '') === $mes ? 'selected' : '' }}>
                                        {{ $mes }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <select name="id_problematica" required>
                                <option value="">--</option>
                                @foreach($problematicas as $p)
                                    <option value="{{ $p->id_problematica }}"
                                        {{ (isset($registro) && $registro->id_problematica == $p->id_problematica) ? 'selected' : '' }}>
                                        {{ $p->tipo_problematica }}
                                    </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <textarea name="analisis_metodo_aplicado" required>{{ $registro->analisis_metodo_aplicado ?? '' }}</textarea>
                        </td>
                        <td>
                            <input type="text" name="area_canalizar" value="{{ $registro->area_canalizar ?? '' }}" required>
                        </td>
                        <td>
                            <button type="submit">Guardar</button>
                        </td>
                    </form>
                </tr>
            @endforeach
        </tbody>
    </table>

    <br>
</div>
    </main>
</body>
</html>
