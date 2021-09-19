<?php
include "conexion.php";
//SHIRLEY BRYAN QUISPE APAZA
$opc= isset($_POST['Accion']);
if($opc!=0){
    switch ($opc){
        case 1:{
            registrarEstudiante();
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
    function registrarEstudiante()
    {
        $nom=$_POST['nom'];
        $pat=$_POST['pat'];
        $mat=$_POST['mat'];
        $ci=$_POST['ci'];
        $ext=$_POST['ext'];
        
        //GENERAR UN CODIGO POR MEDIO DE SUB CA
        $codigo = substr($nom,0,1) . substr($pat,0,1) . substr($mat,0,1) . $ci. $ext;
        // se usa try para programas robustos que significa intentar hacer la conexion con la base de datos
         try {
             $con= conexion();
             // obtener extencion del archivo jpg
             $x=explode(".",$_FILES['file']['name']);
             $extension=end($x);
             //copiando foto al servidor
        if(move_uploaded_file($_FILES["file"]["tmp_name"],"../imagenes/".$codigo.".".$extension)){
              $foto= "imagenes/".$codigo.".".$extension;
              $sql= "insert into estudiante (codigo,ci,extension,nombre,paterno,materno,foto) values('$codigo','$ci','$ext','$nom','$pat','$mat','$foto');"; 
              if(mysqli_query($con, $sql)) {
                 echo "Registro exitoso"; 
                 //$fila_array[]=array('res'=>'REGISTRO EXITOSO');    
                }
                else{
                echo mysqli_error($con);
                }
               }
               else{
                 echo "Archivo incorrecto";
                }
   
                //$fila_array[]=array('nombre'=>$nom,'paterno'=>$pat,'materno'=>$mat,'ci'=>$ci.$ext,'codigo'=>$codigo);
                //$resp=json_encode($fila_array);

                //echo $resp;
           } catch (Exception $e) {
           echo $e->getMessage();
           }
        }
         
?>