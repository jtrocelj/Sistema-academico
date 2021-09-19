// Este documento corresponde a registroEstudiante.php
// Se inicializa el documento llamando a una función
$(document).ready(inicializarEventos);
function inicializarEventos(){
    // btnRegistrarEst es el id del control que se tiene en HTML y le asignamos una función
    $("#btnModificarDoc").click(function(){modificarDocente();});
    $("#btnEliminarDoc").click(function(){eliminarDocente();});
    $("#btnNuevoDoc").click(function(){nuevoDocente();});
    $("#codDocente").blur(function(){cargarDatos();});
    $("#codEstudiante").blur(function(){cargarDatos();});
    $("#archivo").change(function(){imagenPrevia(this);});
}

// Esta función carga datos del estudiante
function cargarDatos(){
    //alert("Cargando datos...");
    var cod=$("#codDocente").val();
    var v_data="Accion="+1;
    v_data=v_data+"&cod="+cod;
    $.ajax({
        cache:false,
        url:"php/modificarDocenteL.php",
        type:"POST",
        dataType:"json",
        data:v_data,
        beforeSend:function(){
            $(".mensaje").html("Procesando...");
        },
        success:function(respuesta){
            $.each(respuesta,function(indice,valor){
                // procesando respuesta que nos da el PHP
                $(".mensaje").html("");
                if(valor.codigo=='No existe'){
                    alert("No existe el registro");
                }
                else{
                    $("#nomDocente").val(valor.nombre);
                    $("#patDocente").val(valor.paterno);
                    $("#matDocente").val(valor.materno);
                    $("#ciDocente").val(valor.ci);
                    $("#extensiones").val(valor.extension);
                     // Cargando fotografía la etiqueta img
                     $("#foto").prop("src",valor.foto);
                     // Modificando ancho de la etiqueta img
                     $("#foto").prop("width","100");
                     // Modificando alto de la etiqueta img
                     $("#foto").prop("height","70");
                     // Almacenando ruta original
                     $("#fotoOriginal").val(valor.foto);
                     // Almacenando ruta original en input tipo FILE
                     $("#archivo").val(valor.foto);
                }
            });
        },
        error:function(){
            $(".mensaje").html("Error en el proceso...");
        },
    });
}
// Función que carga imagen como previsualización
function imagenPrevia(input){
    // Verificar que el archivo exista
    if(input.files && input.files[0]){
        // Leyendo el archivo entrante
        var reader=new FileReader();
        reader.readAsDataURL(input.files[0]); //imag1.jpg
        // Cargando foto a la etiqueta img
        reader.onload=function(e){
            $("#foto").prop("src",e.target.result);
            $("#foto").prop("width","100");
            $("#foto").prop("height","70");
        };
    }
}
function nuevoDocente(){
    limpiarCampos();
    $(".mensaje").html("");
}

function modificarDocente(){
    var cod=$("#codDocente").val();
    var nom=$("#nomDocente").val();
    var pat=$("#patDocente").val();
    var mat=$("#matDocente").val();
    var ci=$("#ciDocente").val();
    var extension=$("#extensiones").val();
    var files=$("#archivo")[0].files[0];
    var textoFile=$("#archivo").val();
    var fotoOriginal=$("#fotoOriginal").val();

    /*var v_data="Accion="+2;
    v_data=v_data+"&cod="+cod;
    v_data=v_data+"&nom="+nom;
    v_data=v_data+"&pat="+pat;
    v_data=v_data+"&mat="+mat;
    v_data=v_data+"&ci="+ci;
    v_data=v_data+"&ext="+extension;*/
    var formData=new FormData();
    formData.append("Accion",2);
    formData.append("cod",cod);
    formData.append("nom",nom);
    formData.append("pat",pat);
    formData.append("mat",mat);
    formData.append("ci",ci);
    formData.append("ext",extension);
    formData.append("file",files);
    formData.append("textofile",textoFile);
    formData.append("fotoOriginal",fotoOriginal);

    $.ajax({
        cache:false,
        url:"php/modificarDocenteL.php",
        type:"POST",
        //dataType:"json",
        //data:v_data,
        data:formData,
        contentType:false,
        processData:false,
        beforeSend:function(){
            $(".mensaje").html("Procesando...");
        },
        success:function(respuesta){
            $(".mensaje").html(respuesta);
            limpiarCampos();
        },
        error:function(){
            $(".mensaje").html("Error en el proceso...");
        },
    });
}

function eliminarDocente(){
    var cod=$("#codDocente").val();
    var foto=$("#fotoOriginal").val();

    var v_data="Accion="+3;
    v_data=v_data+"&cod="+cod;
    v_data=v_data+"&foto="+foto;

    $.ajax({
        cache:false,
        url:"php/modificarDocenteL.php",
        type:"POST",
        dataType:"json",
        data:v_data,
        beforeSend:function(){
            $(".mensaje").html("Procesando...");
        },
        success:function(respuesta){
            $(".mensaje").html("Registro eliminado");
            limpiarCampos();
        },
        error:function(){
            $(".mensaje").html("Error en el proceso...");
        },
    });
}

function limpiarCampos(){
    $("#codDocente").val("");
    $("#nomDocente").val("");
    $("#patDocente").val("");
    $("#matDocente").val("");
    $("#ciDocente").val("");
    $("#extensiones").val("LP");
    $("#foto").prop("src","");
    $("#fotoOriginal").val("");
    $("#archivo").val("");
}

