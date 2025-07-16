<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte Mensual de Asesorías Académicas</title>
    <link rel="stylesheet" href="{{ asset('css/fomularios.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
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
            <button onclick="generarPDFAsesorias()">Generar PDF</button>
        </div>
    </main>
    <script>

        //funcion para crear pdf
function generarPDFAsesorias() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF({ orientation: "landscape" });

    // Encabezado
    doc.setFontSize(12);
    doc.text("TECNOLÓGICO DE ESTUDIOS SUPERIORES DE IXTAPALUCA", 148, 10, { align: 'center' });
    doc.setFontSize(10);
    doc.text("REPORTE MENSUAL DE ASESORÍAS ACADÉMICAS", 148, 17, { align: 'center' });

    let y = 25;

    // Datos del asesor
    const asesor = document.getElementById("asesor").value;
    const carrera = document.getElementById("carrera").value;
    const mes = document.getElementById("mes").value;
    const periodo = document.getElementById("periodo").value;

    doc.setFontSize(9);
    doc.text(`ASESOR(A): ${asesor}`, 10, y); y += 6;
    doc.text(`CARRERA: ${carrera}`, 10, y); y += 6;
    doc.text(`MES CORRESPONDIENTE: ${mes}`, 10, y); y += 6;
    doc.text(`PERIODO: ${periodo}`, 10, y); y += 10;

    // Tabla
    const headers = [[
        "No.",
        "Nombre del estudiante",
        "Matrícula",
        "Grupo",
        "Materia",
        "No. de asesorías",
        "Recurso didáctico"
    ]];

    const body = [];

    const rows = document.querySelectorAll("table tbody tr");

    rows.forEach(row => {
        const cells = row.querySelectorAll("td");
        const rowData = Array.from(cells).map(td => td.innerText.trim());
        body.push(rowData);
    });

    doc.autoTable({
        startY: y,
        head: headers,
        body: body,
        styles: { fontSize: 7, cellPadding: 2 },
        headStyles: { fillColor: [22, 160, 133], textColor: 255 },
        margin: { top: y }
    });

    doc.save('Reporte_Asesorias_Mensual.pdf');
}
</script>

</body>
</html>
