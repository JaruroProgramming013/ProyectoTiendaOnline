<?php
require_once "DAO.php";

class Valoracion extends DAO
{
    private $puntuacion, $texto, $nombreAutor, $nombreProducto;
    const TABLA="PJJ_Valoracion";

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

    public function autorID(){
        $select=parent::instruccionSQL(
            "SELECT ID
                         FROM ".parent::BASEDATOS.".PJJ_Usuario
                         WHERE Nombre='".$this->getNombreAutor()."'");
        $datos=mysqli_fetch_assoc($select);
        return $datos["ID"];
    }

    public function productoID(){
        $select=parent::instruccionSQL(
            "SELECT ID
                         FROM ".parent::BASEDATOS.".PJJ_Producto
                         WHERE Nombre='".$this->getNombreProducto()."'");
        $datos=mysqli_fetch_assoc($select);
        return $datos["ID"];
    }


    public function insertarEnBD(){
        $consultaPrimeraValoracion=parent::instruccionSQL("SELECT Numero FROM ".parent::BASEDATOS.".".self::TABLA);
        if($consultaPrimeraValoracion->num_rows==0) {

            parent::instruccionSQL("ALTER TABLE " . parent::BASEDATOS . "." . self::TABLA . " AUTO_INCREMENT = 1");
            $insertar = "INSERT INTO " . parent::BASEDATOS . "." . self::TABLA . "(Numero,IDUsuario,IDProducto,Puntuacion,Texto)
            VALUES (1," . $this->autorID() . ","
                . $this->productoID() . ","
                . $this->getPuntuacion() . ",'"
                . $this->getTexto() . "')";

        }
        else {

            $insertar = "INSERT INTO " . parent::BASEDATOS . "." . self::TABLA . "(IDUsuario,IDProducto,Puntuacion,Texto)
            VALUES (" . $this->autorID() . ","
                . $this->productoID() . ","
                . $this->getPuntuacion() . ",'"
                . $this->getTexto() . "')";


        }

        parent::instruccionSQL($insertar);
    }
}