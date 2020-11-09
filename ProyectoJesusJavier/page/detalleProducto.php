<html lang="es">
<head>
    <title>Detalle de producto</title>
    <style>
        img{
            width: 250px;
            height: 250px;
        }

        #textBox{
            width: 250px;
            height: 100px;
        }
    </style>
</head>
<body>
<?php
//NOTA: al sacar un objeto de una sesion, importa la clase de dicho objeto ANTES de iniciar la sesion.
require_once "../class/DAO.php";
require_once "../class/Producto.php";
session_start();
$usuario=$_SESSION["usuario"];

$producto=new Producto();
$producto=$_SESSION["producto"];

$valoraciones[]=$_SESSION["valoraciones"];

echo "<h1>".$producto->getNombre()." - ".$producto->getPrecio()."€</h1><br>";

echo "<p>".$producto->getDescripcion()."</p>";

echo "<img alt='Sin imagen' src=\"../img/".$producto->getImagen()."\"/>";

echo "<p>Tipo: ".$producto->getTipoPeriferico()."</p>";

echo "<p>Marca: ".$producto->getMarca()."</p>";

echo "<p> Quedan <b>".$producto->getCantidadStock()."</b> unidades</p>"
?>

<form action="listado.php">
    <!--WIP-->
    <input type="button" value="Comprar">

    <input type="submit" value="Volver">
</form>

<h2>Valoraciones</h2>

<form method="post" action="../action/actionValoracion.php?autor=<?php echo $_SESSION["usuario"] ?>&producto=<?php echo $producto->getNombre() ?>">
    <label for="textBox">¿Que opina de este producto?</label>
    <br>
    <textarea id="textBox" name="Texto"></textarea>
    <br>
    <label for="nota">¿Que nota pondrías a este producto (del 1 al 5)?</label>
    <input id="nota" name="Puntuacion" type="number" min="0" max="5" step="0.5">
    <input type="submit" value="Valorar">
</form>

<h3>Otros usuarios opinan...</h3>


<form>

</form>
</body>
</html>


