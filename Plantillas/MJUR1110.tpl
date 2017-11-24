<!DOCTYPE html>
<html>
   <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="CSS/styles.css">
        <title>Universidad Católica de Santa María</title>
        <link rel="stylesheet" type="text/css" href="./styles.css" media="screen">
         <script src="JS/java.js"></script>
   </head>
<body>
<<<<<<< HEAD
    <form action="MJUR1110.php" method="post">    

=======
    <!--<header>
        <div id="header"></div>
    </header>--> 
>>>>>>> 6e15c436f2d7da24d71e77043e0ef29c5b1449c4
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
                    <li class="active"><a href="#">Inicio</a></li>
                    <li><a href="#">Matricularse</a></li>
                    <li><a href="#">Convalidacion</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>  Cerrar Sesion</a></li>
                </ul>
              </div>
            </div>
        </nav>
       <div class="jumbotron text-center">
          <h1>Modulo de Cursos por Jurado</h1>
       </div>
    </header>
    <div class="container">
        <div class="container">
            <form action="MJUR1110.php" method="post">
                <div class= "form-group">
                   <p>Nombre del Alumno</p>
                </div>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">Cursos disponibles<span class="caret"></span></button>
                 <div class="col-sm-10">               
                    <select class='form-control' name='paData[CCODCUR]'>
                       {foreach from = $saCursos item = i}  
                          <option value='{$i[0]}'>{$i[5]} </option>
                       {/foreach}  
                    </select>
                </div>   
                </div>
                <button type="submit" class="btn btn-default"  name="Boton1" value="Matricularse" title="Matricularse">Matricularse</button>
            </form>
        </div>
    </div>
<<<<<<< HEAD
    </form>
    <footer>
=======
    <footer class="text-center">
>>>>>>> 6e15c436f2d7da24d71e77043e0ef29c5b1449c4
        <h5>UCSM</h5>
    </footer>
</body>