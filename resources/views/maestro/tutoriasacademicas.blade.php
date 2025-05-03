<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PROGRAMA DE TUTORÍAS ACADÉMICAS</title>
    <link rel="stylesheet" href="{{ asset('css/fomularios.css')}}">
    <!-- Incluye jsPDF -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
</head>

<body>
    <header>
        <div class="logos">
            <img src="{{ asset('multimedia/edomex.png') }} "alt="Logo 1" class="logoedomex">
            <img src="{{ asset('multimedia/tesi.png') }}" alt="Logo 2" class="logotesi">
            <img src="{{ asset('multimedia/isclogo.jpeg') }}" alt="Logo 3" class="logoisc">
        </div>
        <div class="banner">
            <h1>REPORTE 02</h1>
        </div>
    </header>
    <main>
        <div class="formulariocontenedor">
            <h2>PROGRAMA DE TUTORÍAS ACADÉMICAS</h2>
            <form id="tutoriaForm" action="{{ route('maestro.guardar_tutorias_academicas') }}" method="POST">
                @csrf
                <!-- Mostrar el nombre completo del profesor -->
                <label for="tutor">TUTOR: </label>
                <input type="text" name="tutor" value="{{ $profesor->nombre }} {{ $profesor->ap_paterno }} {{ $profesor->ap_materno }}" readonly>

                <!-- Selección del grupo -->
                <label for="grupo">GRUPO: </label>
                <select name="grupo_id" id="grupo" class="form-control">
                    <option value="">Seleccionar Grupo</option>
                    @foreach ($grupos as $grupo)
                        <option value="{{ $grupo->id_grupo }}">{{ $grupo->clave_grupo }}</option>
                    @endforeach
                </select>
                <!-- Mostrar la carrera del profesor -->
                <label for="carrera">Carrera a la que pertenece:</label>
                <input type="text" name="carrera" value="{{ $carrera->carrera ?? '' }}" readonly>
    
                <!-- Selección del semestre -->
                <label for="semestre">SEMESTRE: </label>
                <select name="semestre_id" id="semestre" class="form-control">
                    <option value="">Seleccionar semestre</option>
                    @foreach ($semestres as $semestre)
                        <option value="{{ $semestre->id_semestre }}">{{ $semestre->semestre }}</option>
                    @endforeach
                </select>
    
                <!-- Campos para los reportes -->
                <table border="1" cellpadding="10" cellspacing="0">
                    <tr>
                        <th>Formación</th>
                        <th>
                            <label for="mes">Mes:</label>
                            <select id="mes" name="mes" required>
                                <option value="Enero">Enero</option>
                                <option value="Febrero">Febrero</option>
                                <option value="Marzo">Marzo</option>
                                <option value="Abril">Abril</option>
                                <option value="Mayo">Mayo</option>
                                <option value="Junio">Junio</option>
                                <option value="Julio">Julio</option>
                                <option value="Agosto">Agosto</option>
                                <option value="Septiembre">Septiembre</option>
                                <option value="Octubre">Octubre</option>
                                <option value="Noviembre">Noviembre</option>
                                <option value="Diciembre">Diciembre</option>
                            </select>
                        </th>
                    </tr>
                    <tr>
                        <td>ACADÉMICA</td>
                        <td>
                            <textarea autocapitalize="characters" rows="15" cols="80" id="academica" name="academica" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>PERSONAL</td>
                        <td>
                            <textarea autocapitalize="characters" rows="15" cols="80" id="personal" name="personal" required></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>PROFESIONAL</td>
                        <td>
                            <textarea autocapitalize="characters" rows="15" cols="80" id="profesional" name="profesional" required></textarea>
                        </td>
                    </tr>
                </table>
    
                <!-- Botones de acción -->
                <button type="submit">Enviar</button>
                <button type="button" onclick="generatePDF()">Generar PDF</button> <!-- Botón para generar PDF -->
                <a href="{{ route('maestro.dashboard') }}">← Volver al inicio</a>
            </form>
        </div>
    </main>
    
    <footer>
        <p>© 2024 Tecnológico de Estudios Superiores de Ixtapaluca</p>
    </footer>
    <script>
        // Función para generar el PDF
        function generatePDF() {
            const {
                jsPDF
            } = window.jspdf; // Desestructurando jsPDF

            const doc = new jsPDF();
            let content = `
                PROGRAMA DE TUTORÍAS ACADÉMICAS

                TUTOR: ${document.querySelector('input[name="tutor"]').value}
                GRUPO: ${document.querySelector('select[name="grupo_id"]').options[document.querySelector('select[name="grupo_id"]').selectedIndex].text}
                CARRERA: ${document.querySelector('input[name="carrera"]').value}
                SEMESTRE: ${document.querySelector('select[name="semestre_id"]').options[document.querySelector('select[name="semestre_id"]').selectedIndex].text}
                MES: ${document.querySelector('select[name="mes"]').value}
                
                ACADÉMICA:
                ${document.querySelector('textarea[name="academica"]').value}

                PERSONAL:
                ${document.querySelector('textarea[name="personal"]').value}

                PROFESIONAL:
                ${document.querySelector('textarea[name="profesional"]').value}
            `;

            doc.text(content, 10, 10);
            doc.save('tutoria.pdf');
        }
    </script>
</body>

</html>
