<?php
require_once "../class/Validacion.php";
require_once "../class/Producto.php";
require_once "../class/DAO.php";
$dao=new DAO();
$producto=new Producto();

$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$arrayParametros = parse_url($url);
parse_str($arrayParametros['query'], $params);

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(Validacion::validarEditarProducto($_POST["nombreProducto"], $_POST["precioProducto"],$_POST["perifericoProducto"],$_POST["marcaProducto"], $_POST["cantidadStockProducto"])){
        $selectIdDeProducto=$dao->instruccionSQL("
            SELECT ID
            FROM ProyectoJesusJavier.PJJ_Producto
            WHERE Nombre='".$params["nombreProductoAEditar"]."'
            ");

        $idDeProducto=mysqli_fetch_assoc($selectIdDeProducto);

        $producto->setNombre($_POST["nombreProducto"]);
        $producto->setDescripcion($_POST["descripcionProducto"]);
        $producto->setPrecio($_POST["precioProducto"]);
        $producto->setTipoPeriferico($_POST["perifericoProducto"]);
        $producto->setMarca($_POST["marcaProducto"]);
        $producto->setCantidadStock($_POST["cantidadStockProducto"]);
        $producto->setImagen($_POST["imagenProducto"]);
        //creo que esto de abajo no funciona
        if(is_uploaded_file($_FILES["imagenProducto"]["tmp_file"]))
            move_uploaded_file($_FILES["imagenProducto"]["tmp_file"],"/../img/".$_FILES["imagenProducto"]["name"]);
        $producto->actualizar($idDeProducto["ID"]);
        header("Location: ../page/listado.php");
    }
}





