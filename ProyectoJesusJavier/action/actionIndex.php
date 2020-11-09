
<?php
require_once "../class/DAO.php";
require_once "../class/Validacion.php";

$dao=new DAO();
$sql = "SELECT Nombre, Contrasenha FROM ProyectoJesusJavier.PJJ_Usuario WHERE
Nombre='".$_POST["username"]."'";

$usuarioEnBD= $dao->instruccionSQL($sql)->fetch_assoc();

if (Validacion::validarLogin($_POST["username"],$_POST["password"]) && password_verify($_POST["password"],$usuarioEnBD["Contrasenha"])) {
    header("Location: ../controller/ProductListController.php?usuario=".$_POST["username"]);
} else {
    header("Location: ../index.php");
}
