<?php

include("../../../controller/conection.php"); 

if (!empty($_POST["btn-edit-ingreso"])) {

    if(!empty($_POST["value"]) and !empty($_POST["desc"])){
        $id=$_POST["id"];
        $value=$_POST["value"];
        $description=$_POST["desc"];
        $date=date("d/m/y");

        $sql=$conexion->query(" UPDATE ingresos SET value='$value',description='$description',date='$date' WHERE id_ingreso=$id ");
        
        if ($sql==1) {
            header("location:ingresos.php");
        }else{
            echo "<script>alert('HA OCURRIDO UN ERROR')</script>";
        }
    
    }else{
        ?>
        <?php
            include("ingresos.php");
        ?>
        <script>alert("HA OCURRIDO UN ERROR\nCOMPLETE TODOS LOS DATOS")</script>
      <?php
    }

}