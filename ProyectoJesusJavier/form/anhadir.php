<html lang="es">
<head>
    <title>Añadir</title>
</head>
<body>
<form action="../action/actionAnhadir.php" method="post">
    <h2>Añadir</h2>
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombreProducto" id="nombre">
    <br>
    <label for="descripcion">Descripcion:</label>
    <input type="text" name="descripcionProducto" id="descripcion">
    <br>
    <label for="precio">Precio:</label>
    <input type="number" name="precioProducto" id="precio" min="0">
    <br>
    <label for="tipoPeriferico">Tipo periferico:</label>
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
    <input type="text" name="marcaProducto" id="marca">
    <br>
    <label for="cantidadStock">Cantidad stock inicial:</label>
    <input type="number" name="cantidadStockProducto" id="cantidadStock" min="0">
    <br>
    <label for="imagen">Imagen:</label>
    <input name="imagenProducto" id="imagen" type="file">
    <br>
    <input type="submit">Añadir producto
</form>
</body>
</html>