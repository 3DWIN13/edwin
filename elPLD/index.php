<?php
//$datos = array();

function elapi($ruta){
    $url = "http://173.249.49.169:88/api/test/consulta/";
    $res = $url.$ruta;
    return $res;
}

$lacedula;

if(isset($_POST['btnSend'])){
$lacedula=$_POST['cedula'];
$lacedula = trim($lacedula, " ");

//echo $lacedula;
}

if(empty($lacedula)){
    
   $datos= "dasd";
    
    $datos = json_decode($datos, null);

    
}
else{
    
$direx = elapi($lacedula);
$json = file_get_contents($direx);
$datos = json_decode($json, true);
//var_dump ($datos);
//var_dump($json);
}

if($datos['Ok']==false){
    $datos= "dasd";
    $datos = json_decode($datos, null);
    
    //echo "lalal";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario de contacto</title>

    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/font-awesome.css">

    <script src="js/jquery-3.2.1.js"></script>
    <script src="js/script.js"></script>
</head>
<body>

    <section class="form_wrap">

        <section class="cantact_info">
        <img src= "<?=$datos['Foto'];?>" alt="card image cap" style="max-height:200px;max-width:200px">
        </section>

        <form action="" class="form_contact" method="post">
        <input type="text" id="cedula" name="cedula">
        <input type="submit" value="BUSCAR" id="btnSend" name="btnSend">
            <div class="user_info">
                <label for="names">Cedula: <?=$datos['Cedula']; ?></label>
               <!-- <input type="text" id="names">-->
<br>
                <label for="phone">Nombre: <?=$datos['Nombres']; ?></label>
                <br>            

                <label for="email">Apellidos: <?=$datos['Apellido1']?>  <?=$datos['Apellido2'];?> </label>
                <br>

                <label for="mensaje">Fecha Nacimiento:  <?=$datos['FechaNacimiento']; ?> </label>
                <br>
  
                 
            </div>
        </form>
    </section>

</body>
</html>
