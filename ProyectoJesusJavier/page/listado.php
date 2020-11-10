<?php
session_start();
?>
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

    echo "<p>Bienvenido, ".$_SESSION["usuario"]."</p>";
    echo "<button formaction='../index.php'>Volver a login</button><br>";

    if($_SESSION["permisoAdmin"]) {
        echo "<button formaction='../form/anhadir.php' >Añadir productos</button>";
    }

    $sql = "SELECT * FROM ProyectoJesusJavier.PJJ_Producto";

    $tablaProductos=$dao->instruccionSQL($sql);

    if($tablaProductos->num_rows>0){

        echo "<h1>Productos</h1>";

        while($row = $tablaProductos->fetch_assoc()){

            echo "<a href='../controller/DetailController.php?nombre=".$row["Nombre"]."'>".$row["Nombre"]."</a><img alt='Sin imagen' src=\"../img/".$row["Imagen"]."\"/><span>" . $row["Descripcion"]. "</span>";

            if($_SESSION["permisoAdmin"]) {

                echo "<button formaction='../action/actionBorrar.php?nombre=" . $row["Nombre"] . "'>Borrar</button>";
                echo "<button formaction='../form/editar.php?nombre=" . $row["Nombre"] . "'>Editar</button><br>";

            }
        }

    }else{
        echo "Sin productos";
    }


    ?>

        <FORM METHOD=POST ACTION="actionBuscador.php">
            Buscar: <input TYPE="text" NAME="busqueda">
        </FORM>
    </form>

</body>
</html>