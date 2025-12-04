<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PLAN DE ACCIÓN TUTORÍAL</title>
</head>
<h1>ADMINISTRACIÓN PLAN DE ACCIÓN TUTORÍAL </h1>
<h2>GRUPO {{ $grupo->clave_grupo }}</h2>

<body>
    <!-- jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <!-- html2canvas (para capturar HTML a imagen) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <h1>PLAN DE ACCIÓN TUTORÍAL</h1>

    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; margin-bottom: 10px; border: 1px solid #f5c6cb; border-radius: 5px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('maestro.pat_modificar', $grupo->id_grupo) }}" method="POST">
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
                <td>NO. MATRICULA EN EL GRUPO: <input type="text" name="cant_alumnos" readonly
                        value="{{ $grupo->cantidad_de_alumnos }}"></td>
                <td>M: <input type="text" name="cant_alumnos_hombres" readonly value="{{ $grupo->hombres }}"></td>
                <td>F: <input type="text" name="cant_alumnos_mujeres" readonly value="{{ $grupo->mujeres }}"></td>
                <td>SEMESTRE: {{ $grupo->semestre->semestre }}</td>
            </tr>
            <tr>
                <td colspan="7">PROBLEMÁTICA IDENTIFICADA</td>
            </tr>
            <tr>
                <td colspan="7">
                    <textarea rows="2" cols="150" name="problematica_identificada" required>{{ $pat->ploblematica_identificada }}</textarea>
                </td>
            </tr>
            <tr>
                <td colspan="7">OBJETIVOS</td>
            </tr>
            <tr>
                <td colspan="7">
                    <textarea rows="2" cols="150" name="objetivos" required>{{ $pat->objetivos }}</textarea>
                </td>
            </tr>
            <tr>
                <td colspan="7">ACCIONES A IMPLEMENTAR</td>
            </tr>
            <tr>
                <td colspan="7">
                    <textarea rows="2" cols="150" name="acciones_a_implementar" required>{{ $pat->acciones_implementar }}</textarea>
                </td>
            </tr>
        </table>
        <input class="no-pdf" type="submit" value="MODIFICAR INFORMACIÓN">
    </form>

    <form class="no-pdf"
        action="{{ route('maestro.pat_agregar_actividad', ['grupo' => $grupo->id_grupo, 'pat' => $pat->id_plan_accion]) }}"
        method="POST">
        @csrf

        <h1>AGREGAR ACTIVIDADES</h1>
        <label for="nombre_actividad">NOMBRE DE LA ACTIVIDAD </label><input type="text" name='nombre_actividad'
            required>
        <label for="fecha_actividad">FECHA DE ENTREGA DE LA ACTIVIDAD </label><input type="date"
            name='fecha_actividad' required>
        <input type="submit" value="AGREGAR ACTIVIDAD">
    </form>
    <table border="2">


        <tr>
            <td colspan="5">ACTIVIDADES REGISTRADAS</td>
        </tr>
        <tr>
            <td>#</td>
            <td colspan="2">NOMBRE DE ACTIVIDAD</td>
            <td>FECHA DE REALIZACIÓN</td>
            <td class="no-pdf">ACCIÓN</td>
        </tr>

        @forelse ($actividades as $index => $actividad)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td colspan="2">{{ $actividad->actividad }}</td>
                <td>{{ \Carbon\Carbon::parse($actividad->fecha)->format('d/m/Y') }}</td>
                <td class="no-pdf">
                    <form action="{{ route('maestro.pat_borrar_actividad', $actividad->id_actividad) }}" method="POST"
                        onsubmit="return confirm('¿ESTAS SEGURO DE ELIMINAR ESTA ACTIVIDAD?');">
                        @csrf
                        <button type="submit">ELIMINAR</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4">No hay actividades registradas.</td>
            </tr>
        @endforelse
    </table>


    <h1>ACTIVIDAD FINAL</h1>

    <table border="2">
        <tr>

            @if (isset($pat->evaluacion_final))
                <td>{{ $pat->evaluacion_final }}</td>
            @else
                <td>NO HAY EVALUACIÓN FINAL REGISTRADA</td>
            @endif
        </tr>
    </table>


    <h3 class="no-pdf">AGREGAR/MODIFICAR ACTIVIDAD FINAL</h3>
    <form class="no-pdf" action="{{ route('maestro.pat_agregar_act_final', $pat->id_plan_accion) }}" method="post">
        @csrf
        <label for="nom_act_final">NOMBRE DE LA ACTIVIDAD</label>
        <input type="text" name="nom_act_final" required>
        <button type="submit">AGREGAR/MODIFICAR ACTIVIDAD FINAL</button>
    </form>

    <script>
        async function generarPDF() {
            const {
                jsPDF
            } = window.jspdf;

            // Ocultar elementos con la clase "no-pdf"
            const elementosOcultos = document.querySelectorAll('.no-pdf');
            elementosOcultos.forEach(el => el.style.display = 'none');

            const elemento = document.body; // O usa un div con ID si quieres limitarlo

            await html2canvas(elemento, {
                scale: 2
            }).then(canvas => {
                const imgData = canvas.toDataURL('image/png');

                const pdf = new jsPDF('p', 'mm', [215.9, 279.4]);
                const imgProps = pdf.getImageProperties(imgData);
                const pdfWidth = pdf.internal.pageSize.getWidth();
                const pdfHeight = (imgProps.height * pdfWidth) / imgProps.width;

                pdf.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight);
                pdf.save("plan_accion_tutorial_"+"{{ $grupo->clave_grupo }}"+".pdf");
            });

            // Restaurar los elementos ocultos después de generar el PDF
            elementosOcultos.forEach(el => el.style.display = '');
        }
    </script>




    <button onclick="generarPDF()" class="no-pdf">Descargar como PDF</button>




    <a href="{{ route('maestro.grupo.show', $grupo->id_grupo) }}" class="no-pdf">← Volver</a>

</body>

</html>
