<?php
require_once "DAO.php";

class Producto extends DAO
{
    private $nombre, $descripcion, $precio, $tipoPeriferico, $marca, $cantidadStock, $imagen;
    const TABLA="PJJ_Producto";


    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion): void
    {
        $this->descripcion = $descripcion;
    }


    public function getPrecio()
    {
        return $this->precio;
    }
    public function setPrecio($precio): void
    {
        $this->precio = $precio;
    }

    public function getTipoPeriferico()
    {
        return $this->tipoPeriferico;
    }

    public function setTipoPeriferico($tipoPeriferico): void
    {
        $this->tipoPeriferico = $tipoPeriferico;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca): void
    {
        $this->marca = $marca;
    }

    public function getCantidadStock()
    {
        return $this->cantidadStock;
    }

    public function setCantidadStock($cantidadStock): void
    {
        $this->cantidadStock = $cantidadStock;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen): void
    {
        $this->imagen = $imagen;
    }

    public function crearTabla(){
        $creacionTabla="create table if not exists PJJ_Producto
(
    ID              mediumint auto_increment primary key,
    Nombre          varchar(20)   not null,
    Descripcion     varchar(100)  null,
    Precio          decimal(5, 2) not null,
    TipoPeriferico  varchar(20)   not null,
    Marca           varchar(30)   not null,
    CantidadStock   smallint      not null,
    Imagen varchar(100)  null,
    constraint ID_UNIQUE
        unique (ID)
);
                        ";
        parent::instruccionSQL($creacionTabla);
    }

    public function insertarEnBD(){
        $consultaPrimerProducto=parent::instruccionSQL("SELECT ID FROM ".parent::BASEDATOS.".".self::TABLA);
        if($consultaPrimerProducto->num_rows==0) {

            parent::instruccionSQL("ALTER TABLE " . parent::BASEDATOS . "." . self::TABLA . " AUTO_INCREMENT = 1");
            $insertar = "INSERT INTO " . parent::BASEDATOS . "." . self::TABLA . "(ID,Nombre, Descripcion ,Precio, TipoPeriferico, Marca, CantidadStock, Imagen)
            VALUES (1,'" . $this->getNombre() . "','"
                . $this->getDescripcion() . "',"
                . $this->getPrecio() . ",'"
                . $this->getTipoPeriferico() . "','"
                . $this->getMarca() . "',"
                . $this->getCantidadStock() . ",'"
                . $this->getImagen() . "')";

        }
        else {

            $insertar = "INSERT INTO " . parent::BASEDATOS . "." . self::TABLA . "(Nombre, Descripcion ,Precio, TipoPeriferico, Marca, CantidadStock, Imagen)
            VALUES ('" . $this->getNombre() . "','"
                . $this->getDescripcion() . "',"
                . $this->getPrecio() . ",'"
                . $this->getTipoPeriferico() . "','"
                . $this->getMarca() . "',"
                . $this->getCantidadStock() . ",'"
                . $this->getImagen() . "')";


        }

        parent::instruccionSQL($insertar);
    }

    public static function comprobarExistenciaEnBD($nombre){
        return (new DAO)->instruccionSQL("SELECT ID FROM ".parent::BASEDATOS.".".self::TABLA." WHERE Nombre='".$nombre."'")->num_rows!=0;
    }
}