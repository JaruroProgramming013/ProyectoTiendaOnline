<html lang="es">
<head>
    <title>Listado</title>
</head>
<body>

    <?php
    require_once "../class/DAO.php";

    $dao=new DAO();

    $sql = "SELECT * FROM ProyectoJesusJavier.PJJ_Producto";

    $tablaProductos=$dao->instruccionSQL($sql);

    if($tablaProductos->num_rows>0){

        while($row = $tablaProductos->fetch_assoc()){

            echo "Nombre: ".$row["Nombre"]. " - Precio: ".$row["Precio"]. " - TipoPeriferico: ".$row["TipoPeriferico"]. " - Marca: ".$row["Marca"]. " - CantidadStock: ".$row["CantidadStock"];//Coloca lo que queda

        }

    }else{
        echo "Sin productos";
    }
    ?>

    <form method="post">
        <button type="submit" formaction="../form/añadir.php">Añadir</button>
    </form>
</body>
</html>