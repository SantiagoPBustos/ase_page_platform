<?php

include("controller/conection.php");

$email=$_POST["email"];
$password=$_POST["password"];
session_start();
$_SESSION["email"]=$email;

$consulta=" SELECT * FROM accounts WHERE email='$email' and password='$password' ";

$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
  
    header("location:home.php");

}else{
    ?>
    <?php
        include("login.php");
    ?>
  <h1 class="bad">*Datos de Ingreso Invalidos*</h1>
  <?php
}

mysqli_free_result($resultado);
mysqli_close($conexion);

?>