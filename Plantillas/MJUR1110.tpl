<!DOCTYPE html>
<html>
   <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <title>Universidad Católica de Santa María</title>
        <link rel="stylesheet" type="text/css" href="Plantillas/styles.css" media="screen">
         <script src="JS/java.js"></script>
   </head>
<body>
    <form action="Mjur1110.php" method="post"> 
    <!--<header>
        <div id="header"></div>
    </header>--> 
    <header>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>                        
                </button>
                <a class="navbar-brand" href="#">UCSMJurados</a>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index1.php">Inicio</a></li>
                    <li><a href="Mjur1110.php">Matricularse</a></li>
                    <li><a href="Mjur1120.php">Convalidacion</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="Mjur1130.php"><span class="glyphicon glyphicon-log-in"></span>  Cerrar Sesion</a></li>
                </ul>
              </div>
            </div>
        </nav>
       <div class="jumbotron text-center">
          <h1>Modulo de Cursos por Jurado</h1>
          <p id="NombreAlumno">Nombre del Alumno</p>
       </div>
    </header>
    <div class="container">
        <form action="Mjur1110.php" method="post">
           
            <div class="row">
                <div class="jumbotron text-center">
                        <h3>Cursos disponibles</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-0 col-md-4"></div>
                <div class="col-sm-10 col-md-4">               
                   <select class='form-control dropxd' name='paData[CIDCARG]'>
                      {foreach from = $saCursos item = i}  
                         <option value='{$i[0]}'>{$i[5]} </option>
                      {/foreach}  
                   </select>
                </div>
                <div class="col-sm-0 col-md-4"></div>
            </div>
            <div class="row text-center">
                <button type="submit" class="btn btn-success dropxd"  name="Boton1" value="Matricularse" title="Matricularse">Matricularse</button>
            </div>
        </form>
    </div>
    <footer>
        <div class="row">
            <div class="col-sm-4">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3827.367072437311!2d-71.54981848456993!3d-16.406173442670852!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91424a8aab7dbfcf%3A0x32794c08084c8aad!2sCatholic+University+of+Santa+Mar%C3%ADa!5e0!3m2!1sen!2spe!4v1511825438162" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
        </div>
        <div class="row text-center">
            <h5>© 2017 Universidad Católica de Santa María. Todos los derechos reservados. UCSM</h5>
        </div>
    </footer>
</body>