<?php
include "conexion.php";
$opc=isset($_POST['Accion']);
if($opc!=0){
    switch($opc){
        case 1:{
            registrarDocente();
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
function registrarDocente(){
    $nom=$_POST['nom'];
    $pat=$_POST['pat'];
    $mat=$_POST['mat'];
    $ci=$_POST['ci'];
    $ext=$_POST['ext'];

    $codigo=substr($nom,0,1).substr($pat,0,1).substr($mat,0,1).$ci.$ext;
    try{

        $con=conexion();
        $x=explode(".",$_FILES['file']['name']);
        $extension=end($x);

        if(move_uploaded_file($_FILES['file']['tmp_name'],"../imagenes/".$codigo.".".$extension)){
            $foto="imagenes/".$codigo.".".$extension;
            $sql="insert into docente(codigo,ci,extension,nombre,paterno,materno,foto)values('$codigo','$ci','$ext','$nom','$pat','$mat','$foto');";
            if(mysqli_query($con,$sql)){
                //$fila_array[]=array('res'=>'REGISTRO EXITOSO');
                echo "REGISTRO EXITOSO!!!";
            }else{
             echo mysqli_error($con);
            }
                //$fila_array[]=array('nombre'=>$nom,'paterno'=>$pat,'materno'=>$mat,'ci'=>$ci.$ext,'codigo'=>$codigo);
    
                //$resp=json_encode($fila_array);
                //echo $resp;
        }else{
            echo "ARCHIVO INCORRECTO";
        } 
    }catch (Exception $e){
        echo $e->getMessage();
    }
}
?>