<html lang="es">
<head>
    <title>Listado</title>
</head>
<body>
<form action="./form/añadir.php" method="post">
    <p>Añadir</p>
    <input type="submit"></input>
</form>


<form action="./form/borrar.php" method="post">
    <p>Borrar</p>
    <input type="submit"></input>
</form>


    <?php
    $conexion = new mysqli('localhot',"zamudio","zamudio","ProyectoJesusJavier");

    if ($conexion->connect_error) {

    trigger_error("Fallo en la conexión: " . $conexion->connect_error,
        E_USER_ERROR);

    }

    $sql = "SELECT ID,Nombre,Descripcion,Precio,TipoPeriferico,Marca,CantidadStock FROM 'PJJ_Producto'";
    $result = $conexion->query($sql);


    if($result->num_rows>0){

        while($row = $result->fetch_assoc()){

            echo "ID: ".$row["ID"]. "- Nombre: ".$row["Nombre"]. " - Precio: ".$row["Precio"] - "TipoPeriferico: ".$row["TipoPeriferico"] - "Marca: ".$row["Marca"] - "CantidadStock: ".$row["CantidadStock"];//Coloca lo que queda

        }

    }else{
        echo "Sin productos";
    }
    ?>

</body>
</html>






<?php
