<?php
require_once "DAO.php";

class Usuario extends DAO
{
    private $nombre, $contrasenha;
    const TABLA="PJJ_Usuario";

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    //Contraseña encriptada
    public function getContrasenha()
    {
        return password_hash($this->contrasenha,PASSWORD_DEFAULT);
    }

    public function setContrasenha($contrasenha)
    {
        $this->contrasenha = $contrasenha;
    }

    public function crearTabla(){
        $creacionTabla="create table if not exists ".parent::BASEDATOS.".".self::TABLA."
                        (
                        ID          smallint auto_increment,
                        Nombre      varchar(20)  not null,
                        Contrasenha varchar(255) not null,
                        constraint ID_UNIQUE
                        unique (ID),
                        constraint Nombre_UNIQUE
                        unique (Nombre)
                        );
                        ";
        parent::instruccionSQL($creacionTabla);
    }

    public function insertarEnBD(){
        $consultaPrimerUsuario=parent::instruccionSQL("SELECT ID FROM ".parent::BASEDATOS.".".self::TABLA);
        if($consultaPrimerUsuario->num_rows==0) {

            parent::instruccionSQL("ALTER TABLE " . parent::BASEDATOS . "." . self::TABLA . " AUTO_INCREMENT = 1");
            $insertar = "INSERT INTO " . parent::BASEDATOS . "." . self::TABLA . "(ID,Nombre, Contrasenha)
            VALUES (1,'" . $this->getNombre() . "','" . $this->getContrasenha() . "')";

        }
        else {

            $insertar = "INSERT INTO " . parent::BASEDATOS . "." . self::TABLA . "(Nombre, Contrasenha)
            VALUES ('" . $this->getNombre() . "','" . $this->getContrasenha() . "')";

        }

        parent::instruccionSQL($insertar);
    }

    public static function comprobarExistenciaEnBD($nombre){
        return (new DAO)->instruccionSQL("SELECT ID FROM ".parent::BASEDATOS.".".self::TABLA." WHERE Nombre='".$nombre."'")->num_rows!=0;
    }
}