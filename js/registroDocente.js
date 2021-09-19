$(document).ready(inicializarEventos);
function inicializarEventos(){
    $("#btnRegistrarDoc").click(function(){registrarDocente();});
    $("#archivo").change(function(){imagenPrevia(this);});
    $("#btnNuevo").click(function(){limpiarCampos();});
    $("#ciDocente").Keypress(function(){return soloNumeros(event);});
    
}
function registrarDocente() {
  if(validarCampos()){
    var nom = $("#nomDocente").val();
    var pat = $("#patDocente").val();
    var mat = $("#matDocente").val();
    var ci = $("#ciDocente").val();
    var ext = $("#extensiones").val();
    var files = $("#archivo")[0].files[0];


    /*var v_data = "Accion=" + 1;
    v_data = v_data+"&nom=" + nom;
    v_data = v_data+"&pat=" + pat;
    v_data = v_data+"&mat=" + mat;
    v_data = v_data+ "&ci=" + ci;
    v_data = v_data+"&ext=" + ext;*/

      // FORMDATA NOS PERMITE TRABAJAR CON ARCHIVOS/IMAGENES
    var formData = new FormData();
    formData.append("Accion",1);
    formData.append("nom",nom);
    formData.append("pat",pat);
    formData.append("mat",mat);
    formData.append("ci",ci);
    formData.append("ext",ext);
    formData.append("file",files);


    $.ajax({
      cache: false,
      url: "php/registroDocenteL.php", //archivo que recibe la peticion
      type: "POST", //método de envio
      //dataType: "json", //tipo de dato será formato json
      data:formData, //Enviando las variables hacia el php
      contentType: false,
      processData: false,

      beforeSend: function () {
        $(".mensaje").val("Procesando..."); // Mientras se cargan los datos
      },
      success: function (respuesta) {
        //una vez que el archivo recibe el request lo procesa y lo devuelve
        //$.each(respuesta, function (indice, valor) {
          $(".mensaje").html(respuesta);
      // });
      },
      error: function () {
        alert("Error en el registro"); // Si existe errores
      },
    });
  }
}

function imagenPrevia(input){
  if(input.files && input.files[0]){
    var reader = new FileReader();
    reader.readAsDataURL(input.files[0]);//readAsDataURL permite extraer la ruta de la imagen o archivo

    reader.onload=function(e){
      $("#foto").prop("src",e.target.result);
      $("#foto").prop("width","100");
      $("#foto").prop("height","70");

    };
  }
}
function limpiarCampos(){
  $("#codDocente").val("");
  $("#nomDocente").val("");
  $("#patDocente").val("");
  $("#matDocente").val("");
  $("#ciDocente").val("");
  $("#extensiones").val("LP");
  $("#foto").prop("src","");
}

function validarCampos(){
  if($("#nomDocente").val() == ""){
    $(".mensaje").html("NOMBRE ES REQUERIDO");
    $("#nomDocente").focus();
    return false;
  }

  if($("#patDocente").val() == ""){
    $(".mensaje").html("APELLIDO PATERNO ES REQUERIDO");
    $("#patDocente").focus();
    return false;
  }

  if($("#matDocente").val() == ""){
    $(".mensaje").html("APELLIDO MATERNO ES REQUERIDO");
    $("#matDocente").focus();
    return false;
  }

  if($("#ciDocente").val() == ""){
    $(".mensaje").html("CI ES REQUERIDO");
    $("#ciDocente").focus();
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
