<html lang="es">
<head>
    <title>Confirmacion</title>
    <style>

    </style>
</head>
<body>

<h1>Confirmacion</h1>

<?php
$conexion = new mysqli('localhot',"zamudio","zamudio","ProyectoJesusJavier");

if ($conexion->connect_error) {

    trigger_error("Fallo en la conexión: " . $conexion->connect_error,
        E_USER_ERROR);
}

    $usernameP = $_POST["username"];
    $passwordP = $_POST["password"];

    $sql = "SELECT * FROM 'PJJ_Usuario' WHERE 'Nombre'=$usernameP AND 'Contrasenha'=$passwordP";


        if ($conexion->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $conexion->error;
        }





?>
</body>
</html>