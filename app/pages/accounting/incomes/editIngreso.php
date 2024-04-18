<?php
    session_start();
    if(empty($_SESSION['email'])){
        header("location:../../../login.php");
    }

    include("../../../controller/conection.php"); 
    $id=$_GET["id"];
    $sql=$conexion->query("SELECT * FROM ingresos WHERE id_ingreso=$id ");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Editar Ingreso - ASE</title>
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
        <a href="ingresos.php"><img src="../../../imgs/back.jpg"></a>
    </header>

    <h1 class="title">EDITAR INGRESO</h1>
    <form action="controller_editIngreso.php" method="post" class="addIngreso">
        <?php
        while ($datos=$sql->fetch_object()) { ?>
        <input type="hidden" name="id" value="<?= $_GET["id"] ?>" readonly>
        <label>Valor</label>
        <input min="0" type="number" placeholder="Valor" name="value" value="<?= $datos->value ?>">
        <label>Descripción</label>
        <input name="desc" type="text" placeholder="Descripcion" value="<?= $datos->description ?>">
        <?php } ?> 
        <input name="btn-edit-ingreso" class="button-input" type="submit" value="GUARDAR">
    </form>


</body>

</html>