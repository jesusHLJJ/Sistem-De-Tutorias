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
        <form action="/login" method="POST">
            @csrf
            <div class="elemento">
                <label for="email">Email: </label>
                <input type="email" name="email" id="">
            </div>

            <div class="elemento">
                <label for="password">Contraseña: </label>
                <input type="password" name="password" id="">
            </div>

            <input type="submit" value="INGRESAR">
        </form>
    </div>
</body>

</html>
