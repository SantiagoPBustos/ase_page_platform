<?php

include("../../../controller/conection.php"); 

if (!isset($_POST["id"])) {
    $id=$_GET["id"];

    $sql=$conexion->query(" DELETE FROM cobros_pendientes WHERE id_cobro=$id ");
}

include("cobros.php");

?>