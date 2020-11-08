<?php
require_once "../class/DAO.php";
require_once "../class/Usuario.php";

$dao=new DAO();
$usuario=new Usuario();

$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$arrayParametros = parse_url($url);
parse_str($arrayParametros['query'], $params);

$usuario->setNombre($params["usuario"]);

$usuarioSerializado=serialize($usuario);
file_put_contents("../serialized/usuarioSerializado.txt",$usuarioSerializado);
header("Location: ../page/listado.php");
