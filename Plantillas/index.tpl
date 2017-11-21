<!DOCTYPE html>
<html>
   <head>
      <meta HTTP-EQUIV="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="Responsive/bootstrap.min.css">
      <link rel="stylesheet" href="CSS/GeneralStyle.css">
      <title>UCSM JURADOS</title>
   </head>
<body>
<div class="divHeader">
   <h1>Universidad Católica de Santa María</h1>
</div>
<div class="divContent">
   <div class="container-fluid">
   <form action="index.php" method="post" style="background: #fff">
      <label for="dni">DNI:</label>
      <input type="text" maxlength="8" name="pcNroDni" title="Número de DNI" autofocus/>
      <br>
      <br>
      <label for="pwd">Clave:</label>
      <input type="password" maxlength="20" name="pcClave" title="Clave"/><br>
      <button type="submit" name="Boton1" value="IniciarSesion" title="Iniciar sesión">Iniciar Sesión</button>
   </form>
   </div>
</div>
<div class="divFooter">
   <h1>Universidad Católica Santa María</h1>
</div>
</body>

</html>