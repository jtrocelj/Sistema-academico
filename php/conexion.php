<?php
//  PARAMETROS PARA LA CONEXION A LA BASE DE DATOS
function conexion(){
    $server="localhost";
    $user="root";
    $password="";
    $database="sisacademico";

    $conn=mysqli_connect($server,$user,$password,$database);
    if(!$conn){
        echo "Error con la conexión";
    }
    return $conn;
}

?>