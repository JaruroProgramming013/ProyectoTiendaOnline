<html lang="es">
<head>
    <title>Listado</title>
    <style>
        h1{
            text-align: center;
        }

        img{
            height: 100px;
            width: 100px;
            margin-left: 20px;
            margin-right: 20px;
            vertical-align: middle;
        }
        span{
            margin-left: 20px;
            margin-right: 20px;
        }

    </style>
</head>
<body>
    <form method="post">
    <?php
    require_once "../class/DAO.php";
    require_once "../class/Usuario.php";

    $dao=new DAO();

    $usuarioSerializado=file_get_contents("../serialized/usuarioSerializado.txt");

    $usuario=unserialize($usuarioSerializado);

    echo "<p>Bienvenido, ".$usuario->getNombre()."</p>";

    $sql = "SELECT * FROM ProyectoJesusJavier.PJJ_Producto";

    $tablaProductos=$dao->instruccionSQL($sql);

    if($tablaProductos->num_rows>0){

        echo "<h1>Productos</h1>";

        while($row = $tablaProductos->fetch_assoc()){

            echo "<a href='../controller/DetailController.php?nombre=".$row["Nombre"]."'>".$row["Nombre"]."</a><img alt='Sin imagen' src=\"../img/".$row["Imagen"]."\"/><span>" . $row["Descripcion"]. "</span>
                  <button formaction='../action/actionBorrar.php?nombre=".$row["Nombre"]."'>Borrar</button><br>";//Coloca lo que queda

        }

    }else{
        echo "Sin productos";
    }
    ?>
        <button formaction="../form/anhadir.php" >Añadir productos</button>
    </form>

</body>
</html>