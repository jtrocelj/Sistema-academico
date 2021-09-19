// ESTE DOCUMENTO JQUEY CORRESPONDE A registroEstudiante.php
//SE INICIALIZA EL DOCUMENTO LLAMANDO A UNA FUNCION 
$(document).ready(inicializarEventos);
function inicializarEventos(){
  // btnRegistrarEst ES EL ID DE CONTROL QUE SE TIENE EN HTML Y LE ASIGNAMOS UNA FUNCION
    $("#btnRegistrarEst").click(function(){registrarEstudiante();});
    $("#archivo").change(function(){imagenPrevia(this);});
    $("#btnNuevo").click(function(){limpiarCampos();});
    $("#ciEstudiante").Keypress(function(){return soloNumeros(event);});
}
function registrarEstudiante() {
  if(validarCampos()){
    // ASIGNAMOS VALORES DE CONTROLES DE PHP (CON LAS ESTRUCTURAS HTML) A VARIABLES DE JS
    var nom = $("#nomEstudiante").val();
    var pat = $("#patEstudiante").val();
    var mat = $("#matEstudiante").val();
    var ci = $("#ciEstudiante").val();
    // EXTENSIONES ES EL ID DEL CONTROL SELECT, AL RECIBIR SU VALOR,RECIBIRA EL VALOR DEL OPTION SELECCIONADO
    var ext = $("#extensiones").val();
    var files = $("#archivo")[0].files[0];

    //ASIGNAMOS $CADENA $DE VALORES PARA EL PHP QUE CONTIENE LA LOGICA,CADA VARIABLE VA SEPARADA CON EL SIMBOLO &
    /*
    var v_data = "Accion=" + 1;
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





  //PETICION AJAX, LOS PARAMETROS ENVIADOS A LA PETICION VAN SEPARADOS POR COMAS
    $.ajax({
      cache: false,//NO ALMACENA CACHE
      url: "php/registroEstudianteL.php", //archivo que recibe la peticion
      type: "POST", //método de envio
      //dataType: "json", //tipo de dato será formato json
      data:formData, //Enviando las variables hacia el php
      contentType: false,
      processData: false,

      beforeSend: function () {
        //SE ACTIVA AL ESTAR PROCESANDO LA PETICION
        $(".mensaje").val("Procesando..."); // Mientras se cargan los datos
      },
      success: function (respuesta) {
        //una vez que el archivo recibe el request lo procesa y lo devuelve
      // $.each(respuesta, function (indice, valor) {
          $(".mensaje").html(respuesta);
        //});
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
  $("#codEstudiante").val("");
  $("#nomEstudiante").val("");
  $("#patEstudiante").val("");
  $("#matEstudiante").val("");
  $("#ciEstudiante").val("");
  $("#extensiones").val("LP");
  $("#foto").prop("src","");
}
function validarCampos(){
  if($("#nomEstudiante").val() == ""){
    $(".mensaje").html("NOMBRE ES REQUERIDO");
    $("#nomEstudiante").focus();
    return false;
  }

  if($("#patEstudiante").val() == ""){
    $(".mensaje").html("APELLIDO PATERNO ES REQUERIDO");
    $("#patEstudiante").focus();
    return false;
  }

  if($("#matEstudiante").val() == ""){
    $(".mensaje").html("APELLIDO MATERNO ES REQUERIDO");
    $("#matEstudiante").focus();
    return false;
  }

  if($("#ciEstudiante").val() == ""){
    $(".mensaje").html("CI ES REQUERIDO");
    $("#ciEstudiante").focus();
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