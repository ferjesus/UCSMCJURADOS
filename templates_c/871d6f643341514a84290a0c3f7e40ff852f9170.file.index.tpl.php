<?php /* Smarty version Smarty-3.1.8, created on 2017-11-23 15:50:38
         compiled from "Plantillas\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10675a0b6048b53626-02237926%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '871d6f643341514a84290a0c3f7e40ff852f9170' => 
    array (
      0 => 'Plantillas\\index.tpl',
      1 => 1511460540,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10675a0b6048b53626-02237926',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5a0b6048b6f6a3_07813505',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0b6048b6f6a3_07813505')) {function content_5a0b6048b6f6a3_07813505($_smarty_tpl) {?><!DOCTYPE html>
<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <title>Universidad Católica de Santa María</title>
      <link rel="stylesheet" href="CSS/styles.css">
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

</html><?php }} ?>