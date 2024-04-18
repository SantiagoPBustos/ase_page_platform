<?php
    session_start();
    if(empty($_SESSION["email"])){
        header("location:login.php");
    }

    $number=0;

    if ($_SESSION['email'] == "tunja@ase.com") {
        $number=1;
    }else if ($_SESSION['email'] == "samaca@ase.com") {
        $number=2;
    }

    include("controller/conection.php");
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <title>Acabados y Soluciones Exito - ASE</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1" />
        <meta name="keywords" content="">
        <meta name="author" content="David Santiago Piña Bustos">
        <link
            href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/styles.css">
        <link rel="icon" href="imgs/favicon.png">
    </head>
    <body>

        <header>
            <nav class="menu">
                <button class="nav-toggle">
                    <img class="img-menu-button" src="imgs/menu.png" width="30px">
                </button>
                <ul class="nav-menu">
                <li><a class="selected-item" href="home.php">INICIO</a></li>
                    <li><a href="pages/accounting/accounting.php">CONTABILIDAD</a></li>
                    <li><a href="controller/sign-out.php">SALIR</a></li>
                </ul>
            </nav>
        </header>

        <article>

            <section class="banner-principal">
                <div><img class="logo-principal-banner" src="imgs/LogoASE.png"></div>
            </section>

            <section class="container-home">
                <div class="header-main">
                    <p>Saldo en caja: 
                        <?php

                            $sql=$conexion->query(" SELECT SUM(value) as result FROM ingresos JOIN accounts WHERE id_account=branch AND branch=$number");
                            $incomes=$sql->fetch_object();

                            $sql=$conexion->query(" SELECT SUM(value) as result FROM egresos JOIN accounts WHERE id_account=branch AND branch=$number");
                            $expenses=$sql->fetch_object();

                            $balance = $incomes->result - $expenses->result;

                            $sql=$conexion->query(" UPDATE accounts SET cash_balance=$balance WHERE id_account=$number ");

                            $sql=$conexion->query(" SELECT cash_balance FROM accounts WHERE id_account=$number ");
                            $datos=$sql->fetch_object();
                        ?>
                        <b>$ <?= number_format($datos->cash_balance) ?></b><br><br>
                        <b>MOVIMIENTOS RECIENTES</b><br>
                    </p>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <td class="value bg-deep">Valor</td>
                                <td class="descrip bg-deep">Descripcion</td>
                                <td class="date bg-deep">Fecha</td>
                            </tr>

                            <?php

                                $sql5=$conexion->query(" DELETE FROM recent_transactions WHERE branch=$number ");

                                $sql1=$conexion->query(" SELECT * FROM ingresos 
                                                        JOIN accounts 
                                                        WHERE id_account=branch 
                                                        AND branch=$number 
                                                        ORDER BY date DESC
                                                        LIMIT 30");

                                $sql2=$conexion->query(" SELECT * FROM egresos 
                                                        JOIN accounts 
                                                        WHERE id_account=branch 
                                                        AND branch=$number 
                                                        ORDER BY date DESC
                                                        LIMIT 30");

                                while ($ingresos=$sql1->fetch_object()) {
                                    $type="ingreso";
                                    $sql3=$conexion->query(" INSERT INTO recent_transactions(value,description,date,branch,type) 
                                                            VALUES ('$ingresos->value',
                                                            '$ingresos->description',
                                                            '$ingresos->date',
                                                            '$ingresos->branch',
                                                            '$type' )");
                                }

                                while ($egresos=$sql2->fetch_object()) {
                                    $type="egreso";
                                    $sql4=$conexion->query(" INSERT INTO recent_transactions(value,description,date,branch,type) 
                                                            VALUES ('$egresos->value',
                                                            '$egresos->description',
                                                            '$egresos->date',
                                                            '$egresos->branch',
                                                            '$type' )");
                                }
                                
                                $sql5=$conexion->query(" SELECT * FROM recent_transactions
                                                        JOIN accounts 
                                                        WHERE id_account=branch 
                                                        AND branch=$number 
                                                        ORDER BY date DESC
                                                        LIMIT 30");

                            while ($datos=$sql5->fetch_object()) {
                                if($datos->type=="ingreso"){
                                    $value = '+ $' . number_format($datos->value);
                                }else if($datos->type=="egreso"){
                                    $value = '- $' . number_format($datos->value);
                                }
                            ?>
                            <tr>
                                <td class="<?php echo $datos->type;?>"><?= $value ?></td>
                                <td><?= $datos->description ?></td>
                                <td><?= $datos->date ?></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </section>
        </article>

        <section class="footer">
            <?php
                include("controller/conection.php"); 

                if ($_SESSION["email"] == "tunja@ase.com") {
                    $number=1;
                }else if ($_SESSION["email"] == "samaca@ase.com") {
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
        <script src="js/scripts.js"></script>

    </body>

</html>