<html lang="es">
<head>
    <title>Login</title>
    <style>
        body{
            text-align: center;
        }
        h1{
            padding-bottom: 120px;
        }
        form{
            text-align: center;
        }
        input{
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<h1>Tienda Online</h1>
<form action="index.php" method="post">
    <label for="username">Usuario:</label>
    <input type="text" id="username" name="username"><br>
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password"><br>
</form>
<a href="./form/registerForm.php">¿No está registrado?</a>
</body>
</html>