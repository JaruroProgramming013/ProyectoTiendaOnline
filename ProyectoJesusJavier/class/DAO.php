<?php


class DAO
{
    const HOST = "localhost", USUARIO = "usuario", CONTRASENHA = "asd",
        BASEDATOS="ProyectoJesusJavier";

    protected $conexion;

    public function conectar(){
        $this->conexion=new mysqli(self::HOST,self::USUARIO,self::CONTRASENHA);
        if($this->conexion->connect_error){
            echo "<br><h2> Error al conectar con la base de datos. </h2><br>".$this->conexion->connect_error;
        }
        return $this->conexion;
    }

    public function desconectar(){
        if (! $this->conexion->commit()) {
            echo "<br>Error con la última transacción.<br>";
        }

        $this->conexion->close();
    }

    public function instruccionSQL($instruccion)
    {
        $this->conectar();

        $resultado =  $this->conexion->query($instruccion);

        if (!$resultado) {
            echo "<br> Error en la consulta: " . $instruccion . "<br>";
        }

        return $resultado;
    }

    public function crearBD(){
        $crearBD= "CREATE SCHEMA ".self::BASEDATOS.";";
        $this->instruccionSQL($crearBD);
    }
}