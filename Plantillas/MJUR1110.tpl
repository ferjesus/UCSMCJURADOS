<!DOCTYPE html>
<html>
   <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="CSS/styles.css">
        <title>Universidad Católica de Santa María</title>
   </head>
<body>
    <form action="MJUR1110.php" method="post">    

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
    </form>
    <footer>
        <h5>UCSM</h5>
    </footer>
</body>