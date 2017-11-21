<!DOCTYPE html>
<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <link rel="stylesheet" href="CSS/styles.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <title>Universidad Católica de Santa María</title>
   </head>
<body>
<header>
   <div class="jumbotron text-center">
      <h1>Modulo de Cursos por Jurado</h1>
   </div>
</header>
<div class="container text-center">
   <div class="container-fluid">
   <form action="index.php" method="post">
      <div class= "form-group">
         <label for="dni">DNI:</label>
         <input type="text" maxlength="8" class="form-control" name="pcNroDni" title="Número de DNI" id="dni" placeholder="Número de DNI" autofocus/>
      </div>
      <div class= "form-group">
         <label for="Clave">Contraseña:</label>
         <input type="password"  class="form-control" maxlength="20" placeholder="Contraseña" name="pcClave" title="Clave" id="Clave" /><br>
      </div>
      <button type="submit" class="btn btn-default"  name="Boton1" value="IniciarSesion" title="Iniciar sesión">Iniciar Sesión</button>
   </form>
   </div>
</div>
</body>
<footer>
    <h5>UCSM</h5>
</footer>

</html>