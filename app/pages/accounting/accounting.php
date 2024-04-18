<?php
    session_start();
    if(empty($_SESSION['email'])){
        header("location:login.php");
    }
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <title>Contabilidad - ASE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
        <meta name="keywords" content="">
        <meta name="author" content="David Santiago Piña Bustos">
        <link
            href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="../../css/styles.css">
        <link rel="icon" href="../../imgs/favicon.png">
    </head>
    <body class="bg-img-body">

        <header>
            <nav class="menu">
                <button class="nav-toggle">
                    <img class="img-menu-button" src="../../imgs/menu.png" width="30px">
                </button>
                <ul class="nav-menu">
                    <li><a href="../../home.php">INICIO</a></li>
                    <li><a class="selected-item" href="accounting.php">CONTABILIDAD</a></li>
                    <li><a href="../../controller/sign-out.php">SALIR</a></li>
                </ul>
            </nav>
        </header>

        <section class="margin-top-cards"></section>
        <article class="contabilidad">
            <section class="cards margin-top-cards">
                <div class="card-accounting"><a href="incomes/ingresos.php">INGRESOS</a></div>
                <div class="card-accounting"><a href="expenses/egresos.php">EGRESOS</a></div>
                <div class="card-accounting"><a href="fixed-costs/costos-fijos.php">COSTOS FIJOS</a></div>
                <div class="card-accounting"><a href="debts/deudas.php">DEUDAS</a></div>
                <div class="card-accounting"><a href="pending-charges/cobros.php">COBROS PENDIENTES</a></div>
            </section>            
        </article>
            
        <section class="footer">
            <?php
                include("../../controller/conection.php"); 

                if ($_SESSION['email'] == "tunja@ase.com") {
                    $number=1;
                }else if ($_SESSION['email'] == "samaca@ase.com") {
                    $number=2;
                }

                $sql=$conexion->query(" SELECT city FROM accounts WHERE id_account=$number ");
                while ($dato=$sql->fetch_object()) {?>
                <p><?= $dato->city ?></p>
            <?php
                }
            ?>
        </section>        
            
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="../../js/scripts.js"></script>

    </body>

</html>