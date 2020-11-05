<?php
    require_once "../class/Validacion.php";

    if($_SERVER['REQUEST_METHOD']=="POST"){
        if(Validacion::validarRegistro($_POST["username"], $_POST["password"], $_POST["passwordRepeat"])){
            echo "Fue guay!";
        }else{
            echo "Fue mal!";
        }
        header("../index.php");
        exit;
    }
