<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LOGIN</title>
</head>

<body>
    <div class="formulario">
        <form method="POST" action="/login">
            @csrf

            @if (session('status'))
                <div class="alert alert-info">
                    {{ session('status') }}
                </div>
            @endif

            @if (session('session_expired'))
                <div class="alert alert-warning">
                    {{ session('session_expired') }}
                </div>
            @endif

            <div class="form-group">
                <label for="login">Matrícula o Correo Electrónico</label>
                <input id="login" type="text" class="form-control @error('login') is-invalid @enderror"
                    name="login" value="{{ old('login') }}" required autofocus>

                @error('login')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">
                Iniciar Sesión
            </button>
        </form>
        <p class="parrafo">No tienes una cuenta, prueba <a href="/register">Registrarte</a></p>
    </div>
</body>

</html>
