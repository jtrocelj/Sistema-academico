<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-3.6.0.js" type="text/javascript"></script>
    <script src="js/asignacionEM.js" type="text/javascript"></script>
</head>
<body>
    <table>
        <tr>
            <th colspan="2">ASIGNACION ESTUDIANTE MATERIA</th>
        </tr>
        <tr>
            <th>Nombre: </th>
            <th><input type="text" id="nomEstudiante"></th>
        </tr>
        <tr>
            <th>Apelido Paterno: </th>
            <th><input type="text" id="patEstudiante"></th>
        </tr>
        <tr>
            <th>Apellido Materno: </th>
            <th><input type="text" id="matEstudiante"></th>
        </tr>
        <tr>
            <th colspan="2"><button  id="btnBuscarEst" class="btn btn-secondary">BUSCAR</button></th>
        </tr>
    </table>
    <table id ="datosEstudiantes" border="1">
        <thead>
            <tr>
                <th>Nro</th>
                <th>Estudiante</th>
                <th>Opcion</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
    <table>
        <tr>
            <td><input type="text" id="codEstudianteA"></td>
            <td><input type="text" id="nomEstudianteA"></td>
        </tr>
        <tr>
            <td> Materias:</td>
            <td width="100px"><select width=300px; id="materias"></select></td>
        </tr>
        <tr>
            <td><button id="btnAsignar" class="btn btn-primary">ASIGNAR</button></td>
            <td></td>
        </tr>
    </table>
</body>
</html>
