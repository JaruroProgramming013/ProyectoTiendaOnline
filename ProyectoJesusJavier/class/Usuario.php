<?php


class Usuario extends DAO
{
    private $ID, $nombre, $contrasenha;
    const TABLA="PJJ_Usuario";

    public function getID()
    {
        return $this->ID;
    }

    //Teoricamente, el ID no es modificable. Pero necesito este método
    //para poner el correspondiente con la BD.
    public function setID($ID)
    {
        $this->ID = $ID;
    }

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
        $insertar="INSERT INTO ".parent::BASEDATOS.".".self::TABLA."(Nombre, Contrasenha)
        VALUES (".$this->getNombre().",".$this->getContrasenha().")";
    }
}