<?php
include "conexion.php";
//SHIRLEY
$opc=isset($_POST['Accion']);
if($opc!=0){
    switch ($opc){
        case 1:{
            registrarAdministrativo();
            break;

        }
        case 2:{
            break;
        }
        default:{
            break;

        }
    }
}
     function registrarAdministrativo(){
        $nom=$_POST['nom'];
        $pat=$_POST['pat'];
        $mat=$_POST['mat'];
        $cargo=$_POST['cargo'];
        $ci=$_POST['ci'];
        $ext=$_POST['ext'];

     
    $codigo=substr($nom,0,1).substr($pat,0,1).substr($mat,0,1).substr($cargo,0,1) . $ci. $ext;
    try {
    $con=conexion();
     // obtener extencion del archivo jpg
     $x=explode(".",$_FILES['file']['name']);
     $extension=end($x);
     //copiando foto al servidor
if(move_uploaded_file($_FILES["file"]["tmp_name"],"../imagenes/".$codigo.".".$extension)){
      $foto= "imagenes/".$codigo.".".$extension;

    $sql="insert into administrativo (codigo,ci,extension,nombre,paterno,materno,cargo,foto) values('$codigo','$ci','$ext','$nom','$pat','$mat','$cargo','$foto');";
    if(mysqli_query($con, $sql)) {
        echo "REGISTRO EXITOSO!!"; 

        //$fila_array[]=array('res'=>'REGISTRO EXITOSO');   
    }
    else{
    echo mysqli_error($con);
    }
   }
   else{
     echo "ARCHIVO INCORRECTO";
    }
    
    //$fila_array[]=array('nombre'=>$nom,'paterno'=>$pat,'materno'=>$mat,'ci'=>$ci.$ext,'codigo'=>$codigo);
    //$resp=json_encode($fila_array);
    //echo $resp;

    } catch (Exception $e) {
    echo $e->getMessage();
    }
 }


?>