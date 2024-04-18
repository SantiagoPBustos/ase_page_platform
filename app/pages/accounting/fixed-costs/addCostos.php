<?php
    session_start();
    if(empty($_SESSION["email"])){
        header("location:../../../login.php");
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agrega Costo Fijo - ASE</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
    <meta name="keywords" content="">
    <meta name="author" content="David Santiago Piña Bustos">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../../../css/styles.css">
    <link rel="icon" href="../../../imgs/favicon.png">
</head>



<body class="bg-gray">

    <header class="header-back">
        <a href="costos-fijos.php"><img src="../../../imgs/back.jpg"></a>
    </header>

    <h1 class="title">AGREGAR COSTO FIJO</h1>
    <form action="controller_addCostos.php" method="post" class="addIngreso">
        <input min="0" type="number" placeholder="Valor" name="value">
        <input name="desc" type="text" placeholder="Descripcion">
        <input name="date" type="text" placeholder="Fecha de pago">
        <input name="btn-add-costo" class="button-input" type="submit" value="AGREGAR COSTO FIJO">
    </form>


</body>

</html>