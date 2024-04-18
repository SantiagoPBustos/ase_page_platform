<?php

include("../../../controller/conection.php"); 

if (!empty($_POST["btn-edit-deuda"])) {

    if(!empty($_POST["value"]) and !empty($_POST["desc"]) and !empty($_POST["adeudado"])){
        $id=$_POST["id"];
        $value=$_POST["value"];
        $description=$_POST["desc"];
        $adeudado=$_POST["adeudado"];

        $sql=$conexion->query(" UPDATE deudas SET value='$value',description='$description',adeudado='$adeudado' WHERE id_deuda=$id ");
        
        if ($sql==1) {
            header("location:deudas.php");
        }else{
            echo "<script>alert('HA OCURRIDO UN ERROR')</script>";
        }
    
    }else{
        ?>
        <?php
            include("deudas.php");
        ?>
        <script>alert("HA OCURRIDO UN ERROR\nCOMPLETE TODOS LOS DATOS")</script>
      <?php
    }

}