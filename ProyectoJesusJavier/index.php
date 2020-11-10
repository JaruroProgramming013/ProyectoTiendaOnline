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

$errorUsuarioVacio = $errorContrasenhaVacia = $errorUsuarioNoExiste = "";

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
            $errorUsuarioVacio = "Por favor, escriba un usuario.";
            break;
        case "blankPassword":
            $errorContrasenhaVacia = "Por favor, escriba una contraseña.";
            break;
        case "notAnUser":
            $errorUsuarioNoExiste = "Datos erroneos.";
    }
}
?>
<h1>Tienda Online</h1>
<span class="error"><?php echo $errorUsuarioVacio?></span>
<span class="error"><?php echo $errorContrasenhaVacia?></span>
<span class="error"><?php echo $errorUsuarioNoExiste?></span>
<form action="action/actionIndex.php" method="post">
    <label for="username">Usuario:</label>
    <input type="text" maxlength="20" id="username" name="username"><br>
    <label for="password">Contraseña:</label>
    <input type="password" id="password" name="password"><br>
    <input type="submit" value="Entrar">
</form>
<a href="./form/registerForm.php">¿No está registrado?</a>
</body>
</html>