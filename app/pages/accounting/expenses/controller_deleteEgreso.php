<?php

include("../../../controller/conection.php"); 

if (!isset($_POST["id"])) {
    $id=$_GET["id"];

    $sql=$conexion->query(" DELETE FROM egresos WHERE id_egreso=$id ");
}

include("egresos.php");

?>