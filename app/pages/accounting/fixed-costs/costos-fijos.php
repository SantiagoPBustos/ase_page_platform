<?php
    session_start();
    if(empty($_SESSION['email'])){
        header("location:../../../login.php");
    }

    $number=0;

    if ($_SESSION['email'] == "tunja@ase.com") {
        $number=1;
    }else if ($_SESSION['email'] == "samaca@ase.com") {
        $number=2;
    }

    include("../../../controller/conection.php"); 
    
?>

<!DOCTYPE html>
<html lang="es">

    <head>
        <title>Costos Fijos - ASE</title>
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

    <body>    

    <header class="header-back">
        <a href="../accounting.php"><img src="../../../imgs/back.jpg"></a>
    </header>

    <article class="container-ingresos">
        <section>
            <h1>COSTOS FIJOS</h1>
            <a href="addCostos.php" class="a-button">AGREGAR COSTO FIJO</a>
        </section>
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <tbody>
                    <tr>
                        <td class="value bg-deep">Valor</td>
                        <td class="descrip bg-deep">Descripcion</td>
                        <td class="date bg-deep">Fecha Pago</td>
                        <td class="edit bg-deep">Editar</td>
                        <td class="delete bg-deep">Borrar</td>
                    </tr>

                    <?php

                        $sql=$conexion->query(" SELECT * FROM costos_fijos JOIN accounts WHERE id_account=branch AND branch=$number ORDER BY id_costos DESC");
                        
                        while ($datos=$sql->fetch_object()) {
                            $value = number_format($datos->value);
                        ?>
                    <tr>
                        <td>$ <?= $value ?></td>
                        <td><?= $datos->description ?></td>
                        <td><?= $datos->date ?></td>
                        <td>
                            <a href="editCostos.php?id=<?=$datos->id_costos?>"><img src="../../../imgs/edit.png"></a>
                        </td>
                        <td>
                            <form action="controller_deleteCostos.php?id=<?=$datos->id_costos?>" method="post">
                                <input class="button-input" type="submit" value="BORRAR">
                            </form>
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </article>

    <section class="footer">
        <?php

            $sql=$conexion->query(" SELECT city FROM accounts WHERE id_account=$number ");
            while ($dato=$sql->fetch_object()) {?>
            <p><?= $dato->city ?></p>
        <?php
            }
        ?>
    </section>

    </body>
    
</html>