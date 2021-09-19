<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/jquery-3.6.0.js" type="text/javascript"></script>
    <script src="js/modificarDocente.js" type="text/javascript"></script>
</head>
<body>
<table>
    <tr>
        <th colspan="3">MODIFICAR DOCENTES</th>
    </tr>
    <tr>
        <th>Código:</th>
        <th><input type="text" id="codDocente"></th>
        <th rowspan="4" style="border-style: solid;"><img id="foto"></th>
        <th></th>
    </tr>
    <tr>
        <th>Nombre:</th>
        <th><input type="text" id="nomDocente"></th>
        <th></th>
    </tr>
    <tr>
        <th>Apellido Paterno:</th>
        <th><input type="text" id="patDocente"></th>
        <th></th>
    </tr>
    <tr>
        <th>Apellido Materno:</th>
        <th><input type="text" id="matDocente"></th>
        <th></th>
        <th><input type="file" id="archivo" accept="image/jpeg"></th>
    </tr>
    <tr>
        <th>CI:</th>
        <th><input type="text" id="ciDocente"></th>
        <th>
            <!-- Control select es el combobox de extensiones-->
            <select id="extensiones">
                <!--cada option contiene la propiedad value, que es el valor con el que se trabajará en JQuery-->
                <option value="LP">LP</option>
                <option value="OR">OR</option>
                <option value="PTS">PTS</option>
                <option value="CBBA">CBBA</option>
                <option value="CH">CH</option>
                <option value="TRJ">TRJ</option>
                <option value="PND">PND</option>
                <option value="BEN">BEN</option>
                <option value="SCZ">SCZ</option>
            </select>
        </th>
    </tr>
    <tr>
        <th><button type="button" id="btnModificarDoc" class="btn btn-primary">MODIFICAR</button></th>
        <th><button type="button" id="btnEliminarDoc"class="btn btn-danger">ELIMINAR</button></th>
        <th><button type="button" id="btnNuevoDoc" class="btn btn-secondary">NUEVO</button></th>
    </tr>
</table>

<!-- Este campo almacena la ruta original de la fotografía para su posterior comparación con una nueva foto-->
<input type="texto" id="fotoOriginal1" style="display:none">
<input type="texto" id="fotoOriginal" style="display:none">
</body>
</html>
