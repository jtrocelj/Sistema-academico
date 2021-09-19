$(document).ready(inicializarEventos);
function inicializarEventos(){
  // btnRegistrarEst ES EL ID DE CONTROL QUE SE TIENE EN HTML Y LE ASIGNAMOS UNA FUNCION
    $("#btnRegistrarMat").click(function(){registrarMateria();});
    $("#archivo").change(function(){imagenPrevia(this);});
    $("#btnNuevo").click(function(){limpiarCampos();});
    $("#siglaMateria").Keypress(function(){return soloLetras(event);});
}

function registrarMateria(){
  if(validarCampos()){
    var nom,pat;
    sigla=$("#siglaMateria").val();
    nom=$("#nomMateria").val();

    var formData = new FormData();
      formData.append("Accion",1);
      formData.append("sigla",sigla);
      formData.append("nom",nom);

      $.ajax({
        cache: false,//NO ALMACENA CACHE
        url: "php/registroMateriaL.php", //archivo que recibe la peticion
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
            limpiarCampos();
          //});
        },
        error: function () {
            $(".mensaje").val("Error en el registro"); // Si existe errores
        },
      });
      function limpiarCampos(){
        $("#siglaMateria").val("");
        $("#nomMateria").val("");
      
      }
    }
}

function limpiarCampos(){
  $("#nomMateria").val("");
  $("#siglaMateria").val("");
}
function validarCampos(){
  if($("#siglaMateria").val() == ""){
    $(".mensaje").html("SIGLA ES REQUERIDO");
    $("#siglaMateria").focus();
    return false;
  }

  if($("#nomMateria").val() == ""){
    $(".mensaje").html("NOMBRE MATERIA ES REQUERIDO");
    $("#nomMateria").focus();
    return false;
  }

  return true;
}


function soloLetras(evt){
  if(window.event){
    Keynum=evt.KeyCode;
  }else{
    Keynum=evt.wich;
  }

  if(Keynum>64 && Keynum<91){
    return true;
  }else{
    return false;
  }
}