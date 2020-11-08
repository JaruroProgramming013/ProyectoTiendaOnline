<?php
require_once "DAO.php";

class Valoracion extends DAO
{
    private $puntuacion, $texto, $nombreAutor, $nombreProducto;
    const TABLA="PJJ_Producto";

    public function __construct($puntuacion, $texto, $nombreAutor, $nombreProducto){
        $this->puntuacion=$puntuacion;
        $this->texto=$texto;
        $this->nombreAutor=$nombreAutor;
        $this->nombreProducto=$nombreProducto;
    }

    public function getPuntuacion()
    {
        return $this->puntuacion;
    }

    public function setPuntuacion($puntuacion): void
    {
        $this->puntuacion = $puntuacion;
    }

    public function getTexto()
    {
        return $this->texto;
    }

    public function setTexto($texto): void
    {
        $this->texto = $texto;
    }

    public function getNombreAutor()
    {
        return $this->nombreAutor;
    }

    public function getNombreProducto()
    {
        return $this->nombreProducto;
    }


}