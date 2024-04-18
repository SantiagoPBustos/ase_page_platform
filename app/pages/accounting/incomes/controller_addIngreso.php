<?php
date_default_timezone_set('America/Bogota');
include("../../../controller/conection.php"); 

if(!empty($_POST["value"]) and !empty($_POST["desc"])){

    $value=$_POST["value"];
    $desc=$_POST["desc"];
    $date=date("d/m/Y - g:ia");
    session_start();
    $email=$_SESSION["email"];
    $branch=0;
    
    if ($_SESSION["email"] == "tunja@ase.com") {
        $branch=1;
    }else if ($_SESSION["email"] == "samaca@ase.com") {
        $branch=2;
    }

    $sql=$conexion->query(" INSERT INTO ingresos(value,description,date,branch) VALUES ('$value','$desc','$date','$branch') ");

    header("location:ingresos.php");

}else{
    ?>
    <?php
        include("addIngreso.php");
    ?>
  <h1 class="bad">*Complete todos los datos*</h1>
  <?php
}

?>