<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ACERCA DE NOSOTROS</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        montserrat: ['Montserrat', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>

<body class="bg-cover bg-center min-h-screen md:min-h-[125vh] flex flex-col bg-[url('{{ asset('multimedia/fondo.jpg') }}')] md:[zoom:80%]">

    <!-- Barra superior verde -->
    <div class="w-full h-24 bg-[#13934A] shadow-[0_12px_14px_rgba(0,0,0,0.25)] z-20 flex items-center justify-center gap-4 relative">
        <img src="{{ asset('multimedia/tecnmlogo.png') }}" alt="Logo TecNM" class="absolute left-4 h-[83px] hidden md:block">
        <img src="{{ asset('multimedia/tesi.png') }}" alt="Logo TESI" class="h-12 md:hidden">
        <img src="{{ asset('multimedia/isclogo.png') }}" alt="Logo ISC" class="h-20">
        <a href="{{ route('login') }}" class="hidden md:block absolute right-4 text-white font-montserrat font-bold text-sm md:text-base lg:text-lg tracking-wide hover:underline transition">
            INICIAR SESIÓN
        </a>
    </div>

    <!-- Barra secundaria verde (Título) -->
    <div class="w-full h-12 bg-[#13934A] shadow-[0_12px_14px_rgba(0,0,0,0.25)] z-10 flex items-center justify-center">
        <h2 class="text-white font-montserrat font-bold text-[16px] md:text-[24px] tracking-wide">
            ACERCA DE NOSOTROS
        </h2>
    </div>

    <!-- Contenido principal -->
    <div class="flex-grow flex items-center justify-center py-8 px-4">
        <div class="bg-[#044C26]/85 w-full max-w-4xl rounded-xl shadow-[0_8px_6px_rgba(0,0,0,0.25),7px_0_8px_rgba(0,0,0,0.25)] p-6 md:p-10 backdrop-blur-sm">
            
            <div class="text-white font-montserrat space-y-6">
                <section>
                    <h3 class="text-2xl md:text-3xl font-bold mb-4 text-[#A3E635]">Misión</h3>
                    <p class="text-base md:text-lg leading-relaxed">
                        Formar profesionales competentes en el campo de la Ingeniería en Sistemas Computacionales, 
                        con una sólida preparación científica, tecnológica y humanística, capaces de diseñar, 
                        desarrollar e implementar soluciones innovadoras que contribuyan al desarrollo sustentable 
                        de la región y del país.
                    </p>
                </section>

                <section>
                    <h3 class="text-2xl md:text-3xl font-bold mb-4 text-[#A3E635]">Visión</h3>
                    <p class="text-base md:text-lg leading-relaxed">
                        Ser un programa educativo de excelencia reconocido a nivel nacional e internacional por la 
                        calidad de sus egresados, su vinculación con el sector productivo y su contribución al 
                        desarrollo tecnológico y social de México.
                    </p>
                </section>

                <section>
                    <h3 class="text-2xl md:text-3xl font-bold mb-4 text-[#A3E635]">Valores</h3>
                    <ul class="text-base md:text-lg leading-relaxed list-disc list-inside space-y-2">
                        <li>Responsabilidad y compromiso con la sociedad</li>
                        <li>Ética profesional y honestidad académica</li>
                        <li>Innovación y creatividad tecnológica</li>
                        <li>Trabajo en equipo y colaboración</li>
                        <li>Respeto a la diversidad y al medio ambiente</li>
                        <li>Excelencia académica y mejora continua</li>
                    </ul>
                </section>

                <section>
                    <h3 class="text-2xl md:text-3xl font-bold mb-4 text-[#A3E635]">Sistema de Tutorías</h3>
                    <p class="text-base md:text-lg leading-relaxed">
                        El Sistema de Tutorías del Tecnológico de Estudios Superiores de Ixtapaluca tiene como 
                        objetivo acompañar a los estudiantes durante su trayectoria académica, brindándoles apoyo 
                        personalizado para mejorar su rendimiento académico, desarrollar habilidades profesionales 
                        y alcanzar sus metas educativas.
                    </p>
                </section>

                <div class="mt-8 text-center">
                    <a href="{{ route('login') }}" 
                       class="inline-block bg-[#13934A] hover:bg-[#0f7a3d] text-white font-bold py-3 px-8 rounded-lg shadow-lg transform hover:-translate-y-0.5 transition duration-200 text-lg">
                        Volver al Inicio
                    </a>
                </div>
            </div>

        </div>
    </div>

    <!-- Barra inferior verde delgada -->
    <div class="w-full h-8 bg-[#13934A] shadow-[0_-12px_14px_rgba(0,0,0,0.25)] z-20 flex items-center justify-center px-2">
        <p class="text-white font-montserrat text-[10px] sm:text-[11px] md:text-[12px] lg:text-[13px] font-medium tracking-wide text-center">
            © 2025 Tecnológico de Estudios Superiores de Ixtapaluca
        </p>
    </div>

</body>
</html>
