
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="js/jquery-3.6.0.js" type="text/javascript"></script>
    <!--AGREGAMOS EL SCRIPT CON EL QUE VA A TRABAJAR ESTE ARCHIVO PHP--->
    <script src="js/registroMateria.js" type="text/javascript"></script>
</head>
<body>
   <form data-toggle="validator" role="form">
  <div class="form-group">
    <label for="inputName" class="control-label">Sigla: </label>
    <input type="text" id="siglaMateria" class="text-uppercase" class="form-control" id="inputName" placeholder="sigla" required>
  
  <label for="inputName" class="control-label">Nombre Materia: </label>
    <input type="text" id="nomMateria" class="text-lowercase" class="form-control" id="inputName" placeholder="nombre Materia" required>
  </div>
<br>
  <div class="form-group">
    <button type="submit" id="btnRegistrarMat" class="btn btn-primary">Registrar</button>
    <button type="submit" id="btnNuevo" class="btn btn-secondary">Nuevo</button>
  </div>
</form>
</body>
</html>

