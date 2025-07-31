<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CITAS</title>
</head>

<body>
    <form action="{{ route('maestro.canalizacion_editar_info', $datos_alumno->id_alumno) }}" method="POST">
        @csrf
        <h1>EDITAR INFORMACIÓN</h1>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <td><label for="factores_motivan">Factores que motivan la canalización del estudiante:</label></td>
            </tr>
            <tr>
                <td>
                    <textarea name="fact_mo" rows="4" cols="50" required >{{ $datos_canalizacion->factores_motivacion }}</textarea>
                </td>
            </tr>
            <tr>
                <td><label for="observaciones">OBSERVACIONES:</label></td>
            </tr>
            <tr>
                <td>
                    <textarea name="obs_pro"rows="4" cols="50" required >{{ $datos_canalizacion->observaciones_problematica }}</textarea>
                </td>
            </tr>
        </table>
        <button type="submit">EDITAR INFORMACIÓN</button>
    </form>

    <h1>PROGRAMAR CITAS</h1>
    <form action="{{ route('maestro.citas_alumno.crear', $datos_alumno->id_alumno) }}" method="POST">
        @csrf
        <label for="fecha">Fecha:</label>
        <input type="date" name="fecha" value="{{ \Carbon\Carbon::today()->format('Y-m-d') }}" required><br><br>

        <label for="hora_inicio">HORA DE INICIO:</label>
        <input type="time" name="hora_inicio" required><br><br>

        <label for="hora_fin">HORA DE TERMINO:</label>
        <input type="time" name="hora_fin" required><br><br>
        <small>Nota: 12:00 AM = Medianoche, 12:00 PM = Mediodía</small><br>


        <input type="submit" value="GUARDAR CITA">
    </form>


    <h2>CITAS PROGRAMADAS</h2>
    @if ($datos_alumno->canalizacion && $datos_alumno->canalizacion->canalizacioncitas->count())
        <p>Existen citas programadas</p>
        <table border="1" cellpadding="10">
            <tr>
                <th>Fecha</th>
                <th>Hora inicio</th>
                <th>Hora fin</th>
                <th>Acción</th>
            </tr>
            @foreach ($datos_alumno->canalizacion->canalizacioncitas as $cita)
                <tr>
                    <td>{{ $cita->fecha_cita_programada }}</td>
                    <td>{{ $cita->horario_inicio }}</td>
                    <td>{{ $cita->horario_fin }}</td>
                    <td>
                        <form action="{{ route('maestro.citas_alumno.eliminar', $cita->id_canalizacion_cita) }}"
                            method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar esta cita?');">
                            @csrf
                            @method('DELETE')
                            <input type="submit" value="Eliminar">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    @else
        <p>No hay citas registradas.</p>
    @endif



    <a href="{{ route('maestro.documentos.ver', $datos_alumno->id_alumno) }}">Ver documentos</a><br>
    <a href="{{ route('maestro.canalizacion_alumno', $datos_alumno->id_alumno) }}">← Volver a canalización</a>


</body>

</html>
