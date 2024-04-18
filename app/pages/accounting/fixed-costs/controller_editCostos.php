<?php

include("../../../controller/conection.php"); 

if (!empty($_POST["btn-edit-costo"])) {

    if(!empty($_POST["value"]) and !empty($_POST["desc"]) and !empty($_POST["date"])){
        $id=$_POST["id"];
        $value=$_POST["value"];
        $description=$_POST["desc"];
        $date=$_POST["date"];

        $sql=$conexion->query(" UPDATE costos_fijos SET value='$value',description='$description',date='$date' WHERE id_costos=$id ");
        
        if ($sql==1) {
            header("location:costos-fijos.php");
        }else{
            echo "<script>alert('HA OCURRIDO UN ERROR')</script>";
        }
    
    }else{
        ?>
        <?php
            include("costos-fijos.php");
        ?>
        <script>alert("HA OCURRIDO UN ERROR\nCOMPLETE TODOS LOS DATOS")</script>
      <?php
    }

}