<?php

include("../../../controller/conection.php"); 

if(!empty($_POST["value"]) and !empty($_POST["desc"]) and !empty($_POST["client"]) and !empty($_POST["tel"])){

    $value=$_POST["value"];
    $desc=$_POST["desc"];
    $client=$_POST["client"];
    $tel=$_POST["tel"];
    session_start();
    $email=$_SESSION["email"];
    $branch=0;
    
    if ($_SESSION["email"] == "tunja@ase.com") {
        $branch=1;
    }else if ($_SESSION["email"] == "samaca@ase.com") {
        $branch=2;
    }

    $sql=$conexion->query(" INSERT INTO cobros_pendientes(value,description,client,telephone,branch) VALUES ('$value','$desc','$client','$tel','$branch') ");

    header("location:cobros.php");

}else{
    ?>
    <?php
        include("addCobros.php");
    ?>
  <h1 class="bad">*Complete todos los datos*</h1>
  <?php
}

?>