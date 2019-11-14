<?php

require('librerias/motor.php');
$usx = nuevos();

$nuevo = "";
$guardar = "";
$editar = "";
$id = "";
$borrar = "";
$agregar = "";
$nombreP = "";
$cedula = "";
$donaciones = "";
$c = contador();
$donan = 0;
$A = "";
$emple=0;





//if(isset($_POST['borrar']))$borrar=$_POST['borrar'];

if (isset($_POST['guardar'])) $guardar = $_POST['guardar'];
if (isset($_POST['editar'])) $editar = $_POST['editar'];
if (isset($_POST['editar'])) $id = $_POST['editar'];
if (isset($_POST['agregar'])) $agregar = $_POST['agregar'];

if ($agregar) {
    $emp = new stdClass();
    $emp->cedula = $_POST['cedula'];
    $emp->nombreP = $_POST['nombrep'];
    $emp->donacion = $_POST['donacion'];
    /*$nombreP = $_POST['nombrep'];
    echo  $nombreP;
    echo "asdasd";
    $cedula = $_POST['cedula'];
    $donaciones = $_POST['donacion'];*/
    guardar2($emp);
    $c = contador();
    //echo contador();
    //if(isset($_POST['dinin']))$A=$_POST['dinin'];
}

if ($guardar) {
    $e = new stdClass();
    //nombreEm, rnc, color, comentarios, aportacion

    /*cedula'
Nombre'
donacio*/
    echo $_POST['nombrep'];
    $e->id = $_POST['idx'];
    $e->nombreEm = $_POST['nombre'];
    $e->rnc = $_POST['rnc'];
    $e->color = $_POST['color'];
    $e->comentarios = $_POST['comentarios'];
    $e->aportacion = $_POST['aportacion'];
    $e->cantP = $_POST['cont'];
    /*$e->cedula = $_POST['c'];
    $e->donaciones = $_POST['d'];*/

    guardar($e);
}
//if (isset($_POST['nuevo'])) { echo "esta editando";}
if ($editar) {

    $usx = edit($id);
}
if (isset($_POST['dell'])) {

    $di = $_POST['dell'];
    borrar($di);
    //echo $di;

}
if (isset($_POST['delll'])) {
    $idi = $_POST['delll'];
    borrar2($idi);
}
if (isset($_POST['nuevo'])) {
    borrartodo();
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>tarea 3</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src='main.js'></script>

    <!--JQUERY-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

    <!-- Los iconos tipo Solid de Fontawesome-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>



    <script>
    </script>
</head>

<body>

    <div class="container">
        <div class="col-sm-12">
            <div class="modal-content">
                <form id="idf" method="post" action="" class="col-12">
                    <div class="row">
                        <input type="hidden" name="idx" value="<?= $id; ?>">
                        <input type="hidden" name="cont" value="<?= $c; ?>">
                        <input type="hidden" name="c" value="<?= $cedula; ?>">
                        <input type="hidden" name="d" value="<?= $donaciones; ?>">

                        <div class="col-sm-6">
                            <br>
                            <?php
                            ?>
                            <div style="margin-bottom:5px">
                                <?= input('nombre', 'Empresa', $usx->nombreEm); ?>
                            </div>
                            <div style="margin-bottom:5px">
                                <?= input('rnc', '54644', $usx->rnc); ?>
                            </div>
                            <div style="margin-bottom:5px">
                                <?= input('color', 'verde', $usx->color) ?>
                            </div>
                            <div style="margin-bottom:5px">
                                <?= input('comentarios', 'texto', $usx->comentarios) ?>
                            </div>
                            <div style="margin-bottom:5px">
                                <?= input('aportacion', $usx->aportacion) ?>
                            </div>

                            <div>
                                <button style="width:80px; margin:5px;" class="btn btn-warning" type="submit" name="nuevo" id="nuevo" value="a">Nuevo</button>
                                <button style="width:80px; margin:5px;" class="btn btn-success" type="submit" name="guardar" id="guardar" value="b">Guardar</button>

                            </div>
                            <?php  ?>
                        </div>

                        <div class="col-sm-6">
                            <div class="table-responsive">
                                <table id="userList" class="table table-bordered table-hover table-striped">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">cedula</th>
                                            <th scope="col">nombre</th>
                                            <th scope="col">donacion</th>

                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php
                                        $us = cargar2();
                                        foreach ($us as $mostrar) {
                                            ?>
                                            <tr>
                                                <th scope="row"><?php echo $mostrar['cedula'] ?></th>
                                                <td><?php echo $mostrar['nombrep'] ?></td>
                                                <td><?php echo $mostrar['donacion'] ?></td>



                                                <td>
                                                    <button value="<?php echo $mostrar['id'] ?>" type="submit" name="delll"><i class="fas fa-user-times"></i></button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>

                                </table>
                            </div>


                            <button type="button" id="btn-abrir-popup" class="btn-abrir-popup" style="margin-left:350px" class="btn btn-success" href="#?<?php $donan ?>">Agregar Persona</button>

                        </div>


                        <script>
                            $("dinin").keyup(function() {
                                var value = $(this).val();
                                $("aportacion").text(value);
                            });
                        </script>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table id="userList" class="table table-bordered table-hover table-striped">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Empresa</th>
                                        <th scope="col">RNC</th>
                                        <th scope="col">Color</th>
                                        <th scope="col">Aportacion</th>
                                        <th scope="col">Can empleado</th>
                                       
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php
                                    $us = cargar();
                                    foreach ($us as $mostrar) {
                                        ?>
                                        <tr>
                                            <th scope="row"><?php echo $mostrar['id'] ?></th>
                                            <td><?php echo $mostrar['nombreEm'] ?></td>
                                            <td><?php echo $mostrar['rnc'] ?></td>
                                            <td><?php echo $mostrar['color'] ?></td>
                                            <td><?php echo $mostrar['aportacion'] ?></td>
                                            <td><?php echo $mostrar['cantP'] ?></td>
                                           

                                            <?php $donan += (int) $mostrar['aportacion']; ?>
                                            <?php $emple += (int) $mostrar['cantP']; ?>

                                            <td>
                                                <button value="<?php echo $mostrar['id'] ?>" type="submit" name="editar"><i class="fas fa-edit"></i></button> | <button value="<?php echo $mostrar['id'] ?>" type="submit" name="dell"><i class="fas fa-user-times"></i></button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>

                            </table>
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp; 
                        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                         &nbsp;&nbsp;&nbsp;&nbsp;          
                         &nbsp;&nbsp;&nbsp;&nbsp;
                         &nbsp;&nbsp;&nbsp;&nbsp;
                         &nbsp;&nbsp;&nbsp;&nbsp;
                         &nbsp;&nbsp;&nbsp;&nbsp;
                         &nbsp;&nbsp;&nbsp;&nbsp; 
                        &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                         &nbsp;&nbsp;&nbsp;&nbsp;          
                         &nbsp;&nbsp;&nbsp;&nbsp;
                        
                                            
                         Recaudacion total $:
                        <?php
                        echo $donan;
                        ?> &nbsp;&nbsp;&nbsp;&nbsp;

                                    Total de empleados :
                        <?php
                        echo $emple;
                        ?> &nbsp;&nbsp;&nbsp;&nbsp;


                        
                                    Total de empresas :
                        <?php
                        Nem();
                        ?>
                    </div>
                    <div class="overlay" id="overlay">
                        <div class="popup" id="popup">
                            <a href="#" id="btn-cerrar-popup" class="btn-cerrar-popup"><i class="fas fa-times"></i></a>
                            <h3>Agrega una persona</h3>

                            <div>
                                <?= input('cedula', '001-14654-7'); ?>
                            </div>
                            <div>
                                <?= input('nombrep', 'juan martines'); ?>
                            </div>
                            <div>
                                <?= input('donacion', '1'); ?>
                            </div>

                            <input type="submit" class="btn-submit" name="agregar" id="agregar" value="agregar">
                        </div>
                    </div>
            </div>
        </div>

        </form>
    </div>



    <script>
        var btnAbrirPopup = document.getElementById('btn-abrir-popup'),
            overlay = document.getElementById('overlay'),
            popup = document.getElementById('popup'),
            btnCerrarPopup = document.getElementById('btn-cerrar-popup');

        btnAbrirPopup.addEventListener('click', function() {
            overlay.classList.add('active');
            popup.classList.add('active');
        });

        btnCerrarPopup.addEventListener('click', function(e) {
            e.preventDefault();
            overlay.classList.remove('active');
            popup.classList.remove('active');
        });
    </script>
    </div>

</body>

</html>