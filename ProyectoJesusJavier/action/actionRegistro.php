<?php
    require_once "../class/Validacion.php";
    require_once "../class/Usuario.php";

    $usuario=new Usuario();

    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(Validacion::validarRegistro($_POST["username"], $_POST["password"], $_POST["passwordRepeat"])){
            $usuario->setNombre($_POST["username"]);
            $usuario->setContrasenha($_POST["password"]);
            $usuario->insertarEnBD();
            header("Location: ../index.php");
        }


    }
