$(document).ready(inicializarEventos);
function inicializarEventos(){
    $("#btnRegistrarAdm").click(function(){registrarAdministrativo();}); 
    $("#archivo").change(function(){imagenPrevia(this);});
    $("#btnNuevo").click(function(){limpiarCampos();}); 
    $("#ciAdministrativo").Keypress(function(){return soloNumeros(event);});
}
function registrarAdministrativo(){
    if(validarCampos()){
    
            var nom,pat,mat,cargo,ci,ext;
            nom=$("#nomAdministrativo").val();
            pat=$("#patAdministrativo").val();
            mat=$("#matAdministrativo").val();
            cargo=$("#cargoAdministrativo").val();
            ci=$("#ciAdministrativo").val();

            ext=$("#extensiones").val();
            var files=$("#archivo")[0].files[0];

            /*var v_data="Accion="+1;
            v_data=v_data+"&nom="+nom;
            v_data=v_data+"&pat="+pat;
            v_data=v_data+"&mat="+mat;
            v_data=v_data+"&cargo="+cargo;
            v_data=v_data+"&ci="+ci;
            v_data=v_data+"&ext="+ext;*/

            var formData=new FormData();
            formData.append("Accion",1);
            formData.append("nom",nom);
            formData.append("pat",pat);
            formData.append("mat",mat);
            formData.append("cargo",cargo);
            formData.append("ci",ci);
            formData.append("ext",ext);
            formData.append("file",files);

        $.ajax({
            cache:false,
            url:"php/registroAdministrativoL.php",
            type:"POST",
            //dataType:"json",
            data: formData,
            contentType: false,
            processData: false,
            //data: v_data,

            beforeSend:function(){
                $(".mensaje").val("Procesando..");   
            },
            success: function(respuesta){
                $(".mensaje").html(respuesta); 
                /*$.each(respuesta, function(indice,valor){
            $(".mensaje").html("El nombre completo es "+valor.nombre+" "+valor.paterno+" "+valor.materno+",el CI es: "+valor.ci+" y su codigo es "+valor.codigo);
            $(".mensaje").html(valor.res);
                });*/  
            },
                error: function(){
                    $(".mensaje").html("Error en el registro");  
                },
            });
        }        
}

function imagenPrevia(input){
    if(input.files && input.files[0]){
        var reader=new FileReader();
        reader.readAsDataURL(input.files[0]);
        reader.onload=function(e){
           $("#foto").prop("src",e.target.result);
           $("#foto").prop("width","100");
           $("#foto").prop("height","80");
    };
   }
}

function limpiarCampos(){
   $("#nomAdministrativo").val("");
   $("#patAdministrativo").val("");
   $("#matAdministrativo").val("");
   $("#cargoAdministrativo").val("");
   $("#ciAdministrativo").val("");
   $("#extensiones").val("LP");
   $("#archivo").val("");
   $("#foto").prop("src","");
}

function validarCampos(){
    if($("#nomAdministrativo").val() == ""){
      $(".mensaje").html("NOMBRE ES REQUERIDO");
      $("#nomAdministrativo").focus();
      return false;
    }
  
    if($("#patAdministrativo").val() == ""){
      $(".mensaje").html("APELLIDO PATERNO ES REQUERIDO");
      $("#patAdministrativo").focus();
      return false;
    }
  
    if($("#matAdministrativo").val() == ""){
      $(".mensaje").html("APELLIDO MATERNO ES REQUERIDO");
      $("#matAdministrativo").focus();
      return false;
    }
  
  
    if($("#cargoAdministrativo").val() == ""){
      $(".mensaje").html("CARGO ES REQUERIDO");
      $("#cargoAdministrativo").focus();
      return false;
    }
    if($("#ciAdministrativo").val() == ""){
        $(".mensaje").html("CI ES REQUERIDO");
        $("#ciAdministrativo").focus();
        return false;
      }
  
    var foto = $("#archivo").val();
    if (foto == ""){
      $(".mensaje").html("FOTO ES REQUERIDO");
      return false;
    }
    return true;
  }
  
  
  function soloNumeros(evt){
    if(window.event){
      Keynum=evt.KeyCode;
    }else{
      Keynum=evt.wich;
    }
  
    if(Keynum>47 && Keynum<58){
      return true;
    }else{
      return false;
    }
  }