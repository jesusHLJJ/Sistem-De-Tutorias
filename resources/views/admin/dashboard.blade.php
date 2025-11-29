<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DASHBOARD ADMINISTRADOR</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
  
    <link rel="stylesheet" href="{{ asset('css/all.min.css') }}">

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

<body class="bg-cover bg-center min-h-screen flex items-center justify-center relative bg-[url('{{ asset('multimedia/fondo.jpg') }}')]">

  
    <div class="absolute top-0 left-0 w-full h-24 bg-[#13934A] shadow-[0_12px_14px_rgba(0,0,0,0.25)] z-20 flex items-center justify-start lg:justify-center pl-4 md:pl-4 lg:pl-0 gap-4">
        
      
        <div class="hidden md:flex md:relative lg:absolute lg:left-4 top-0 h-full items-center gap-4">
            <img src="{{ asset('multimedia/tesi.png') }}" alt="Logo TESI" class="h-16">
            <img src="{{ asset('multimedia/isclogo.png') }}" alt="Logo ISC" class="h-16">
        </div>

       
        <img src="{{ asset('multimedia/tesi.png') }}" alt="Logo TESI" class="md:hidden h-8 mr-2">
        
     
        <h1 class="text-white font-montserrat font-bold text-[16px] md:text-[35px] tracking-wider text-left lg:text-center leading-none">
            SISTEMA DE TUTORIAS
        </h1>
    </div>

    
    <div class="absolute top-24 left-0 w-full h-12 bg-[#13934A] shadow-[0_12px_14px_rgba(0,0,0,0.25)] z-10 flex items-center justify-center">
        <h2 class="text-white font-montserrat font-bold text-[16px] md:text-[24px] tracking-wide">
            PANEL PRINCIPAL
        </h2>
    </div>

    <!-- Contenedor Principal (Efecto Cristal) -->
    <div class="relative mt-40 sm:mt-44 md:mt-48 w-11/12 max-w-5xl bg-[#044C26]/90 rounded-xl shadow-2xl p-6 sm:p-8 md:p-12 flex flex-col items-center backdrop-blur-sm mb-10">
        
        <h3 class="text-white font-montserrat font-medium text-lg sm:text-xl mb-6 sm:mb-8 border-b border-white/30 pb-2 w-full text-center">
            Seleccione una opción para gestionar
        </h3>

        <!-- Grid de Opciones las tarjetas pues-->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 sm:gap-6 md:gap-8 w-full">

            <!--  PROFESORES -->
            <a href="{{ route('admin.profesores.dashboard') }}" 
               class="group bg-white/10 hover:bg-white/20 border border-white/20 rounded-xl p-4 sm:p-6 flex flex-col items-center justify-center gap-3 sm:gap-4 transition-all duration-300 hover:scale-105 hover:shadow-lg cursor-pointer h-40 sm:h-44 md:h-48">
                <div class="bg-white text-[#13934A] p-3 sm:p-4 rounded-full shadow-lg group-hover:bg-[#13934A] group-hover:text-white transition-colors">
                    <!-- Ícono FontAwesome -->
                    <i class="fa-solid fa-chalkboard-user text-2xl sm:text-3xl"></i>
                </div>
                <span class="text-white font-montserrat font-bold text-base sm:text-lg tracking-wide group-hover:text-[#A3E635] transition-colors">PROFESORES</span>
            </a>

            <!--  GRUPOS -->
            <a href="{{ route('admin.grupos.dashboard') }}" 
               class="group bg-white/10 hover:bg-white/20 border border-white/20 rounded-xl p-4 sm:p-6 flex flex-col items-center justify-center gap-3 sm:gap-4 transition-all duration-300 hover:scale-105 hover:shadow-lg cursor-pointer h-40 sm:h-44 md:h-48">
                <div class="bg-white text-[#13934A] p-3 sm:p-4 rounded-full shadow-lg group-hover:bg-[#13934A] group-hover:text-white transition-colors">
                    <i class="fa-solid fa-users-rectangle text-2xl sm:text-3xl"></i>
                </div>
                <span class="text-white font-montserrat font-bold text-base sm:text-lg tracking-wide group-hover:text-[#A3E635] transition-colors">GRUPOS</span>
            </a>

            <!-- Botón ALUMNOS -->
            <a href="{{ route('admin.alumnos.dashboard') }}" 
               class="group bg-white/10 hover:bg-white/20 border border-white/20 rounded-xl p-4 sm:p-6 flex flex-col items-center justify-center gap-3 sm:gap-4 transition-all duration-300 hover:scale-105 hover:shadow-lg cursor-pointer h-40 sm:h-44 md:h-48 sm:col-span-2 md:col-span-1">
                <div class="bg-white text-[#13934A] p-3 sm:p-4 rounded-full shadow-lg group-hover:bg-[#13934A] group-hover:text-white transition-colors">
                    <i class="fa-solid fa-user-graduate text-2xl sm:text-3xl"></i>
                </div>
                <span class="text-white font-montserrat font-bold text-base sm:text-lg tracking-wide group-hover:text-[#A3E635] transition-colors">ALUMNOS</span>
            </a>

        </div>

        <!-- Botón Cerrar Sesión -->
        <div class="mt-8 sm:mt-12 w-full border-t border-white/20 pt-4 sm:pt-6 flex justify-center">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="flex items-center gap-2 sm:gap-3 bg-red-600 hover:bg-red-700 text-white font-montserrat font-bold py-2 sm:py-3 px-6 sm:px-8 rounded-lg shadow-lg transform hover:-translate-y-1 transition duration-200 text-base sm:text-lg">
                    <i class="fa-solid fa-right-from-bracket"></i>
                    Cerrar Sesión
                </button>
            </form>
        </div>

    </div>

</body>
</html>