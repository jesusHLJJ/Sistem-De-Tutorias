<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gráficos de Ficha - Sistema de Tutorías</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        montserrat: ['Montserrat', 'sans-serif'],
                    },
                    colors: {
                        'sidebar-dark': '#2C2C2C',
                        'hover-pink': '#FF9898',
                        'tec-green': '#13934A',
                        'tec-green-dark': '#044C26',
                    }
                }
            }
        }
    </script>

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
        #indicadorChart40 {
            max-width: 300px;
            max-height: 300px;
        }

        .chart-container {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .chart-container canvas {
            max-width: 300px;
            max-height: 300px;
        }

        .percentage-list {
            margin-left: 20px;
            flex: 1;
        }
    </style>
</head>

<body class="font-montserrat bg-cover bg-center bg-fixed min-h-screen flex flex-col bg-[url('{{ asset('multimedia/fondo.jpg') }}')]">

    <!-- Header -->
    <div class="bg-tec-green shadow-[0_12px_14px_rgba(0,0,0,0.25)] h-16 md:h-24 flex items-center justify-between md:justify-center relative z-40 px-4">
        <button id="menuToggle" class="md:hidden text-white text-2xl z-50">
            <i class="fa-solid fa-bars"></i>
        </button>
        
        <div class="absolute left-5 hidden md:flex gap-4 items-center">
            <img src="{{ asset('multimedia/tesi.png') }}" alt="Logo TESI" class="h-12 md:h-16">
            <img src="{{ asset('multimedia/isclogo.png') }}" alt="Logo ISC" class="h-12 md:h-16">
        </div>
        <h1 class="text-white font-bold text-lg md:text-4xl tracking-wider">SISTEMA DE TUTORIAS</h1>
        <div class="md:hidden w-8"></div>
    </div>

    <!-- Subheader -->
    <div class="bg-tec-green shadow-[0_12px_14px_rgba(0,0,0,0.25)] h-10 md:h-12 flex items-center justify-center relative z-20">
        <h2 class="text-white font-bold text-base md:text-2xl tracking-wide">GRÁFICOS DE FICHA</h2>
    </div>

    <!-- Main Container -->
    <div class="flex flex-1 overflow-hidden relative">
        
        <!-- Overlay -->
        <div id="overlay" class="hidden fixed inset-0 bg-black/50 z-30 md:hidden"></div>
        
        <!-- Sidebar -->
        <div id="sidebar" class="bg-sidebar-dark w-64 flex flex-col gap-1.5 md:gap-2 shadow-[4px_0_10px_rgba(0,0,0,0.3)]
            fixed md:absolute top-0 left-0 h-full z-40 md:z-30
            transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out
            p-4 md:p-6 overflow-y-auto">
            
            <button id="closeMenu" class="md:hidden self-end text-white text-2xl mb-3">
                <i class="fa-solid fa-times"></i>
            </button>
            
            <!-- Grupo (siempre en rosa) -->
            <div class="text-hover-pink px-5 py-3 md:py-4 rounded-lg font-bold text-sm md:text-base flex items-center gap-2 md:gap-3 bg-hover-pink/10">
                <i class="fa-solid fa-users text-lg w-5"></i>
                <span>Grupo {{ $grupo->clave_grupo }}</span>
            </div>
            
            <div class="border-t border-white/20 my-2"></div>
            
            <!-- Graficar Ficha (activo) -->
            <div class="text-hover-pink px-5 py-3 md:py-4 rounded-lg font-bold text-sm md:text-base flex items-center gap-2 md:gap-3 bg-hover-pink/10">
                <i class="fa-solid fa-chart-column text-lg w-5"></i>
                <span>Graficar Ficha</span>
            </div>
            
            <a href="{{ route('maestro.graficar2', $grupo->clave_grupo) }}" 
               class="text-white no-underline px-5 py-3 md:py-4 rounded-lg transition-all duration-300 font-medium text-sm md:text-base flex items-center gap-2 md:gap-3 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-chart-pie text-lg w-5"></i>
                <span>Graficar Habilidades</span>
            </a>
            
            <a href="{{ route('maestro.pat', $grupo->id_grupo) }}" 
               class="text-white no-underline px-5 py-3 md:py-4 rounded-lg transition-all duration-300 font-medium text-sm md:text-base flex items-center gap-2 md:gap-3 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-clipboard-list text-lg w-5"></i>
                <span>Plan de Acción</span>
            </a>
            
            <a href="{{ route('maestro.semestral.form', $grupo->id_grupo) }}" 
               class="text-white no-underline px-5 py-3 md:py-4 rounded-lg transition-all duration-300 font-medium text-sm md:text-base flex items-center gap-2 md:gap-3 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-file-pen text-lg w-5"></i>
                <span>Llenar Reporte</span>
            </a>
            
            <div class="border-t border-white/20 my-2"></div>
            
            <a href="{{ route('maestro.grupos') }}" 
               class="text-white no-underline px-5 py-3 md:py-4 rounded-lg transition-all duration-300 font-medium text-sm md:text-base flex items-center gap-2 md:gap-3 hover:text-hover-pink hover:bg-hover-pink/10 hover:translate-x-1">
                <i class="fa-solid fa-arrow-left text-lg w-5"></i>
                <span>Volver a Mis Grupos</span>
            </a>
        </div>

        <!-- Content Area -->
        <div class="flex-1 p-4 md:p-8 overflow-y-auto md:ml-64">
            <div class="bg-tec-green-dark/85 backdrop-blur-md rounded-xl md:rounded-2xl p-4 md:p-8 w-full shadow-[0_8px_32px_rgba(0,0,0,0.3)] mb-8">
                
                <h3 class="text-white text-lg sm:text-xl md:text-2xl font-bold mb-4 md:mb-6 text-center border-b-2 border-white/30 pb-3 md:pb-4">
                    INDICADORES PSICOFISIOLÓGICOS
                </h3>

    <div class="chart-container">
        <div>
            <h3>Manos y/o pies hinchados</h3>
            <button onclick="cambiarTipo('bar', 'indicador1')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador1')">Mostrar Pastel</button>
            <canvas id="indicadorChart1"></canvas>
        </div>
        <div class="percentage-list" id="percentageList1"></div>
    </div>

    <div class="chart-container">
        <div>
            <!-- Gráfico para el indicador 2 -->
            <h3>Dolores en el vientre</h3>
            <button onclick="cambiarTipo('bar', 'indicador2')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador2')">Mostrar Pastel</button>
            <canvas id="indicadorChart2"></canvas>
        </div>
        <div class="percentage-list" id="percentageList2"></div>
    </div>




    <div class="chart-container">
        <div>
            <!-- Gráfico para el indicador 3 -->
            <h3>Dolores de cabeza y/o vómitos</h3>
            <button onclick="cambiarTipo('bar', 'indicador3')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador3')">Mostrar Pastel</button>
            <canvas id="indicadorChart3"></canvas>
        </div>
        <div class="percentage-list" id="percentageList3"></div>
    </div>


    <div class="chart-container">
        <div>
            <!-- Gráfico para el indicador 4 -->
            <h3>Pérdida del equilibrio</h3>
            <button onclick="cambiarTipo('bar', 'indicado4')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador4')">Mostrar Pastel</button>
            <canvas id="indicadorChart4"></canvas>
        </div>
        <div class="percentage-list" id="percentageList4"></div>
    </div>



    <div class="chart-container">
        <div>
            <!-- Gráfico para el indicador 5 -->
            <h3>Fatiga y agotamiento</h3>
            <button onclick="cambiarTipo('bar', 'indicador5')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador5')">Mostrar Pastel</button>
            <canvas id="indicadorChart5"></canvas>
        </div>
        <div class="percentage-list" id="percentageList5"></div>
    </div>



    <div class="chart-container">
        <div>
            <!-- Gráfico para el indicador 6 -->
            <h3>Pérdida de vista u oído</h3>
            <button onclick="cambiarTipo('bar', 'indicador6')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador6')">Mostrar Pastel</button>
            <canvas id="indicadorChart6"></canvas>
        </div>
        <div class="percentage-list" id="percentageList6"></div>
    </div>



    <div class="chart-container">
        <div>
            <!-- Gráfico para el indicador 7 -->
            <h3>Dificultades para dormir</h3>
            <button onclick="cambiarTipo('bar', 'indicador7')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador7')">Mostrar Pastel</button>
            <canvas id="indicadorChart7"></canvas>
        </div>
        <div class="percentage-list" id="percentageList7"></div>
    </div>



    <div class="chart-container">
        <div>
            <!-- Gráfico para el indicador 8 -->
            <h3>Pesadillas o terrores nocturnos</h3>
            <button onclick="cambiarTipo('bar', 'indicador8')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador8')">Mostrar Pastel</button>
            <canvas id="indicadorChart8"></canvas>
        </div>
        <div class="percentage-list" id="percentageList8"></div>
    </div>


    <div class="chart-container">
        <div>
            <!-- Gráfico para el indicador 9 -->
            <h3>Incontinencia orina/heces</h3>
            <button onclick="cambiarTipo('bar', 'indicador9')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador9')">Mostrar Pastel</button>
            <canvas id="indicadorChart9"></canvas>
        </div>
        <div class="percentage-list" id="percentageList9"></div>
    </div>


    <div class="chart-container">
        <div>
            <!-- Gráfico para el indicador 10 -->
            <h3>Tartamudeos al explicarse</h3>
            <button onclick="cambiarTipo('bar', 'indicador10')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador10')">Mostrar Pastel</button>
            <canvas id="indicadorChart10"></canvas>
        </div>
        <div class="percentage-list" id="percentageList10"></div>
    </div>


    <div class="chart-container">
        <div>
            <!-- Gráfico para el indicador 11 -->
            <h3>Miedos intensos ante cosas</h3>
            <button onclick="cambiarTipo('bar', 'indicador11')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador11')">Mostrar Pastel</button>
            <canvas id="indicadorChart11"></canvas>
        </div>
        <div class="percentage-list" id="percentageList11"></div>
    </div>



    <div class="chart-container">
        <div>
            <!-- Gráfico para el indicador 12 -->
            <h3>¿Con quién te sientes más ligado afectivamente?</h3>
            <button onclick="cambiarTipo('bar', 'indicador12')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador12')">Mostrar Pastel</button>
            <canvas id="indicadorChart12"></canvas>
        </div>
        <div class="percentage-list" id="percentageList12"></div>
    </div>



    <div class="chart-container">
        <div>
            <!-- Gráfico para el indicador 13 -->
            <h3>¿Cómo es tu relación con tus compañeros?</h3>
            <button onclick="cambiarTipo('bar', 'indicador13')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador13')">Mostrar Pastel</button>
            <canvas id="indicadorChart13"></canvas>
        </div>
        <div class="percentage-list" id="percentageList13"></div>
    </div>


    <div class="chart-container">
        <div>
            <!-- Gráfico para el indicador 14 -->
            <h3>¿Tienes pareja?</h3>
            <button onclick="cambiarTipo('bar', 'indicador14')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador14')">Mostrar Pastel</button>
            <canvas id="indicadorChart14"></canvas>
        </div>
        <div class="percentage-list" id="percentageList14"></div>
    </div>


    <!-- Contenedor del gráfico para el indicador 15 -->
    <div class="chart-container">
        <div>
            <h3>Puntual</h3>
            <button onclick="cambiarTipo('bar', 'indicador15')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador15')">Mostrar Pastel</button>
            <canvas id="indicadorChart15"></canvas>
        </div>
        <div class="percentage-list" id="percentageList15"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 16 -->
    <div class="chart-container">
        <div>
            <h3>Tímida</h3>
            <button onclick="cambiarTipo('bar', 'indicador16')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador16')">Mostrar Pastel</button>
            <canvas id="indicadorChart16"></canvas>
        </div>
        <div class="percentage-list" id="percentageList16"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 17 -->
    <div class="chart-container">
        <div>
            <h3>Alegre</h3>
            <button onclick="cambiarTipo('bar', 'indicador17')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador17')">Mostrar Pastel</button>
            <canvas id="indicadorChart17"></canvas>
        </div>
        <div class="percentage-list" id="percentageList17"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 18 -->
    <div class="chart-container">
        <div>
            <h3>Agresiva</h3>
            <button onclick="cambiarTipo('bar', 'indicador18')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador18')">Mostrar Pastel</button>
            <canvas id="indicadorChart18"></canvas>
        </div>
        <div class="percentage-list" id="percentageList18"></div>
    </div>


    <!-- Contenedor del gráfico para el indicador 19 -->
    <div class="chart-container">
        <div>
            <h3>Abierto/a a las ideas de otros</h3>
            <button onclick="cambiarTipo('bar', 'indicador19')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador19')">Mostrar Pastel</button>
            <canvas id="indicadorChart19"></canvas>
        </div>
        <div class="percentage-list" id="percentageList19"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 20 -->
    <div class="chart-container">
        <div>
            <h3>Reflexivo/a</h3>
            <button onclick="cambiarTipo('bar', 'indicador20')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador20')">Mostrar Pastel</button>
            <canvas id="indicadorChart20"></canvas>
        </div>
        <div class="percentage-list" id="percentageList20"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 21 -->
    <div class="chart-container">
        <div>
            <h3>Constante</h3>
            <button onclick="cambiarTipo('bar', 'indicador21')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador21')">Mostrar Pastel</button>
            <canvas id="indicadorChart21"></canvas>
        </div>
        <div class="percentage-list" id="percentageList21"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 22 -->
    <div class="chart-container">
        <div>
            <h3>Optimista</h3>
            <button onclick="cambiarTipo('bar', 'indicador22')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador22')">Mostrar Pastel</button>
            <canvas id="indicadorChart22"></canvas>
        </div>
        <div class="percentage-list" id="percentageList22"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 23 -->
    <div class="chart-container">
        <div>
            <h3>Impulsivo/a</h3>
            <button onclick="cambiarTipo('bar', 'indicador23')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador23')">Mostrar Pastel</button>
            <canvas id="indicadorChart23"></canvas>
        </div>
        <div class="percentage-list" id="percentageList23"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 24 -->
    <div class="chart-container">
        <div>
            <h3>Silencioso</h3>
            <button onclick="cambiarTipo('bar', 'indicador24')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador24')">Mostrar Pastel</button>
            <canvas id="indicadorChart24"></canvas>
        </div>
        <div class="percentage-list" id="percentageList24"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 25 -->
    <div class="chart-container">
        <div>
            <h3>Generoso</h3>
            <button onclick="cambiarTipo('bar', 'indicador25')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador25')">Mostrar Pastel</button>
            <canvas id="indicadorChart25"></canvas>
        </div>
        <div class="percentage-list" id="percentageList25"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 26 -->
    <div class="chart-container">
        <div>
            <h3>Inquieto</h3>
            <button onclick="cambiarTipo('bar', 'indicador26')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador26')">Mostrar Pastel</button>
            <canvas id="indicadorChart26"></canvas>
        </div>
        <div class="percentage-list" id="percentageList26"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 27 -->
    <div class="chart-container">
        <div>
            <h3>Cambios de humor</h3>
            <button onclick="cambiarTipo('bar', 'indicador27')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador27')">Mostrar Pastel</button>
            <canvas id="indicadorChart27"></canvas>
        </div>
        <div class="percentage-list" id="percentageList27"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 28 -->
    <div class="chart-container">
        <div>
            <h3>Dominante</h3>
            <button onclick="cambiarTipo('bar', 'indicador28')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador28')">Mostrar Pastel</button>
            <canvas id="indicadorChart28"></canvas>
        </div>
        <div class="percentage-list" id="percentageList28"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 29 -->
    <div class="chart-container">
        <div>
            <h3>Egoísta</h3>
            <button onclick="cambiarTipo('bar', 'indicador29')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador29')">Mostrar Pastel</button>
            <canvas id="indicadorChart29"></canvas>
        </div>
        <div class="percentage-list" id="percentageList29"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 30 -->
    <div class="chart-container">
        <div>
            <h3>Sumiso</h3>
            <button onclick="cambiarTipo('bar', 'indicador30')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador30')">Mostrar Pastel</button>
            <canvas id="indicadorChart30"></canvas>
        </div>
        <div class="percentage-list" id="percentageList30"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 31 -->
    <div class="chart-container">
        <div>
            <h3>Confiado en sí mismo</h3>
            <button onclick="cambiarTipo('bar', 'indicador31')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador31')">Mostrar Pastel</button>
            <canvas id="indicadorChart31"></canvas>
        </div>
        <div class="percentage-list" id="percentageList31"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 32 -->
    <div class="chart-container">
        <div>
            <h3>Imaginativo</h3>
            <button onclick="cambiarTipo('bar', 'indicador32')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador32')">Mostrar Pastel</button>
            <canvas id="indicadorChart32"></canvas>
        </div>
        <div class="percentage-list" id="percentageList32"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 33 -->
    <div class="chart-container">
        <div>
            <h3>Con iniciativa propia</h3>
            <button onclick="cambiarTipo('bar', 'indicador33')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador33')">Mostrar Pastel</button>
            <canvas id="indicadorChart33"></canvas>
        </div>
        <div class="percentage-list" id="percentageList33"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 34 -->
    <div class="chart-container">
        <div>
            <h3>Sociable</h3>
            <button onclick="cambiarTipo('bar', 'indicador34')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador34')">Mostrar Pastel</button>
            <canvas id="indicadorChart34"></canvas>
        </div>
        <div class="percentage-list" id="percentageList34"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 35 -->
    <div class="chart-container">
        <div>
            <h3>Responsable</h3>
            <button onclick="cambiarTipo('bar', 'indicador35')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador35')">Mostrar Pastel</button>
            <canvas id="indicadorChart35"></canvas>
        </div>
        <div class="percentage-list" id="percentageList35"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 36 -->
    <div class="chart-container">
        <div>
            <h3>Perseverante</h3>
            <button onclick="cambiarTipo('bar', 'indicador36')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador36')">Mostrar Pastel</button>
            <canvas id="indicadorChart36"></canvas>
        </div>
        <div class="percentage-list" id="percentageList36"></div>
    </div>
    <!-- Contenedor del gráfico para el indicador 37 -->
    <div class="chart-container">
        <div>
            <h3>Motivado</h3>
            <button onclick="cambiarTipo('bar', 'indicador37')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador37)">Mostrar Pastel</button>
            <canvas id="indicadorChart37"></canvas>
        </div>
        <div class="percentage-list" id="percentageList37"></div>
    </div>


    <!-- Contenedor del gráfico para el indicador 38 -->
    <div class="chart-container">
        <div>
            <h3>Activo</h3>
            <button onclick="cambiarTipo('bar', 'indicador38')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador38')">Mostrar Pastel</button>
            <canvas id="indicadorChart38"></canvas>
        </div>
        <div class="percentage-list" id="percentageList38"></div>
    </div>


    <!-- Contenedor del gráfico para el indicador 39 -->
    <div class="chart-container">
        <div>
            <h3>Independiente</h3>
            <button onclick="cambiarTipo('bar', 'indicador39')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador39')">Mostrar Pastel</button>
            <canvas id="indicadorChart39"></canvas>
        </div>
        <div class="percentage-list" id="percentageList39"></div>
    </div>

    <!-- Contenedor del gráfico para el indicador 40 -->
    <div class="chart-container">
        <div>
            <h3>¿Tienes asignaturas reprobadas?</h3>
            <button onclick="cambiarTipo('bar', 'indicador40')">Mostrar Barra</button>
            <button onclick="cambiarTipo('pie', 'indicador40')">Mostrar Pastel</button>
            <canvas id="indicadorChart40"></canvas>
        </div>
        <div class="percentage-list" id="percentageList40"></div>
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


        var data1 = @json($data->pluck('total'));
        var labels1 = @json($data->pluck('indicador_psicofisiologico_1')).map(l => l === null ? 'Sin respuesta' : l);
        var total1 = data1.reduce((acc, val) => acc + val, 0);

        var data2 = @json($data_1->pluck('total'));
        var labels2 = @json($data_1->pluck('indicador_psicofisiologico_2')).map(l => l === null ? 'Sin respuesta' : l);
        var total2 = data2.reduce((acc, val) => acc + val, 0);

        var data3 = @json($data_2->pluck('total'));
        var labels3 = @json($data_2->pluck('indicador_psicofisiologico_3')).map(l => l === null ? 'Sin respuesta' : l);
        var total3 = data3.reduce((acc, val) => acc + val, 0);

        var data4 = @json($data_3->pluck('total'));
        var labels4 = @json($data_3->pluck('indicador_psicofisiologico_4')).map(l => l === null ? 'Sin respuesta' : l);
        var total4 = data4.reduce((acc, val) => acc + val, 0);

        var data5 = @json($data_4->pluck('total'));
        var labels5 = @json($data_4->pluck('indicador_psicofisiologico_5')).map(l => l === null ? 'Sin respuesta' : l);
        var total5 = data5.reduce((acc, val) => acc + val, 0);


        var data6 = @json($data_5->pluck('total'));
        var labels6 = @json($data_5->pluck('indicador_psicofisiologico_6')).map(l => l === null ? 'Sin respuesta' : l);
        var total6 = data6.reduce((acc, val) => acc + val, 0);

        var data7 = @json($data_6->pluck('total'));
        var labels7 = @json($data_6->pluck('indicador_psicofisiologico_7')).map(l => l === null ? 'Sin respuesta' : l);
        var total7 = data7.reduce((acc, val) => acc + val, 0);

        var data8 = @json($data_7->pluck('total'));
        var labels8 = @json($data_7->pluck('indicador_psicofisiologico_8')).map(l => l === null ? 'Sin respuesta' : l);
        var total8 = data8.reduce((acc, val) => acc + val, 0);

        var data9 = @json($data_8->pluck('total'));
        var labels9 = @json($data_8->pluck('indicador_psicofisiologico_9')).map(l => l === null ? 'Sin respuesta' : l);
        var total9 = data9.reduce((acc, val) => acc + val, 0);

        var data10 = @json($data_9->pluck('total'));
        var labels10 = @json($data_9->pluck('indicador_psicofisiologico_10')).map(l => l === null ? 'Sin respuesta' : l);
        var total10 = data10.reduce((acc, val) => acc + val, 0);

        var data11 = @json($data_10->pluck('total'));
        var labels11 = @json($data_10->pluck('indicador_psicofisiologico_11')).map(l => l === null ? 'Sin respuesta' : l);
        var total11 = data11.reduce((acc, val) => acc + val, 0);

        var data12 = @json($data_11->pluck('total'));
        var labels12 = @json($data_11->pluck('indicador_8')).map(l => l === null ? 'Sin respuesta' : l);
        var total12 = data12.reduce((acc, val) => acc + val, 0);

        var data13 = @json($data_12->pluck('total'));
        var labels13 = @json($data_12->pluck('indicador_1')).map(l => l === null ? 'Sin respuesta' : l);
        var total13 = data13.reduce((acc, val) => acc + val, 0);

        var data14 = @json($data_13->pluck('total'));
        var labels14 = @json($data_13->pluck('indicador_3')).map(l => l === null ? 'Sin respuesta' : l);
        var total14 = data14.reduce((acc, val) => acc + val, 0);

        //si

        // Variables para el indicador 15
        var data15 = @json($data_14->pluck('total'));
        var labels15 = @json($data_14->pluck('indicador_1')).map(l => l === null ? 'Sin respuesta' : l);
        var total15 = data15.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 16
        var data16 = @json($data_15->pluck('total'));
        var labels16 = @json($data_15->pluck('indicador_2')).map(l => l === null ? 'Sin respuesta' : l);
        var total16 = data16.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 17
        var data17 = @json($data_16->pluck('total'));
        var labels17 = @json($data_16->pluck('indicador_3')).map(l => l === null ? 'Sin respuesta' : l);
        var total17 = data17.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 18
        var data18 = @json($data_17->pluck('total'));
        var labels18 = @json($data_17->pluck('indicador_4')).map(l => l === null ? 'Sin respuesta' : l);
        var total18 = data18.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 19
        var data19 = @json($data_18->pluck('total'));
        var labels19 = @json($data_18->pluck('indicador_5')).map(l => l === null ? 'Sin respuesta' : l);
        var total19 = data19.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 20
        var data20 = @json($data_19->pluck('total'));
        var labels20 = @json($data_19->pluck('indicador_6')).map(l => l === null ? 'Sin respuesta' : l);
        var total20 = data20.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 21
        var data21 = @json($data_20->pluck('total'));
        var labels21 = @json($data_20->pluck('indicador_7')).map(l => l === null ? 'Sin respuesta' : l);
        var total21 = data21.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 22
        var data22 = @json($data_21->pluck('total'));
        var labels22 = @json($data_21->pluck('indicador_8')).map(l => l === null ? 'Sin respuesta' : l);
        var total22 = data22.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 23
        var data23 = @json($data_22->pluck('total'));
        var labels23 = @json($data_22->pluck('indicador_9')).map(l => l === null ? 'Sin respuesta' : l);
        var total23 = data23.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 24
        var data24 = @json($data_23->pluck('total'));
        var labels24 = @json($data_23->pluck('indicador_10')).map(l => l === null ? 'Sin respuesta' : l);
        var total24 = data24.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 25
        var data25 = @json($data_24->pluck('total'));
        var labels25 = @json($data_24->pluck('indicador_11')).map(l => l === null ? 'Sin respuesta' : l);
        var total25 = data25.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 26
        var data26 = @json($data_25->pluck('total'));
        var labels26 = @json($data_25->pluck('indicador_12')).map(l => l === null ? 'Sin respuesta' : l);
        var total26 = data26.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 27
        var data27 = @json($data_26->pluck('total'));
        var labels27 = @json($data_26->pluck('indicador_13')).map(l => l === null ? 'Sin respuesta' : l);
        var total27 = data27.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 28
        var data28 = @json($data_27->pluck('total'));
        var labels28 = @json($data_27->pluck('indicador_14')).map(l => l === null ? 'Sin respuesta' : l);
        var total28 = data28.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 29
        var data29 = @json($data_28->pluck('total'));
        var labels29 = @json($data_28->pluck('indicador_15')).map(l => l === null ? 'Sin respuesta' : l);
        var total29 = data29.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 30
        var data30 = @json($data_29->pluck('total'));
        var labels30 = @json($data_29->pluck('indicador_16')).map(l => l === null ? 'Sin respuesta' : l);
        var total30 = data30.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 31
        var data31 = @json($data_30->pluck('total'));
        var labels31 = @json($data_30->pluck('indicador_17')).map(l => l === null ? 'Sin respuesta' : l);
        var total31 = data31.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 32
        var data32 = @json($data_31->pluck('total'));
        var labels32 = @json($data_31->pluck('indicador_18')).map(l => l === null ? 'Sin respuesta' : l);
        var total32 = data32.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 33
        var data33 = @json($data_32->pluck('total'));
        var labels33 = @json($data_32->pluck('indicador_19')).map(l => l === null ? 'Sin respuesta' : l);
        var total33 = data33.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 34
        var data34 = @json($data_33->pluck('total'));
        var labels34 = @json($data_33->pluck('indicador_20')).map(l => l === null ? 'Sin respuesta' : l);
        var total34 = data34.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 35
        var data35 = @json($data_34->pluck('total'));
        var labels35 = @json($data_34->pluck('indicador_21')).map(l => l === null ? 'Sin respuesta' : l);
        var total35 = data35.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 36
        var data36 = @json($data_35->pluck('total'));
        var labels36 = @json($data_35->pluck('indicador_22')).map(l => l === null ? 'Sin respuesta' : l);
        var total36 = data36.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 37
        var data37 = @json($data_36->pluck('total'));
        var labels37 = @json($data_36->pluck('indicador_23')).map(l => l === null ? 'Sin respuesta' : l);
        var total37 = data37.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 38
        var data38 = @json($data_37->pluck('total'));
        var labels38 = @json($data_37->pluck('indicador_24')).map(l => l === null ? 'Sin respuesta' : l);
        var total38 = data38.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 39
        var data39 = @json($data_38->pluck('total'));
        var labels39 = @json($data_38->pluck('indicador_25')).map(l => l === null ? 'Sin respuesta' : l);
        var total39 = data39.reduce((acc, val) => acc + val, 0);

        // Variables para el indicador 40
        var data40 = @json($data_39->pluck('total'));
        var labels40 = @json($data_39->pluck('indicador_psicopedagogico_8')).map(l => l === null ? 'Sin respuesta' : l);
        var total40 = data40.reduce((acc, val) => acc + val, 0);


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

        // Configuración del gráfico para indicador_psicofisiologico_1
        var config1 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: @json($data->pluck('indicador_psicofisiologico_1')), // Valores únicos del indicador 1
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

        // Configuración del gráfico para indicador_psicofisiologico_2
        var config2 = {
            type: 'bar', // Tipo inicial del gráfico
            data: {
                labels: {!! json_encode($data_1->pluck('indicador_psicofisiologico_2')) !!}, // Valores únicos del indicador 2
                datasets: [{
                    label: 'Número de estudiantes (Indicador 2)',
                    data: {!! json_encode($data_1->pluck('total')) !!}, // Cantidad de estudiantes con ese valor en indicador 2
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
                labels: @json($data_2->pluck('indicador_psicofisiologico_3')), // Valores únicos del indicador 2
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
                labels: @json($data_3->pluck('indicador_psicofisiologico_4')), // Valores únicos del indicador 4
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
                labels: @json($data_4->pluck('indicador_psicofisiologico_5')), // Valores únicos del indicador 5
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
                labels: @json($data_5->pluck('indicador_psicofisiologico_6')), // Valores únicos del indicador 6
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
                labels: @json($data_6->pluck('indicador_psicofisiologico_7')), // Valores únicos del indicador 7
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
                labels: @json($data_7->pluck('indicador_psicofisiologico_8')), // Valores únicos del indicador 8
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
                labels: @json($data_8->pluck('indicador_psicofisiologico_9')), // Valores únicos del indicador 9
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
                labels: @json($data_9->pluck('indicador_psicofisiologico_10')), // Valores únicos del indicador 10
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
                labels: @json($data_10->pluck('indicador_psicofisiologico_11')), // Valores únicos del indicador 11
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
                labels: @json($data_11->pluck('indicador_8')), // Valores únicos del indicador 12
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
                labels: @json($data_12->pluck('indicador_1')), // Valores únicos del indicador 13
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
                labels: @json($data_13->pluck('indicador_3')), // Valores únicos del indicador 14
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
                labels: @json($data_14->pluck('indicador_1')),
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
                labels: @json($data_15->pluck('indicador_2')),
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
                labels: @json($data_16->pluck('indicador_3')),
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
                labels: @json($data_17->pluck('indicador_4')),
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
                labels: @json($data_18->pluck('indicador_5')),
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
                labels: @json($data_19->pluck('indicador_6')),
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
                labels: @json($data_20->pluck('indicador_7')),
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
                labels: @json($data_21->pluck('indicador_8')),
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
                labels: @json($data_22->pluck('indicador_9')),
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
                labels: @json($data_23->pluck('indicador_10')),
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
                labels: @json($data_24->pluck('indicador_11')),
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
                labels: @json($data_25->pluck('indicador_12')),
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
                labels: @json($data_26->pluck('indicador_13')),
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
                labels: @json($data_27->pluck('indicador_14')),
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
                labels: @json($data_28->pluck('indicador_15')),
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
                labels: @json($data_29->pluck('indicador_16')),
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
                labels: @json($data_30->pluck('indicador_17')),
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
                labels: @json($data_31->pluck('indicador_18')),
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
                labels: @json($data_32->pluck('indicador_19')),
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
                labels: @json($data_33->pluck('indicador_20')),
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
                labels: @json($data_34->pluck('indicador_21')),
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
                labels: @json($data_35->pluck('indicador_22')),
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
                labels: @json($data_36->pluck('indicador_23')),
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
                labels: @json($data_37->pluck('indicador_24')),
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
                labels: @json($data_38->pluck('indicador_25')),
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
                labels: @json($data_39->pluck('indicador_psicopedagogico_8')),
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
            }
        }
    </script>

    <script>
        function generatePDF() {
            // Usar window.jspdf.jsPDF para acceder a la clase jsPDF
            const doc = new window.jspdf.jsPDF();

            // Obtener los datos y las etiquetas
            var data1 = @json($data->pluck('total'));
            var labels1 = @json($data->pluck('indicador_psicofisiologico_1')).map(l => l === null ? 'Sin respuesta' : l);
            var total1 = data1.reduce((acc, val) => acc + val, 0);

            var data2 = @json($data_1->pluck('total'));
            var labels2 = @json($data_1->pluck('indicador_psicofisiologico_2')).map(l => l === null ? 'Sin respuesta' : l);
            var total2 = data2.reduce((acc, val) => acc + val, 0);

            var data3 = @json($data_2->pluck('total'));
            var labels3 = @json($data_2->pluck('indicador_psicofisiologico_3')).map(l => l === null ? 'Sin respuesta' : l);
            var total3 = data3.reduce((acc, val) => acc + val, 0);

            var data4 = @json($data_3->pluck('total'));
            var labels4 = @json($data_3->pluck('indicador_psicofisiologico_4')).map(l => l === null ? 'Sin respuesta' : l);
            var total4 = data4.reduce((acc, val) => acc + val, 0);

            var data5 = @json($data_4->pluck('total'));
            var labels5 = @json($data_4->pluck('indicador_psicofisiologico_5')).map(l => l === null ? 'Sin respuesta' : l);
            var total5 = data5.reduce((acc, val) => acc + val, 0);


            var data6 = @json($data_5->pluck('total'));
            var labels6 = @json($data_5->pluck('indicador_psicofisiologico_6')).map(l => l === null ? 'Sin respuesta' : l);
            var total6 = data6.reduce((acc, val) => acc + val, 0);

            var data7 = @json($data_6->pluck('total'));
            var labels7 = @json($data_6->pluck('indicador_psicofisiologico_7')).map(l => l === null ? 'Sin respuesta' : l);
            var total7 = data7.reduce((acc, val) => acc + val, 0);

            var data8 = @json($data_7->pluck('total'));
            var labels8 = @json($data_7->pluck('indicador_psicofisiologico_8')).map(l => l === null ? 'Sin respuesta' : l);
            var total8 = data8.reduce((acc, val) => acc + val, 0);

            var data9 = @json($data_8->pluck('total'));
            var labels9 = @json($data_8->pluck('indicador_psicofisiologico_9')).map(l => l === null ? 'Sin respuesta' : l);
            var total9 = data9.reduce((acc, val) => acc + val, 0);

            var data10 = @json($data_9->pluck('total'));
            var labels10 = @json($data_9->pluck('indicador_psicofisiologico_10')).map(l => l === null ? 'Sin respuesta' : l);
            var total10 = data10.reduce((acc, val) => acc + val, 0);

            var data11 = @json($data_10->pluck('total'));
            var labels11 = @json($data_10->pluck('indicador_psicofisiologico_11')).map(l => l === null ? 'Sin respuesta' : l);
            var total11 = data11.reduce((acc, val) => acc + val, 0);

            var data12 = @json($data_11->pluck('total'));
            var labels12 = @json($data_11->pluck('indicador_8')).map(l => l === null ? 'Sin respuesta' : l);
            var total12 = data12.reduce((acc, val) => acc + val, 0);

            var data13 = @json($data_12->pluck('total'));
            var labels13 = @json($data_12->pluck('indicador_1')).map(l => l === null ? 'Sin respuesta' : l);
            var total13 = data13.reduce((acc, val) => acc + val, 0);

            var data14 = @json($data_13->pluck('total'));
            var labels14 = @json($data_13->pluck('indicador_3')).map(l => l === null ? 'Sin respuesta' : l);
            var total14 = data14.reduce((acc, val) => acc + val, 0);

            //si

            // Variables para el indicador 15
            var data15 = @json($data_14->pluck('total'));
            var labels15 = @json($data_14->pluck('indicador_1')).map(l => l === null ? 'Sin respuesta' : l);
            var total15 = data15.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 16
            var data16 = @json($data_15->pluck('total'));
            var labels16 = @json($data_15->pluck('indicador_2')).map(l => l === null ? 'Sin respuesta' : l);
            var total16 = data16.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 17
            var data17 = @json($data_16->pluck('total'));
            var labels17 = @json($data_16->pluck('indicador_3')).map(l => l === null ? 'Sin respuesta' : l);
            var total17 = data17.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 18
            var data18 = @json($data_17->pluck('total'));
            var labels18 = @json($data_17->pluck('indicador_4')).map(l => l === null ? 'Sin respuesta' : l);
            var total18 = data18.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 19
            var data19 = @json($data_18->pluck('total'));
            var labels19 = @json($data_18->pluck('indicador_5')).map(l => l === null ? 'Sin respuesta' : l);
            var total19 = data19.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 20
            var data20 = @json($data_19->pluck('total'));
            var labels20 = @json($data_19->pluck('indicador_6')).map(l => l === null ? 'Sin respuesta' : l);
            var total20 = data20.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 21
            var data21 = @json($data_20->pluck('total'));
            var labels21 = @json($data_20->pluck('indicador_7')).map(l => l === null ? 'Sin respuesta' : l);
            var total21 = data21.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 22
            var data22 = @json($data_21->pluck('total'));
            var labels22 = @json($data_21->pluck('indicador_8')).map(l => l === null ? 'Sin respuesta' : l);
            var total22 = data22.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 23
            var data23 = @json($data_22->pluck('total'));
            var labels23 = @json($data_22->pluck('indicador_9')).map(l => l === null ? 'Sin respuesta' : l);
            var total23 = data23.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 24
            var data24 = @json($data_23->pluck('total'));
            var labels24 = @json($data_23->pluck('indicador_10')).map(l => l === null ? 'Sin respuesta' : l);
            var total24 = data24.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 25
            var data25 = @json($data_24->pluck('total'));
            var labels25 = @json($data_24->pluck('indicador_11')).map(l => l === null ? 'Sin respuesta' : l);
            var total25 = data25.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 26
            var data26 = @json($data_25->pluck('total'));
            var labels26 = @json($data_25->pluck('indicador_12')).map(l => l === null ? 'Sin respuesta' : l);
            var total26 = data26.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 27
            var data27 = @json($data_26->pluck('total'));
            var labels27 = @json($data_26->pluck('indicador_13')).map(l => l === null ? 'Sin respuesta' : l);
            var total27 = data27.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 28
            var data28 = @json($data_27->pluck('total'));
            var labels28 = @json($data_27->pluck('indicador_14')).map(l => l === null ? 'Sin respuesta' : l);
            var total28 = data28.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 29
            var data29 = @json($data_28->pluck('total'));
            var labels29 = @json($data_28->pluck('indicador_15')).map(l => l === null ? 'Sin respuesta' : l);
            var total29 = data29.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 30
            var data30 = @json($data_29->pluck('total'));
            var labels30 = @json($data_29->pluck('indicador_16')).map(l => l === null ? 'Sin respuesta' : l);
            var total30 = data30.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 31
            var data31 = @json($data_30->pluck('total'));
            var labels31 = @json($data_30->pluck('indicador_17')).map(l => l === null ? 'Sin respuesta' : l);
            var total31 = data31.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 32
            var data32 = @json($data_31->pluck('total'));
            var labels32 = @json($data_31->pluck('indicador_18')).map(l => l === null ? 'Sin respuesta' : l);
            var total32 = data32.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 33
            var data33 = @json($data_32->pluck('total'));
            var labels33 = @json($data_32->pluck('indicador_19')).map(l => l === null ? 'Sin respuesta' : l);
            var total33 = data33.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 34
            var data34 = @json($data_33->pluck('total'));
            var labels34 = @json($data_33->pluck('indicador_20')).map(l => l === null ? 'Sin respuesta' : l);
            var total34 = data34.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 35
            var data35 = @json($data_34->pluck('total'));
            var labels35 = @json($data_34->pluck('indicador_21')).map(l => l === null ? 'Sin respuesta' : l);
            var total35 = data35.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 36
            var data36 = @json($data_35->pluck('total'));
            var labels36 = @json($data_35->pluck('indicador_22')).map(l => l === null ? 'Sin respuesta' : l);
            var total36 = data36.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 37
            var data37 = @json($data_36->pluck('total'));
            var labels37 = @json($data_36->pluck('indicador_23')).map(l => l === null ? 'Sin respuesta' : l);
            var total37 = data37.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 38
            var data38 = @json($data_37->pluck('total'));
            var labels38 = @json($data_37->pluck('indicador_24')).map(l => l === null ? 'Sin respuesta' : l);
            var total38 = data38.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 39
            var data39 = @json($data_38->pluck('total'));
            var labels39 = @json($data_38->pluck('indicador_25')).map(l => l === null ? 'Sin respuesta' : l);
            var total39 = data39.reduce((acc, val) => acc + val, 0);

            // Variables para el indicador 40
            var data40 = @json($data_39->pluck('total'));
            var labels40 = @json($data_39->pluck('indicador_psicopedagogico_8')).map(l => l === null ? 'Sin respuesta' : l);
            var total40 = data40.reduce((acc, val) => acc + val, 0);
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
            doc.save('grafica_y_porcentajes.pdf');
            doc.save('grafica_y_porcentajes.pdf');
        }
    </script>

            </div>
        </div>
    </div>

    <!-- JavaScript para el menú hamburguesa -->
    <script>
        const menuToggle = document.getElementById('menuToggle');
        const closeMenu = document.getElementById('closeMenu');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        });

        const closeSidebar = () => {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
            document.body.style.overflow = '';
        };

        closeMenu.addEventListener('click', closeSidebar);
        overlay.addEventListener('click', closeSidebar);

        const sidebarLinks = sidebar.querySelectorAll('a');
        sidebarLinks.forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth < 768) {
                    closeSidebar();
                }
            });
        });
    </script>

</body>

</html>
