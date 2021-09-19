<?php
include "conexion.php";
// LA FUNCION ISSET VERIFICA SI EXISTE O NO UNA VARIABLE
// EN ESTE CASO VERIFICA SI EXISTE LA VARIABLE ACCION
$opc=isset($_POST['Accion']);
//AL VERIFICAR QUE EXISTE, SE EVAULA SU VALOR CON UN SWITCH CASE
// SI ES 1, SE DIRECCIONA HACIA UNA FUNCION
if($opc!=0){
    switch($opc){
        case 1:{
            registrarMateria();
            break;
        }
        case 2:{
            //si es otra funcion
            break;
        }
        default:{
            break;
        }
    }
}
function registrarMateria(){
    // RECIBIMOS CADA VALOR ENVIADO DESDE JQUERY CON EL METODO POST
    $sigla = $_POST['sigla'];
    $nom = $_POST['nom'];

    try {
            $con=conexion();
            $sql="insert into materia(sigla,nombre)values('$sigla','$nom');";
            if(mysqli_query($con,$sql)){
                printf("<script type='text/javascript'>alert('REGISTRO EXITOSOOO'); </script>");
                //$fila_array[]=array('res'=>'REGISTRO EXITOSO');
            }else{
                echo mysqli_error($con);
            }
        //$resp=json_encode($fila_array);
        //echo $resp;
    }catch (Exception $e){
        echo $e->getMessage();
    }
}


?>