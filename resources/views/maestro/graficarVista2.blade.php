<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráficos de Indicadores</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Agregar jsPDF desde CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <style>
        #indicadorChart1,
        #indicadorChart2,
        #indicadorChart3,
        #indicadorChart4,
        #indicadorChart5,
        #indicadorChart6,
        #indicadorChart7,
        #indicadorChart8,
        #indicadorChart9,
        #indicadorChart10,
        #indicadorChart11,
        #indicadorChart12,
        #indicadorChart13,
        #indicadorChart14,
        #indicadorChart15,
        #indicadorChart16,
        #indicadorChart17,
        #indicadorChart18,
        #indicadorChart19,
        #indicadorChart20,
        #indicadorChart21,
        #indicadorChart22,
        #indicadorChart23,
        #indicadorChart24,
        #indicadorChart25,
        #indicadorChart26,
        #indicadorChart27,
        #indicadorChart28,
        #indicadorChart29,
        #indicadorChart30,
        #indicadorChart31,
        #indicadorChart32,
        #indicadorChart33,
        #indicadorChart34,
        #indicadorChart35,
        #indicadorChart36,
        #indicadorChart37,
        #indicadorChart38,
        #indicadorChart39,
        #indicadorChart40,
        #indicadorChart41,
        #indicadorChart42,
        #indicadorChart43,
        #indicadorChart44,
        #indicadorChart45,
        #indicadorChart46,
        #indicadorChart47,
        #indicadorChart48,
        #indicadorChart49,
        #indicadorChart50,
        #indicadorChart51,
        #indicadorChart52,
        #indicadorChart53,
        #indicadorChart54,
        #indicadorChart55,
        #indicadorChart56,
        #indicadorChart57,
        #indicadorChart58,
        #indicadorChart59,
        #indicadorChart60 {
            max-width: 300px;
            /* Ancho máximo del canvas */
            max-height: 300px;
            /* Altura máxima del canvas */
        }

        .chart-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .chart-container canvas {
            max-width: 300px;
            max-height: 300px;
        }

        .percentage-list {
            margin-left: 20px;
        }
    </style>
</head>

