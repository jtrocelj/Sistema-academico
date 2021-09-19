<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/jquery-3.6.0.js" type="text/javascript"></script>
    <!--AGREGAMOS EL SCRIPT CON EL QUE VA A TRABAJAR ESTE ARCHIVO PHP--->
    <script src="js/registroEstudiante.js" type="text/javascript"></script>
</head>
<body>
    <table>
        <tr>
            <th colspan="4">REGISTRO DE ESTUDIANTES</th>
        </tr>
        <tr>
            <th>Nombre: </th>
            <th><input type="text" id="nomEstudiante"></th>
            <th></th>
            <th rowspan="3" style="border-style:solid;"><img id="foto"></th>
        </tr>
        <tr>
            <th>Apelido Paterno: </th>
            <th><input type="text" id="patEstudiante"></th>
            <th></th>
        </tr>
        <tr>
            <th>Apellido Materno: </th>
            <th><input type="text" id="matEstudiante"></th>
            <th></th>
            <th><input type="file" id="archivo" accept="image/jpeg"></th>
        </tr>
        <tr>
            <th>C.I. : </th>
            <th><input type="text" id="ciEstudiante"></th>
            <th>
                <!--CONTROL SELECT QUE ES EL COMBOBOX DE LAS EXTENSIONES--->
                <select  id="extensiones">
                    <!--- CADA OPTION CONTIENE LA PROPIEDAD VALUE QUE ES EL VALOR QUE SE TRABAJA EN EL ARCHIVO JQUERY--->
                    <option value="LP">LP</option>
                    <option value="OR">OR</option>
                    <option value="PTS">PTS</option>
                    <option value="CBBA">CBBA</option>
                    <option value="CH">CH</option>
                    <option value="TRJ">TRJ</option>
                    <option value="PND">PND</option>
                    <option value="BN">BN</option>
                    <option value="SCZ">SCZ</option>

                </select>
            </th>
        </tr>
        <tr>
            <th colspan="1"><button type="button" class="btn btn-primary" id="btnRegistrarEst">REGISTRAR</button></th>
            <th><button type="button" class="btn btn-secondary" id="btnNuevo">Nuevo</button></th>
        </tr>
    </table>
</body>
</html>
