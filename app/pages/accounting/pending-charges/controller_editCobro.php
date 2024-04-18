<?php

include("../../../controller/conection.php"); 

if (!empty($_POST["btn-edit-cobro"])) {

    if(!empty($_POST["value"]) and !empty($_POST["desc"])){
        $id=$_POST["id"];
        $value=$_POST["value"];
        $description=$_POST["desc"];
        $client=$_POST["client"];
        $tel=$_POST["tel"];

        $sql=$conexion->query(" UPDATE cobros_pendientes SET value='$value',description='$description',client='$client',telephone='$tel' WHERE id_cobro=$id ");
        
        if ($sql==1) {
            header("location:cobros.php");
        }else{
            echo "<script>alert('HA OCURRIDO UN ERROR')</script>";
        }
    
    }else{
        ?>
        <?php
            include("cobros.php");
        ?>
        <script>alert("HA OCURRIDO UN ERROR\nCOMPLETE TODOS LOS DATOS")</script>
      <?php
    }

}