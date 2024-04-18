<?php

include("../../../controller/conection.php"); 

if (!isset($_POST["id"])) {
    $id=$_GET["id"];

    $sql=$conexion->query(" DELETE FROM ingresos WHERE id_ingreso=$id ");   
}

include("ingresos.php");

?>