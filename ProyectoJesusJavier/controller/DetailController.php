<?php
require_once "../class/DAO.php";
require_once "../class/Producto.php";
require_once "../class/Valoracion.php";

$dao=new DAO();
$producto=new Producto();

$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$arrayParametros = parse_url($url);
parse_str($arrayParametros['query'], $params);

//REGION DETALLES
$selectProducto=$dao->instruccionSQL("
    SELECT *
    FROM ProyectoJesusJavier.PJJ_Producto
    WHERE Nombre='".$params['nombre']."'
");

$datosBBDD=mysqli_fetch_array($selectProducto);

$producto->setNombre($datosBBDD["Nombre"]);
$producto->setDescripcion($datosBBDD["Descripcion"]);
$producto->setPrecio($datosBBDD["Precio"]);
$producto->setTipoPeriferico($datosBBDD["TipoPeriferico"]);
$producto->setMarca($datosBBDD["Marca"]);
$producto->setCantidadStock($datosBBDD["CantidadStock"]);
$producto->setImagen($datosBBDD["Imagen"]);

$productoSerializado=serialize($producto);
file_put_contents("../serialized/productoSerializado.txt",$productoSerializado);

//FIN REGION

//REGION VALORACIONES

$selectIdDeProducto=$dao->instruccionSQL("
    SELECT ID
    FROM ProyectoJesusJavier.PJJ_Producto
    WHERE Nombre='".$params['nombre']."'
");

$idDeProducto=mysqli_fetch_assoc($selectIdDeProducto);

$selectValoraciones=$dao->instruccionSQL("
    SELECT *
    FROM ProyectoJesusJavier.PJJ_Valoracion
    WHERE IDProducto='".$idDeProducto['ID']."'
");

//Si hay valoraciones
if($selectValoraciones->num_rows>0){

    //Mientras que queden valoraciones
    while($fila = $selectValoraciones->fetch_assoc()) {

       //Averigua el nombre de la valoracion actual
       $selectNombreAutorDeId=$dao->instruccionSQL("
      SELECT Nombre
      FROM ProyectoJesusJavier.PJJ_Usuario
      INNER JOIN PJJ_Valoracion PV on PJJ_Usuario.ID = PV.IDUsuario
     WHERE PV.IDUsuario='".$fila['IDUsuario']."'
    ");
       $nombreAutor=mysqli_fetch_assoc($selectNombreAutorDeId);

       //Crea un nuevo objeto valoracion

       $valoracion=new Valoracion($fila["Puntuacion"],$fila["Texto"],$nombreAutor["Nombre"],$params['nombre']);

       //Serializalo y guarda la serializacion en un array

       $valoraciones[]=serialize($valoracion);
    }

    $valoracionesSerializadas=serialize($valoraciones);
    file_put_contents("../serialized/valoracionesSerializadas.txt",$valoracionesSerializadas);

}
//FIN REGION
header("Location: ../page/detalleProducto.php?nombre=".$datosBBDD["Nombre"]);