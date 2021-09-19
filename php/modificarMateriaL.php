<?php
    include "conexion.php";
    $opc=isset($_POST['Accion']);
    if($opc!=0){
        switch ($_POST['Accion']) {
            case 1:{
                cargarDatos();
                break;
            }
            case 2:{
                modificarDatos();
                break;
            }
            case 3:{
                eliminarDatos();
                break;
            }
            default:
                # code...
                break;
        }
    }

    function cargarDatos(){
        $conn=conexion();
        $sigla=$_POST['sigla'];

        // Consulta a ejecutar en la BD
        $sql="select * from materia where sigla='$sigla';";

        // El resultado de la consulta lo almacenamos en la variable $result
        $result=mysqli_query($conn,$sql);

        if(mysqli_fetch_row($result)!=true){
            // No existen registros
            $fila_array[]=array("sigla"=>'No existe',"nombre"=>'No existe');
        }
        else{
            $result=mysqli_query($conn,$sql);
            while($fila=mysqli_fetch_object($result)){
                $fila_array[]=array("sigla"=>$fila->sigla,"nombre"=>$fila->nombre);
            }
        }
        $resp=json_encode($fila_array);
        echo $resp;
    }

    function modificarDatos(){

        // Conectando a la BD
        $conn=conexion();

        // Recibiendo variables que envía la petición AJAX
        $sigla=$_POST['sigla'];
        $nom=$_POST['nom'];
        $siglaOriginal=$_POST['siglaOriginal'];
        
        try {
        
            $sql="update materia set sigla='$sigla',nombre='$nom' where sigla='$siglaOriginal';";
            if(mysqli_query($conn,$sql)){
                echo "Registro modificado";
            }
            else{
                echo mysqli_error($conn);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
        
    }
    
    function eliminarDatos(){

        // Conectando a la BD
        $conn=conexion();

        // Recibiendo variables que envía la petición AJAX
        $sigla=$_POST['sigla'];
   
        try {
           
            $sql="delete from materia where sigla='$sigla';";
            if(mysqli_query($conn,$sql)){
                echo 0;
            }
            else{
                echo "Registro no eliminado";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        
    }
?>