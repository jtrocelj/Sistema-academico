<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/jquery-3.6.0.js" type="text/javascript"></script>
    <!--AGREGAMOS EL SCRIPT CON EL QUE VA A TRABAJAR ESTE ARCHIVO PHP--->
    <script src="js/modificarMateria.js" type="text/javascript"></script>
</head>
<body>
    <table>
        <tr>
            <th colspan="4">MODIFICAR MATERIA</th>
        </tr>
        <tr>
            <th>Sigla: </th>
            <th><input type="text" id="siglaMateria"></th>
            <th></th>
            <th ></th>
        </tr>
        <tr>
            <th>Nombre Materia: </th>
            <th><input type="text" id="nomMateria"></th>
            <th></th>
            <th ></th>
        </tr>
    
        <tr>
            <th colspan=""><button type="button" id="btnModificarMat" class="btn btn-primary">MODIFICAR</button></th>
            <th><button type="button" id="btnEliminarMat"class="btn btn-danger">ELIMINAR</button></th>
            <th><button type="button" id="btnNuevo"class="btn btn-secondary">NUEVO</button></th>
        </tr>
    </table>
    <input type="text" id="siglaOriginal" style="display: none;">
</body>
</html>
