<script type="text/javascript" src="js/asignacionDM.js"></script>

<table>
    <tr>
        <th colspan="2">ASIGNACION DOCENTE MATERIA</th>
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
   <tbody> </tbody>
</table>

<table>
<tr>
    <td><input type="text" id="codDocenteA"></td>
    <td><input type="text" id="nomDocenteA"></td>
</tr>
<tr>
    <td>Materias:</td>
    <td><select id="materias"></select></td>
</tr>
<tr>
<td><button id="btnAsignar" class="btn btn-primary">ASIGNAR</button></td>
<td></td>
</tr>
</table>