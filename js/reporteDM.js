$(document).ready(inicializarEventos);

function inicializarEventos(){
    $("#btnBuscarDoc").click(function(){datosDocente();});
    $("#btnImprimir").click(function(){imprimirReporte();});
}

// función que cargará datos a la tabla de docentes
function datosDocente(){
    // almacenando valores de los controles en variables
    var dat="";
    var nom=$("#nomDocente").val();
    var pat=$("#patDocente").val();
    var mat=$("#matDocente").val();
    var v_data="Accion="+1;
    v_data+="&nom="+nom;
    v_data+="&pat="+pat;
    v_data+="&mat="+mat;
    $.ajax({
        cache:false,
        url:"php/asignacionDML.php",
        type:"POST",
        dataType:"JSON",
        data:v_data,
        beforeSend:function(){
            $(".mensaje").html("Procesando..."); 
        },
        success:function(respuesta){
            $(".mensaje").html("PROCESADO");
            var i=1;
            // Con foreach recorremos la respuesta de la petición AJAX que tiene formaro JSON
            $.each(respuesta,function(indice,valor){
                dat=dat+"<tr>"+
                    "<td>"+i+"</td>"+
                    "<td>"+valor.nombre+"</td>"+
                    "<td><div style='cursor:pointer; color:blue' onClick='recuperar("+valor.ci+")'>Seleccionar</div></td>"
                "</tr>";
                i++;
            });
            $("#datosDocentes>tbody").html(dat);
        },
        error:function(){
            $(".mensaje").html("Error de proceso");
        },
    });
    return false;
}
function recuperar(ci){
    var dat="";
    $("#codDocenteA").val(ci);
    var ci=$("#codDocenteA").val();
    var v_data="Accion="+1;
    v_data+="&ci="+ci;
    $.ajax({
        cache:false,
        url:"php/reporteDML.php",
        type:"POST",
        dataType:"JSON",
        data:v_data,
        beforeSend:function(){
            $(".mensaje").html("Procesando..."); 
        },
        success:function(respuesta){
            $(".mensaje").html("");
            var i=1;
            // Con foreach recorremos la respuesta de la petición AJAX que tiene formaro JSON
            $.each(respuesta,function(indice,valor){
                $("#nomDocenteA").val(valor.nombre);
                dat=dat+"<tr>"+
                    "<td>"+i+"</td>"+
                    "<td>"+valor.nombre+"</td>"+
                    "<td>"+valor.nombreMateria+"</td>"
                "</tr>";
                i++;
            });
            $("#datosDM>tbody").html(dat);
            $(".mensaje").html("");
        },
        error:function(){
            $(".mensaje").html("Error de proceso");
        },
    });
}

function imprimirReporte(){
    var ci=$("#codDocenteA").val();
    var v_data="Accion="+2;
    v_data+="&ci="+ci;
    $.ajax({
        cache:false,
        url:"php/reporteDML.php",
        type:"POST",
        dataType:"JSON",
        data:v_data,
        beforeSend:function(){
            $(".mensaje").html("Procesando...");
        },
        success:function(respuesta){
            $.each(respuesta,function(indice,valor){
                $(".mensaje").html(valor.resp);
                // window.open=es para abrir archivos
                // dos parámetros=URL y tipo de salida (_blank=nueva pestaña)
                window.open(valor.url,'_blank');
            });
            
        },
        error:function(respuesta){
            var r="";
            $.each(respuesta,function(indice,valor){
                r+=valor;
            });
            $(".mensaje").html(r);
            alert("Error en el proceso"); 
        },
    });
    return false;
}