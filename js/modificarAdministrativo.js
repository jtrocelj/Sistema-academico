// Este documento corresponde a registroAdministrativo.php
// Se inicializa el documento llamando a una función
$(document).ready(inicializarEventos);
function inicializarEventos(){
    // btnRegistrarAdm es el id del control que se tiene en HTML y le asignamos una función
    $("#btnModificarAdm").click(function(){modificarAdministrativo();});
    $("#btnEliminarAdm").click(function(){eliminarAdministrativo();});
    $("#btnNuevoAdm").click(function(){nuevoAdministrativo();});
    $("#codAdministrativo").blur(function(){cargarDatos();});
    $("#archivo").change(function(){imagenPrevia(this);});
}

// Esta función carga datos del estudiante
function cargarDatos(){
    //alert("Cargando datos...");
    var cod=$("#codAdministrativo").val();
    var v_data="Accion="+1;
    v_data=v_data+"&cod="+cod;
    $.ajax({
        cache:false,
        url:"php/modificarAdministrativoL.php",
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
                    $("#nomAdministrativo").val(valor.nombre);
                    $("#patAdministrativo").val(valor.paterno);
                    $("#matAdministrativo").val(valor.materno);
                    $("#cargoAdministrativo").val(valor.cargo);
                    $("#ciAdministrativo").val(valor.ci);
                    $("#extensiones").val(valor.extension);

                    $("#foto").prop("src",valor.foto);
                    $("#foto").prop("width","100");
                    $("#foto").prop("height","70");
                    $("#fotoOriginal").val(valor.foto);
                    $("#archivo").val(valor.foto);
                }
            });
        },
        error:function(){
            $(".mensaje").html("Error en el proceso...");
        },
    });
}

function imagenPrevia(input){
    if(input.files && input.files[0]){
        var reader=new FileReader();
        reader.readAsDataURL(input.files[0]);
        reader.onload=function(e){
           $("#foto").prop("src",e.target.result);
           $("#foto").prop("width","100");
           $("#foto").prop("height","70");
    };
   }
}

function nuevoAdministrativo(){
    limpiarCampos();
    $(".mensaje").html("");
}

function modificarAdministrativo(){
    var cod=$("#codAdministrativo").val();
    var nom=$("#nomAdministrativo").val();
    var pat=$("#patAdministrativo").val();
    var mat=$("#matAdministrativo").val();
    var cargo=$("#cargoAdministrativo").val();
    var ci=$("#ciAdministrativo").val();
    var extension=$("#extensiones").val();

    var files=$("#archivo")[0].files[0];
    var textoFile=$("#archivo").val();
    var fotoOriginal=$("#fotoOriginal").val();


    /*var v_data="Accion="+2;
    v_data=v_data+"&cod="+cod;
    v_data=v_data+"&nom="+nom;
    v_data=v_data+"&pat="+pat;
    v_data=v_data+"&mat="+mat;
    v_data=v_data+"&cargo="+cargo;
    v_data=v_data+"&ci="+ci;
    v_data=v_data+"&ext="+extension;*/

    var formData=new FormData();
    formData.append("Accion",2);
    formData.append("cod",cod);
    formData.append("nom",nom);
    formData.append("pat",pat);
    formData.append("mat",mat);
    formData.append("cargo",cargo);
    formData.append("ci",ci);
    formData.append("ext",extension);
    formData.append("file",files);
    formData.append("textofile",textoFile);
    formData.append("fotoOriginal",fotoOriginal);

    $.ajax({
        cache:false,
        url:"php/modificarAdministrativoL.php",
        type:"POST",
       // dataType:"json",
       // data:v_data,
       data:formData,
         contentType: false,
        processData: false,

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

function eliminarAdministrativo(){
    var cod=$("#codAdministrativo").val();
    var foto=$("#fotoOriginal").val();

    var v_data="Accion="+3;
    v_data=v_data+"&cod="+cod;
    v_data=v_data+"&foto="+foto;

    $.ajax({
        cache:false,
        url:"php/modificarAdministrativoL.php",
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
    $("#codAdministrativo").val("");
    $("#nomAdministrativo").val("");
    $("#patAdministrativo").val("");
    $("#matAdministrativo").val("");
    $("#cargoAdministrativo").val("");
    $("#ciAdministrativo").val("");
    $("#extensiones").val("LP");
    $("#foto").prop("src","");
    $("#fotoOriginal").val("");
    $("#archivo").val("");
}
