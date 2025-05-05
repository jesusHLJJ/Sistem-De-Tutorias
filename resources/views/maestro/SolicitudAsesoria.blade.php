<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Solicitud de Asesoría</title>
    <link rel="stylesheet" href="{{ asset('css/fomularios.css')}}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</head>
<body>

<header>
        <div class="logos">
            <img src="{{ asset('multimedia/edomex.png') }}" alt="Logo 1" class="logoedomex">
            <img src="{{ asset('multimedia/tesi.png') }}" alt="Logo 2" class="logotesi">
            <img src="{{ asset('multimedia/isclogo.jpeg') }}" alt="Logo 3" class="logoisc">
        </div>
        <div class="banner">
            <h1>Solicitud de Asesoría</h1>
        </div>
    </header>

    <main>
        <div class="formulariocontenedor">
    <form action="{{ route('maestro.maestro.solicitudes.lista', $alumno->id_alumno) }}" method="GET">
        <input type="hidden" name="alumno_id" value="{{ $alumno->id_alumno }}">
      <input type="hidden" name="semestre_id" value="{{ $semestre->id_semestre}}">
      <input type="hidden" name="carrera_id" value="{{ $carrera->id_carrera}}">
     
        <!-- División Académica y Fecha -->
        <label for="division">DIVISIÓN ACADÉMICA:</label>
        <input type="text" id="division" name="division" value="{{ $carrera->carrera }}" readonly>

        <label for="fecha">FECHA:</label>
        <input type="date" id="fecha" name="fecha" readonly>
        <script>
            // Establece la fecha actual en el campo de fecha
            window.onload = function() {
                const dateInput = document.getElementById('fecha');
                const today = new Date().toISOString().split('T')[0]; // Formato YYYY-MM-DD
                dateInput.value = today;
            };
        </script>
        <br>
        <label for="semestre">SEMESTRE</label>
        <input type="text" id="semestre" name="semestre" value="{{ $semestre->semestre }}" readonly>



<br>
<br>
    <select id="id_profesor_display" disabled>
        <option value="">-- Selecciona --</option>
        @foreach ($profesores as $profesor)
            <option value="{{ $profesor->id_profesor }}"
                {{ (isset($solicitud) && $solicitud->id_profesor == $profesor->id_profesor) ? 'selected' : '' }}>
                {{ $profesor->nombre }} {{ $profesor->ap_paterno }} {{ $profesor->ap_materno }}
            </option>
        @endforeach
    </select>

<input type="hidden" name="id_profesor" value="{{ $solicitud->id_profesor ?? '' }}">



        <br>
        <br>

            <label for="id_materia">MATERIA:</label>
    <select id="id_materia_display" disabled>
        <option value="">-- Selecciona una materia --</option>
        @foreach ($materias as $materia)
            <option value="{{ $materia->id_materia }}" 
                {{ isset($solicitud) && $solicitud->id_materia == $materia->id_materia ? 'selected' : '' }}>
                {{ $materia->nombre }}
            </option>
        @endforeach
    </select>

<input type="hidden" name="id_materia" value="{{ $solicitud->id_materia ?? '' }}">

        @csrf


        <br><br>

        <!-- Estudiante -->
        <label for="estudiante">ESTUDIANTE:</label>
        <input type="text" id="alumno" name="alumno" value="{{ $alumno->nombre_completo }}" readonly>

        <br><br>

        <!-- Matrícula, Grupo y Medio de Asesoría -->
        <label for="matricula">MATRÍCULA:</label>
        <input type="text" id="matricula" name="matricula" value="{{ $alumno->matricula }}" readonly>

        <label for="grupo">GRUPO:</label>
        <input type="text" id="grupo" name="grupo" value="{{ $alumno->grupo?->clave_grupo ?? 'No asignado' }}" readonly>

        <label for="medio_asesoria">MEDIO POR EL QUE RECIBE LA ASESORÍA:</label>
    <textarea id="medio_asesoria" name="medio_asesoria" rows="1" cols="30" readonly>
        {{ $solicitud->medio_didactico_recurso ?? '' }}
    </textarea>

        <br><br>

        <!-- Textarea para descripción de la asesoría -->
        <label for="descripcion">DESCRIPCIÓN DE LA ASESORÍA:</label>
        <br><br>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50" readonly>
            {{ $solicitud->temas_tratar_descripcion ?? '' }}
        </textarea>

        <br><br>
        <div class="botones">
            <button type="submit">Regresar</button>
            <button type="button" onclick="generatePDF()">Generar PDF</button>
        </div>
    </form>
    </div>
</main>
    <script>
        // Función para generar el PDF
        function generatePDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // Obteniendo los valores de los campos
    const division = document.querySelector('input[name="division"]').value;
    const fecha = document.querySelector('input[name="fecha"]').value;
    const semestre = document.querySelector('input[name="semestre"]').value;
    const profesor = document.querySelector('select[name="id_profesor"]').value;
    const asignatura = document.querySelector('select[name="id_materia"]').value;
    const alumno = document.querySelector('input[name="alumno"]').value;
    const matricula = document.querySelector('input[name="matricula"]').value;
    const grupo = document.querySelector('input[name="grupo"]').value;
    const medio_asesoria = document.querySelector('textarea[name="medio_asesoria"]').value;
    const descripcion = document.querySelector('textarea[name="descripcion"]').value;

    // Generando el contenido del PDF
    let content = `
        SOLICITUD DE ASESORÍA

        DIVISIÓN ACADÉMICA: ${division}
        FECHA: ${fecha}
        SEMESTRE: ${semestre}
        PROFESOR(A): ${profesor}
        ASIGNATURA DE LA ASESORÍA: ${asignatura}
        ESTUDIANTE: ${alumno}
        MATRÍCULA: ${matricula}
        GRUPO: ${grupo}
        MEDIO POR EL QUE SE RECIBE LA ASESORÍA: ${medio_asesoria}

        DESCRIPCIÓN DE LA ASESORÍA:
        ${descripcion}
    `;

    // Añadiendo el contenido al PDF
    doc.text(content, 10, 10);

    // Llama al guardado sin nombre de archivo para que se abra la ventana de guardado
    doc.save('Solicitud Tutoria');
}

    </script>

</body>
</html>
