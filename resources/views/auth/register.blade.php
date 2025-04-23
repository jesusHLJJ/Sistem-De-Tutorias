@use('App\Models\User')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>REGISTRO</title>
</head>

<body>
    <div class="formulario">
    <form action="{{ route('register') }}" method="POST">

            @csrf

            @if ($showMatriculaField ?? User::count() > 0)
                <div class="elemento">
                    <label for="matricula">Matrícula: </label>
                    <input type="text" name="matricula" id="matricula" required>
                </div>
            @endif

            <div class="elemento">
                <label for="email">Email: </label>
                <input type="email" name="email" id="email" required>
            </div>

            <div class="elemento">
                <label for="password">Contraseña: </label>
                <input type="password" name="password" id="password" required minlength="8">
            </div>

            <div class="elemento">
                <label for="password_confirmation">Repetir Contraseña: </label>
                <input type="password" name="password_confirmation" id="password_confirmation" required>
            </div>


            <input type="submit" value="REGISTRARSE">
        </form>
        <p class="parrafo">Ya tienes una cuenta? <a href="{{ route('login') }}">Inicia Sesión</a>
        </p>
    </div>
</body>

</html>
