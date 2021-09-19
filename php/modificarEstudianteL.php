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
        $cod=$_POST['cod'];

        // Consulta a ejecutar en la BD
        $sql="select * from estudiante where codigo='$cod';";

        // El resultado de la consulta lo almacenamos en la variable $result
        $result=mysqli_query($conn,$sql);

        if(mysqli_fetch_row($result)!=true){
            // No existen registros
            $fila_array[]=array("codigo"=>'No existe',"nombre"=>'No existe',"paterno"=>'No existe',"materno"=>'No existe',"ci"=>'No existe',"extension"=>'No existe');
        }
        else{
            $result=mysqli_query($conn,$sql);
            while($fila=mysqli_fetch_object($result)){
                $fila_array[]=array("codigo"=>$fila->codigo,"nombre"=>$fila->nombre,"paterno"=>$fila->paterno,"materno"=>$fila->materno,"ci"=>$fila->ci,"extension"=>$fila->extension,"foto"=>$fila->foto);
            }
        }
        $resp=json_encode($fila_array);
        echo $resp;
    }

    function modificarDatos(){

        // Conectando a la BD
        $conn=conexion();

        // Recibiendo variables que envía la petición AJAX
        $cod=$_POST['cod'];
        $nom=$_POST['nom'];
        $pat=$_POST['pat'];
        $mat=$_POST['mat'];
        $ci=$_POST['ci'];
        $ext=$_POST['ext'];
        $fotoOriginal=$_POST['fotoOriginal'];

        $codigo=substr($nom,0,1).substr($pat,0,1).substr($mat,0,1).$ci.$ext;
        try {
            if($_POST['textofile']!=""){
                if($fotoOriginal!=""){
                    if(!unlink("../".$fotoOriginal)){
                        echo "Archivo no eliminado";
                    }
                }
                $sep=explode(".",$_FILES['file']['name']);
                $extension=end($sep);
                if(move_uploaded_file($_FILES['file']['tmp_name'],"../imagenes/".$codigo.".".$extension)){
                    $foto="imagenes/".$codigo.".".$extension;
                }
                else{
                    echo "Archivo incorrecto o dañado";
                }
            }
            else{
                $sep=explode(".",$fotoOriginal);
                $extension=end($sep);
                rename("../".$fotoOriginal,"../imagenes/".$codigo.".".$extension);
                $foto="imagenes/".$codigo.".".$extension;
            }
            $sql="update estudiante set codigo='$codigo',nombre='$nom', paterno='$pat',materno='$mat',ci=$ci, extension='$ext',foto='$foto' where codigo='$cod';";
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
        $cod=$_POST['cod'];
        $foto=$_POST['foto'];
        try {
            if($foto!=""){
                if(!unlink("../".$foto)){
                    echo "Archivo no eliminado";
                }
            }
            $sql="delete from estudiante where codigo='$cod';";
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