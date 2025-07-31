<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CANALIZACIÓN</title>
</head>

<body>
    <!-- jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <!-- html2canvas (para capturar HTML a imagen) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>


    <h2>SOLICITUD DE CANALIZACIÓN PARA ATENCIÓN PSICOPEDAGÓGICA</h2>
    <h2 class="no-pdf">Estatus de canalización: {{ $datos_alumno->estatus_canalizacion }} </h2>
    <label for="division">DIVISIÓN: </label>
    <input type="text" id="division" name="division" value="{{ $datos_alumno->carrera->carrera }}" readonly><br><br>

    <label for="periodo">PERIODO ESCOLAR: </label>
    <input type="text" id="periodo" name="periodo" value="{{ $datos_alumno->grupo->periodo->periodo }}"
        readonly><br><br>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <td><label for="nombre_tutor">NOMBRE DE LA (EL) TUTORA (O):</label></td>
            <td> <input type="text" id="nombre_tutor" name="nombre_tutor"
                    value="{{ $datos_alumno->grupo->profesor->nombre }} {{ $datos_alumno->grupo->profesor->ap_paterno }} {{ $datos_alumno->grupo->profesor->ap_materno }}"
                    readonly>
            </td>
        </tr>
        <tr>
            <td><label for="nombre_jefa">NOMBRE DE JEFA (E) DE DIVISIÓN:</label></td>
            <td><input type="text" id="nombre_jefa" name="nombre_jefa"
                    value="{{ $datos_alumno->carrera->jefecarrera->nombre }} {{ $datos_alumno->carrera->jefecarrera->ap_paterno }} {{ $datos_alumno->carrera->jefecarrera->ap_materno }}"
                    readonly>
            </td>

        </tr>
    </table>


    <form {{ $crear_canalizacion }} action="{{ route('maestro.canalizacion.crear', $datos_alumno->id_alumno) }}"
        method="POST" enctype="multipart/form-data">
        @csrf


        <label for="periodo">FECHA DE CREACIÓN:</label>
        <input type="date" id="f_creacion" name="f_creacion" value="{{ \Carbon\Carbon::today()->format('Y-m-d') }}"
            readonly><br><br>


        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <td> <label for="factores_motivan">Factores que motivan la canalización del estudiante:</label></td>
            </tr>
            <tr>
                <td>
                    <textarea id="factores_motivan" name="factores_motivan" rows="4" cols="50" required></textarea>
                </td>
            </tr>
            <tr>
                <td><label for="documentos_solicitud">Relación de los documentos que soportan la solicitud:</label></td>
            </tr>
            <tr>
                <td>
                    <input type="file" id="documentos_solicitud" name="documentos_solicitud[]"
                        rows="4"cols="50" multiple required>
                </td>
            </tr>
            <tr>
                <td><label for="observaciones">OBSERVACIONES:</label></td>
            </tr>
            <tr>
                <td>
                    <textarea id="observaciones" name="observaciones" rows="4" cols="50" required></textarea>
                </td>
            </tr>


        </table>

        <input type="submit" value="CREAR CANALIZACION">
    </form>

    <label for="nombre_estudiante">NOMBRE DEL ESTUDIANTE:</label>
    <input type="text" id="nombre_estudiante" name="nombre_estudiante"
        value="{{ $datos_alumno->nombre }} {{ $datos_alumno->ap_paterno }} {{ $datos_alumno->ap_materno }}"
        readonly><br><br>

    <label for="grupo">GRUPO:</label>
    <input type="text" id="grupo" name="grupo" value=" {{ $datos_alumno->grupo->clave_grupo }}" readonly>

    <label for="matricula">MATRÍCULA:</label>
    <input type="text" id="matricula" name="matricula" value="{{ $datos_alumno->matricula }}" readonly>

    <label for="telefono">TELÉFONO:</label>
    <input type="text" id="telefono" name="telefono" value="{{ $datos_alumno->telefono }}" readonly><br><br>



    <table border="1" cellpadding="10" cellspacing="0" {{ $administrar_citas }}>
        <tr>
            <td> <label for="factores_motivan">Factores que motivan la canalización del estudiante:</label></td>
        </tr>
        <tr>
            <td>
                <textarea rows="4" cols="50" required readonly>{{ $datos_canalizacion->factores_motivacion }}</textarea>
            </td>
        </tr>
        <tr>
            <td><label for="observaciones">OBSERVACIONES:</label></td>
        </tr>
        <tr>
            <td>
                <textarea rows="4" cols="50" required readonly>{{ $datos_canalizacion->observaciones_problematica }}</textarea>
            </td>
        </tr>
    </table>

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
                pdf.save("Canalizacion_" + "{{$datos_alumno->nombre}}{{$datos_alumno->ap_paterno}}{{$datos_alumno->ap_materno}}_{{ $datos_alumno->matricula }}"+".pdf");
            });

            // Restaurar los elementos ocultos después de generar el PDF
            elementosOcultos.forEach(el => el.style.display = '');
        }
    </script>

    <button onclick="generarPDF()" class="no-pdf">Descargar como PDF</button>





    <a class="no-pdf" {{ $administrar_citas }} href="{{ route('maestro.citas_alumno', $datos_alumno->id_alumno) }}">Administrar
        canalización</a><br>
    <a class="no-pdf" href="{{ route('maestro.alumno.seleccionar', $datos_alumno->id_alumno) }}">← Volver</a>






</body>

</html>
