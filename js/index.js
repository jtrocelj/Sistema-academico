// SE INICALIZA EL DOCUMENTO LLAMANDO A UNA FUNCION
$(document).ready(inicializarEventos);

// ESTA FUNCION ASIGNA EVENTOS A CONTROLOS DEL ARCHIVO HTML
function inicializarEventos(){
  $("#registarEst").click(function(){abrirFrmRegEst();});
  $("#modificarEst").click(function(){abrirFrmModEst();});
  $("#eliminarEst").click(function(){abrirFrmEliEst();});
  $("#registarDoc").click(function(){abrirFrmRegDoc();}); // AL ID DE CONTROL DEL ARCHIVO HTML
  $("#modificarDoc").click(function(){abrirFrmModDoc();}); //SE LE ASIGNA UNA FUNCION
  $("#eliminarDoc").click(function(){abrirFrmEliDoc();});
  $("#registarAdm").click(function(){abrirFrmRegAdm();});
  $("#registrarMat").click(function(){abrirFrmRegMat();});
  $("#modificarMat").click(function(){abrirFrmModMat();});
  $("#asignacionDM").click(function(){abrirFrmAsignacionDM();});
  $("#reporteDoc").click(function(){reporteDocente();});
  $("#asignacionEM").click(function(){abrirFrmAsignacionEM();});
  $("#reporteEst").click(function(){reporteEstudiante();});
  $("#usuarios").click(function(){usuarios();});
  $("#salir").click(function(){salirSesion()});
}

function abrirFrmRegEst(){
  // EL CONTROL QUE ES DE CLASE MENSAJE DE EL HTML SE LIMPIA POR SI EXISTE ALGUN VALOR
  $(".mensaje").html("");
  // EL CONTROL DE CLASE CONTENIDO LO CARGAMOS LLAMANDO A UN ARCHIVO PHP QUE TIENE UN DISEÑO PARA EL USUARIO
  $(".contenido").load("php/registroEstudiante.php");
  
}
function abrirFrmModEst(){
  $(".mensaje").html("");
  $(".contenido").load("php/modificarEstudiante.php");
  
}
function abrirFrmEliEst(){
  $(".mensaje").html("");
  $(".contenido").load("php/eliminarEstudiante.php");
  
}
function abrirFrmRegDoc(){
  $(".mensaje").html("");
  $(".contenido").load("php/registroDocente.php");
  
}
function abrirFrmModDoc(){
  $(".mensaje").html("");
  $(".contenido").load("php/modificarDocente.php");
  
}
function abrirFrmEliDoc(){
  $(".mensaje").html("");
  $(".contenido").load("php/eliminarDocente.php");
  
}
function abrirFrmRegAdm(){
  $(".mensaje").html("");
  $(".contenido").load("php/registroAdministrativo.php");
  
}
function abrirFrmRegMat(){
  // EL CONTROL QUE ES DE CLASE MENSAJE DE EL HTML SE LIMPIA POR SI EXISTE ALGUN VALOR
  $(".mensaje").html("");
  // EL CONTROL DE CLASE CONTENIDO LO CARGAMOS LLAMANDO A UN ARCHIVO PHP QUE TIENE UN DISEÑO PARA EL USUARIO
  $(".contenido").load("php/registroMateria.php");
  
}

function abrirFrmModMat(){
  // EL CONTROL QUE ES DE CLASE MENSAJE DE EL HTML SE LIMPIA POR SI EXISTE ALGUN VALOR
  $(".mensaje").html("");
  // EL CONTROL DE CLASE CONTENIDO LO CARGAMOS LLAMANDO A UN ARCHIVO PHP QUE TIENE UN DISEÑO PARA EL USUARIO
  $(".contenido").load("php/modificarMateria.php");
  
}
function abrirFrmAsignacionDM(){
  // EL CONTROL QUE ES DE CLASE MENSAJE DE EL HTML SE LIMPIA POR SI EXISTE ALGUN VALOR
  $(".mensaje").html("");
  // EL CONTROL DE CLASE CONTENIDO LO CARGAMOS LLAMANDO A UN ARCHIVO PHP QUE TIENE UN DISEÑO PARA EL USUARIO
  $(".contenido").load("php/asignacionDM.php");
  
}
function reporteDocente(){
  // EL CONTROL QUE ES DE CLASE MENSAJE DE EL HTML SE LIMPIA POR SI EXISTE ALGUN VALOR
  $(".mensaje").html("");
  // EL CONTROL DE CLASE CONTENIDO LO CARGAMOS LLAMANDO A UN ARCHIVO PHP QUE TIENE UN DISEÑO PARA EL USUARIO
  $(".contenido").load("php/reporteDM.php");
  
}
function abrirFrmAsignacionEM(){
  // EL CONTROL QUE ES DE CLASE MENSAJE DE EL HTML SE LIMPIA POR SI EXISTE ALGUN VALOR
  $(".mensaje").html("");
  // EL CONTROL DE CLASE CONTENIDO LO CARGAMOS LLAMANDO A UN ARCHIVO PHP QUE TIENE UN DISEÑO PARA EL USUARIO
  $(".contenido").load("php/asignacionEM.php");
  
}
function reporteEstudiante(){
  // EL CONTROL QUE ES DE CLASE MENSAJE DE EL HTML SE LIMPIA POR SI EXISTE ALGUN VALOR
  $(".mensaje").html("");
  // EL CONTROL DE CLASE CONTENIDO LO CARGAMOS LLAMANDO A UN ARCHIVO PHP QUE TIENE UN DISEÑO PARA EL USUARIO
  $(".contenido").load("php/reporteEM.php");
  
}

function usuarios(){
  // EL CONTROL QUE ES DE CLASE MENSAJE DE EL HTML SE LIMPIA POR SI EXISTE ALGUN VALOR
  $(".mensaje").html("");
  // EL CONTROL DE CLASE CONTENIDO LO CARGAMOS LLAMANDO A UN ARCHIVO PHP QUE TIENE UN DISEÑO PARA EL USUARIO
  $(".contenido").load("php/usuario.php");
  
}

function salirSesion(){
  $(".mensaje").html("");
  var v_data="Accion="+1;
  $.ajax({
      cache:false,
      url:"php/indexL.php",
      type:"POST",
      dataType:"JSON",
      data:v_data,
      beforeSend:function(){
          $(".mensaje").html("Saliendo...");
      },
      success:function(respuesta){
          $.each(respuesta,function(indice,valor){
              window.location="index.php?log=false";
          });
      },
      error: function (respuesta) {
          var r = "";
          $.each(respuesta, function (indice, valor) {
              r += valor + "--";
          });
          $(".mensaje").html(r);
      },
  });
}