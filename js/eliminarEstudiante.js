$(document).ready(inicializarEventos);
function inicializarEventos(){
    $("#btnEliminarEst").click(function(){eliminarEstudiante();});
}

function eliminarEstudiante(){
    alert("Eliminando...");
}