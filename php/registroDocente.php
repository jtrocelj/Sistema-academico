<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/jquery-3.6.0.js" type="text/javascript"></script>
    <script src="js/registroDocente.js" type="text/javascript"></script>
</head>
<body>
    <table>
        <tr>
            <th colspan="4">REGISTRO DE DOCENTES</th>
        </tr>
        <tr>
            <th>Nombre: </th>
            <th><input type="text" id="nomDocente"></th>
            <th rowspan="3" style="border-style:solid;"><img id="foto"></th>
            <th></th>
        </tr>
        <tr>
            <th>Apelido Paterno: </th>
            <th><input type="text" id="patDocente"></th>
            <th></th>
        </tr>
        <tr>
            <th>Apellido Materno: </th>
            <th><input type="text" id="matDocente"></th>
            <th></th>
            <th><input type="file" id="archivo" accept="image/jpeg"></th>
        </tr>
        <tr>
            <th>C.I. : </th>
            <th><input type="text" id="ciDocente"></th>
            <th>
                <select  id="extensiones">
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
            <th colspan=""><button type="button" class="btn btn-primary" id="btnRegistrarDoc">REGISTRAR</button></th>
            <th><button type="button" class="btn btn-secondary" id="btnNuevo">Nuevo</button></th>
        </tr>
    </table>
</body>
</html>
