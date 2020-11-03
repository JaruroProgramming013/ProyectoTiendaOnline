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

<?php
$usuario = $contrasenha = $repetirContrasenha = "";
$errorUsuario = $errorContrasenhaVacia = $errorContrasenhaRepetida = "";
?>
<h1>Registro de nueva cuenta</h1>
<form action="registerForm.php" method="post">
    <label for="usernameRegistro">Usuario nuevo:</label>
    <input type="text" id="usernameRegistro" name="username">
    <span class="error"><?php echo $errorUsuario?></span>
    <br>
    <label for="passwordRegistro">Contraseña:</label>
    <input type="password" id="passwordRegistro" name="password">
    <span class="error"><?php echo $errorContrasenhaVacia?></span>
    <br>
    <label for="passwordRepeat">Repita la contraseña:</label>
    <input type="password" id="passwordRepeat" name="passwordRepeat">
    <span class="error"><?php echo $errorContrasenhaRepetida?></span>
    <br>
    <input type="submit" value="Registrar usuario">
</form>
<a href="../index.php">Volver a la página de registro</a>
<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $usuario=$_POST["username"];
    $contrasenha=$_POST["password"];
    $repetirContrasenha=$_POST["passwordRepeat"];

    if(empty($usuario))
        $errorUsuario="Por favor, introduzca un nombre de usuario.";

    if(empty($contrasenha))
        $errorContrasenhaVacia="Por favor, introduzca una contraseña.";
    else{
        if($contrasenha!==$repetirContrasenha){
            $errorContrasenhaRepetida="Las contraseñas no coinciden.";
        }
    }


}
?>
</body>
</html>