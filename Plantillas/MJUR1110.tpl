<!DOCTYPE html>
<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="CSS/styles.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <title>Universidad Católica de Santa María</title>
      <link rel="stylesheet" href="Responsive/bootstrap.min.css">
      <link rel="stylesheet" href="CSS/GeneralStyle.css">
      <title>UCSM JURADOS</title>
   </head>
<body>
    <header>
       <div class="jumbotron text-center">
          <h1>Modulo de Cursos por Jurado</h1>
       </div>
    </header>
    <div class="container text-center">
        <div class="container-fluid">
            <form action="MJUR1110.php" method="post">
                <div class= "form-group">
                   <p>Nombre del Alumno</p>
                </div>
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" id="menu1" type="button" data-toggle="dropdown">Cursos disponibles<span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">CURSO 1</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">CURSO 2</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">CURSO 3</a></li>
                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">CURSO 4</a></li>    
                        </ul>
                </div>
                <button type="submit" class="btn btn-default"  name="Boton1" value="Matricularse" title="Matricularse">Matricularse</button>
            </form>
        </div>
    </div>
    <footer>
        <h5>UCSM</h5>
    </footer>
</body>