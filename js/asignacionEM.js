$(document).ready(inicializarEventos);

function inicializarEventos(){
    $("#btnBuscarEst").click(function(){datosEstudiante();});
    cargarMaterias();
    $("#btnAsignar").click(function(){asignarMateria();}); 
}

//funcion que cargara datos a la tabla de docentes
function datosEstudiante(){
// almacenando valores de los controles en variables    
    var dat="";
    var nom=$("#nomEstudiante").val();
    var pat=$("#patEstudiante").val();
    var mat=$("#matEstudiante").val();
    var v_data="Accion="+1;
    v_data+="&nom="+nom;
    v_data+="&pat="+pat;
    v_data+="&mat="+mat;
    $.ajax({
        cache:false,
        url:"php/asignacionEML.php",
        type:"POST",
        dataType:"JSON",
        data:v_data,
        beforeSend:function(){
            $(".mensaje").html("Procesando...");
        },
    success:function(respuesta){
        $(".mensaje").html("PROCESADO");
        var i=1;
        // Con foreach recoremos la respuesta de la peticion AJAXque tiene formado JSON
        $.each(respuesta,function(indice,valor){
        dat=dat+"<tr>"+
        "<td>"+i+"</td>"+
        "<td>"+valor.nombre+"</td>"+
        "<td><div style='cursor:pointer; color:blue' onClick='recuperar("+valor.ci+")'>Seleccionar</div></td>"
        "</tr>";
        i++;
        });
        $("#datosEstudiantes>tbody").html(dat);
    },
    error:function(){
         $(".mensaje").html("Error de proceso");
        },
    });
    return false;
}
function recuperar(ci){
    $("#codEstudianteA").val(ci);
    var ci=$("#codEstudianteA").val();
    var v_data="Accion="+2;
    v_data+="&ci="+ci;
    $.ajax({
        cache:false,
        url:"php/asignacionEML.php",
        type:"POST",
        dataType:"JSON",
        data:v_data,
        beforeSend:function(){
            $(".mensaje").html("Procesando...");
        },
        success:function(respuesta){
            $(".mensaje").html("");
            var i=1;
            // Con foreach recorremos la respuesta de la peticion AJAX
            $.each(respuesta,function(indice,valor){
                $("#nomEstudianteA").val(valor.nombre);
            });
        },
        error:function(){
            $(".mensaje").html("Error de proceso");
        },
    });    
}           
function cargarMaterias(){
    var materias="<option value=''>SELECCIONE ASIGNATURA</option>";
    var v_data="Accion="+3;                      
    $.ajax({
    cache:false,
    url:"php/asignacionEML.php",//archivo que recibe la peticion
    type:"POST", //metodo de envio
    dataType:"JSON",// tipo de dato sera formato JSON
    data:v_data, // ENVIANDO LAS VARIABLES HACIA PHP
    beforeSend:function(){
    $(".mensaje").html("Procesando...");
    },
    success:function(respuesta){
     $(".mensaje").html("");
                
    $.each(respuesta,function(indice,valor){
           materias=materias+"<option value='"+valor.sigla+"'>"+valor.nombre+"</option>"
    });
    $("#materias").html(materias);
    },
    error:function(){
        $(".mensaje").html("Error de proceso...!!!");
        },
    });    
}
function asignarMateria(){
    var ci=$("#codEstudianteA").val();  
    var sigla=$("#materias").val();    
    var v_data="Accion="+4;
    v_data+="&ci="+ci;
    v_data+="&sigla="+sigla;
    $.ajax({
    cache:false,
    url:"php/asignacionEML.php",
    type:"POST",
    dataType:"JSON",
    data:v_data,
    beforeSend:function(){
        $(".mensaje").html("Procesando...");
    },
    success:function(respuesta){
        $(".mensaje").html("");
                
        $.each(respuesta,function(indice,valor){
            $(".mensaje").html(valor.resp);                
        });
    },
    error:function(){
    $(".mensaje").html("Error de proceso");
    },
    });
}   
        