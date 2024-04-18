<?php

include("../../../controller/conection.php"); 

if(!empty($_POST["value"]) and !empty($_POST["desc"] and !empty($_POST["adeudado"]))){

    $value=$_POST["value"];
    $desc=$_POST["desc"];
    $adeudado=$_POST["adeudado"];
    session_start();
    $email=$_SESSION["email"];
    $branch=0;
    
    if ($_SESSION["email"] == "tunja@ase.com") {
        $branch=1;
    }else if ($_SESSION["email"] == "samaca@ase.com") {
        $branch=2;
    }

    $sql=$conexion->query(" INSERT INTO deudas(value,description,adeudado,branch) VALUES ('$value','$desc','$adeudado','$branch') ");

    header("location:deudas.php");

}else{
    ?>
    <?php
        include("addDeudas.php");
    ?>
  <h1 class="bad">*Complete todos los datos*</h1>
  <?php
}

?>