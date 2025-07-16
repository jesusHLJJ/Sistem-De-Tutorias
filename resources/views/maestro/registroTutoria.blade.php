<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte Semestral de Tutoría Académica</title>
    <link rel="stylesheet" href="{{ asset('css/fomularios.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
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
                <button type="button" onclick="generarReporteSemestral()">Generar PDF</button>

            </form>
        </div>
    </main>
    <script>
        //funcion para crear pdf
function generarReporteSemestral() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF('landscape');

    let y = 15;

    // Título general
    doc.setFontSize(12);
    doc.text("TECNOLÓGICO DE ESTUDIOS SUPERIORES DE IXTAPALUCA", 148, 10, { align: 'center' });
    doc.setFontSize(10);
    doc.text("REPORTE SEMESTRAL DE TUTORÍA ACADÉMICA", 148, y, { align: 'center' });
    y += 10;

    // Docente y grupo
    const docente = document.querySelector('input[value*="{{ $profesor->nombre }}"]')?.value || "";
    const periodo = document.querySelector('input[value*="{{ $grupo->periodo->periodo }}"]')?.value || "";
    const grupo = document.querySelector('input[value*="{{ $grupo->clave_grupo }}"]')?.value || "";
    const semestre = document.querySelector('input[value*="{{ $grupo->semestre->semestre }}"]')?.value || "";

    doc.setFontSize(9);
    doc.text(`DOCENTE TUTOR(A): ${docente}`, 10, y); y += 6;
    doc.text(`PERIODO: ${periodo}`, 10, y); y += 6;
    doc.text(`GRUPO: ${grupo}`, 10, y); y += 6;
    doc.text(`SEMESTRE: ${semestre}`, 10, y); y += 10;

    // Encabezados y cuerpo de la tabla
    const headers = [[
        "No.",
        "Estudiante",
        "Matrícula",
        "Tut. Grupal",
        "Tut. Individual",
        "Asesoría Acad.",
        "Psicología",
        "Créditos Culturales",
        "Créditos Académicos",
        "Inglés 100%",
        "Mat. Reprobadas"
    ]];

    const body = [];
    const filas = document.querySelectorAll('table tbody tr');

    filas.forEach((tr, index) => {
        const tds = tr.querySelectorAll('td');
        const nombre = tds[1]?.textContent.trim() || "";
        const matricula = tds[2]?.textContent.trim() || "";
        const tutorGrupal = tds[3]?.querySelector('input')?.checked ? 'Sí' : 'No';
        const tutorIndiv = tds[4]?.querySelector('input')?.checked ? 'Sí' : 'No';
        const asesoria = tds[5]?.querySelector('input')?.checked ? 'Sí' : 'No';
        const psicologia = tds[6]?.querySelector('input')?.checked ? 'Sí' : 'No';
        const creditosCult = tds[7]?.querySelector('input')?.value || "0";
        const creditosAcad = tds[8]?.querySelector('input')?.value || "0";
        const ingles = tds[9]?.querySelector('input')?.value || "";
        const reprobadas = tds[10]?.querySelector('input')?.value || "0";

        body.push([
            index + 1,
            nombre,
            matricula,
            tutorGrupal,
            tutorIndiv,
            asesoria,
            psicologia,
            creditosCult,
            creditosAcad,
            ingles,
            reprobadas
        ]);
    });

    doc.autoTable({
        head: headers,
        body: body,
        startY: y,
        styles: { fontSize: 7 },
        headStyles: { fillColor: [41, 128, 185] },
    });

    y = doc.lastAutoTable.finalY + 10;

    // Informe grupal
    const informe = document.querySelector('textarea[name="informe_grupal"]').value;
    doc.setFontSize(9);
    doc.text("Informe Grupal Ejecutivo del Periodo Escolar:", 10, y); y += 6;
    const textoDividido = doc.splitTextToSize(informe, 270);
    doc.text(textoDividido, 10, y);
    y += textoDividido.length * 5;

    // Índice de reprobación
    const indice = "{{ $indiceReprobacion }}";
    doc.text(`Índice de reprobación del grupo: ${indice}%`, 10, y + 10);

    // Guardar PDF
    doc.save("Reporte_Semestral_Tutoria.pdf");
}
</script>

</body>
</html>
