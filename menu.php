<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema</title>
    <link rel="stylesheet" href="css/estilos.css">
    <script src="js/jquery-3.6.0.js" type="text/javascript"></script>
    <script src="js/index.js" type="text/javascript"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>
<body>
    <br>
    <br>
    <?php
     session_start();
     if(isset($_GET['log']) && isset($_SESSION['usr'])){
    ?>
        <h1 align="center">SISTEMA ACADÉMICO</h1>
        <div class="container">
            <nav class="menu">
                <!--Para el menu se utiliza las listas de HTML con etiquetas ul y li-->
                <ul class="main-menu">
                    <li class=""><i class="fa fa-home"></i>Inicio</li>
                    <li class="with-submenu">
                        <i class="fa fa-briefcase"></i>Estudiante<i class="fa fa-caret-down"></i>
                        <!--Para agregar un submenu se utilizan las listas-->
                        <ul class="submenu">
                            <li ><a id="registarEst" >Registrar</a></li>
                            <li><a id="modificarEst">Modificar</a></li>
                            <li><a id="reporteEst">Reporte</a></li>
                        </ul>
                    </li>

                    <!--Cada li es un submenu y debe tener un id para poder identificarlo en un click desde JQuery-->
                    <li class="with-submenu">
                        <i class="fa fa-briefcase"></i>Docente<i class="fa fa-caret-down"></i>
                        <ul class="submenu">
                            <li ><a id="registarDoc" >Registrar</a></li>
                            <li><a id="modificarDoc">Modificar</a></li>
                            <li><a id="reporteDoc">Reporte</a></li>
                        </ul>
                    </li>

                    <li class="with-submenu">
                        <i class="fa fa-briefcase"></i>Materia<i class="fa fa-caret-down"></i>
                        <ul class="submenu">
                            <li ><a id="registrarMat" >Registrar</a></li>
                            <li><a id="modificarMat">Modificar</a></li>
                            <li><a id="eliminarMat">Eliminar</a></li>
                        </ul>
                    </li>

                    <li class="with-submenu">
                        <i class="fa fa-briefcase"></i>Asignación<i class="fa fa-caret-down"></i>
                        <ul class="submenu">
                            <li ><a id="asignacionDM" >Docente-Materia</a></li>
                            <li><a id="asignacionEM">Est-Materia</a></li>
                        </ul>
                    </li>

                    <li class="with-submenu">
                        <i class="fa fa-briefcase"></i>Administrativo<i class="fa fa-caret-down"></i>
                        <ul class="submenu">
                            <li ><a id="registarAdm" >Registrar</a></li>
                        </ul>
                    </li>
                
                    <li class="with-submenu">
                        <i class="fa fa-briefcase"></i>Login<i class="fa fa-caret-down"></i>
                        <ul class="submenu">
                            <li ><a id="usuarios">Usuarios</a></li>
                            <li ><a id="salir" >Salir</a></li>
                        </ul>
                    </li>  
                </ul>
            </nav>
        </div>
    <?php
    }
    ?>
    
   <!--Dentro de main se coloca los diferentes contenidos del menu-->
<main>
        <!--Dentro del div contenido colocaremos las diferentes vistas de cada menu-->
        <div class="contenido"></div>
        <div class="mensaje"></div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>