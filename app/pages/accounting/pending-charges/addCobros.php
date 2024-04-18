<?php
    session_start();
    if(empty($_SESSION["email"])){
        header("location:../../../login.php");
    }
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Agrega Cobro Pendiente - ASE</title>
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
        <a href="cobros.php"><img src="../../../imgs/back.jpg"></a>
    </header>

    <h1 class="title">AGREGAR COBRO PENDIENTE</h1>
    <form action="controller_addCobro.php" method="post" class="addIngreso">
        <input min="0" type="number" placeholder="Valor" name="value">
        <input name="desc" type="text" placeholder="Descripcion">
        <input name="client" type="text" placeholder="Nombre Cliente">
        <input name="tel" type="text" placeholder="Telefono">
        <input name="btn-add-cobro" class="button-input" type="submit" value="AGREGAR COBRO PENDIENTE">
    </form>


</body>

</html>