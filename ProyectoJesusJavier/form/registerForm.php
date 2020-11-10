<html lang="es">
<head>
    <title>Registro</title>
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
<h1>Registro de nueva cuenta</h1>
<?php
$errorNoUsuario = $errorNoContrasenha = $errorPasswordNoCoinciden = $errorUsuarioExistente = $params = "";

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
            $errorNoContrasenha = "Por favor, escriba una contraseña.";
            break;
        case "mismatchPassword":
            $errorPasswordNoCoinciden = "Las contraseñas no coinciden.";
            break;
        case "existingUser":
            $errorUsuarioExistente = "Este usuario ya existe.";
    }
}
?>
<form action="../action/actionRegistro.php" method="post">
    <span class="error"><?php echo $errorNoUsuario?></span>
    <span class="error"><?php echo $errorNoContrasenha?></span>
    <span class="error"><?php echo $errorPasswordNoCoinciden?></span>
    <span class="error"><?php echo $errorUsuarioExistente?></span>
    <br>
    <label for="usernameRegistro">Usuario nuevo:</label>
    <input type="text" maxlength="20" id="usernameRegistro" name="username">
    <br>
    <label for="passwordRegistro">Contraseña:</label>
    <input type="password" id="passwordRegistro" name="password">
    <br>
    <label for="passwordRepeat">Repita la contraseña:</label>
    <input type="password" id="passwordRepeat" name="passwordRepeat">
    <br>
    <input type="submit" value="Registrar usuario">
</form>
<a href="../index.php">Volver a la página de registro</a>
<?php

?>
</body>
</html>