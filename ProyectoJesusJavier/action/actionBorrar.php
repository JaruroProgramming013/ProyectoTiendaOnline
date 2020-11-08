<?php

require_once "../class/DAO.php";

$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$arrayParametros = parse_url($url);
parse_str($arrayParametros['query'], $params);

(new DAO())->instruccionSQL("
    DELETE FROM ProyectoJesusJavier.PJJ_Producto
    WHERE Nombre='".$params["nombre"]."'
");

header("Location: ../page/listado.php");

