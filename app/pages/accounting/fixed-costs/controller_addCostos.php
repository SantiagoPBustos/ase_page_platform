<?php

include("../../../controller/conection.php"); 

if(!empty($_POST["value"]) and !empty($_POST["desc"]) and !empty($_POST["date"])){

    $value=$_POST["value"];
    $desc=$_POST["desc"];
    $date=$_POST["date"];
    session_start();
    $email=$_SESSION["email"];
    $branch=0;
    
    if ($_SESSION["email"] == "tunja@ase.com") {
        $branch=1;
    }else if ($_SESSION["email"] == "samaca@ase.com") {
        $branch=2;
    }

    $sql=$conexion->query(" INSERT INTO costos_fijos(value,description,date,branch) VALUES ('$value','$desc','$date','$branch') ");

    header("location:costos-fijos.php");

}else{
    ?>
    <?php
        include("addCostos.php");
    ?>
  <h1 class="bad">*Complete todos los datos*</h1>
  <?php
}

?>