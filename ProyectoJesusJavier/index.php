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
        .error{
            color: red;
        }
    </style>
</head>
<body>
<?php

$errorUsuarioVacio = $errorContrasenhaVacia = $errorUsuarioNoExiste = ""

//Cojo la url actual
$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

//Si es una url con un error
if(strpos($url,"error")) {

    //Procesamos la url
    $arrayParametros = parse_url($url);

    //y los parametros de esta
    parse_str($arrayParametros['query'], $params);

    //para coger el tipo de error y actuar en consecuencia
    switch ($params['error']) {
        case "blankUser":
            $errorNoUsuario = "Por favor, escriba un usuario.";
            break;
        case "blankPassword":
            $errorNoUsuario = "Por favor, escriba una contraseña.";
            break;
        case "mismatchPassword":
            $errorPasswordNoCoinciden = "Las contraseñas no coinciden.";
            break;
        case "existingUser":
            $errorUsuarioExistente = "Este usuario ya existe.";
    }
}

?>
<h1>Tienda Online</h1>
<form action="action/actionIndex.php" method="post">
    <label for="username">Usuario:</label>
    <input type="text" id="username" name="username"><br>
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password"><br>
    <input type="submit" value="Entrar">
</form>
<a href="./form/registerForm.php">¿No está registrado?</a>
</body>
</html>