<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN</title>
    
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

<body class="bg-cover bg-center min-h-screen flex items-center justify-center relative bg-[url('{{ asset('multimedia/fondo.jpg') }}')]">

    <div class="absolute top-0 left-0 w-full h-24 bg-[#13934A] shadow-[0_12px_14px_rgba(0,0,0,0.25)] z-20 flex items-center justify-center gap-4">
        <img src="{{ asset('multimedia/tecnmlogo.png') }}" alt="Logo TecNM" class="absolute left-4 h-[83px] hidden md:block">
        <img src="{{ asset('multimedia/tesi.png') }}" alt="Logo TESI" class="h-12 md:hidden">
        <img src="{{ asset('multimedia/isclogo.png') }}" alt="Logo ISC" class="h-20">
        <a href="{{ route('about') }}" class="hidden md:block absolute right-4 text-white font-montserrat font-bold text-sm md:text-base lg:text-lg tracking-wide hover:underline transition">
            ACERCA DE NOSOTROS
        </a>
    </div>

    <div class="hidden md:flex absolute top-0 left-0 w-1/2 h-full bg-[#2C2C2C] z-10 items-center justify-center pt-24">
        <img src="{{ asset('multimedia/tesi.png') }}" alt="Logo TESI" class="w-9/12 max-w-2xl">
    </div>

    <div class="absolute top-0 right-0 w-full md:w-1/2 h-full flex items-center justify-center z-10 pt-24">
        
        <div class="bg-[#D9D9D9]/30 w-11/12 max-w-[482px] h-auto min-h-[592px] p-10 rounded-xl shadow-[0_12px_14px_rgba(0,0,0,0.25)] flex flex-col justify-center backdrop-blur-sm">

            <h2 class="text-[24px] sm:text-[28px] md:text-[32px] lg:text-[40px] font-bold text-white text-center mb-6 md:mb-8 tracking-wider font-montserrat">INICIAR SESIÓN</h2>

            <form method="POST" action="{{ route('login') }}" class="space-y-4 md:space-y-6">
                @csrf

                @if (session('status'))
                    <div class="bg-blue-100 border-l-4 border-blue-500 text-blue-700 p-4 rounded font-montserrat text-sm" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                @if (session('session_expired'))
                    <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded font-montserrat text-sm" role="alert">
                        {{ session('session_expired') }}
                    </div>
                @endif

                <div class="space-y-2">
                    <input id="login" type="text" 
                           class="w-full px-3 py-2 md:px-4 md:py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#13934A] focus:border-transparent outline-none transition bg-white font-montserrat placeholder-gray-500 text-sm md:text-base @error('login') border-red-500 ring-2 ring-red-500 @enderror"
                           style="box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.25);"
                           name="login" 
                           value="{{ old('login') }}" 
                           placeholder="Matrícula o Correo Electrónico" 
                           required autofocus>

                    @error('login')
                        <span class="block text-red-600 text-sm font-bold bg-white/80 px-2 rounded mt-1 font-montserrat" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="space-y-2">
                    <input id="password" type="password" 
                           class="w-full px-3 py-2 md:px-4 md:py-3 rounded-lg border border-gray-300 focus:ring-2 focus:ring-[#13934A] focus:border-transparent outline-none transition bg-white font-montserrat placeholder-gray-500 text-sm md:text-base @error('password') border-red-500 ring-2 ring-red-500 @enderror"
                           style="box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.25);"
                           name="password" 
                           placeholder="Contraseña" 
                           required autocomplete="current-password">

                    @error('password')
                        <span class="block text-red-600 text-sm font-bold bg-white/80 px-2 rounded mt-1 font-montserrat" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="pt-3 md:pt-4">
                    <button type="submit" class="w-full bg-[#13934A] hover:bg-[#0f7a3d] text-white font-bold py-2.5 md:py-3 px-4 rounded-lg transform hover:-translate-y-0.5 transition duration-200 text-[20px] md:text-[24px] lg:text-[28px] font-montserrat"
                            style="box-shadow: 4px 4px 8px rgba(0, 0, 0, 0.25);">
                        Iniciar Sesión
                    </button>
                </div>
            </form>
            <div class="mt-4 md:mt-6 text-center font-montserrat">
                <span class="inline-block bg-black/50 px-3 py-1.5 md:px-4 md:py-2 rounded-lg backdrop-blur-sm">
                    <p class="text-white font-medium inline text-sm md:text-base">¿No tienes una cuenta? 
                        <a href="{{ route('register') }}" class="text-[#13934A] font-bold hover:underline hover:text-[#0f7a3d]">Registrarte</a>
                    </p>
                </span>
            </div>

            <div class="mt-3 md:mt-4 text-center font-montserrat">
                <div class="inline-block bg-black/50 px-4 py-2 md:px-6 md:py-3 rounded-lg backdrop-blur-sm">
                    <p class="text-white font-medium text-xs md:text-sm mb-2 md:mb-3">Síguenos en nuestras redes:</p>
                    <div class="flex items-center justify-center gap-3 md:gap-4">
                        <a href="https://www.instagram.com/tesioficial/#" target="_blank" rel="noopener noreferrer" 
                           class="hover:scale-110 transition-transform duration-200" 
                           title="Instagram">
                            <img src="{{ asset('multimedia/instagramlogo.png') }}" alt="Instagram" class="w-10 h-10 md:w-12 md:h-12 object-contain">
                        </a>
                        <a href="https://www.facebook.com/TESIOficial" target="_blank" rel="noopener noreferrer" 
                           class="hover:scale-110 transition-transform duration-200" 
                           title="Facebook">
                            <img src="{{ asset('multimedia/facebooklogo.png') }}" alt="Facebook" class="w-10 h-10 md:w-12 md:h-12 object-contain">
                        </a>
                        <a href="https://tesixtapaluca.edomex.gob.mx/" target="_blank" rel="noopener noreferrer" 
                           class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-white flex items-center justify-center overflow-hidden hover:scale-110 transition-transform duration-200" 
                           title="Sitio Web">
                            <img src="{{ asset('multimedia/colobríedo.png') }}" alt="Sitio Web" class="w-full h-full object-cover">
                        </a>
                    </div>
                </div>
            </div>

            <!-- Enlace Acerca de Nosotros (solo móvil) -->
            <div class="mt-3 md:hidden text-center font-montserrat">
                <a href="{{ route('about') }}" class="inline-block text-white font-bold text-sm tracking-wide hover:underline transition">
                    ACERCA DE NOSOTROS
                </a>
            </div>

        </div>
    </div>

    <!-- Barra inferior verde delgada -->
    <div class="absolute bottom-0 left-0 w-full h-8 bg-[#13934A] shadow-[0_-12px_14px_rgba(0,0,0,0.25)] z-20 flex items-center justify-center px-2">
        <p class="text-white font-montserrat text-[10px] sm:text-[11px] md:text-[12px] lg:text-[13px] font-medium tracking-wide text-center">
            © 2025 Tecnológico de Estudios Superiores de Ixtapaluca
        </p>
    </div>

</body>
</html>