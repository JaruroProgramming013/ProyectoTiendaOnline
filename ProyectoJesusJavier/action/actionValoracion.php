<?php
require_once "../class/Valoracion.php";
require_once "../class/Validacion.php";
require_once "../class/Producto.php";

$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$arrayParametros = parse_url($url);
parse_str($arrayParametros['query'], $params);


if($_SERVER['REQUEST_METHOD']=="POST"){
    if(Validacion::validarValoracion($_POST["Texto"], $_POST["Puntuacion"])) {
        $valoracion = new Valoracion($_POST["Puntuacion"], $_POST["Texto"], $params["autor"], $params["producto"]);
        $valoracion->setPuntuacion($_POST["Puntuacion"]);
        $valoracion->setTexto($_POST["Texto"]);
        $valoracion->setautor($_POST["autor"]);
        $valoracion->setproducto($_POST["producto"]);

        $valoracion->insertarEnBD();

        header("Location: ../page/detalleProducto.php");

    }
}