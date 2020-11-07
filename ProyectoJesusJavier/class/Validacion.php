<?php
    require "Usuario.php";
class Validacion
{
    //Validar formulario de registro
    //Devuelve: true o false dependiendo de si los datos estan validados o no
    public static function validarRegistro($usuario, $contrasenha, $repetirContrasenha){
        $resultado = TRUE;

        if(empty($usuario)){
            header("Location: ../form/registerForm.php?error=blankUser");
            exit;
        }

        if(empty($contrasenha)){
            header("Location: ../form/registerForm.php?error=blankPassword");
            exit;
        }else{
            if($contrasenha!==$repetirContrasenha){
                header("Location: ../form/registerForm.php?error=mismatchPassword");
                exit;
            }
        }

        if(Usuario::comprobarExistenciaEnBD($usuario)){
            header("Location: ../form/registerForm.php?error=existingUser");
            exit;
        }

        return $resultado;
    }

    public static function validarLogin($usuario, $contrasenha){
        $resultado = TRUE;

        if(empty($usuario)){
            $resultado = FALSE;
            echo "Por favor, escriba un usuario. <br>";
        }

        if(empty($contrasenha)){
            $resultado = FALSE;
            echo "Por favor, escriba un contraseña. <br>";
        }

        if(!Usuario::comprobarExistenciaEnBD($usuario)){
            $resultado = FALSE;
            echo "Este usuario no está registado. <br>";
        }

        return $resultado;
    }
}
