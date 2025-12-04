@use('App\Models\User')
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REGISTRO</title>
    
    <!-- Fuente Montserrat -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    
    <!-- 1. CDN DE TAILWIND (Para que funcione sin npm run dev) -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Configuración para la fuente Montserrat -->
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

<body class="bg-cover bg-center min-h-screen md:min-h-[125vh] flex items-center justify-center relative bg-[url('{{ asset('multimedia/fondo.jpg') }}')] md:[zoom:80%]">
    <!-- Barra superior verde -->
    <div class="absolute top-0 left-0 w-full h-24 bg-[#13934A] shadow-[0_12px_14px_rgba(0,0,0,0.25)] z-20 flex items-center justify-start lg:justify-center pl-4 md:pl-4 lg:pl-0 gap-4">
        
        <!-- Logos Desktop -->
        <div class="hidden md:flex md:relative lg:absolute lg:left-4 top-0 h-full items-center gap-4">
            <img src="{{ asset('multimedia/tesi.png') }}" alt="Logo TESI" class="h-16">
            <img src="{{ asset('multimedia/isclogo.png') }}" alt="Logo ISC" class="h-16">
        </div>

        <!-- Logo TESI Móvil -->
        <img src="{{ asset('multimedia/tesi.png') }}" alt="Logo TESI" class="md:hidden h-8 mr-2">
        
        <!-- Texto central -->
        <h1 class="text-white font-montserrat font-bold text-[16px] md:text-[40px] tracking-wider text-left lg:text-center leading-none">
            SISTEMA DE TUTORIAS
        </h1>
    </div>

    <!-- Barra secundaria verde (Título) -->
    <div class="absolute top-24 left-0 w-full h-12 bg-[#13934A] shadow-[0_12px_14px_rgba(0,0,0,0.25)] z-10 flex items-center justify-center">
        <h2 class="text-white font-montserrat font-bold text-[16px] md:text-[24px] tracking-wide">
            REGISTRO DE USUARIO
        </h2>
    </div>

    <!-- Contenedor del Formulario -->
    <div class="relative mt-[160px] w-11/12 max-w-4xl bg-[#044C26]/85 rounded-xl shadow-[0_8px_6px_rgba(0,0,0,0.25),7px_0_8px_rgba(0,0,0,0.25)] p-6 md:p-10 flex flex-col items-center backdrop-blur-sm">
        
        <form action="{{ route('register') }}" method="POST" class="w-full flex flex-col gap-6">
            @csrf

            <!-- Campo: Matrícula -->
            <div class="w-full">
                <input type="text" name="matricula" id="matricula" placeholder="Matrícula" required value="{{ old('matricula') }}"
                    class="w-full bg-[#0A8644] text-white placeholder-white/80 font-montserrat font-normal text-[18px] md:text-[24px] px-6 py-4 rounded-lg border-none shadow-[0_4px_4px_rgba(0,0,0,0.25)] focus:ring-2 focus:ring-white outline-none transition @error('matricula') ring-2 ring-red-500 @enderror">
                
                @error('matricula')
                    <span class="text-red-300 text-sm font-bold mt-1 block font-montserrat">{{ $message }}</span>
                @enderror
            </div>

            <!-- Campo: Email -->
            <div class="w-full">
                <input type="email" name="email" id="email" placeholder="Correo Electrónico" required value="{{ old('email') }}"
                    class="w-full bg-[#0A8644] text-white placeholder-white/80 font-montserrat font-normal text-[18px] md:text-[24px] px-6 py-4 rounded-lg border-none shadow-[0_4px_4px_rgba(0,0,0,0.25)] focus:ring-2 focus:ring-white outline-none transition @error('email') ring-2 ring-red-500 @enderror">
                
                @error('email')
                    <span class="text-red-300 text-sm font-bold mt-1 block font-montserrat">{{ $message }}</span>
                @enderror
            </div>

            <!-- Campo: Contraseña -->
            <div class="w-full">
                <input type="password" name="password" id="password" placeholder="Contraseña (Mínimo 8 caracteres)" required minlength="8"
                    class="w-full bg-[#0A8644] text-white placeholder-white/80 font-montserrat font-normal text-[18px] md:text-[24px] px-6 py-4 rounded-lg border-none shadow-[0_4px_4px_rgba(0,0,0,0.25)] focus:ring-2 focus:ring-white outline-none transition @error('password') ring-2 ring-red-500 @enderror">
                
                @error('password')
                    <span class="text-red-300 text-sm font-bold mt-1 block font-montserrat">{{ $message }}</span>
                @enderror
            </div>

            <!-- Campo: Confirmar Contraseña -->
            <div class="w-full">
                <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmar Contraseña" required
                    class="w-full bg-[#0A8644] text-white placeholder-white/80 font-montserrat font-normal text-[18px] md:text-[24px] px-6 py-4 rounded-lg border-none shadow-[0_4px_4px_rgba(0,0,0,0.25)] focus:ring-2 focus:ring-white outline-none transition">
            </div>

            <!-- Botón de Registro -->
            <div class="w-full flex justify-center mt-4">
                <input type="submit" value="REGISTRARSE"
                    class="bg-[#2C2C2C] text-white font-montserrat font-bold text-[18px] md:text-[24px] px-6 md:px-8 py-3 rounded-lg shadow-[0_6px_4px_rgba(0,0,0,0.25)] hover:bg-gray-800 cursor-pointer transition transform hover:-translate-y-1 border-none">
            </div>
        </form>

        <!-- Enlace para Iniciar Sesión -->
        <div class="mt-6 text-center font-montserrat">
            <p class="text-white font-medium text-lg">¿Ya tienes una cuenta? 
                <a href="{{ route('login') }}" class="font-bold underline hover:text-gray-200 transition">Inicia Sesión</a>
            </p>
        </div>
    </div>
</body>
</html>