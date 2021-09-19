<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/jquery-3.6.0.js" type="text/javascript"></script>
    <!--AGREGAMOS EL SCRIPT CON EL QUE VA A TRABAJAR ESTE ARCHIVO PHP--->
    <script src="js/usuario.js" type="text/javascript"></script>
</head>
<body>
    <table>
        <tr>
            <th colspan="4">REGISTRO DE USUARIOS</th>
        </tr>
        <tr>
            <th>Nombre: </th>
            <th><input type="text" id="nomUsuario"></th>
        </tr>
        <tr>
            <th>Apelido Paterno: </th>
            <th><input type="text" id="patUsuario"></th>
            <th></th>
        </tr>
        <tr>
            <th>Apellido Materno: </th>
            <th><input type="text" id="matUsuario"></th>
            <th></th>
        </tr>
        <tr>
            <th>C.I. : </th>
            <th><input type="text" id="ciUsuario"></th>
        </tr>
        <tr>
            <th colspan="1"><button type="button" class="btn btn-primary" id="btnCrearUsuario">CREAR</button></th>
        </tr>
    </table>
</body>
</html>
