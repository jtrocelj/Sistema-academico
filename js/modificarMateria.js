$(document).ready(inicializarEventos);
function inicializarEventos(){
    // btnRegistrarEst es el id del control que se tiene en HTML y le asignamos una función
    $("#btnModificarMat").click(function(){modificarMateria();});
    $("#btnEliminarMat").click(function(){eliminarMateria();});
    $("#btnNuevo").click(function(){nuevoMateria();});
    $("#siglaMateria").blur(function(){cargarDatos();});
   
}

function cargarDatos(){
    //alert("Cargando datos...");
    var sigla=$("#siglaMateria").val();
    var v_data="Accion="+1;
    v_data=v_data+"&sigla="+sigla;
    $.ajax({
        cache:false,
        url:"php/modificarMateriaL.php",
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
                if(valor.sigla=='No existe'){
                    alert("No existe el registro");
                }
                else{
                    $("#siglaMateria").val(valor.sigla);
                    $("#nomMateria").val(valor.nombre);
                    $("#siglaOriginal").val(valor.sigla);
                }
            });
        },
        error:function(){
            $(".mensaje").html("Error en el proceso...");
        },
    });
}
    function nuevoMateria(){
        limpiarCampos();
        $(".mensaje").html("");
    }

    function modificarMateria(){
        var sigla=$("#siglaMateria").val();
        var nom=$("#nomMateria").val();
        var siglaOriginal=$("#siglaOriginal").val();
        
        /* var v_data="Accion="+2;
        v_data=v_data+"&cod="+cod;
        v_data=v_data+"&nom="+nom;
        v_data=v_data+"&pat="+pat;
        v_data=v_data+"&mat="+mat;
        v_data=v_data+"&ci="+ci;
        v_data=v_data+"&ext="+extension; */
        var formData=new FormData();
        formData.append("Accion",2);
        formData.append("sigla",sigla);
        formData.append("nom",nom);
        formData.append("siglaOriginal",siglaOriginal);
        $.ajax({
            cache:false,
            url:"php/modificarMateriaL.php",
            type:"POST",
            //dataType:"json",
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

    function eliminarMateria(){
        var sigla=$("#siglaMateria").val();
        
    
        var v_data="Accion="+3;
        v_data=v_data+"&sigla="+sigla;
    
        $.ajax({
            cache:false,
            url:"php/modificarMateriaL.php",
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
        $("#siglaMateria").val("");
        $("#nomMateria").val("");
        $("#siglaOriginal").val("");

    }
