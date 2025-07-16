<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Reporte Mensual de Tutoría Académica</title>
    <link rel="stylesheet" href="{{ asset('css/fomularios.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

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
    <button onclick="generarReportePDF()">Generar PDF</button>
</div>
    </main>

    <script>
        //FUNCION PARA GENERAR PDF
function generarReportePDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF({ orientation: 'landscape' }); // Horizontal para caber bien la tabla

    let y = 20;

    // Encabezado institucional
    doc.setFontSize(12);
    doc.text("TECNOLÓGICO DE ESTUDIOS SUPERIORES DE IXTAPALUCA", 148, 10, { align: 'center' });
    doc.setFontSize(10);
    doc.text("REPORTE MENSUAL DE TUTORÍA ACADÉMICA", 148, 17, { align: 'center' });

    // Datos del profesor
    const asesor = document.querySelector('input[value*="{{ $profesor->nombre }}"]')?.value || "";
    const carrera = document.querySelector('input[value*="{{ $profesor->carrera->carrera }}"]')?.value || "";
    const periodo = document.querySelector('input[value*="{{ $periodo }}"]')?.value || "";

    doc.setFontSize(9);
    doc.text(`ASESOR(A): ${asesor}`, 10, y); y += 6;
    doc.text(`CARRERA: ${carrera}`, 10, y); y += 6;
    doc.text(`PERIODO: ${periodo}`, 10, y); y += 10;

    // Tabla
    doc.setFontSize(8);
    const headers = [
        ["No", "Estudiante", "Matrícula", "Grupo", "Mes", "Problemática", "Análisis", "Área a canalizar"]
    ];

    const body = [];

    const rows = document.querySelectorAll('table tbody tr');

    rows.forEach((tr, index) => {
        const tds = tr.querySelectorAll('td');
        if (tds.length < 8) return;

        const num = tds[0].innerText.trim();
        const estudiante = tds[1].innerText.trim();
        const matricula = tds[2].innerText.trim();
        const grupo = tds[3].innerText.trim();
        const mes = tds[4].querySelector('select')?.value || '';
        const problematica = tds[5].querySelector('select')?.selectedOptions[0]?.text || '';
        const analisis = tds[6].querySelector('textarea')?.value || '';
        const canalizar = tds[7].querySelector('input')?.value || '';

        body.push([num, estudiante, matricula, grupo, mes, problematica, analisis, canalizar]);
    });

    // Agregar tabla al PDF (usando autoTable)
    doc.autoTable({
        startY: y,
        head: headers,
        body: body,
        styles: { fontSize: 6, cellWidth: 'wrap' },
        headStyles: { fillColor: [41, 128, 185] },
        margin: { top: y }
    });

    doc.save('Reporte_Mensual_Tutoria.pdf');
}
</script>

<!-- jsPDF AutoTable Plugin -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>

</body>
</html>
