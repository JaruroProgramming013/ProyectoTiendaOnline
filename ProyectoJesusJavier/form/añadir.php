<html lang="es">
<head>
    <title>Añadir</title>
</head>
<body>
<form action="./form/añadir.php" method="post">
    <p>Añadir</p>
    <input type="submit"></input>
</form>

<?php
if (!empty($_POST)) {
    $ID = $_POST ['ID'];
    $Nombre = $_POST ['Nombre'];
    $Descripcion = $_POST ['Descripcion'];
    $Precio = $_POST ['Precio'];
    $TipoPeriferico = $_POST ['TipoPeriferico'];
    $Marca = $_POST ['Marca'];
    $CantidadStock = $_POST ['CantidadStock'];
}


$conexion = new mysqli('localhot',"zamudio","zamudio","ProyectoJesusJavier");

if ($conexion->connect_error) {

    trigger_error("Fallo en la conexión: " . $conexion->connect_error,
        E_USER_ERROR);

}

$sql = "INSERT INTO ID,Nombre,Descripcion,Precio,TipoPeriferico,Marca,CantidadStock FROM 'PJJ_Producto'";
$result = $conexion->query($sql);


$query = " SELECT * FROM 'PJJ_PRODUCTOS' WHERE 'ID' = 'ID' ";
$sqlsearch=($query) ;
$resultcount=($sqlsearch);

if ( $resultcount> 0 ) {

     ("UPDATE 'PJJ_PRODUCTOS' SET 'Nombre' = '$Nombre','Descripcion' = '$Descripcion','Precio' = '$Precio','TipoPeriferico' = '$TipoPeriferico','Marca' = '$Marca','CantidadStock=$CantidadStock'" );

} else {

    ( "INSERT INTO 'PJJ_PRODUCTOS' (ID,Nombre,Descripcion,Precio,TipoPeriferico,Marca,CantidadStock)
                               VALUES ('$ID', '$Nombre', '$Descripcion',
                                                 '$Precio', '$TipoPeriferico', '$Marca', '$CantidadStock')") ?>

</body>
</html>




<?php

}
