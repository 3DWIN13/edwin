<?php
require('librerias/motor.php');

if($_POST){

    $cox = mysqli_connect($_POST['DB_HOST'],$_POST['DB_USER'],$_POST['DB_PASS']) 
    or die("<script>
    
            alert('conexion invalida verificar');
            window.location = 'install.php';
            

    </script>");

    mysqli_query($cox, "drop `{$_POST['DB_NAME']}`");
mysqli_query($cox, "CREATE DATABASE `{$_POST['DB_NAME']}`");
mysqli_query($cox, "USE `{$_POST['DB_NAME']}`");
mysqli_query($cox, "CREATE TABLE IF NOT EXISTS `empresas` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `nombreEm` varchar(10) NOT NULL,
    `rnc` int(10) NOT NULL,
    `color` varchar(10) NOT NULL,
    `comenterios` varchar(50) NOT NULL,
    `aportacion` int(10) NOT NULL,
    `cantP` int(11) NOT NULL,
    `Pdonacion` int(10) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;");

mysqli_query($cox, "CREATE TABLE IF NOT EXISTS `empleados` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `cedula` varchar(10) NOT NULL,
    `nombrep` varchar(10) NOT NULL,
    `donacion` int(11) NOT NULL,
    PRIMARY KEY (`id`)
  ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;");

    $arc = <<<archivo
    <?php

define('DB_HOST','{$_POST['DB_HOST']}');
define('DB_USER','{$_POST['DB_USER']}');
define('DB_PASS','{$_POST['DB_PASS']}');
define('DB_NAME','{$_POST['DB_NAME']}');

define('IS_DEBUG', true);
archivo;

            file_put_contents('librerias/config_x.php', $arc);

echo "<script>

        window.location= 'index.php';

</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">    <script src='main.js'></script>
</head>
<body>
    <div class="container">
        <form  method="post" action="">
            <div>
                <?= input('DB_HOST', 'servidor'); ?>
            </div>
            <div>
                <?= input('DB_USER', 'nombre de usuario de la base de datos'); ?>
            </div>
            <div>
                <?= input('DB_PASS', 'clave de la base de datos, si tienes, si no deja el campo vacio'); ?>
            </div>
            <div>
                <?= input('DB_NAME', 'nombre de la base de datos'); ?>
            </div>

            <div class="text-center">
                <button type="submit">
                   guardar 
                </button>
            </div>
        </form>
</div>
</body>
</html>