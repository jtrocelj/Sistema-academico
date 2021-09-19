<script type="text/javascript" src="js/reporteEM.js"></script>
<table>
    <tr>
        <th colspan="2">CONSULTA ESTUDIANTE MATERIA</th>
    </tr>
    <tr>
        <th>Nombre:</th>
        <th><input type="text" id="nomEstudiante"></th>
    </tr>
    <tr>
        <th>Paterno:</th>
        <th><input type="text" id="patEstudiante"></th>
    </tr>
    <tr>
        <th>Materno:</th>
        <th><input type="text" id="matEstudiante"></th>
    </tr>
    <tr>
        <th colspan="2"><button id="btnBuscarEst" class="btn btn-secondary" >BUSCAR</button></th>
    </tr>
</table>
<table id="datosEstudiantes" border="1">
    <thead>
        <tr>
            <td>Nro</td>
            <td>Estudiante</td>
            <td>Opcion</td>
        </tr>
    </thead>
    <tbody></tbody>
</table>
<table>
    <tr>
        <td><input type="text" id="codEstudianteA"></td>
        <td><input type="text" id="nomEstudianteA"></td>
    </tr>
</table>
<table id="datosEM" border="1">
    <thead>
        <tr>
            <th>Nro</th>
            <th>Estudiante</th>
            <th>Materia</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>
<table>
    <tr>
        <td><button class="btn btn-primary" id="btnImprimir">IMPRIMIR</button></td>
    </tr>
</table>

