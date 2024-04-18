<?php

include("../../../controller/conection.php"); 

if (!isset($_POST["id"])) {
    $id=$_GET["id"];

    $sql=$conexion->query(" DELETE FROM costos_fijos WHERE id_costos=$id ");
}

include("costos-fijos.php");

?>