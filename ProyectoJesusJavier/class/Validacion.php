<?php

class Validacion
{
    //Validar formulario de registro
    //Devuelve: true o false dependiendo de si los datos estan validados o no
    public static function validarRegistro($usuario, $contrasenha, $repetirContrasenha){
        $resultado = TRUE;

        if(empty($usuario)){
            $resultado = FALSE;
            echo "Por favor, escriba un usuario.";
        }

        if(empty($contrasenha)){
            $resultado = FALSE;
            echo "Por favor, escriba un contraseña.";
        }else{
            if($contrasenha!==$repetirContrasenha){
                $resultado = FALSE;
                echo "Las contraseñas no coinciden.";
            }
        }
        return $resultado;
    }
}
