<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte Semestral de Tutoría Académica</title>
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
            <h1>REPORTE SEMESTRAL DE TUTORÍA ACADÉMICA</h1>
        </div>
    </header>

    <main>
        <div class="formulariocontenedor">
            <form action="{{ route('maestro.semestral.guardar') }}" method="POST">
                @csrf

                <input type="hidden" name="id_grupo" value="{{ $grupo->id_grupo }}">

                <label>DOCENTE TUTOR(A):</label>
                <input type="text" value="{{ $profesor->nombre }} {{ $profesor->ap_paterno }} {{ $profesor->ap_materno }}" readonly>

                <label>PERIODO:</label>
                <input type="text" value="{{ $grupo->periodo->periodo ?? 'N/A' }}" readonly>

                <label>GRUPO:</label>
                <input type="text" value="{{ $grupo->clave_grupo }}" readonly>

                <label>SEMESTRE:</label>
                <input type="text" value="{{ $grupo->semestre->semestre }}" readonly>

                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nombre del estudiante</th>
                            <th>Matrícula</th>
                            <th>Tutoría Grupal</th>
                            <th>Tutoría Individual</th>
                            <th>Asesoría Académica</th>
                            <th>Área de Psicología</th>
                            <th>TOTAL DE CREDITOS: Cultural/Deportiva</th>
                            <th>TOTAL DE CREDITOS: Académica</th>
                            <th>Módulos de Inglés cubiertos al 100%</th>
                            <th>Materias Reprobadas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($alumnos as $i => $alumno)
                            @php
                                $registro = $tutorias[$alumno->id_alumno] ?? null;
                            @endphp
                            <tr>
                                <input type="hidden" name="registros[{{ $i }}][id_alumno]" value="{{ $alumno->id_alumno }}">
                                <td>{{ $i + 1 }}</td>
                                <td>{{ $alumno->nombre_completo }}</td>
                                <td>{{ $alumno->matricula }}</td>
                                <td>
                                    <input type="checkbox" name="registros[{{ $i }}][tutoria_grupal]" value="1"
                                        {{ $registro && $registro->tutoria_grupal ? 'checked' : '' }}>
                                </td>
                                <td>
                                    <input type="checkbox" name="registros[{{ $i }}][tutoria_individual]" value="1"
                                        {{ $registro && $registro->tutoria_individual ? 'checked' : '' }}>
                                </td>
                                <td>
                                    <input type="checkbox" name="registros[{{ $i }}][asesoria_academica]" value="1"
                                        {{ $registro && $registro->asesoria_academica ? 'checked' : '' }}>
                                </td>
                                <td>
                                    <input type="checkbox" name="registros[{{ $i }}][area_psicologica]" value="1"
                                        {{ $registro && $registro->area_psicologica ? 'checked' : '' }}>
                                </td>
                                <td>
                                    <input type="number" name="registros[{{ $i }}][crditos_culturales_deportivos]" min="0"
                                        value="{{ $registro->crditos_culturales_deportivos ?? '' }}">
                                </td>
                                <td>
                                    <input type="number" name="registros[{{ $i }}][crditos_academicos]" min="0"
                                        value="{{ $registro->crditos_academicos ?? '' }}">
                                </td>
                                <td>
                                    <input type="text" name="registros[{{ $i }}][ingles_cubierto]" placeholder="Ej. 100%"
                                        value="{{ $registro->ingles_cubierto ?? '' }}">
                                </td>
                                <td>
                                    <input type="number" name="registros[{{ $i }}][materias_reprobadas]" min="0"
                                        value="{{ $registro->materias_reprobadas ?? '' }}">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <br>
                <label>Informe Grupal Ejecutivo del Periodo Escolar:</label><br>
                <textarea name="informe_grupal" rows="4" cols="100" required>
{{ $tutorias->first()->informe_grupal ?? '' }}
                </textarea>

                <br><br>
                <p><strong>Índice de reprobación del grupo:</strong> {{ $indiceReprobacion }}%</p>

                <br>
                <button type="submit">Guardar Reporte</button>
            </form>
        </div>
    </main>
</body>
</html>
