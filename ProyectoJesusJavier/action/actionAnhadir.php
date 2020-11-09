<?php
require_once "../class/Validacion.php";
require_once "../class/Producto.php";

$producto=new Producto();

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(Validacion::validarAnhadirProducto($_POST["nombreProducto"], $_POST["precioProducto"],$_POST["perifericoProducto"],$_POST["marcaProducto"], $_POST["cantidadStockProducto"])){
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
        $producto->insertarEnBD();
        header("Location: ../page/listado.php");
    }
}