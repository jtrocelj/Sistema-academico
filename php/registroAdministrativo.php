<script type="text/javascript" src="js/registroAdministrativo.js"></script>
<table>
    
    <tr>
        <th colspan="4">REGISTRO ADMINISTRATIVO</th>
   </tr>
   <tr>
       <th>Nombre:</th>
       <th><input type="text" id="nomAdministrativo"></th>
       <th rowspan="4" style="border-style:solid;"><img id="foto"></th>
       <th></th>
    </tr>

    <tr>
       <th>Apellido Paterno:</th>
       <th><input type="text" id="patAdministrativo"></th>
       <th></th>
    </tr>

    <tr>
       <th>Apellido Materno:</th>
       <th><input type="text" id="matAdministrativo"></th>
       <th></th>
       
    </tr>
     
    <tr>
       <th>Cargo:</th>
       <th><input type="text" id="cargoAdministrativo"></th>
       <th></th>
       <th><input type="file" id="archivo" accept= "image/jpeg"> </th>
    </tr>


    <tr>
       <th>CI:</th>
       <th><input type="text" id="ciAdministrativo"></th>
       <th>
           <select id="extensiones">
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
    <th colspan="2"><button type="button" id="btnRegistrarAdm">REGISTRAR</button></th>
      <th><button type="button" id="btnNuevo">NUEVO</button></th>
    </tr>
</table>