$(document).ready(inicializarEventos);
function inicializarEventos(){
    $("#btnEliminarDoc").click(function(){eliminarDocente();});
}

function eliminarDocente(){
    alert("Eliminando...");
}