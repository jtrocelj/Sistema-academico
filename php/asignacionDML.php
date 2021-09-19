<?php
include "conexion.php";
$opc=isset($_POST['Accion']);
if($opc!=0){
    switch($_POST['Accion']){
        case 1:{
            datosDocente();
            break;
        }
        case 2:{
            nombreDocente();
            break;
        }
        case 3:{
            cargarMaterias();
            break;
        }
        case 4:{
           asignarMaterias();
            break;
        }
        default:{
            break;
        }
    }
}
function datosDocente(){
    $con=conexion();
    $nom=$_POST['nom'];
    $pat=$_POST['pat'];
    $mat=$_POST['mat'];
   
    $sql = "select * from docente where nombre like '%".$nom."%' and paterno like '%".$pat."%' and materno like '%".$mat."%'";
    $result=mysqli_query($con,$sql);
    if($row=mysqli_fetch_object($result)){
        $fila_array[]=array('nombre'=>$row->nombre." ".$row->paterno." ".$row->materno,'ci'=>$row->ci);
        while($row=mysqli_fetch_object($result)){
            $fila_array[]=array('nombre'=>$row->nombre." ".$row->paterno." ".$row->materno,'ci'=>$row->ci);
        }
    }else{
        $fila_array[]=array('nombre'=>'S/D','ci'=>'S/D');
    }
    $resp=json_encode($fila_array);
    echo $resp;
    
}
function  nombreDocente(){
    $con=conexion();
    $ci=$_POST['ci'];
    try{
        $sql="select nombre,paterno,materno from docente where ci=$ci";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_object($result)){
            $fila_array[]=array('nombre'=>$row->nombre." ".$row->paterno." ".$row->materno);
        }

    }catch (Exception $e){
        $fila_array[]=array('nombre'=>$e->getMessage());
    }
    $resp=json_encode($fila_array);
    echo $resp;
    
}

function  cargarMaterias(){
    $con=conexion();
    try{
        $sql="select * from materia;";
        $result=mysqli_query($con,$sql);
        while($row=mysqli_fetch_object($result)){
            $fila_array[]=array('sigla'=>$row->sigla,'nombre'=>$row->sigla."-".$row->nombre);
        }
    }catch (Exception $e){
        $fila_array[]=array('sigla'=>$e->getMessage(),'nombre'=>$e->getMessage());
    }
    $resp=json_encode($fila_array);
    echo $resp;
}

function  asignarMaterias(){
    $con=conexion();
    $ci=$_POST['ci'];
    $sigla=$_POST['sigla'];

    $fecha=date('Y-m-d');
    try{
        $sql="insert into asignacionDM (codigo,codMateria,codDocente,fecha) values ('','$sigla',$ci,'$fecha');";
        if(mysqli_query($con,$sql)){
            $fila_array[]=array('resp'=>'MATERIA ASIGNADA');
        }else{
            $fila_array[]=array('resp'=>mysqli_error($con));
        }

    }catch (Exception $e){
        $fila_array[]=array('resp'=>$e->getMessage());
    }
    $resp=json_encode($fila_array);
    echo $resp;
    
}
?>