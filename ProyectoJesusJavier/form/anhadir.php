<?php
$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
$arrayParametros = parse_url($url);
parse_str($arrayParametros['query'], $params);
?>
<html lang="es">
<head>
    <title>Añadir</title>
    <style>
        .error{
            color: red;
        }
    </style>
</head>
<body>
<form action="../action/actionAnhadir.php" method="post">
    <h2>Añadir</h2>
    <label for="nombre">Nombre:</label>
    <span class="error"><?php  if(strpos($url,"error")) if($params["error"]=="blankName") echo"Escriba un nombre"; ?></span>
    <input type="text" name="nombreProducto" id="nombre">
    <br>
    <label for="descripcion">Descripcion:</label>
    <input type="text" name="descripcionProducto" id="descripcion">
    <br>
    <label for="precio">Precio:</label>
    <span class="error"><?php  if(strpos($url,"error")) if($params["error"]=="blankPrice") echo"Escriba un precio"; ?></span>
    <input type="number" name="precioProducto" id="precio" min="0">
    <br>
    <label for="tipoPeriferico">Tipo periferico:</label>
    <span class="error"><?php  if(strpos($url,"error")) if($params["error"]=="blankPeripheric") echo"Selecciona un periferico"; ?></span>
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
    <input type="text" name="marcaProducto" id="marca">
    <br>
    <label for="cantidadStock">Cantidad stock inicial:</label>
    <span class="error"><?php  if(strpos($url,"error")) if($params["error"]=="blankStock") echo"Escriba una cantidad de stock inicial"; ?></span>
    <input type="number" name="cantidadStockProducto" id="cantidadStock" min="0">
    <br>
    <label for="imagen">Imagen:</label>
    <input name="imagenProducto" id="imagen" type="file">
    <br>
    <input type="submit" value="Añadir producto">
    <button formaction='../index.php'>Volver a listado</button><br>
</form>
</body>
</html>