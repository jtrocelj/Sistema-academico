<?php
    include "conexion.php";
    require('../fpdf/fpdf.php');
    class PDF extends FPDF
    {
        // Cabecera de página
        function Header()
        {
            // Logo
            $this->Image('..\imagenes\informatica.png',10,8,10);
            // Arial bold 15
            $this->SetFont('Arial','B',15);
            // Movernos a la derecha
            $this->Cell(80);
            // Título
            $this->Cell(30,10,'REPORTE DE MATERIAS',0,0,'C');
            // Salto de línea
            $this->Ln(20);
        }
        
        // Pie de página
        function Footer()
        {
            // Posición: a 1,5 cm del final
            $this->SetY(-15);
            // Arial italic 8
            $this->SetFont('Arial','I',8);
            // Número de página
            $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
        }
        
        
        // Tabla simple
        function BasicTable($header, $data)
        {
            // Cabecera
            foreach($header as $col)
                $this->Cell(40,7,$col,1);
            $this->Ln();
            // Datos
            foreach($data as $row)
            {
                foreach($row as $col)
                    $this->Cell(40,6,$col,1);
                $this->Ln();
            }
        }
            
    }

    $opc=isset($_POST['Accion']);
if($opc!=0){
    switch ($_POST['Accion']) {
        case 1:
            datosDocenteMateria();
            break;
        case 2:
            abrirReporte();
            break;
        default:
            # code...
            break;
    }
}

function datosDocenteMateria(){
    $con=conexion();
    $ci=$_POST['ci'];
    try {
        $sql="select ci,paterno,materno,docente.nombre,sigla,materia.nombre as materia
    from asignaciondm
    inner join docente on ci=codDocente
    inner join materia on sigla=codMateria
    where ci=$ci;";
    $result=mysqli_query($con,$sql);
    if($row=mysqli_fetch_object($result)){
        $fila_array[]=array('nombre'=>$row->nombre." ".$row->paterno." ".$row->materno,'sigla'=>$row->sigla,'nombreMateria'=>$row->materia);
        while($row=mysqli_fetch_object($result)){
            $fila_array[]=array('nombre'=>$row->nombre." ".$row->paterno." ".$row->materno,'sigla'=>$row->sigla,'nombreMateria'=>$row->materia);
        }
    }
    else{
        $fila_array[]=array('nombre'=>'S/D','sigla'=>'S/D','nombreMateria'=>'S/D');
    }
    } catch (Exception $e) {
        $fila_array[]=array('nombre'=>$e->getMessage(),'sigla'=>$e->getMessage(),'nombreMateria'=>$e->getMessage()); // txtNombre.setText(); e.getMessage()
    }
    
    $resp=json_encode($fila_array);
    echo $resp;
}

function abrirReporte(){
    $conn=conexion();
    $ci=$_POST['ci'];
    try {
        // Creación del objeto de la clase heredada
        $pdf=new PDF(); //instancia de una clase PDF
        $pdf->AliasNbPages(); //Para colocar cabecera y pie de documento
        $pdf->AddPage(); //Agregar nueva página

        #####Obteniendo datos de la BD#################################
        $sql="select ci,paterno,materno,docente.nombre,sigla,materia.nombre as materia
        from asignaciondm
        inner join docente on ci=codDocente
        inner join materia on sigla=codMateria
        where ci=$ci;";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_object($result);
        ##########################################################
        $pdf->SetFont('Arial','',12);// Configurando tipo de fuente para el documento
        $pdf->Cell(0,10,'Docente: '.$row->paterno." ".$row->materno." ".$row->nombre,0,1,'L');// Agregando una celda con alineación izquierda
        $pdf->Cell(0,10,'LISTADO DE MATERIAS ASIGNADA',0,1,'C');//Agregando una celda con alineación central

        // Creando TABLA
        $header=array("Sigla","Materia");
        $data=array();

        ########VOLVIENDO A EJECUTAR CONSULTA###########
        $result=mysqli_query($conn,$sql);
        $i=0;
        while($row=mysqli_fetch_object($result)){
            $data[$i]['sigla']=$row->sigla;
            $data[$i]['materia']=$row->materia;
            $i++;
        }
        $pdf->BasicTable($header,$data);// Pasando parámetros a la tabla

        // Creamos el archivo
        $pdf->Output('..\reportes\reporte.pdf','F'); //Ruta donde vamos a crear el archivo; F=guarda el archivo de manera local (I=opcion de guardar como; D=preparado para la descarga, S=retorna una cadena de PDF)
        $fila_array[]=array('url'=>'reportes/reporte.pdf','resp'=>'REPORTE GENERADO');
    } catch (Exception $e) {
        $fila_array[]=array('url'=>'No generado','resp'=>$e->getMessage());
    }
    $resp=json_encode($fila_array);
    echo $resp;
}




    
?>