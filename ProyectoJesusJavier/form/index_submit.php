<html lang="es">
<head>
    <title>Confirmacion</title>
    <style>

    </style>
</head>
<body>

<h1>Confirmacion</h1>

<?php
$conexion = new mysqli('localhost',"jruiz","asd","ProyectoJesusJavier");

if ($conexion->connect_error) {

    trigger_error("Fallo en la conexión: " . $conexion->connect_error,
        E_USER_ERROR);
}

    $usernameP = $_POST["username"];
    $passwordP = $_POST["password"];

    $sql = "SELECT * FROM ProyectoJesusJavier.PJJ_Usuario WHERE Nombre='$usernameP' AND Contrasenha='$passwordP'";


        if ($conexion->query($sql) instanceof mysqli_result) {
            header("Location: ../page/listado.php");
        } else {
            echo "Falla: " . $conexion->connect_error;
        }







?>
</body>
</html>