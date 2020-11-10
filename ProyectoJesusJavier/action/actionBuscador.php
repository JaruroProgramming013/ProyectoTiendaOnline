<?php
require_once "../class/DAO.php";

if ($_GET['buscador'])
{
    $buscar = $_GET ['palabra'];
    $dao=new DAO();
    if (empty($buscar))
    {
        echo "No se ha ingresado nada";
    } else
    {
        $sql= $dao->instruccionSQL("SELECT * FROM ProyectoJesusJavier.PJJ_Producto WHERE ID LIKE '%".$buscar."%'");
        $result = (new DAO())->instruccionSQL($sql);
        $total = $result->num_rows;
        if ($row = mysqli_fetch_array($result)) {
            echo "Resultado para: $buscar";

            echo  "Total de resultado: $total";

            do {
                ?>
                (Id: <?php echo  $row['id']; ?> - <?php echo $row['titulo']; ?>
                <?php


            }while ($row = mysqli_fetch_array($result));

        }else

            echo "No se encontraron resultados para $buscar";
    }

        }
?>