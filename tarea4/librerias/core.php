<?php

function cargar(){
    $sql= "select * from empresas";
    $rs = conexion::consulta($sql);

    $final=[];
    while($fila = mysqli_fetch_assoc($rs)){
        $final[]= $fila;
    }
    return $final;
}
function cargar2(){
    $sql= "select * from empleados";
    $rs = conexion::consulta($sql);

    $final=[];
    while($fila = mysqli_fetch_assoc($rs)){
        $final[]= $fila;
    }
    return $final;
}
function nuevos(){
    //nombreEm, rnc, color, comenterios, aportacion, cedula, nombreP, donaciones
    $empresas = new stdClass();
    $empresas->id=0;
    $empresas->nombreEm =''; 
    $empresas->rnc ='';
    $empresas->color = '';
    $empresas->comentarios='';
    $empresas->aportacion='';
    $empresas->cedula='';
    $empresas->nombreP='';
    $empresas->donaciones='';
    return $empresas;
}

function edit($id){
    $sql = "select * from empresas where id='{$id}'";
    $rs = conexion::consulta($sql);

    $fila = mysqli_fetch_assoc($rs);

    $empresas = new stdClass();
    $empresas->id=$id;
    $empresas->nombreEm = $fila['nombreEm'];
    $empresas->rnc = $fila['rnc'];
    $empresas->color = $fila['color'];
    $empresas->comentarios = $fila['comenterios'];
    $empresas->aportacion = $fila['aportacion'];

    return $empresas;
}

function borrartodo(){
    $sql = "TRUNCATE TABLE empleados";

    conexion::consulta($sql);
}

function borrar($empresas){
    $sql = "delete from empresas where id = '{$empresas}'";

    conexion::consulta($sql);
}
function borrar2($empleados){
    $sql = "delete from empleados where id = '{$empleados}'";

    conexion::consulta($sql);
}

function guardar($empresas){
   if($empresas->id > 0){
        $sql="UPDATE empresas SET nombreEm='{$empresas->nombreEm}', rnc='{$empresas->rnc}', color='{$empresas->color}', comenterios='{$empresas->comentarios}', aportacion='{$empresas->aportacion}', cantP='{$empresas->cantP}' 
        WHERE id='{$empresas->id}'";
        conexion::consulta($sql);
    
    }else{

    $sql="INSERT INTO empresas (nombreEm, rnc, color, comenterios, aportacion, cantP)
     VALUES ('{$empresas->nombreEm}', '{$empresas->rnc}', '{$empresas->color}', '{$empresas->comentarios}', '{$empresas->aportacion}', '{$empresas->cantP}')";

     conexion::consulta($sql);
    }
}
function guardar2($empleados){
    $sql="INSERT INTO empleados (cedula, nombreP, donacion)
    VALUES ('{$empleados->cedula}', '{$empleados->nombreP}', '{$empleados->donacion}')";

    conexion::consulta($sql);
}
function contador(){
    $total=null;
    $sql = "SELECT COUNT(*) as total FROM  empleados";

    $rs=conexion::consulta($sql)->fetch_assoc();

    $total = $rs['total'];
    
    return $total;
}
function Nem(){
    $sql = "SELECT*FROM empresas";
    $rs=conexion::consulta($sql);

    $conteo = mysqli_num_rows($rs);
    echo $conteo;
}