<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PLAN DE ACCIÓN TUTORÍAL</title>
</head>
<h1>El grupo del pat es: {{$grupo->id_grupo}}</h1>

<body>
    <h1>PLAN DE ACCIÓN TUTORÍAL</h1>
    <h2>EL ID DEL GRUPO ES: {{ $grupo->id_grupo }}</h2>
    <form action="{{ route('maestro.pat_guardar', $grupo->id_grupo) }}" method="POST">
           @csrf

        <table border="2">
            <tr>
                <td colspan="5">DATOS GENERALES</td>
            </tr>
            <tr>
                <td colspan="5">NOMBRE DEL TUTOR: {{ $grupo->profesor->ap_paterno }}
                    {{ $grupo->profesor->ap_materno }} {{ $grupo->profesor->nombre }}</td>
            </tr>
            <tr>
                <td colspan="2">PERIODO ESCOLAR: {{ $grupo->periodo->periodo }}</td>
                <td colspan="3">CARRERA: {{ $grupo->carrera->carrera }}</td>
            </tr>
            <tr>
                <td>GRUPO: {{ $grupo->clave_grupo }}</td>
                <td>NO. MATRICULA EN EL GRUPO: <input type="text" name="cant_alumnos" readonly value="{{ $grupo->cantidad_de_alumnos }}"></td>
                <td>M: <input type="text" name="cant_alumnos_hombres" readonly value="{{ $grupo->hombres }}"></td>
                <td>F: <input type="text" name="cant_alumnos_mujeres" readonly value="{{ $grupo->mujeres }}"></td>
                <td>SEMESTRE: {{ $grupo->semestre->semestre }}</td>
            </tr>
            <tr>
                <td colspan="7">PROBLEMÁTICA IDENTIFICADA</td>
            </tr>
            <tr>
                <td colspan="7">
                    <textarea rows="2" cols="150" name="problematica_identificada"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="7">OBJETIVOS</td>
            </tr>
            <tr>
                <td colspan="7">
                    <textarea rows="2" cols="150" name="objetivos"></textarea>
                </td>
            </tr>
            <tr>
                <td colspan="7">ACCIONES A IMPLEMENTAR</td>
            </tr>
            <tr>
                <td colspan="7">
                    <textarea rows="2" cols="150" name="acciones_a_implementar"></textarea>
                </td>
            </tr>



        </table>
        <input type="submit" value="AÑADIR INFORMACIÓN">
    </form>

    <a href="{{ route('maestro.grupo.show', $grupo->id_grupo) }}">← Volver</a>


</body>

</html>