<body>
    <h1>Gráficos de encuenta de habilidades </h1>
    <a href="{{ route('maestro.grupos') }}">← Volver a Mis Grupos</a>

    <div class="chart-container">
        <div>
            <h3>A.- ¿Sueles dejar para el último la preparación de tus trabajos?</h3>
            <button onclick="cambiarTipo('bar', 'indicador1')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador1')">Mostrar Pastel</button>
            <canvas id="indicadorChart1"></canvas>
        </div>
        <div class="percentage-list" id="percentageList1"></div>
    </div>

    <div class="chart-container">
        <div>
            <!-- Gráfico para el indicador 2 -->
            <h3>B.- ¿Crees que el sueño o el cansancio te impidan estudiar eficazmente en muchas ocasiones?</h3>
            <button onclick="cambiarTipo('bar', 'indicador2')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador2')">Mostrar Pastel</button>
            <canvas id="indicadorChart2"></canvas>
        </div>
        <div class="percentage-list" id="percentageList2"></div>
    </div>




    <div class="chart-container">
        <div>
            <!-- Gráfico para el indicador 3 -->
            <h3>C.- ¿Es frecuente que no termines tu tarea a tiempo?</h3>
            <button onclick="cambiarTipo('bar', 'indicador3')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador3')">Mostrar Pastel</button>
            <canvas id="indicadorChart3"></canvas>
        </div>
        <div class="percentage-list" id="percentageList3"></div>
    </div>


    <div class="chart-container">
        <div>
            <!-- Gráfico para el indicador 4 -->
            <h3>D.- ¿Tiendes a emplear tiempo en leer revistas, ver televisión o charlar cuando debieras estudiar?</h3>
            <button onclick="cambiarTipo('bar', 'indicado4')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador4')">Mostrar Pastel</button>
            <canvas id="indicadorChart4"></canvas>
        </div>
        <div class="percentage-list" id="percentageList4"></div>
    </div>



    <div class="chart-container">
        <div>
            <!-- Gráfico para el indicador 5 -->
            <h3>E.- ¿Tus actividades sociales o deportivas te llevan a descuidar tus tareas escolares?</h3>
            <button onclick="cambiarTipo('bar', 'indicador5')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador5')">Mostrar Pastel</button>
            <canvas id="indicadorChart5"></canvas>
        </div>
        <div class="percentage-list" id="percentageList5"></div>
    </div>



    <div class="chart-container">
        <div>
            <!-- Gráfico para el indicador 6 -->
            <h3>F.- ¿Sueles dejar pasar un día o más antes de repasar los apuntes tomados en clase?</h3>
            <button onclick="cambiarTipo('bar', 'indicador6')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador6')">Mostrar Pastel</button>
            <canvas id="indicadorChart6"></canvas>
        </div>
        <div class="percentage-list" id="percentageList6"></div>
    </div>



    <div class="chart-container">
        <div>
            <!-- Gráfico para el indicador 7 -->
            <h3>G.- ¿Sueles dedicar tu tiempo libre entre las 4:00 de la tarde y las 9:00 de la noche a otras
                actividades que no sean estudiar?</h3>
            <button onclick="cambiarTipo('bar', 'indicador7')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador7')">Mostrar Pastel</button>
            <canvas id="indicadorChart7"></canvas>
        </div>
        <div class="percentage-list" id="percentageList7"></div>
    </div>



    <div class="chart-container">
        <div>
            <!-- Gráfico para el indicador 8 -->
            <h3>H.- ¿Descubres algunas veces de pronto que debes entregar una tarea antes de lo que creías?</h3>
            <button onclick="cambiarTipo('bar', 'indicador8')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador8')">Mostrar Pastel</button>
            <canvas id="indicadorChart8"></canvas>
        </div>
        <div class="percentage-list" id="percentageList8"></div>
    </div>


    <div class="chart-container">
        <div>
            <!-- Gráfico para el indicador 9 -->
            <h3>I.- ¿Te retrasas con frecuencia en una asignatura debido a que tienes que estudiar otra?</h3>
            <button onclick="cambiarTipo('bar', 'indicador9')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador9')">Mostrar Pastel</button>
            <canvas id="indicadorChart9"></canvas>
        </div>
        <div class="percentage-list" id="percentageList9"></div>
    </div>


    <div class="chart-container">
        <div>
            <!-- Gráfico para el indicador 10 -->
            <h3>J.- ¿Te parece que tu rendimiento es muy bajo en relación con el tiempo que dedicas al estudio?</h3>
            <button onclick="cambiarTipo('bar', 'indicador10')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador10')">Mostrar Pastel</button>
            <canvas id="indicadorChart10"></canvas>
        </div>
        <div class="percentage-list" id="percentageList10"></div>
    </div>


    <div class="chart-container">
        <div>
            <!-- Gráfico para el indicador 11 -->
            <h3>K.- ¿Está situado tu escritorio directamente frente a una ventana, puerta u otra fuente de distracción?
            </h3>
            <button onclick="cambiarTipo('bar', 'indicador11')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador11')">Mostrar Pastel</button>
            <canvas id="indicadorChart11"></canvas>
        </div>
        <div class="percentage-list" id="percentageList11"></div>
    </div>



    <div class="chart-container">
        <div>
            <!-- Gráfico para el indicador 12 -->
            <h3>L.- ¿Sueles tener fotografías, trofeos o recuerdos sobre tu mesa de escritorio?</h3>
            <button onclick="cambiarTipo('bar', 'indicador12')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador12')">Mostrar Pastel</button>
            <canvas id="indicadorChart12"></canvas>
        </div>
        <div class="percentage-list" id="percentageList12"></div>
    </div>



    <div class="chart-container">
        <div>
            <!-- Gráfico para el indicador 13 -->
            <h3>M.- ¿Sueles estudiar recostado en la cama o arrellanado en un asiento cómodo?</h3>
            <button onclick="cambiarTipo('bar', 'indicador13')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador13')">Mostrar Pastel</button>
            <canvas id="indicadorChart13"></canvas>
        </div>
        <div class="percentage-list" id="percentageList13"></div>
    </div>


    <div class="chart-container">
        <div>
            <!-- Gráfico para el indicador 14 -->
            <h3>N.- ¿Produce resplandor la lámpara que utilizas al estudiar?</h3>
            <button onclick="cambiarTipo('bar', 'indicador14')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador14')">Mostrar Pastel</button>
            <canvas id="indicadorChart14"></canvas>
        </div>
        <div class="percentage-list" id="percentageList14"></div>
    </div>


    <!-- Contenedor del gráfico para el indicador 15 -->
    <div class="chart-container">
        <div>
            <h3>O.- Tu mesa de estudio, ¿está tan desordenada y llena de objetos que no dispones de sitio suficiente
                para estudiar con eficacia?</h3>
            <button onclick="cambiarTipo('bar', 'indicador15')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador15')">Mostrar Pastel</button>
            <canvas id="indicadorChart15"></canvas>
        </div>
        <div class="percentage-list" id="percentageList15"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 16 -->
    <div class="chart-container">
        <div>
            <h3>P.- ¿Sueles interrumpir tu estudio por personas que vienen a visitarte?</h3>
            <button onclick="cambiarTipo('bar', 'indicador16')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador16')">Mostrar Pastel</button>
            <canvas id="indicadorChart16"></canvas>
        </div>
        <div class="percentage-list" id="percentageList16"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 17 -->
    <div class="chart-container">
        <div>
            <h3>Q.- ¿Estudias con frecuencia mientras tienes puesta la televisión y/o la radio?</h3>
            <button onclick="cambiarTipo('bar', 'indicador17')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador17')">Mostrar Pastel</button>
            <canvas id="indicadorChart17"></canvas>
        </div>
        <div class="percentage-list" id="percentageList17"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 18 -->
    <div class="chart-container">
        <div>
            <h3>R.- En el lugar donde estudias, ¿se pueden ver con facilidad revistas, fotos de jóvenes o materiales
                pertenecientes a tu afición?</h3>
            <button onclick="cambiarTipo('bar', 'indicador18')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador18')">Mostrar Pastel</button>
            <canvas id="indicadorChart18"></canvas>
        </div>
        <div class="percentage-list" id="percentageList18"></div>
    </div>


    <!-- Contenedor del gráfico para el indicador 19 -->
    <div class="chart-container">
        <div>
            <h3>S.- ¿Con frecuencia interrumpen tu estudio actividades o ruidos que provienen del exterior?</h3>
            <button onclick="cambiarTipo('bar', 'indicador19')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador19')">Mostrar Pastel</button>
            <canvas id="indicadorChart19"></canvas>
        </div>
        <div class="percentage-list" id="percentageList19"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 20 -->
    <div class="chart-container">
        <div>
            <h3>T.- ¿Suele hacerse lento tu estudio debido a que no tienes a la mano los libros y los materiales
                necesarios?</h3>
            <button onclick="cambiarTipo('bar', 'indicador20')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador20')">Mostrar Pastel</button>
            <canvas id="indicadorChart20"></canvas>
        </div>
        <div class="percentage-list" id="percentageList20"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 21 -->
    <div class="chart-container">
        <div>
            <h3>A.- ¿Tiendes a comenzar la lectura de un libro de texto sin hojear previamente los subtítulos y las
                ilustraciones?</h3>
            <button onclick="cambiarTipo('bar', 'indicador21')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador21')">Mostrar Pastel</button>
            <canvas id="indicadorChart21"></canvas>
        </div>
        <div class="percentage-list" id="percentageList21"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 22 -->
    <div class="chart-container">
        <div>
            <h3>B.- ¿Te saltas por lo general las figuras, gráficas y tablas cuando estudias un tema?</h3>
            <button onclick="cambiarTipo('bar', 'indicador22')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador22')">Mostrar Pastel</button>
            <canvas id="indicadorChart22"></canvas>
        </div>
        <div class="percentage-list" id="percentageList22"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 23 -->
    <div class="chart-container">
        <div>
            <h3>C.- ¿Suelo serte difícil seleccionar los puntos de los temas de estudio?</h3>
            <button onclick="cambiarTipo('bar', 'indicador23')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador23')">Mostrar Pastel</button>
            <canvas id="indicadorChart23"></canvas>
        </div>
        <div class="percentage-list" id="percentageList23"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 24 -->
    <div class="chart-container">
        <div>
            <h3>D.- ¿Te sorprendes con cierta frecuencia, pensando en algo que no tiene nada que ver con lo que
                estudias?</h3>
            <button onclick="cambiarTipo('bar', 'indicador24')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador24')">Mostrar Pastel</button>
            <canvas id="indicadorChart24"></canvas>
        </div>
        <div class="percentage-list" id="percentageList24"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 25 -->
    <div class="chart-container">
        <div>
            <h3>E.- ¿Sueles tener dificultad en entender tus apuntes de clase cuando tratas de repasarlos, después de
                cierto tiempo?</h3>
            <button onclick="cambiarTipo('bar', 'indicador25')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador25')">Mostrar Pastel</button>
            <canvas id="indicadorChart25"></canvas>
        </div>
        <div class="percentage-list" id="percentageList25"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 26 -->
    <div class="chart-container">
        <div>
            <h3>F.- Al tomar notas, ¿te sueles quedar atrás con frecuencia debido a que no puedes escribir con
                suficiente rapidez?</h3>
            <button onclick="cambiarTipo('bar', 'indicador26')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador26')">Mostrar Pastel</button>
            <canvas id="indicadorChart26"></canvas>
        </div>
        <div class="percentage-list" id="percentageList26"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 27 -->
    <div class="chart-container">
        <div>
            <h3>G.- Poco después de comenzar un curso, ¿sueles encontrarte con tus apuntes formando un “revoltijo"?</h3>
            <button onclick="cambiarTipo('bar', 'indicador27')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador27')">Mostrar Pastel</button>
            <canvas id="indicadorChart27"></canvas>
        </div>
        <div class="percentage-list" id="percentageList27"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 28 -->
    <div class="chart-container">
        <div>
            <h3>H.- ¿Tomas normalmente tus apuntes tratando de escribir las palabras exactas del docente?</h3>
            <button onclick="cambiarTipo('bar', 'indicador28')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador28')">Mostrar Pastel</button>
            <canvas id="indicadorChart28"></canvas>
        </div>
        <div class="percentage-list" id="percentageList28"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 29 -->
    <div class="chart-container">
        <div>
            <h3>I.- Cuando tomas notas de un libro, ¿tienes la costumbre de copiar el material necesario, palabra por
                Palabra?</h3>
            <button onclick="cambiarTipo('bar', 'indicador29')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador29')">Mostrar Pastel</button>
            <canvas id="indicadorChart29"></canvas>
        </div>
        <div class="percentage-list" id="percentageList29"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 30 -->
    <div class="chart-container">
        <div>
            <h3>J.- ¿Te es difícil preparar un temario apropiado para una evaluación?</h3>
            <button onclick="cambiarTipo('bar', 'indicador30')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador30')">Mostrar Pastel</button>
            <canvas id="indicadorChart30"></canvas>
        </div>
        <div class="percentage-list" id="percentageList30"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 31 -->
    <div class="chart-container">
        <div>
            <h3>K.- ¿Tienes problemas para organizar los datos o el contenido de una evaluación?</h3>
            <button onclick="cambiarTipo('bar', 'indicador31')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador31')">Mostrar Pastel</button>
            <canvas id="indicadorChart31"></canvas>
        </div>
        <div class="percentage-list" id="percentageList31"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 32 -->
    <div class="chart-container">
        <div>
            <h3>L.- ¿Al repasar el temario de una evaluación formulas un resumen de este?</h3>
            <button onclick="cambiarTipo('bar', 'indicador32')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador32')">Mostrar Pastel</button>
            <canvas id="indicadorChart32"></canvas>
        </div>
        <div class="percentage-list" id="percentageList32"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 33 -->
    <div class="chart-container">
        <div>
            <h3>M.- ¿Te preparas a veces para una evaluación memorizando fórmulas, definiciones o reglas que no
                entiendes con claridad?</h3>
            <button onclick="cambiarTipo('bar', 'indicador33')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador33')">Mostrar Pastel</button>
            <canvas id="indicadorChart33"></canvas>
        </div>
        <div class="percentage-list" id="percentageList33"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 34 -->
    <div class="chart-container">
        <div>
            <h3>N.- ¿Te resulta difícil decidir qué estudiar y cómo estudiarlo cuando preparas una evaluación?</h3>
            <button onclick="cambiarTipo('bar', 'indicador34')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador34')">Mostrar Pastel</button>
            <canvas id="indicadorChart34"></canvas>
        </div>
        <div class="percentage-list" id="percentageList34"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 35 -->
    <div class="chart-container">
        <div>
            <h3>O.- ¿Sueles tener dificultades para organizar, en un orden lógico, las asignaturas que debes estudiar
                por temas?</h3>
            <button onclick="cambiarTipo('bar', 'indicador35')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador35')">Mostrar Pastel</button>
            <canvas id="indicadorChart35"></canvas>
        </div>
        <div class="percentage-list" id="percentageList35"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 36 -->
    <div class="chart-container">
        <div>
            <h3>P.- Al preparar evaluación, ¿sueles estudiar toda la asignatura, en el último momento?</h3>
            <button onclick="cambiarTipo('bar', 'indicador36')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador36')">Mostrar Pastel</button>
            <canvas id="indicadorChart36"></canvas>
        </div>
        <div class="percentage-list" id="percentageList36"></div>
    </div>
    <!-- Contenedor del gráfico para el indicador 37 -->
    <div class="chart-container">
        <div>
            <h3>Q.- ¿Sueles entregar tus exámenes sin revisarlos detenidamente, para ver si tienen algún error cometido
                por descuido?</h3>
            <button onclick="cambiarTipo('bar', 'indicador37')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador37)">Mostrar Pastel</button>
            <canvas id="indicadorChart37"></canvas>
        </div>
        <div class="percentage-list" id="percentageList37"></div>
    </div>


    <!-- Contenedor del gráfico para el indicador 38 -->
    <div class="chart-container">
        <div>
            <h3>R.- ¿Te es posible con frecuencia terminar una evaluación de exposición de un tema en el tiempo
                prescrito?</h3>
            <button onclick="cambiarTipo('bar', 'indicador38')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador38')">Mostrar Pastel</button>
            <canvas id="indicadorChart38"></canvas>
        </div>
        <div class="percentage-list" id="percentageList38"></div>
    </div>


    <!-- Contenedor del gráfico para el indicador 39 -->
    <div class="chart-container">
        <div>
            <h3>S.- ¿Sueles perder puntos en exámenes con preguntas de “Verdadero - Falso", debido a que no lees
                detenidamente?</h3>
            <button onclick="cambiarTipo('bar', 'indicador39')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador39')">Mostrar Pastel</button>
            <canvas id="indicadorChart39"></canvas>
        </div>
        <div class="percentage-list" id="percentageList39"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 40 -->
    <div class="chart-container">
        <div>
            <h3>T.- ¿Empleas normalmente mucho tiempo en contestar la primera mitad de la prueba y tienes que
                apresurarte en la segunda? </h3>
            <button onclick="cambiarTipo('bar', 'indicador40')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador40')">Mostrar Pastel</button>
            <canvas id="indicadorChart40"></canvas>
        </div>
        <div class="percentage-list" id="percentageList40"></div>
    </div>

    <!-- los otros 20 que faltaban -->

    <div class="chart-container">
        <div>
            <h3>A.- Después de los primeros días o semanas del curso, ¿tiendes a perder interés por el estudio?</h3>
            <button onclick="cambiarTipo('bar', 'indicador41')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador41')">Mostrar Pastel</button>
            <canvas id="indicadorChart41"></canvas>
        </div>
        <div class="percentage-list" id="percentageList41"></div>
    </div>

    <div class="chart-container">
        <div>
            <h3>B.- ¿Crees que en general, basta estudiar lo necesario para obtener un "aprobado” en las asignaturas?</h3>
            <button onclick="cambiarTipo('bar', 'indicador42')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador42')">Mostrar Pastel</button>
            <canvas id="indicadorChart42"></canvas>
        </div>
        <div class="percentage-list" id="percentageList42"></div>
    </div>

    <div class="chart-container">
        <div>
            <h3>C.- ¿Te sientes frecuentemente confuso o indeciso sobre cuáles deben ser tus metas formativas y profesionales?</h3>
            <button onclick="cambiarTipo('bar', 'indicador43')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador43')">Mostrar Pastel</button>
            <canvas id="indicadorChart43"></canvas>
        </div>
        <div class="percentage-list" id="percentageList43"></div>
    </div>
    <div class="chart-container">
        <div>
            <h3>D.- ¿Sueles pensar que no vale la pena el tiempo y el esfuerzo que son necesarios para lograr una educación universitaria?</h3>
            <button onclick="cambiarTipo('bar', 'indicador44')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador44')">Mostrar Pastel</button>
            <canvas id="indicadorChart44"></canvas>
        </div>
        <div class="percentage-list" id="percentageList44"></div>
    </div>
    <div class="chart-container">
        <div>
            <h3>E.- ¿Crees que es más importante divertirte y disfrutar de la vida, que estudiar?</h3>
            <button onclick="cambiarTipo('bar', 'indicador45')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador45')">Mostrar Pastel</button>
            <canvas id="indicadorChart45"></canvas>
        </div>
        <div class="percentage-list" id="percentageList45"></div>
    </div>
    <div class="chart-container">
        <div>
            <h3>F.- ¿Sueles pasar el tiempo de clase en divagaciones o soñando despierto en lugar de atender al docente?</h3>
            <button onclick="cambiarTipo('bar', 'indicador46')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador46')">Mostrar Pastel</button>
            <canvas id="indicadorChart46"></canvas>
        </div>
        <div class="percentage-list" id="percentageList46"></div>
    </div>
    <div class="chart-container">
        <div>
            <h3>G.- ¿Te sientes habitualmente incapaz de concentrarte en tus estudios debido a que estas inquieto, aburrido o de mal humor?</h3>
            <button onclick="cambiarTipo('bar', 'indicador47')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador47')">Mostrar Pastel</button>
            <canvas id="indicadorChart47"></canvas>
        </div>
        <div class="percentage-list" id="percentageList47"></div>
    </div>
    <div class="chart-container">
        <div>
            <h3>H.- ¿Piensas con frecuencia que las asignaturas que estudias tienen poco valor practico para ti?</h3>
            <button onclick="cambiarTipo('bar', 'indicador48')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador48')">Mostrar Pastel</button>
            <canvas id="indicadorChart48"></canvas>
        </div>
        <div class="percentage-list" id="percentageList48"></div>
    </div>
    <div class="chart-container">
        <div>
            <h3>I.- ¿Sientes, frecuentes deseos de abandonar la escuela y conseguir un trabajo?</h3>
            <button onclick="cambiarTipo('bar', 'indicador49')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador49')">Mostrar Pastel</button>
            <canvas id="indicadorChart49"></canvas>
        </div>
        <div class="percentage-list" id="percentageList49"></div>
    </div>
    <div class="chart-container">
        <div>
            <h3>J.- ¿Sueles tener la sensación de lo que se enseña en los centros docentes no te prepara para afrontar los problemas de la vida adulta?</h3>
            <button onclick="cambiarTipo('bar', 'indicador50')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador50')">Mostrar Pastel</button>
            <canvas id="indicadorChart50"></canvas>
        </div>
        <div class="percentage-list" id="percentageList50"></div>
    </div>
    <div class="chart-container">
        <div>
            <h3>K.- ¿Sueles dedicarte de modo casual, según el estado de ánimo en que te encuentres?</h3>
            <button onclick="cambiarTipo('bar', 'indicador51')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador51')">Mostrar Pastel</button>
            <canvas id="indicadorChart51"></canvas>
        </div>
        <div class="percentage-list" id="percentageList51"></div>
    </div>
    <div class="chart-container">
        <div>
            <h3>L.- ¿Te horroriza estudiar libros de textos porque son insípidos y aburridos?</h3>
            <button onclick="cambiarTipo('bar', 'indicador52')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador52')">Mostrar Pastel</button>
            <canvas id="indicadorChart52"></canvas>
        </div>
        <div class="percentage-list" id="percentageList52"></div>
    </div>
    <div class="chart-container">
        <div>
            <h3>M.- ¿Esperas normalmente a que te fijen la fecha de una evaluación para comenzar a estudiar los textos o repasar tus apuntes de clases?</h3>
            <button onclick="cambiarTipo('bar', 'indicador53')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador53')">Mostrar Pastel</button>
            <canvas id="indicadorChart53"></canvas>
        </div>
        <div class="percentage-list" id="percentageList53"></div>
    </div>
    <div class="chart-container">
        <div>
            <h3>N - ¿Sueles pensar que los exámenes son pruebas penosas de las que no se puede escapar y respecto a las cuales lo que debe hacerse es sobrevivir, del modo que sea?</h3>
            <button onclick="cambiarTipo('bar', 'indicador54')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador54')">Mostrar Pastel</button>
            <canvas id="indicadorChart54"></canvas>
        </div>
        <div class="percentage-list" id="percentageList54"></div>
    </div>
    <div class="chart-container">
        <div>
            <h3>O.- ¿Sientes con frecuencia que tus docentes no comprenden las necesidades de los estudiantes?</h3>
            <button onclick="cambiarTipo('bar', 'indicador55')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador55')">Mostrar Pastel</button>
            <canvas id="indicadorChart55"></canvas>
        </div>
        <div class="percentage-list" id="percentageList55"></div>
    </div>
    <div class="chart-container">
        <div>
            <h3>P.- ¿Tienes normalmente la sensación de que tus docentes exigen demasiadas horas de estudio fuera de clase?</h3>
            <button onclick="cambiarTipo('bar', 'indicador56')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador56')">Mostrar Pastel</button>
            <canvas id="indicadorChart56"></canvas>
        </div>
        <div class="percentage-list" id="percentageList56"></div>
    </div>
    <div class="chart-container">
        <div>
            <h3>Q.- ¿Dudas por lo general, en pedir ayuda a tus docentes en tareas que te son difíciles?</h3>
            <button onclick="cambiarTipo('bar', 'indicador57')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador57')">Mostrar Pastel</button>
            <canvas id="indicadorChart57"></canvas>
        </div>
        <div class="percentage-list" id="percentageList57"></div>
    </div>
    <div class="chart-container">
        <div>
            <h3>R.- ¿Sueles pensar que tus docentes no tienen contacto con los temas y sucesos de actualidad?</h3>
            <button onclick="cambiarTipo('bar', 'indicador58')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador58')">Mostrar Pastel</button>
            <canvas id="indicadorChart58"></canvas>
        </div>
        <div class="percentage-list" id="percentageList58"></div>
    </div>
    <div class="chart-container">
        <div>
            <h3>S.- ¿Te sientes reacio, por lo general, a hablar con tus docentes de tus proyectos futuros, de estudio o profesionales?</h3>
            <button onclick="cambiarTipo('bar', 'indicador59')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador59')">Mostrar Pastel</button>
            <canvas id="indicadorChart59"></canvas>
        </div>
        <div class="percentage-list" id="percentageList59"></div>
    </div>
    <div class="chart-container">
        <div>
            <h3>T.- ¿Criticas con frecuencia a tus docentes cuando charlas con tus compañeros?</h3>
            <button onclick="cambiarTipo('bar', 'indicador60')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador60')">Mostrar Pastel</button>
            <canvas id="indicadorChart60"></canvas>
        </div>
        <div class="percentage-list" id="percentageList60"></div>
    </div>

    <button onclick="generatePDF()">Generar PDF</button>
    <script>
        var ctx1 = document.getElementById('indicadorChart1').getContext('2d');
        var ctx2 = document.getElementById('indicadorChart2').getContext('2d');
        var ctx3 = document.getElementById('indicadorChart3').getContext('2d');
        var ctx4 = document.getElementById('indicadorChart4').getContext('2d');
        var ctx5 = document.getElementById('indicadorChart5').getContext('2d');
        var ctx6 = document.getElementById('indicadorChart6').getContext('2d');
        var ctx7 = document.getElementById('indicadorChart7').getContext('2d');
        var ctx8 = document.getElementById('indicadorChart8').getContext('2d');
        var ctx9 = document.getElementById('indicadorChart9').getContext('2d');
        var ctx10 = document.getElementById('indicadorChart10').getContext('2d');
        var ctx11 = document.getElementById('indicadorChart11').getContext('2d');
        var ctx12 = document.getElementById('indicadorChart12').getContext('2d');
        var ctx13 = document.getElementById('indicadorChart13').getContext('2d');
        var ctx14 = document.getElementById('indicadorChart14').getContext('2d');

        var ctx15 = document.getElementById('indicadorChart15').getContext('2d');
        var ctx16 = document.getElementById('indicadorChart16').getContext('2d');
        var ctx17 = document.getElementById('indicadorChart17').getContext('2d');
        var ctx18 = document.getElementById('indicadorChart18').getContext('2d');
        var ctx19 = document.getElementById('indicadorChart19').getContext('2d');
        var ctx20 = document.getElementById('indicadorChart20').getContext('2d');
        var ctx21 = document.getElementById('indicadorChart21').getContext('2d');
        var ctx22 = document.getElementById('indicadorChart22').getContext('2d');
        var ctx23 = document.getElementById('indicadorChart23').getContext('2d');
        var ctx24 = document.getElementById('indicadorChart24').getContext('2d');
        var ctx25 = document.getElementById('indicadorChart25').getContext('2d');
        var ctx26 = document.getElementById('indicadorChart26').getContext('2d');
        var ctx27 = document.getElementById('indicadorChart27').getContext('2d');
        var ctx28 = document.getElementById('indicadorChart28').getContext('2d');

        var ctx29 = document.getElementById('indicadorChart29').getContext('2d');
        var ctx30 = document.getElementById('indicadorChart30').getContext('2d');
        var ctx31 = document.getElementById('indicadorChart31').getContext('2d');
        var ctx32 = document.getElementById('indicadorChart32').getContext('2d');
        var ctx33 = document.getElementById('indicadorChart33').getContext('2d');
        var ctx34 = document.getElementById('indicadorChart34').getContext('2d');
        var ctx35 = document.getElementById('indicadorChart35').getContext('2d');
        var ctx36 = document.getElementById('indicadorChart36').getContext('2d');
        var ctx37 = document.getElementById('indicadorChart37').getContext('2d');
        var ctx38 = document.getElementById('indicadorChart38').getContext('2d');
        var ctx39 = document.getElementById('indicadorChart39').getContext('2d');
        var ctx40 = document.getElementById('indicadorChart40').getContext('2d');



        var ctx41 = document.getElementById('indicadorChart41').getContext('2d');
        var ctx42 = document.getElementById('indicadorChart42').getContext('2d');
        var ctx43 = document.getElementById('indicadorChart43').getContext('2d');
        var ctx44 = document.getElementById('indicadorChart44').getContext('2d');
        var ctx45 = document.getElementById('indicadorChart45').getContext('2d');
        var ctx46 = document.getElementById('indicadorChart46').getContext('2d');
        var ctx47 = document.getElementById('indicadorChart47').getContext('2d');
        var ctx48 = document.getElementById('indicadorChart48').getContext('2d');

        var ctx49 = document.getElementById('indicadorChart49').getContext('2d');
        var ctx50 = document.getElementById('indicadorChart50').getContext('2d');
        var ctx51 = document.getElementById('indicadorChart51').getContext('2d');
        var ctx52 = document.getElementById('indicadorChart52').getContext('2d');
        var ctx53 = document.getElementById('indicadorChart53').getContext('2d');
        var ctx54 = document.getElementById('indicadorChart54').getContext('2d');
        var ctx55 = document.getElementById('indicadorChart55').getContext('2d');
        var ctx56 = document.getElementById('indicadorChart56').getContext('2d');
        var ctx57 = document.getElementById('indicadorChart57').getContext('2d');
        var ctx58 = document.getElementById('indicadorChart58').getContext('2d');
        var ctx59 = document.getElementById('indicadorChart59').getContext('2d');
        var ctx60 = document.getElementById('indicadorChart60').getContext('2d');


        var data1 = @json($data->pluck('total'));
        var labels1 = @json($data->pluck('pregunta_1_organizacion'));
        var total1 = data1.reduce((acc, val) => acc + val, 0);

        var data2 = @json($data_1->pluck('total'));
        var labels2 = @json($data_1->pluck('pregunta_2_organizacion'));
        var total2 = data2.reduce((acc, val) => acc + val, 0);

        var data3 = @json($data_2->pluck('total'));
        var labels3 = @json($data_2->pluck('pregunta_3_organizacion'));
        var total3 = data3.reduce((acc, val) => acc + val, 0);

        var data4 = @json($data_3->pluck('total'));
        var labels4 = @json($data_3->pluck('pregunta_4_organizacion'));
        var total4 = data4.reduce((acc, val) => acc + val, 0);

        var data5 = @json($data_4->pluck('total'));
        var labels5 = @json($data_4->pluck('pregunta_5_organizacion'));
        var total5 = data5.reduce((acc, val) => acc + val, 0);


        var data6 = @json($data_5->pluck('total'));
        var labels6 = @json($data_5->pluck('pregunta_6_organizacion'));
        var total6 = data6.reduce((acc, val) => acc + val, 0);

        var data7 = @json($data_6->pluck('total'));
        var labels7 = @json($data_6->pluck('pregunta_7_organizacion'));
        var total7 = data7.reduce((acc, val) => acc + val, 0);

        var data8 = @json($data_7->pluck('total'));
        var labels8 = @json($data_7->pluck('pregunta_8_organizacion'));
        var total8 = data8.reduce((acc, val) => acc + val, 0);

        var data9 = @json($data_8->pluck('total'));
        var labels9 = @json($data_8->pluck('pregunta_9_organizacion'));
        var total9 = data9.reduce((acc, val) => acc + val, 0);

        var data10 = @json($data_9->pluck('total'));
        var labels10 = @json($data_9->pluck('pregunta_10_organizacion'));
        var total10 = data10.reduce((acc, val) => acc + val, 0);

        var data11 = @json($data_10->pluck('total'));
        var labels11 = @json($data_10->pluck('pregunta_11_organizacion'));
        var total11 = data11.reduce((acc, val) => acc + val, 0);

        var data12 = @json($data_11->pluck('total'));
        var labels12 = @json($data_11->pluck('pregunta_12_organizacion'));
        var total12 = data12.reduce((acc, val) => acc + val, 0);

        var data13 = @json($data_12->pluck('total'));
        var labels13 = @json($data_12->pluck('pregunta_13_organizacion'));
        var total13 = data13.reduce((acc, val) => acc + val, 0);

        var data14 = @json($data_13->pluck('total'));
        var labels14 = @json($data_13->pluck('pregunta_14_organizacion'));
        var total14 = data14.reduce((acc, val) => acc + val, 0);


        var data15 = @json($data_14->pluck('total'));
        var labels15 = @json($data_14->pluck('pregunta_15_organizacion'));
        var total15 = data15.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 16
        var data16 = @json($data_15->pluck('total'));
        var labels16 = @json($data_15->pluck('pregunta_16_organizacion'));
        var total16 = data16.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 17
        var data17 = @json($data_16->pluck('total'));
        var labels17 = @json($data_16->pluck('pregunta_17_organizacion'));
        var total17 = data17.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 18
        var data18 = @json($data_17->pluck('total'));
        var labels18 = @json($data_17->pluck('pregunta_18_organizacion'));
        var total18 = data18.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 19
        var data19 = @json($data_18->pluck('total'));
        var labels19 = @json($data_18->pluck('pregunta_19_organizacion'));
        var total19 = data19.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 20
        var data20 = @json($data_19->pluck('total'));
        var labels20 = @json($data_19->pluck('pregunta_20_organizacion'));
        var total20 = data20.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 21
        var data21 = @json($data_20->pluck('total'));
        var labels21 = @json($data_20->pluck('pregunta_1_tecnica'));
        var total21 = data21.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 22
        var data22 = @json($data_21->pluck('total'));
        var labels22 = @json($data_21->pluck('pregunta_2_tecnica'));
        var total22 = data22.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 23
        var data23 = @json($data_22->pluck('total'));
        var labels23 = @json($data_22->pluck('pregunta_3_tecnica'));
        var total23 = data23.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 24
        var data24 = @json($data_23->pluck('total'));
        var labels24 = @json($data_23->pluck('pregunta_4_tecnica'));
        var total24 = data24.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 25
        var data25 = @json($data_24->pluck('total'));
        var labels25 = @json($data_24->pluck('pregunta_5_tecnica'));
        var total25 = data25.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 26
        var data26 = @json($data_25->pluck('total'));
        var labels26 = @json($data_25->pluck('pregunta_6_tecnica'));
        var total26 = data26.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 27
        var data27 = @json($data_26->pluck('total'));
        var labels27 = @json($data_26->pluck('pregunta_7_tecnica'));
        var total27 = data27.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 28
        var data28 = @json($data_27->pluck('total'));
        var labels28 = @json($data_27->pluck('pregunta_8_tecnica'));
        var total28 = data28.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 29
        var data29 = @json($data_28->pluck('total'));
        var labels29 = @json($data_28->pluck('pregunta_9_tecnica'));
        var total29 = data29.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 30
        var data30 = @json($data_29->pluck('total'));
        var labels30 = @json($data_29->pluck('pregunta_10_tecnica'));
        var total30 = data30.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 31
        var data31 = @json($data_30->pluck('total'));
        var labels31 = @json($data_30->pluck('pregunta_11_tecnica'));
        var total31 = data31.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 32
        var data32 = @json($data_31->pluck('total'));
        var labels32 = @json($data_31->pluck('pregunta_12_tecnica'));
        var total32 = data32.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 33
        var data33 = @json($data_32->pluck('total'));
        var labels33 = @json($data_32->pluck('pregunta_13_tecnica'));
        var total33 = data33.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 34
        var data34 = @json($data_33->pluck('total'));
        var labels34 = @json($data_33->pluck('pregunta_14_tecnica'));
        var total34 = data34.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 35
        var data35 = @json($data_34->pluck('total'));
        var labels35 = @json($data_34->pluck('pregunta_15_tecnica'));
        var total35 = data35.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 36
        var data36 = @json($data_35->pluck('total'));
        var labels36 = @json($data_35->pluck('pregunta_16_tecnica'));
        var total36 = data36.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 37
        var data37 = @json($data_36->pluck('total'));
        var labels37 = @json($data_36->pluck('pregunta_17_tecnica'));
        var total37 = data37.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 38
        var data38 = @json($data_37->pluck('total'));
        var labels38 = @json($data_37->pluck('pregunta_18_tecnica'));
        var total38 = data38.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 39
        var data39 = @json($data_38->pluck('total'));
        var labels39 = @json($data_38->pluck('pregunta_19_tecnica'));
        var total39 = data39.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 40
        var data40 = @json($data_39->pluck('total'));
        var labels40 = @json($data_39->pluck('pregunta_20_tecnica'));
        var total40 = data40.reduce((acc, val) => acc + val, 0);

        //las otras 20 que hacian falta
        // Variables para el indicador 41 al 60
        var data41 = @json($data_40->pluck('total'));
        var labels41 = @json($data_40->pluck('pregunta_1_motivacion'));
        var total41 = data41.reduce((acc, val) => acc + val, 0);

        var data42 = @json($data_41->pluck('total'));
        var labels42 = @json($data_41->pluck('pregunta_2_motivacion'));
        var total42 = data42.reduce((acc, val) => acc + val, 0);

        var data43 = @json($data_42->pluck('total'));
        var labels43 = @json($data_42->pluck('pregunta_3_motivacion'));
        var total43 = data43.reduce((acc, val) => acc + val, 0);

        var data44 = @json($data_43->pluck('total'));
        var labels44 = @json($data_43->pluck('pregunta_4_motivacion'));
        var total44 = data44.reduce((acc, val) => acc + val, 0);

        var data45 = @json($data_44->pluck('total'));
        var labels45 = @json($data_44->pluck('pregunta_5_motivacion'));
        var total45 = data45.reduce((acc, val) => acc + val, 0);

        var data46 = @json($data_45->pluck('total'));
        var labels46 = @json($data_45->pluck('pregunta_6_motivacion'));
        var total46 = data46.reduce((acc, val) => acc + val, 0);

        var data47 = @json($data_46->pluck('total'));
        var labels47 = @json($data_46->pluck('pregunta_7_motivacion'));
        var total47 = data47.reduce((acc, val) => acc + val, 0);

        var data48 = @json($data_47->pluck('total'));
        var labels48 = @json($data_47->pluck('pregunta_8_motivacion'));
        var total48 = data48.reduce((acc, val) => acc + val, 0);

        var data49 = @json($data_48->pluck('total'));
        var labels49 = @json($data_48->pluck('pregunta_9_motivacion'));
        var total49 = data49.reduce((acc, val) => acc + val, 0);

        var data50 = @json($data_49->pluck('total'));
        var labels50 = @json($data_49->pluck('pregunta_10_motivacion'));
        var total50 = data50.reduce((acc, val) => acc + val, 0);

        var data51 = @json($data_50->pluck('total'));
        var labels51 = @json($data_50->pluck('pregunta_11_motivacion'));
        var total51 = data51.reduce((acc, val) => acc + val, 0);

        var data52 = @json($data_51->pluck('total'));
        var labels52 = @json($data_51->pluck('pregunta_12_motivacion'));
        var total52 = data52.reduce((acc, val) => acc + val, 0);

        var data53 = @json($data_52->pluck('total'));
        var labels53 = @json($data_52->pluck('pregunta_13_motivacion'));
        var total53 = data53.reduce((acc, val) => acc + val, 0);

        var data54 = @json($data_53->pluck('total'));
        var labels54 = @json($data_53->pluck('pregunta_14_motivacion'));
        var total54 = data54.reduce((acc, val) => acc + val, 0);

        var data55 = @json($data_54->pluck('total'));
        var labels55 = @json($data_54->pluck('pregunta_15_motivacion'));
        var total55 = data55.reduce((acc, val) => acc + val, 0);

        var data56 = @json($data_55->pluck('total'));
        var labels56 = @json($data_55->pluck('pregunta_16_motivacion'));
        var total56 = data56.reduce((acc, val) => acc + val, 0);

        var data57 = @json($data_56->pluck('total'));
        var labels57 = @json($data_56->pluck('pregunta_17_motivacion'));
        var total57 = data57.reduce((acc, val) => acc + val, 0);

        var data58 = @json($data_57->pluck('total'));
        var labels58 = @json($data_57->pluck('pregunta_18_motivacion'));
        var total58 = data58.reduce((acc, val) => acc + val, 0);

        var data59 = @json($data_58->pluck('total'));
        var labels59 = @json($data_58->pluck('pregunta_19_motivacion'));
        var total59 = data59.reduce((acc, val) => acc + val, 0);

        var data60 = @json($data_59->pluck('total'));
        var labels60 = @json($data_59->pluck('pregunta_20_motivacion'));
        var total60 = data60.reduce((acc, val) => acc + val, 0);


        // Función para calcular y mostrar porcentajes junto a la gráfica
        function mostrarPorcentajes(data, labels, total, elementId) {
            var percentageHTML = '';
            for (var i = 0; i < data.length; i++) {
                var percentage = ((data[i] / total) * 100).toFixed(2);
                percentageHTML += `<p>${labels[i]}: ${data[i]} estudiantes (${percentage}%)</p>`;
            }
            document.getElementById(elementId).innerHTML = percentageHTML;
        }

        // Mostrar porcentajes inicialmente
        mostrarPorcentajes(data1, labels1, total1, 'percentageList1');
        mostrarPorcentajes(data2, labels2, total2, 'percentageList2');
        mostrarPorcentajes(data3, labels3, total3, 'percentageList3');
        mostrarPorcentajes(data4, labels4, total4, 'percentageList4');
        mostrarPorcentajes(data5, labels5, total5, 'percentageList5');
        mostrarPorcentajes(data6, labels6, total6, 'percentageList6');
        mostrarPorcentajes(data7, labels7, total7, 'percentageList7');
        mostrarPorcentajes(data8, labels8, total8, 'percentageList8');
        mostrarPorcentajes(data9, labels9, total9, 'percentageList9');
        mostrarPorcentajes(data10, labels10, total10, 'percentageList10');
        mostrarPorcentajes(data11, labels11, total11, 'percentageList11');
        mostrarPorcentajes(data12, labels12, total12, 'percentageList12');
        mostrarPorcentajes(data13, labels13, total13, 'percentageList13');
        mostrarPorcentajes(data14, labels14, total14, 'percentageList14');
        mostrarPorcentajes(data15, labels15, total15, 'percentageList15');
        mostrarPorcentajes(data16, labels16, total16, 'percentageList16');
        mostrarPorcentajes(data17, labels17, total17, 'percentageList17');
        mostrarPorcentajes(data18, labels18, total18, 'percentageList18');
        mostrarPorcentajes(data19, labels19, total19, 'percentageList19');
        mostrarPorcentajes(data20, labels20, total20, 'percentageList20');
        mostrarPorcentajes(data21, labels21, total21, 'percentageList21');
        mostrarPorcentajes(data22, labels22, total22, 'percentageList22');
        mostrarPorcentajes(data23, labels23, total23, 'percentageList23');
        mostrarPorcentajes(data24, labels24, total24, 'percentageList24');
        mostrarPorcentajes(data25, labels25, total25, 'percentageList25');
        mostrarPorcentajes(data26, labels26, total26, 'percentageList26');
        mostrarPorcentajes(data27, labels27, total27, 'percentageList27');
        mostrarPorcentajes(data28, labels28, total28, 'percentageList28');
        mostrarPorcentajes(data29, labels29, total29, 'percentageList29');
        mostrarPorcentajes(data30, labels30, total30, 'percentageList30');
        mostrarPorcentajes(data31, labels31, total31, 'percentageList31');
        mostrarPorcentajes(data32, labels32, total32, 'percentageList32');
        mostrarPorcentajes(data33, labels33, total33, 'percentageList33');
        mostrarPorcentajes(data34, labels34, total34, 'percentageList34');
        mostrarPorcentajes(data35, labels35, total35, 'percentageList35');
        mostrarPorcentajes(data36, labels36, total36, 'percentageList36');
        mostrarPorcentajes(data37, labels37, total37, 'percentageList37');
        mostrarPorcentajes(data38, labels38, total38, 'percentageList38');
        mostrarPorcentajes(data39, labels39, total39, 'percentageList39');
        mostrarPorcentajes(data40, labels40, total40, 'percentageList40');
        // Llamadas a mostrarPorcentajes para los indicadores 41 al 60
        mostrarPorcentajes(data41, labels41, total41, 'percentageList41');
        mostrarPorcentajes(data42, labels42, total42, 'percentageList42');
        mostrarPorcentajes(data43, labels43, total43, 'percentageList43');
        mostrarPorcentajes(data44, labels44, total44, 'percentageList44');
        mostrarPorcentajes(data45, labels45, total45, 'percentageList45');
        mostrarPorcentajes(data46, labels46, total46, 'percentageList46');
        mostrarPorcentajes(data47, labels47, total47, 'percentageList47');
        mostrarPorcentajes(data48, labels48, total48, 'percentageList48');
        mostrarPorcentajes(data49, labels49, total49, 'percentageList49');
        mostrarPorcentajes(data50, labels50, total50, 'percentageList50');
        mostrarPorcentajes(data51, labels51, total51, 'percentageList51');
        mostrarPorcentajes(data52, labels52, total52, 'percentageList52');
        mostrarPorcentajes(data53, labels53, total53, 'percentageList53');
        mostrarPorcentajes(data54, labels54, total54, 'percentageList54');
        mostrarPorcentajes(data55, labels55, total55, 'percentageList55');
        mostrarPorcentajes(data56, labels56, total56, 'percentageList56');
        mostrarPorcentajes(data57, labels57, total57, 'percentageList57');
        mostrarPorcentajes(data58, labels58, total58, 'percentageList58');
        mostrarPorcentajes(data59, labels59, total59, 'percentageList59');
        mostrarPorcentajes(data60, labels60, total60, 'percentageList60');


        // Configuración del gráfico para indicador_psicofisiologico_1
        var config1 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data->pluck('pregunta_1_organizacion')), // Valores únicos del indicador 1
                datasets: [{
                    label: 'Número de estudiantes (Indicador 1)',
                    data: @json($data->pluck('total')), // Cantidad de estudiantes con ese valor en indicador 1
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total1) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Configuración del gráfico
        var config2 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_1->pluck('pregunta_2_organizacion')), // Valores únicos del indicador 2
                datasets: [{
                    label: 'Número de estudiantes (Indicador 2)',
                    data: @json($data_1->pluck('total')), // Cantidad de estudiantes con ese valor en indicador 2
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Configuración del gráfico para indicador_psicofisiologico_3
        var config3 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_2->pluck('pregunta_3_organizacion')), // Valores únicos del indicador 2
                datasets: [{
                    label: 'Número de estudiantes (Indicador 3)',
                    data: @json($data_2->pluck('total')), // Cantidad de estudiantes con ese valor en indicador 2
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Configuración del gráfico para indicador_psicofisiologico_4
        var config4 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_3->pluck('pregunta_4_organizacion')), // Valores únicos del indicador 4
                datasets: [{
                    label: 'Número de estudiantes (Indicador 4)',
                    data: @json($data_3->pluck('total')), // Cantidad de estudiantes con ese valor en indicador 4
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Configuración del gráfico para indicador_psicofisiologico_5
        var config5 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_4->pluck('pregunta_5_organizacion')), // Valores únicos del indicador 5
                datasets: [{
                    label: 'Número de estudiantes (Indicador 5)',
                    data: @json($data_4->pluck('total')), // Cantidad de estudiantes con ese valor en indicador 5
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Configuración del gráfico para indicador_psicofisiologico_6
        var config6 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_5->pluck('pregunta_6_organizacion')), // Valores únicos del indicador 6
                datasets: [{
                    label: 'Número de estudiantes (Indicador 6)',
                    data: @json($data_5->pluck('total')), // Cantidad de estudiantes con ese valor en indicador 6
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Configuración del gráfico para indicador_psicofisiologico_7
        var config7 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_6->pluck('pregunta_7_organizacion')), // Valores únicos del indicador 7
                datasets: [{
                    label: 'Número de estudiantes (Indicador 7)',
                    data: @json($data_6->pluck('total')), // Cantidad de estudiantes con ese valor en indicador 7
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Configuración del gráfico para indicador_psicofisiologico_8
        var config8 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_7->pluck('pregunta_8_organizacion')), // Valores únicos del indicador 8
                datasets: [{
                    label: 'Número de estudiantes (Indicador 8)',
                    data: @json($data_7->pluck('total')), // Cantidad de estudiantes con ese valor en indicador 8
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Configuración del gráfico para indicador_psicofisiologico_7
        var config9 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_8->pluck('pregunta_9_organizacion')), // Valores únicos del indicador 9
                datasets: [{
                    label: 'Número de estudiantes (Indicador 9)',
                    data: @json($data_8->pluck('total')), // Cantidad de estudiantes con ese valor en indicador 9
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Configuración del gráfico para indicador_psicofisiologico_10
        var config10 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_9->pluck('pregunta_10_organizacion')), // Valores únicos del indicador 10
                datasets: [{
                    label: 'Número de estudiantes (Indicador 10)',
                    data: @json($data_9->pluck('total')), // Cantidad de estudiantes con ese valor en indicador 10
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        // Configuración del gráfico para indicador_psicofisiologico_11
        var config11 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_10->pluck('pregunta_11_organizacion')), // Valores únicos del indicador 11
                datasets: [{
                    label: 'Número de estudiantes (Indicador 11)',
                    data: @json($data_10->pluck('total')), // Cantidad de estudiantes con ese valor en indicador 11
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };



        // Configuración del gráfico para indicado area familiar
        var config12 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_11->pluck('pregunta_12_organizacion')), // Valores únicos del indicador 12
                datasets: [{
                    label: 'Número de estudiantes (Indicador 12)',
                    data: @json($data_11->pluck('total')), // Cantidad de estudiantes con ese valor en indicador 12
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Configuración del gráfico para indicado area social 1
        var config13 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_12->pluck('pregunta_13_organizacion')), // Valores únicos del indicador 13
                datasets: [{
                    label: 'Número de estudiantes (Indicador 13)',
                    data: @json($data_12->pluck('total')), // Cantidad de estudiantes con ese valor en indicador 13
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };


        // Configuración del gráfico para indicado area soccial 3
        var config14 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_13->pluck('pregunta_14_organizacion')), // Valores únicos del indicador 14
                datasets: [{
                    label: 'Número de estudiantes (Indicador 14)',
                    data: @json($data_13->pluck('total')), // Cantidad de estudiantes con ese valor en indicador 14
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        var config15 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_14->pluck('pregunta_15_organizacion')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 15)',
                    data: @json($data_14->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        var config16 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_15->pluck('pregunta_16_organizacion')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 16)',
                    data: @json($data_15->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config17 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_16->pluck('pregunta_17_organizacion')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 17)',
                    data: @json($data_16->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config18 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_17->pluck('pregunta_18_organizacion')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 18)',
                    data: @json($data_17->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config19 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_18->pluck('pregunta_19_organizacion')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 19)',
                    data: @json($data_18->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config20 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_19->pluck('pregunta_20_organizacion')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 20)',
                    data: @json($data_19->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config21 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_20->pluck('pregunta_1_tecnica')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 21)',
                    data: @json($data_20->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config22 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_21->pluck('pregunta_2_tecnica')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 22)',
                    data: @json($data_21->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config23 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_22->pluck('pregunta_3_tecnica')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 23)',
                    data: @json($data_22->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config24 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_23->pluck('pregunta_4_tecnica')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 24)',
                    data: @json($data_23->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config25 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_24->pluck('pregunta_5_tecnica')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 25)',
                    data: @json($data_24->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config26 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_25->pluck('pregunta_6_tecnica')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 26)',
                    data: @json($data_25->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config27 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_26->pluck('pregunta_7_tecnica')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 27)',
                    data: @json($data_26->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config28 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_27->pluck('pregunta_8_tecnica')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 28)',
                    data: @json($data_27->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config29 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_28->pluck('pregunta_9_tecnica')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 29)',
                    data: @json($data_28->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config30 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_29->pluck('pregunta_10_tecnica')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 30)',
                    data: @json($data_29->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config31 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_30->pluck('pregunta_11_tecnica')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 31)',
                    data: @json($data_30->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config32 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_31->pluck('pregunta_12_tecnica')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 32)',
                    data: @json($data_31->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config33 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_32->pluck('pregunta_13_tecnica')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 33)',
                    data: @json($data_32->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config34 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_33->pluck('pregunta_14_tecnica')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 34)',
                    data: @json($data_33->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config35 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_34->pluck('pregunta_15_tecnica')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 35)',
                    data: @json($data_34->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config36 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_35->pluck('pregunta_16_tecnica')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 36)',
                    data: @json($data_35->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config37 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_36->pluck('pregunta_17_tecnica')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 37)',
                    data: @json($data_36->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config38 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_37->pluck('pregunta_18_tecnica')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 38)',
                    data: @json($data_37->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config39 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_38->pluck('pregunta_19_tecnica')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 39)',
                    data: @json($data_38->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config40 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data_39->pluck('pregunta_20_tecnica')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 40)',
                    data: @json($data_39->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)',
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                // Calcular el porcentaje
                                var value = tooltipItem.raw;
                                var percentage = ((value / total2) * 100).toFixed(2); // Porcentaje con 2 decimales
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        var config41 = {
            type: 'bar',
            data: {
                labels: @json($data_40->pluck('pregunta_1_motivacion')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 41)',
                    data: @json($data_40->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var value = tooltipItem.raw;
                                var percentage = ((value / total41) * 100).toFixed(2);
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        var config42 = {
            type: 'bar',
            data: {
                labels: @json($data_41->pluck('pregunta_2_motivacion')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 42)',
                    data: @json($data_41->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var value = tooltipItem.raw;
                                var percentage = ((value / total42) * 100).toFixed(2);
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        var config43 = {
            type: 'bar',
            data: {
                labels: @json($data_42->pluck('pregunta_3_motivacion')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 43)',
                    data: @json($data_42->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var value = tooltipItem.raw;
                                var percentage = ((value / total43) * 100).toFixed(2);
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Continúa con la misma estructura de `config43` hasta `config60`, cambiando `labels`, `data`, y `total` correspondiente a cada pregunta de motivación
        // Por ejemplo:

        var config44 = {
            type: 'bar',
            data: {
                labels: @json($data_43->pluck('pregunta_4_motivacion')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 44)',
                    data: @json($data_43->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var value = tooltipItem.raw;
                                var percentage = ((value / total44) * 100).toFixed(2);
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        var config45 = {
            type: 'bar',
            data: {
                labels: @json($data_44->pluck('pregunta_5_motivacion')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 45)',
                    data: @json($data_44->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var value = tooltipItem.raw;
                                var percentage = ((value / total45) * 100).toFixed(2);
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Configuración del gráfico para indicador 46
        var config46 = {
            type: 'bar',
            data: {
                labels: @json($data_45->pluck('pregunta_6_motivacion')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 46)',
                    data: @json($data_45->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var value = tooltipItem.raw;
                                var percentage = ((value / total46) * 100).toFixed(2);
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Configuración del gráfico para indicador 47
        var config47 = {
            type: 'bar',
            data: {
                labels: @json($data_46->pluck('pregunta_7_motivacion')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 47)',
                    data: @json($data_46->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var value = tooltipItem.raw;
                                var percentage = ((value / total47) * 100).toFixed(2);
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Configuración del gráfico para indicador 48
        var config48 = {
            type: 'bar',
            data: {
                labels: @json($data_47->pluck('pregunta_8_motivacion')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 48)',
                    data: @json($data_47->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var value = tooltipItem.raw;
                                var percentage = ((value / total48) * 100).toFixed(2);
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Configuración del gráfico para indicador 49
        var config49 = {
            type: 'bar',
            data: {
                labels: @json($data_48->pluck('pregunta_9_motivacion')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 49)',
                    data: @json($data_48->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var value = tooltipItem.raw;
                                var percentage = ((value / total49) * 100).toFixed(2);
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config50 = {
            type: 'bar',
            data: {
                labels: @json($data_49->pluck('pregunta_10_motivacion')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 50)',
                    data: @json($data_49->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var value = tooltipItem.raw;
                                var percentage = ((value / total50) * 100).toFixed(2);
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Configuración del gráfico para indicador 51
        var config51 = {
            type: 'bar',
            data: {
                labels: @json($data_50->pluck('pregunta_11_motivacion')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 51)',
                    data: @json($data_50->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var value = tooltipItem.raw;
                                var percentage = ((value / total51) * 100).toFixed(2);
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Configuración del gráfico para indicador 52
        var config52 = {
            type: 'bar',
            data: {
                labels: @json($data_51->pluck('pregunta_12_motivacion')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 52)',
                    data: @json($data_51->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var value = tooltipItem.raw;
                                var percentage = ((value / total52) * 100).toFixed(2);
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Configuración del gráfico para indicador 53
        var config53 = {
            type: 'bar',
            data: {
                labels: @json($data_52->pluck('pregunta_13_motivacion')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 53)',
                    data: @json($data_52->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var value = tooltipItem.raw;
                                var percentage = ((value / total53) * 100).toFixed(2);
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Configuración del gráfico para indicador 54
        var config54 = {
            type: 'bar',
            data: {
                labels: @json($data_53->pluck('pregunta_14_motivacion')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 54)',
                    data: @json($data_53->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var value = tooltipItem.raw;
                                var percentage = ((value / total54) * 100).toFixed(2);
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config55 = {
            type: 'bar',
            data: {
                labels: @json($data_54->pluck('pregunta_15_motivacion')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 55)',
                    data: @json($data_54->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var value = tooltipItem.raw;
                                var percentage = ((value / total55) * 100).toFixed(2);
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Configuración del gráfico para indicador 56
        var config56 = {
            type: 'bar',
            data: {
                labels: @json($data_55->pluck('pregunta_16_motivacion')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 56)',
                    data: @json($data_55->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var value = tooltipItem.raw;
                                var percentage = ((value / total56) * 100).toFixed(2);
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Configuración del gráfico para indicador 57
        var config57 = {
            type: 'bar',
            data: {
                labels: @json($data_56->pluck('pregunta_17_motivacion')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 57)',
                    data: @json($data_56->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var value = tooltipItem.raw;
                                var percentage = ((value / total57) * 100).toFixed(2);
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Configuración del gráfico para indicador 58
        var config58 = {
            type: 'bar',
            data: {
                labels: @json($data_57->pluck('pregunta_18_motivacion')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 58)',
                    data: @json($data_57->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var value = tooltipItem.raw;
                                var percentage = ((value / total58) * 100).toFixed(2);
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Configuración del gráfico para indicador 59
        var config59 = {
            type: 'bar',
            data: {
                labels: @json($data_58->pluck('pregunta_19_motivacion')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 59)',
                    data: @json($data_58->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var value = tooltipItem.raw;
                                var percentage = ((value / total59) * 100).toFixed(2);
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };
        var config60 = {
            type: 'bar',
            data: {
                labels: @json($data_59->pluck('pregunta_20_motivacion')),
                datasets: [{
                    label: 'Número de estudiantes (Indicador 60)',
                    data: @json($data_59->pluck('total')),
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)', 'rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                plugins: {
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                var value = tooltipItem.raw;
                                var percentage = ((value / total60) * 100).toFixed(2);
                                return value + ' estudiantes (' + percentage + '%)';
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        };

        // Crear los gráficos inicialmente
        var indicadorChart1 = new Chart(ctx1, config1);
        var indicadorChart2 = new Chart(ctx2, config2);
        var indicadorChart3 = new Chart(ctx3, config3);
        var indicadorChart4 = new Chart(ctx4, config4);
        var indicadorChart5 = new Chart(ctx5, config5);
        var indicadorChart6 = new Chart(ctx6, config6);
        var indicadorChart7 = new Chart(ctx7, config7);
        var indicadorChart8 = new Chart(ctx8, config8);
        var indicadorChart9 = new Chart(ctx9, config9);
        var indicadorChart10 = new Chart(ctx10, config10);
        var indicadorChart11 = new Chart(ctx11, config11);
        var indicadorChart12 = new Chart(ctx12, config12);
        var indicadorChart13 = new Chart(ctx13, config13);
        var indicadorChart14 = new Chart(ctx14, config14);
        var indicadorChart15 = new Chart(ctx15, config15);
        var indicadorChart16 = new Chart(ctx16, config16);
        var indicadorChart17 = new Chart(ctx17, config17);
        var indicadorChart18 = new Chart(ctx18, config18);
        var indicadorChart19 = new Chart(ctx19, config19);
        var indicadorChart20 = new Chart(ctx20, config20);
        var indicadorChart21 = new Chart(ctx21, config21);
        var indicadorChart22 = new Chart(ctx22, config22);
        var indicadorChart23 = new Chart(ctx23, config23);
        var indicadorChart24 = new Chart(ctx24, config24);
        var indicadorChart25 = new Chart(ctx25, config25);
        var indicadorChart26 = new Chart(ctx26, config26);
        var indicadorChart27 = new Chart(ctx27, config27);
        var indicadorChart28 = new Chart(ctx28, config28);
        var indicadorChart29 = new Chart(ctx29, config29);
        var indicadorChart30 = new Chart(ctx30, config30);
        var indicadorChart31 = new Chart(ctx31, config31);
        var indicadorChart32 = new Chart(ctx32, config32);
        var indicadorChart33 = new Chart(ctx33, config33);
        var indicadorChart34 = new Chart(ctx34, config34);
        var indicadorChart35 = new Chart(ctx35, config35);
        var indicadorChart36 = new Chart(ctx36, config36);
        var indicadorChart37 = new Chart(ctx37, config37);
        var indicadorChart38 = new Chart(ctx38, config38);
        var indicadorChart39 = new Chart(ctx39, config39);
        var indicadorChart40 = new Chart(ctx40, config40);
        var indicadorChart41 = new Chart(ctx41, config41);
        var indicadorChart42 = new Chart(ctx42, config42);
        var indicadorChart43 = new Chart(ctx43, config43);
        var indicadorChart44 = new Chart(ctx44, config44);
        var indicadorChart45 = new Chart(ctx45, config45);
        var indicadorChart46 = new Chart(ctx46, config46);
        var indicadorChart47 = new Chart(ctx47, config47);
        var indicadorChart48 = new Chart(ctx48, config48);
        var indicadorChart49 = new Chart(ctx49, config49);
        var indicadorChart50 = new Chart(ctx50, config50);
        var indicadorChart51 = new Chart(ctx51, config51);
        var indicadorChart52 = new Chart(ctx52, config52);
        var indicadorChart53 = new Chart(ctx53, config53);
        var indicadorChart54 = new Chart(ctx54, config54);
        var indicadorChart55 = new Chart(ctx55, config55);
        var indicadorChart56 = new Chart(ctx56, config56);
        var indicadorChart57 = new Chart(ctx57, config57);
        var indicadorChart58 = new Chart(ctx58, config58);
        var indicadorChart59 = new Chart(ctx59, config59);
        var indicadorChart60 = new Chart(ctx60, config60);

        // Función para cambiar el tipo de gráfico
        function cambiarTipo(tipo, indicador) {
            if (indicador === 'indicador1') {
                indicadorChart1.destroy(); // Destruir gráfico actual de indicador 1
                config1.type = tipo; // Cambiar tipo de gráfico
                indicadorChart1 = new Chart(ctx1, config1); // Crear nuevo gráfico
            } else if (indicador === 'indicador2') {
                indicadorChart2.destroy(); // Destruir gráfico actual de indicador 2
                config2.type = tipo; // Cambiar tipo de gráfico
                indicadorChart2 = new Chart(ctx2, config2); // Crear nuevo gráfico
            } else if (indicador === 'indicador3') {
                indicadorChart3.destroy(); // Destruir gráfico actual de indicador 
                config3.type = tipo; // Cambiar tipo de gráfico
                indicadorChart3 = new Chart(ctx3, config3); // Crear nuevo gráfico
            } else if (indicador === 'indicador4') {
                indicadorChart4.destroy(); // Destruir gráfico actual de indicador 
                config4.type = tipo; // Cambiar tipo de gráfico
                indicadorChart4 = new Chart(ctx4, config4); // Crear nuevo gráfico
            } else if (indicador === 'indicador5') {
                indicadorChart5.destroy(); // Destruir gráfico actual de indicador 
                config5.type = tipo; // Cambiar tipo de gráfico
                indicadorChart5 = new Chart(ctx5, config5); // Crear nuevo gráfico
            } else if (indicador === 'indicador6') {
                indicadorChart6.destroy(); // Destruir gráfico actual de indicador 
                config6.type = tipo; // Cambiar tipo de gráfico
                indicadorChart6 = new Chart(ctx6, config6); // Crear nuevo gráfico
            } else if (indicador === 'indicador7') {
                indicadorChart7.destroy(); // Destruir gráfico actual de indicador 
                config7.type = tipo; // Cambiar tipo de gráfico
                indicadorChart7 = new Chart(ctx7, config7); // Crear nuevo gráfico
            } else if (indicador === 'indicador8') {
                indicadorChart8.destroy(); // Destruir gráfico actual de indicador 
                config8.type = tipo; // Cambiar tipo de gráfico
                indicadorChart8 = new Chart(ctx8, config8); // Crear nuevo gráfico
            } else if (indicador === 'indicador9') {
                indicadorChart9.destroy(); // Destruir gráfico actual de indicador 
                config9.type = tipo; // Cambiar tipo de gráfico
                indicadorChart9 = new Chart(ctx8, config9); // Crear nuevo gráfico
            } else if (indicador === 'indicador10') {
                indicadorChart10.destroy(); // Destruir gráfico actual de indicador 
                config10.type = tipo; // Cambiar tipo de gráfico
                indicadorChart10 = new Chart(ctx10, config10); // Crear nuevo gráfico
            } else if (indicador === 'indicador11') {
                indicadorChart11.destroy(); // Destruir gráfico actual de indicador 
                config11.type = tipo; // Cambiar tipo de gráfico
                indicadorChart11 = new Chart(ctx11, config11); // Crear nuevo gráfico
            } else if (indicador === 'indicador12') {
                indicadorChart12.destroy(); // Destruir gráfico actual de indicador 
                config12.type = tipo; // Cambiar tipo de gráfico
                indicadorChart12 = new Chart(ctx12, config12); // Crear nuevo gráfico
            } else if (indicador === 'indicador13') {
                indicadorChart13.destroy(); // Destruir gráfico actual de indicador 
                config13.type = tipo; // Cambiar tipo de gráfico
                indicadorChart13 = new Chart(ctx13, config13); // Crear nuevo gráfico
            } else if (indicador === 'indicador14') {
                indicadorChart14.destroy(); // Destruir gráfico actual de indicador 
                config14.type = tipo; // Cambiar tipo de gráfico
                indicadorChart14 = new Chart(ctx14, config14); // Crear nuevo gráfico
            } else if (indicador === 'indicador15') {
                indicadorChart15.destroy(); // Destruir gráfico actual de indicador 
                config15.type = tipo; // Cambiar tipo de gráfico
                indicadorChart15 = new Chart(ctx15, config15); // Crear nuevo gráfico
            } else if (indicador === 'indicador16') {
                indicadorChart16.destroy(); // Destruir gráfico actual de indicador 
                config16.type = tipo; // Cambiar tipo de gráfico
                indicadorChart16 = new Chart(ctx16, config16); // Crear nuevo gráfico
            } else if (indicador === 'indicador17') {
                indicadorChart17.destroy(); // Destruir gráfico actual de indicador 
                config17.type = tipo; // Cambiar tipo de gráfico
                indicadorChart17 = new Chart(ctx17, config17); // Crear nuevo gráfico

            } else if (indicador === 'indicador18') {
                indicadorChart18.destroy(); // Destruir gráfico actual de indicador 
                config18.type = tipo; // Cambiar tipo de gráfico
                indicadorChart18 = new Chart(ctx18, config18); // Crear nuevo gráfico
            } else if (indicador === 'indicador19') {
                indicadorChart19.destroy(); // Destruir gráfico actual de indicador 
                config19.type = tipo; // Cambiar tipo de gráfico
                indicadorChart19 = new Chart(ctx19, config19); // Crear nuevo gráfico
            } else if (indicador === 'indicador20') {
                indicadorChart20.destroy(); // Destruir gráfico actual de indicador 
                config20.type = tipo; // Cambiar tipo de gráfico
                indicadorChart20 = new Chart(ctx20, config20); // Crear nuevo gráfico
            } else if (indicador === 'indicador21') {
                indicadorChart21.destroy(); // Destruir gráfico actual de indicador 
                config21.type = tipo; // Cambiar tipo de gráfico
                indicadorChart21 = new Chart(ctx21, config21); // Crear nuevo gráfico
            } else if (indicador === 'indicador22') {
                indicadorChart22.destroy(); // Destruir gráfico actual de indicador 
                config22.type = tipo; // Cambiar tipo de gráfico
                indicadorChart22 = new Chart(ctx22, config22); // Crear nuevo gráfico
            } else if (indicador === 'indicador23') {
                indicadorChart23.destroy(); // Destruir gráfico actual de indicador 
                config23.type = tipo; // Cambiar tipo de gráfico
                indicadorChart23 = new Chart(ctx23, config23); // Crear nuevo gráfico
            } else if (indicador === 'indicador24') {
                indicadorChart24.destroy(); // Destruir gráfico actual de indicador 
                config24.type = tipo; // Cambiar tipo de gráfico
                indicadorChart24 = new Chart(ctx24, config24); // Crear nuevo gráfico
            } else if (indicador === 'indicador25') {
                indicadorChart25.destroy(); // Destruir gráfico actual de indicador 
                config25.type = tipo; // Cambiar tipo de gráfico
                indicadorChart25 = new Chart(ctx25, config25); // Crear nuevo gráfico
            } else if (indicador === 'indicador26') {
                indicadorChart26.destroy(); // Destruir gráfico actual de indicador 
                config26.type = tipo; // Cambiar tipo de gráfico
                indicadorChart23 = new Chart(ctx26, config26); // Crear nuevo gráfico
            } else if (indicador === 'indicador27') {
                indicadorChart27.destroy(); // Destruir gráfico actual de indicador 
                config27.type = tipo; // Cambiar tipo de gráfico
                indicadorChart27 = new Chart(ctx27, config27); // Crear nuevo gráfico
            } else if (indicador === 'indicador28') {
                indicadorChart28.destroy(); // Destruir gráfico actual de indicador 
                config28.type = tipo; // Cambiar tipo de gráfico
                indicadorChart23 = new Chart(ctx28, config28); // Crear nuevo gráfico
            } else if (indicador === 'indicador29') {
                indicadorChart29.destroy(); // Destruir gráfico actual de indicador 
                config29.type = tipo; // Cambiar tipo de gráfico
                indicadorChart29 = new Chart(ctx29, config29); // Crear nuevo gráfico
            } else if (indicador === 'indicador30') {
                indicadorChart.destroy(); // Destruir gráfico actual de indicador 
                config30.type = tipo; // Cambiar tipo de gráfico
                indicadorChart30 = new Chart(ctx30, config30); // Crear nuevo gráfico
            } else if (indicador === 'indicador31') {
                indicadorChart31.destroy(); // Destruir gráfico actual de indicador 
                config31.type = tipo; // Cambiar tipo de gráfico
                indicadorChart31 = new Chart(ctx31, config31); // Crear nuevo gráfico
            } else if (indicador === 'indicador32') {
                indicadorChart32.destroy(); // Destruir gráfico actual de indicador 
                config32.type = tipo; // Cambiar tipo de gráfico
                indicadorChart32 = new Chart(ctx32, config32); // Crear nuevo gráfico
            } else if (indicador === 'indicador33') {
                indicadorChart33.destroy(); // Destruir gráfico actual de indicador 
                config33.type = tipo; // Cambiar tipo de gráfico
                indicadorChart33 = new Chart(ctx33, config33); // Crear nuevo gráfico
            } else if (indicador === 'indicador34') {
                indicadorChart34.destroy(); // Destruir gráfico actual de indicador 
                config34.type = tipo; // Cambiar tipo de gráfico
                indicadorChart34 = new Chart(ctx34, config34); // Crear nuevo gráfico
            } else if (indicador === 'indicador35') {
                indicadorChart35.destroy(); // Destruir gráfico actual de indicador 
                config35.type = tipo; // Cambiar tipo de gráfico
                indicadorChart35 = new Chart(ctx35, config35); // Crear nuevo gráfico
            } else if (indicador === 'indicador36') {
                indicadorChart36.destroy(); // Destruir gráfico actual de indicador 
                config36.type = tipo; // Cambiar tipo de gráfico
                indicadorChart36 = new Chart(ctx36, config36); // Crear nuevo gráfico
            } else if (indicador === 'indicador37') {
                indicadorChart37.destroy(); // Destruir gráfico actual de indicador 
                config37.type = tipo; // Cambiar tipo de gráfico
                indicadorChart37 = new Chart(ctx37, config37); // Crear nuevo gráfico
            } else if (indicador === 'indicador38') {
                indicadorChart38.destroy(); // Destruir gráfico actual de indicador 
                config38.type = tipo; // Cambiar tipo de gráfico
                indicadorChart38 = new Chart(ctx38, config38); // Crear nuevo gráfico
            } else if (indicador === 'indicador39') {
                indicadorChart39.destroy(); // Destruir gráfico actual de indicador 
                config39.type = tipo; // Cambiar tipo de gráfico
                indicadorChart39 = new Chart(ctx39, config39); // Crear nuevo gráfico
            } else if (indicador === 'indicador40') {
                indicadorChart40.destroy(); // Destruir gráfico actual de indicador 
                config40.type = tipo; // Cambiar tipo de gráfico
                indicadorChart40 = new Chart(ctx40, config40); // Crear nuevo gráfico
            } else if (indicador === 'indicador41') {
                indicadorChart41.destroy();
                config41.type = tipo;
                indicadorChart41 = new Chart(ctx41, config41);
            } else if (indicador === 'indicador42') {
                indicadorChart42.destroy();
                config42.type = tipo;
                indicadorChart42 = new Chart(ctx42, config42);
            } else if (indicador === 'indicador43') {
                indicadorChart43.destroy();
                config43.type = tipo;
                indicadorChart43 = new Chart(ctx43, config43);
            } else if (indicador === 'indicador44') {
                indicadorChart44.destroy();
                config44.type = tipo;
                indicadorChart44 = new Chart(ctx44, config44);
            } else if (indicador === 'indicador45') {
                indicadorChart45.destroy();
                config45.type = tipo;
                indicadorChart45 = new Chart(ctx45, config45);
            } else if (indicador === 'indicador46') {
                indicadorChart46.destroy();
                config46.type = tipo;
                indicadorChart46 = new Chart(ctx46, config46);
            } else if (indicador === 'indicador47') {
                indicadorChart47.destroy();
                config47.type = tipo;
                indicadorChart47 = new Chart(ctx47, config47);
            } else if (indicador === 'indicador48') {
                indicadorChart48.destroy();
                config48.type = tipo;
                indicadorChart48 = new Chart(ctx48, config48);
            } else if (indicador === 'indicador49') {
                indicadorChart49.destroy();
                config49.type = tipo;
                indicadorChart49 = new Chart(ctx49, config49);
            } else if (indicador === 'indicador50') {
                indicadorChart50.destroy();
                config50.type = tipo;
                indicadorChart50 = new Chart(ctx50, config50);
            } else if (indicador === 'indicador51') {
                indicadorChart51.destroy();
                config51.type = tipo;
                indicadorChart51 = new Chart(ctx51, config51);
            } else if (indicador === 'indicador52') {
                indicadorChart52.destroy();
                config52.type = tipo;
                indicadorChart52 = new Chart(ctx52, config52);
            } else if (indicador === 'indicador53') {
                indicadorChart53.destroy();
                config53.type = tipo;
                indicadorChart53 = new Chart(ctx53, config53);
            } else if (indicador === 'indicador54') {
                indicadorChart54.destroy();
                config54.type = tipo;
                indicadorChart54 = new Chart(ctx54, config54);
            } else if (indicador === 'indicador55') {
                indicadorChart55.destroy();
                config55.type = tipo;
                indicadorChart55 = new Chart(ctx55, config55);
            } else if (indicador === 'indicador56') {
                indicadorChart56.destroy();
                config56.type = tipo;
                indicadorChart56 = new Chart(ctx56, config56);
            } else if (indicador === 'indicador57') {
                indicadorChart57.destroy();
                config57.type = tipo;
                indicadorChart57 = new Chart(ctx57, config57);
            } else if (indicador === 'indicador58') {
                indicadorChart58.destroy();
                config58.type = tipo;
                indicadorChart58 = new Chart(ctx58, config58);
            } else if (indicador === 'indicador59') {
                indicadorChart59.destroy();
                config59.type = tipo;
                indicadorChart59 = new Chart(ctx59, config59);
            } else if (indicador === 'indicador60') {
                indicadorChart60.destroy();
                config60.type = tipo;
                indicadorChart60 = new Chart(ctx60, config60);
            }
        }
    </script>

    <script>
        function generatePDF() {
            // Usar window.jspdf.jsPDF para acceder a la clase jsPDF
            const doc = new window.jspdf.jsPDF();

            // Obtener los datos y las etiquetas
            var data1 = @json($data->pluck('total'));
            var labels1 = @json($data->pluck('pregunta_1_organizacion'));
            var total1 = data1.reduce((acc, val) => acc + val, 0);

            var data2 = @json($data_1->pluck('total'));
            var labels2 = @json($data_1->pluck('pregunta_2_organizacion'));
            var total2 = data2.reduce((acc, val) => acc + val, 0);

            var data3 = @json($data_2->pluck('total'));
            var labels3 = @json($data_2->pluck('pregunta_3_organizacion'));
            var total3 = data3.reduce((acc, val) => acc + val, 0);

            var data4 = @json($data_3->pluck('total'));
            var labels4 = @json($data_3->pluck('pregunta_4_organizacion'));
            var total4 = data4.reduce((acc, val) => acc + val, 0);

            var data5 = @json($data_4->pluck('total'));
            var labels5 = @json($data_4->pluck('pregunta_5_organizacion'));
            var total5 = data5.reduce((acc, val) => acc + val, 0);


            var data6 = @json($data_5->pluck('total'));
            var labels6 = @json($data_5->pluck('pregunta_6_organizacion'));
            var total6 = data6.reduce((acc, val) => acc + val, 0);

            var data7 = @json($data_6->pluck('total'));
            var labels7 = @json($data_6->pluck('pregunta_7_organizacion'));
            var total7 = data7.reduce((acc, val) => acc + val, 0);

            var data8 = @json($data_7->pluck('total'));
            var labels8 = @json($data_7->pluck('pregunta_8_organizacion'));
            var total8 = data8.reduce((acc, val) => acc + val, 0);

            var data9 = @json($data_8->pluck('total'));
            var labels9 = @json($data_8->pluck('pregunta_9_organizacion'));
            var total9 = data9.reduce((acc, val) => acc + val, 0);

            var data10 = @json($data_9->pluck('total'));
            var labels10 = @json($data_9->pluck('pregunta_10_organizacion'));
            var total10 = data10.reduce((acc, val) => acc + val, 0);

            var data11 = @json($data_10->pluck('total'));
            var labels11 = @json($data_10->pluck('pregunta_11_organizacion'));
            var total11 = data11.reduce((acc, val) => acc + val, 0);

            var data12 = @json($data_11->pluck('total'));
            var labels12 = @json($data_11->pluck('pregunta_12_organizacion'));
            var total12 = data12.reduce((acc, val) => acc + val, 0);

            var data13 = @json($data_12->pluck('total'));
            var labels13 = @json($data_12->pluck('pregunta_13_organizacion'));
            var total13 = data13.reduce((acc, val) => acc + val, 0);

            var data14 = @json($data_13->pluck('total'));
            var labels14 = @json($data_13->pluck('pregunta_14_organizacion'));
            var total14 = data14.reduce((acc, val) => acc + val, 0);


            var data15 = @json($data_14->pluck('total'));
            var labels15 = @json($data_14->pluck('pregunta_15_organizacion'));
            var total15 = data15.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 16
            var data16 = @json($data_15->pluck('total'));
            var labels16 = @json($data_15->pluck('pregunta_16_organizacion'));
            var total16 = data16.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 17
            var data17 = @json($data_16->pluck('total'));
            var labels17 = @json($data_16->pluck('pregunta_17_organizacion'));
            var total17 = data17.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 18
            var data18 = @json($data_17->pluck('total'));
            var labels18 = @json($data_17->pluck('pregunta_18_organizacion'));
            var total18 = data18.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 19
            var data19 = @json($data_18->pluck('total'));
            var labels19 = @json($data_18->pluck('pregunta_19_organizacion'));
            var total19 = data19.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 20
            var data20 = @json($data_19->pluck('total'));
            var labels20 = @json($data_19->pluck('pregunta_20_organizacion'));
            var total20 = data20.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 21
            var data21 = @json($data_20->pluck('total'));
            var labels21 = @json($data_20->pluck('pregunta_1_tecnica'));
            var total21 = data21.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 22
            var data22 = @json($data_21->pluck('total'));
            var labels22 = @json($data_21->pluck('pregunta_2_tecnica'));
            var total22 = data22.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 23
            var data23 = @json($data_22->pluck('total'));
            var labels23 = @json($data_22->pluck('pregunta_3_tecnica'));
            var total23 = data23.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 24
            var data24 = @json($data_23->pluck('total'));
            var labels24 = @json($data_23->pluck('pregunta_4_tecnica'));
            var total24 = data24.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 25
            var data25 = @json($data_24->pluck('total'));
            var labels25 = @json($data_24->pluck('pregunta_5_tecnica'));
            var total25 = data25.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 26
            var data26 = @json($data_25->pluck('total'));
            var labels26 = @json($data_25->pluck('pregunta_6_tecnica'));
            var total26 = data26.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 27
            var data27 = @json($data_26->pluck('total'));
            var labels27 = @json($data_26->pluck('pregunta_7_tecnica'));
            var total27 = data27.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 28
            var data28 = @json($data_27->pluck('total'));
            var labels28 = @json($data_27->pluck('pregunta_8_tecnica'));
            var total28 = data28.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 29
            var data29 = @json($data_28->pluck('total'));
            var labels29 = @json($data_28->pluck('pregunta_9_tecnica'));
            var total29 = data29.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 30
            var data30 = @json($data_29->pluck('total'));
            var labels30 = @json($data_29->pluck('pregunta_10_tecnica'));
            var total30 = data30.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 31
            var data31 = @json($data_30->pluck('total'));
            var labels31 = @json($data_30->pluck('pregunta_11_tecnica'));
            var total31 = data31.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 32
            var data32 = @json($data_31->pluck('total'));
            var labels32 = @json($data_31->pluck('pregunta_12_tecnica'));
            var total32 = data32.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 33
            var data33 = @json($data_32->pluck('total'));
            var labels33 = @json($data_32->pluck('pregunta_13_tecnica'));
            var total33 = data33.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 34
            var data34 = @json($data_33->pluck('total'));
            var labels34 = @json($data_33->pluck('pregunta_14_tecnica'));
            var total34 = data34.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 35
            var data35 = @json($data_34->pluck('total'));
            var labels35 = @json($data_34->pluck('pregunta_15_tecnica'));
            var total35 = data35.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 36
            var data36 = @json($data_35->pluck('total'));
            var labels36 = @json($data_35->pluck('pregunta_16_tecnica'));
            var total36 = data36.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 37
            var data37 = @json($data_36->pluck('total'));
            var labels37 = @json($data_36->pluck('pregunta_17_tecnica'));
            var total37 = data37.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 38
            var data38 = @json($data_37->pluck('total'));
            var labels38 = @json($data_37->pluck('pregunta_18_tecnica'));
            var total38 = data38.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 39
            var data39 = @json($data_38->pluck('total'));
            var labels39 = @json($data_38->pluck('pregunta_19_tecnica'));
            var total39 = data39.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 40
            var data40 = @json($data_39->pluck('total'));
            var labels40 = @json($data_39->pluck('pregunta_20_tecnica'));
            var total40 = data40.reduce((acc, val) => acc + val, 0);

            var data41 = @json($data_40->pluck('total'));
            var labels41 = @json($data_40->pluck('pregunta_1_motivacion'));
            var total41 = data41.reduce((acc, val) => acc + val, 0);

            var data42 = @json($data_41->pluck('total'));
            var labels42 = @json($data_41->pluck('pregunta_2_motivacion'));
            var total42 = data42.reduce((acc, val) => acc + val, 0);

            var data43 = @json($data_42->pluck('total'));
            var labels43 = @json($data_42->pluck('pregunta_3_motivacion'));
            var total43 = data43.reduce((acc, val) => acc + val, 0);

            var data44 = @json($data_43->pluck('total'));
            var labels44 = @json($data_43->pluck('pregunta_4_motivacion'));
            var total44 = data44.reduce((acc, val) => acc + val, 0);

            var data45 = @json($data_44->pluck('total'));
            var labels45 = @json($data_44->pluck('pregunta_5_motivacion'));
            var total45 = data45.reduce((acc, val) => acc + val, 0);

            var data46 = @json($data_45->pluck('total'));
            var labels46 = @json($data_45->pluck('pregunta_6_motivacion'));
            var total46 = data46.reduce((acc, val) => acc + val, 0);

            var data47 = @json($data_46->pluck('total'));
            var labels47 = @json($data_46->pluck('pregunta_7_motivacion'));
            var total47 = data47.reduce((acc, val) => acc + val, 0);

            var data48 = @json($data_47->pluck('total'));
            var labels48 = @json($data_47->pluck('pregunta_8_motivacion'));
            var total48 = data48.reduce((acc, val) => acc + val, 0);

            var data49 = @json($data_48->pluck('total'));
            var labels49 = @json($data_48->pluck('pregunta_9_motivacion'));
            var total49 = data49.reduce((acc, val) => acc + val, 0);

            var data50 = @json($data_49->pluck('total'));
            var labels50 = @json($data_49->pluck('pregunta_10_motivacion'));
            var total50 = data50.reduce((acc, val) => acc + val, 0);

            var data51 = @json($data_50->pluck('total'));
            var labels51 = @json($data_50->pluck('pregunta_11_motivacion'));
            var total51 = data51.reduce((acc, val) => acc + val, 0);

            var data52 = @json($data_51->pluck('total'));
            var labels52 = @json($data_51->pluck('pregunta_12_motivacion'));
            var total52 = data52.reduce((acc, val) => acc + val, 0);

            var data53 = @json($data_52->pluck('total'));
            var labels53 = @json($data_52->pluck('pregunta_13_motivacion'));
            var total53 = data53.reduce((acc, val) => acc + val, 0);

            var data54 = @json($data_53->pluck('total'));
            var labels54 = @json($data_53->pluck('pregunta_14_motivacion'));
            var total54 = data54.reduce((acc, val) => acc + val, 0);

            var data55 = @json($data_54->pluck('total'));
            var labels55 = @json($data_54->pluck('pregunta_15_motivacion'));
            var total55 = data55.reduce((acc, val) => acc + val, 0);

            var data56 = @json($data_55->pluck('total'));
            var labels56 = @json($data_55->pluck('pregunta_16_motivacion'));
            var total56 = data56.reduce((acc, val) => acc + val, 0);

            var data57 = @json($data_56->pluck('total'));
            var labels57 = @json($data_56->pluck('pregunta_17_motivacion'));
            var total57 = data57.reduce((acc, val) => acc + val, 0);

            var data58 = @json($data_57->pluck('total'));
            var labels58 = @json($data_57->pluck('pregunta_18_motivacion'));
            var total58 = data58.reduce((acc, val) => acc + val, 0);

            var data59 = @json($data_58->pluck('total'));
            var labels59 = @json($data_58->pluck('pregunta_19_motivacion'));
            var total59 = data59.reduce((acc, val) => acc + val, 0);

            var data60 = @json($data_59->pluck('total'));
            var labels60 = @json($data_59->pluck('pregunta_20_motivacion'));
            var total60 = data60.reduce((acc, val) => acc + val, 0);

            // Función para calcular los porcentajes
            function mostrarPorcentajes(data, labels, total) {
                var percentageText = '';
                for (var i = 0; i < data.length; i++) {
                    var percentage = ((data[i] / total) * 100).toFixed(2);
                    percentageText +=
                        `- ${labels[i]}: ${data[i]} estudiantes (${percentage}%)\n`; // Agregar salto de línea y lista
                }
                return percentageText;
            }

            // Generar texto de porcentajes en formato lista
            var percentageText1 = mostrarPorcentajes(data1, labels1, total1);
            var percentageText2 = mostrarPorcentajes(data2, labels2, total2);
            var percentageText3 = mostrarPorcentajes(data3, labels3, total3);
            var percentageText4 = mostrarPorcentajes(data4, labels4, total4);
            var percentageText5 = mostrarPorcentajes(data5, labels5, total5);
            var percentageText6 = mostrarPorcentajes(data6, labels6, total6);
            var percentageText7 = mostrarPorcentajes(data7, labels7, total7);
            var percentageText8 = mostrarPorcentajes(data8, labels8, total8);
            var percentageText9 = mostrarPorcentajes(data9, labels9, total9);
            var percentageText10 = mostrarPorcentajes(data10, labels10, total10);
            var percentageText11 = mostrarPorcentajes(data11, labels11, total11);

            var percentageText12 = mostrarPorcentajes(data12, labels12, total12);
            var percentageText13 = mostrarPorcentajes(data13, labels13, total13);
            var percentageText14 = mostrarPorcentajes(data14, labels14, total14);
            var percentageText15 = mostrarPorcentajes(data15, labels15, total15);
            var percentageText16 = mostrarPorcentajes(data16, labels16, total16);
            var percentageText17 = mostrarPorcentajes(data17, labels17, total17);
            var percentageText18 = mostrarPorcentajes(data18, labels18, total18);
            var percentageText19 = mostrarPorcentajes(data19, labels19, total19);
            var percentageText20 = mostrarPorcentajes(data20, labels20, total20);

            var percentageText21 = mostrarPorcentajes(data21, labels21, total21);
            var percentageText22 = mostrarPorcentajes(data22, labels22, total22);
            var percentageText23 = mostrarPorcentajes(data23, labels23, total23);
            var percentageText24 = mostrarPorcentajes(data24, labels24, total24);
            var percentageText25 = mostrarPorcentajes(data25, labels25, total25);
            var percentageText26 = mostrarPorcentajes(data26, labels26, total26);
            var percentageText27 = mostrarPorcentajes(data27, labels27, total27);
            var percentageText28 = mostrarPorcentajes(data28, labels28, total28);
            var percentageText29 = mostrarPorcentajes(data29, labels29, total29);
            var percentageText30 = mostrarPorcentajes(data30, labels30, total30);
            var percentageText31 = mostrarPorcentajes(data31, labels31, total31);
            var percentageText32 = mostrarPorcentajes(data32, labels32, total32);
            var percentageText33 = mostrarPorcentajes(data33, labels33, total33);
            var percentageText34 = mostrarPorcentajes(data34, labels34, total34);
            var percentageText35 = mostrarPorcentajes(data35, labels35, total35);
            var percentageText36 = mostrarPorcentajes(data36, labels36, total36);
            var percentageText37 = mostrarPorcentajes(data37, labels37, total37);
            var percentageText38 = mostrarPorcentajes(data38, labels38, total38);
            var percentageText39 = mostrarPorcentajes(data39, labels39, total39);
            var percentageText40 = mostrarPorcentajes(data40, labels40, total40);
            var percentageText41 = mostrarPorcentajes(data41, labels41, total41);
            var percentageText42 = mostrarPorcentajes(data42, labels42, total42);
            var percentageText43 = mostrarPorcentajes(data43, labels43, total43);
            var percentageText44 = mostrarPorcentajes(data44, labels44, total44);
            var percentageText45 = mostrarPorcentajes(data45, labels45, total45);
            var percentageText46 = mostrarPorcentajes(data46, labels46, total46);
            var percentageText47 = mostrarPorcentajes(data47, labels47, total47);
            var percentageText48 = mostrarPorcentajes(data48, labels48, total48);
            var percentageText49 = mostrarPorcentajes(data49, labels49, total49);
            var percentageText50 = mostrarPorcentajes(data50, labels50, total50);
            var percentageText51 = mostrarPorcentajes(data51, labels51, total51);
            var percentageText52 = mostrarPorcentajes(data52, labels52, total52);
            var percentageText53 = mostrarPorcentajes(data53, labels53, total53);
            var percentageText54 = mostrarPorcentajes(data54, labels54, total54);
            var percentageText55 = mostrarPorcentajes(data55, labels55, total55);
            var percentageText56 = mostrarPorcentajes(data56, labels56, total56);
            var percentageText57 = mostrarPorcentajes(data57, labels57, total57);
            var percentageText58 = mostrarPorcentajes(data58, labels58, total58);
            var percentageText59 = mostrarPorcentajes(data59, labels59, total59);
            var percentageText60 = mostrarPorcentajes(data60, labels60, total60);

            //variables para las imagenes
            var chartImage1 = indicadorChart1.toBase64Image();
            var chartImage2 = indicadorChart2.toBase64Image();
            var chartImage3 = indicadorChart3.toBase64Image();
            var chartImage4 = indicadorChart4.toBase64Image();
            var chartImage5 = indicadorChart5.toBase64Image();
            var chartImage6 = indicadorChart6.toBase64Image();
            var chartImage7 = indicadorChart7.toBase64Image();
            var chartImage8 = indicadorChart8.toBase64Image();
            var chartImage9 = indicadorChart9.toBase64Image();
            var chartImage10 = indicadorChart10.toBase64Image();

            var chartImage11 = indicadorChart11.toBase64Image();
            var chartImage12 = indicadorChart12.toBase64Image();
            var chartImage13 = indicadorChart13.toBase64Image();
            var chartImage14 = indicadorChart14.toBase64Image();
            var chartImage15 = indicadorChart15.toBase64Image();
            var chartImage16 = indicadorChart16.toBase64Image();
            var chartImage17 = indicadorChart17.toBase64Image();
            var chartImage18 = indicadorChart18.toBase64Image();
            var chartImage19 = indicadorChart19.toBase64Image();
            var chartImage20 = indicadorChart20.toBase64Image();

            var chartImage21 = indicadorChart21.toBase64Image();
            var chartImage22 = indicadorChart22.toBase64Image();
            var chartImage23 = indicadorChart23.toBase64Image();
            var chartImage24 = indicadorChart24.toBase64Image();
            var chartImage25 = indicadorChart25.toBase64Image();
            var chartImage26 = indicadorChart26.toBase64Image();
            var chartImage27 = indicadorChart27.toBase64Image();
            var chartImage28 = indicadorChart28.toBase64Image();
            var chartImage29 = indicadorChart29.toBase64Image();
            var chartImage30 = indicadorChart30.toBase64Image();

            var chartImage31 = indicadorChart31.toBase64Image();
            var chartImage32 = indicadorChart32.toBase64Image();
            var chartImage33 = indicadorChart33.toBase64Image();
            var chartImage34 = indicadorChart34.toBase64Image();
            var chartImage35 = indicadorChart35.toBase64Image();
            var chartImage36 = indicadorChart36.toBase64Image();
            var chartImage37 = indicadorChart37.toBase64Image();
            var chartImage38 = indicadorChart38.toBase64Image();
            var chartImage39 = indicadorChart39.toBase64Image();
            var chartImage40 = indicadorChart40.toBase64Image();
            var chartImage41 = indicadorChart41.toBase64Image();
            var chartImage42 = indicadorChart42.toBase64Image();
            var chartImage43 = indicadorChart43.toBase64Image();
            var chartImage44 = indicadorChart44.toBase64Image();
            var chartImage45 = indicadorChart45.toBase64Image();
            var chartImage46 = indicadorChart46.toBase64Image();
            var chartImage47 = indicadorChart47.toBase64Image();
            var chartImage48 = indicadorChart48.toBase64Image();
            var chartImage49 = indicadorChart49.toBase64Image();
            var chartImage50 = indicadorChart50.toBase64Image();
            var chartImage51 = indicadorChart51.toBase64Image();
            var chartImage52 = indicadorChart52.toBase64Image();
            var chartImage53 = indicadorChart53.toBase64Image();
            var chartImage54 = indicadorChart54.toBase64Image();
            var chartImage55 = indicadorChart55.toBase64Image();
            var chartImage56 = indicadorChart56.toBase64Image();
            var chartImage57 = indicadorChart57.toBase64Image();
            var chartImage58 = indicadorChart58.toBase64Image();
            var chartImage59 = indicadorChart59.toBase64Image();
            var chartImage60 = indicadorChart60.toBase64Image();


            // Añadir el título y los porcentajes al PDF
            doc.text('Porcentajes de estudiantes por indicador:', 10, 10);
            let yPosition = 20; // Starting Y position for the first chart

            // Array of texts and chart images

            const percentages = [{
                    text: percentageText1,
                    image: chartImage1
                },
                {
                    text: percentageText2,
                    image: chartImage2
                },
                {
                    text: percentageText3,
                    image: chartImage3
                },
                {
                    text: percentageText4,
                    image: chartImage4
                },
                {
                    text: percentageText5,
                    image: chartImage5
                },
                {
                    text: percentageText6,
                    image: chartImage6
                },
                {
                    text: percentageText7,
                    image: chartImage7
                },
                {
                    text: percentageText8,
                    image: chartImage8
                },
                {
                    text: percentageText9,
                    image: chartImage9
                },
                {
                    text: percentageText10,
                    image: chartImage10
                },
                {
                    text: percentageText11,
                    image: chartImage11
                },
                {
                    text: percentageText12,
                    image: chartImage12
                },
                {
                    text: percentageText13,
                    image: chartImage13
                },
                {
                    text: percentageText14,
                    image: chartImage14
                },
                {
                    text: percentageText15,
                    image: chartImage15
                },
                {
                    text: percentageText16,
                    image: chartImage16
                },
                {
                    text: percentageText17,
                    image: chartImage17
                },
                {
                    text: percentageText18,
                    image: chartImage18
                },
                {
                    text: percentageText19,
                    image: chartImage19
                },
                {
                    text: percentageText20,
                    image: chartImage20
                },
                {
                    text: percentageText21,
                    image: chartImage21
                },
                {
                    text: percentageText22,
                    image: chartImage22
                },
                {
                    text: percentageText23,
                    image: chartImage23
                },
                {
                    text: percentageText24,
                    image: chartImage24
                },
                {
                    text: percentageText25,
                    image: chartImage25
                },
                {
                    text: percentageText26,
                    image: chartImage26
                },
                {
                    text: percentageText27,
                    image: chartImage27
                },
                {
                    text: percentageText28,
                    image: chartImage28
                },
                {
                    text: percentageText29,
                    image: chartImage29
                },
                {
                    text: percentageText30,
                    image: chartImage30
                },
                {
                    text: percentageText31,
                    image: chartImage31
                },
                {
                    text: percentageText32,
                    image: chartImage32
                },
                {
                    text: percentageText33,
                    image: chartImage33
                },
                {
                    text: percentageText34,
                    image: chartImage34
                },
                {
                    text: percentageText35,
                    image: chartImage35
                },
                {
                    text: percentageText36,
                    image: chartImage36
                },
                {
                    text: percentageText37,
                    image: chartImage37
                },
                {
                    text: percentageText38,
                    image: chartImage38
                },
                {
                    text: percentageText39,
                    image: chartImage39
                },
                {
                    text: percentageText40,
                    image: chartImage40
                },
                {
                    text: percentageText41,
                    image: chartImage41
                },
                {
                    text: percentageText42,
                    image: chartImage42
                },
                {
                    text: percentageText43,
                    image: chartImage43
                },
                {
                    text: percentageText44,
                    image: chartImage44
                },
                {
                    text: percentageText45,
                    image: chartImage45
                },
                {
                    text: percentageText46,
                    image: chartImage46
                },
                {
                    text: percentageText47,
                    image: chartImage47
                },
                {
                    text: percentageText48,
                    image: chartImage48
                },
                {
                    text: percentageText49,
                    image: chartImage49
                },
                {
                    text: percentageText50,
                    image: chartImage50
                },
                {
                    text: percentageText51,
                    image: chartImage51
                },
                {
                    text: percentageText52,
                    image: chartImage52
                },
                {
                    text: percentageText53,
                    image: chartImage53
                },
                {
                    text: percentageText54,
                    image: chartImage54
                },
                {
                    text: percentageText55,
                    image: chartImage55
                },
                {
                    text: percentageText56,
                    image: chartImage56
                },
                {
                    text: percentageText57,
                    image: chartImage57
                },
                {
                    text: percentageText58,
                    image: chartImage58
                },
                {
                    text: percentageText59,
                    image: chartImage59
                },
                {
                    text: percentageText60,
                    image: chartImage60
                }
            ];

            //
            percentages.forEach((item) => {
                if (yPosition > doc.internal.pageSize.height - 100) { // Si está cerca del final de la página
                    doc.addPage(); // Añadir una nueva página
                    yPosition = 20; // Reiniciar la posición Y en la nueva página
                }

                doc.text(item.text, 10, yPosition);
                yPosition += 40;

                doc.addImage(item.image, 'PNG', 10, yPosition, 80, 100);
                yPosition += 110;
            });
            // Guardar el PDF
            doc.save('grafica_y_porcentajes_habilidades.pdf');
        }
    </script>
</body>

</html>
