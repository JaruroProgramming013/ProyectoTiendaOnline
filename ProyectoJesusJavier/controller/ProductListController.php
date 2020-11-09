<?php
session_start();

require_once "../class/DAO.php";
require_once "../class/Usuario.php";

$dao=new DAO();
$usuario=new Usuario();

$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$arrayParametros = parse_url($url);
parse_str($arrayParametros['query'], $params);

$usuario->setNombre($params["usuario"]);

$_SESSION['usuario']=$usuario->getNombre();
$_SESSION['permisoAdmin']= $usuario->getNombre()=="jruiz"||$usuario->getNombre()=="jzamudio" || $usuario->getNombre()=="usuario";
header("Location: ../page/listado.php");
