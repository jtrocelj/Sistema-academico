<script type="text/javascript" src="js/reporteDM.js"></script>
<table>
    <tr>
        <th colspan="2">CONSULTA DOCENTE MATERIA</th>
    </tr>
    <tr>
        <th>Nombre:</th>
        <th><input type="text" id="nomDocente"></th>
    </tr>
    <tr>
        <th>Paterno:</th>
        <th><input type="text" id="patDocente"></th>
    </tr>
    <tr>
        <th>Materno:</th>
        <th><input type="text" id="matDocente"></th>
    </tr>
    <tr>
        <th colspan="2"><button id="btnBuscarDoc" class="btn btn-secondary" >BUSCAR</button></th>
    </tr>
</table>
<table id="datosDocentes" border="1">
    <thead>
        <tr>
            <td>Nro</td>
            <td>Docente</td>
            <td>Opcion</td>
        </tr>
    </thead>
    <tbody></tbody>
</table>
<table>
    <tr>
        <td><input type="text" id="codDocenteA"></td>
        <td><input type="text" id="nomDocenteA"></td>
    </tr>
</table>
<table id="datosDM" border="1">
    <thead>
        <tr>
            <th>Nro</th>
            <th>Docente</th>
            <th>Materia</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>
<table>
    <tr>
        <td><button id="btnImprimir" class="btn btn-primary">IMPRIMIR</button></td>
    </tr>
</table>