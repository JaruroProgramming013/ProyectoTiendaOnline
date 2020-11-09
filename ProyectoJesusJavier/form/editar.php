<?php
require_once "../class/DAO.php";
require_once "../class/Producto.php";
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

?>
<html lang="es">
<head>
    <title>Editar</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
<form action="../action/actionEditar.php?nombreProductoAEditar=<?php echo $producto->getNombre()?>" method="post">
    <h2>Editar</h2>
    <label for="nombre">Nombre:</label>
    <span class="error"><?php  if(strpos($url,"error")) if($params["error"]=="blankName") echo"Escriba un nombre"; ?></span>
    <input type="text" value="<?php echo $producto->getNombre()?>" name="nombreProducto" id="nombre">
    <br>
    <label for="descripcion">Descripcion:</label>
    <input type="text" value="<?php echo $producto->getDescripcion()?>" name="descripcionProducto" id="descripcion">
    <br>
    <label for="precio">Precio:</label>
    <span class="error"><?php  if(strpos($url,"error")) if($params["error"]=="blankPrice") echo"Escriba un precio"; ?></span>
    <input type="number" value="<?php echo $producto->getPrecio()?>" name="precioProducto" id="precio" min="0">
    <br>
    <label for="tipoPeriferico">Tipo periferico:</label>
    <span class="error"><?php  if(strpos($url,"error")) if($params["error"]=="blankPeripherical") echo"Selecciona un periferico"; ?></span>
    <select name="perifericoProducto" id="tipoPeriferico" size="5">
        <option value="CPU">CPU</option>
        <option value="GPU">GPU</option>
        <option value="Placa madre">Placa madre</option>
        <option value="Discos duros">Discos duros</option>
        <option value="RAM">RAM</option>
        <option value="Carcasa">Carcasa</option>
        <option value="Raton o teclado">Raton o teclado</option>
        <option value="Auriculares">Auriculares</option>
        <option value="Monitor">Monitor</option>
        <option value="Tarjetas de red">Tarjetas de red</option>
    </select>
    <br>
    <label for="marca">Marca:</label>
    <span class="error"><?php  if(strpos($url,"error")) if($params["error"]=="blankBrand") echo"Escriba una marca"; ?></span>
    <input type="text" value="<?php echo $producto->getMarca()?>" name="marcaProducto" id="marca">
    <br>
    <label for="cantidadStock">Cantidad stock inicial:</label>
    <span class="error"><?php  if(strpos($url,"error")) if($params["error"]=="blankStock") echo"Escriba una cantidad de stock inicial"; ?></span>
    <input type="number" value="<?php echo $producto->getCantidadStock()?>" name="cantidadStockProducto" id="cantidadStock" min="0">
    <br>
    <label for="imagen">Imagen:</label>
    <input name="imagenProducto" id="imagen" type="file">
    <br>
    <input type="submit" value="Actualizar Producto">
    <button formaction='../index.php'>Volver a listado</button><br>
</form>
</body>
</html>