<?php
require_once "../class/DAO.php";
require_once "../class/Producto.php";
require_once "../class/Valoracion.php";

session_start();
$dao=new DAO();
$producto=new Producto();

$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$arrayParametros = parse_url($url);
parse_str($arrayParametros['query'], $params);

//REGION DETALLES
$selectProducto=$dao->instruccionSQL("
    SELECT *
    FROM ProyectoJesusJavier.PJJ_Producto
    WHERE Nombre='".$params['nombre']."'
");

$datosBBDD=mysqli_fetch_array($selectProducto);

$producto->setNombre($datosBBDD["Nombre"]);
$producto->setDescripcion($datosBBDD["Descripcion"]);
$producto->setPrecio($datosBBDD["Precio"]);
$producto->setTipoPeriferico($datosBBDD["TipoPeriferico"]);
$producto->setMarca($datosBBDD["Marca"]);
$producto->setCantidadStock($datosBBDD["CantidadStock"]);
$producto->setImagen($datosBBDD["Imagen"]);

$_SESSION["producto"]=$producto;

//FIN REGION

//REGION VALORACIONES

$selectIdDeProducto=$dao->instruccionSQL("
    SELECT ID
    FROM ProyectoJesusJavier.PJJ_Producto
    WHERE Nombre='".$params['nombre']."'
");

$idDeProducto=mysqli_fetch_assoc($selectIdDeProducto);

$selectValoraciones=$dao->instruccionSQL("
    SELECT *
    FROM ProyectoJesusJavier.PJJ_Valoracion
    WHERE IDProducto='".$idDeProducto['ID']."'
");
    //Mientras que queden valoraciones
    while($fila = $selectValoraciones->fetch_assoc()) {

       //Crea un nuevo objeto valoracion

       $valoracion=new Valoracion($fila["Puntuacion"],$fila["Texto"],$_SESSION["usuario"],$params['nombre']);

       //Guarda en un array

       $valoraciones[]=$valoracion;
    }

    $_SESSION['valoraciones']=$valoraciones;
//FIN REGION
header("Location: ../page/detalleProducto.php");