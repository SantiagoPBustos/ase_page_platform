<?php

include("../../../controller/conection.php"); 

if (!isset($_POST["id"])) {
    $id=$_GET["id"];

    $sql=$conexion->query(" DELETE FROM deudas WHERE id_deuda=$id ");
}

include("deudas.php");

?>