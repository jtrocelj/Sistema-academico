<!--Se agrega al script con el que va trabajar este archivo PHP-->
<script type="text/javascript" src="js/modificarEstudiante.js"></script>
<!--Se crea la tabla que pide datos al usuario-->
<table>
    <tr>
        <th colspan="3">MODIFICAR ESTUDIANTE</th>
    </tr>
    <tr>
        <th>Código:</th>
        <th><input type="text" id="codEstudiante"></th>
        <th rowspan="4" style="border-style: solid;"><img id="foto"></th>
        <th></th>
    </tr>
    <tr>
        <th>Nombre:</th>
        <th><input type="text" id="nomEstudiante"></th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <th>Apellido Paterno:</th>
        <th><input type="text" id="patEstudiante"></th>
        <th></th>
        <th></th>
    </tr>
    <tr>
        <th>Apellido Materno:</th>
        <th><input type="text" id="matEstudiante"></th>
        <th></th>
        <th><input type="file" id="archivo" accept="image/jpeg"></th>
    </tr>
    <tr>
        <th>CI:</th>
        <th><input type="text" id="ciEstudiante"></th>
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
        <th></th>
    </tr>
    <tr>
        <th><button type="button" class="btn btn-primary" id="btnModificarEst">MODIFICAR</button></th>
        <th><button type="button" class="btn btn-danger" id="btnEliminarEst">ELIMINAR</button></th>
        <th><button type="button" class="btn btn-secondary" id="btnNuevoEst">NUEVO</button></th>
    </tr>
</table>
<!-- Este campo almacena la ruta original de la fotografía para su posterior comparación con una nueva foto-->
<input type="texto" id="fotoOriginal1" style="display:none">
<input type="texto" id="fotoOriginal" style="display:none">