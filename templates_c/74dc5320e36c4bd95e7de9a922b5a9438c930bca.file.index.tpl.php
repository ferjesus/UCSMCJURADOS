<?php /* Smarty version Smarty-3.1.8, created on 2017-11-29 10:12:08
         compiled from "Plantillas/index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20972313205a1b4758c75688-95469117%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '74dc5320e36c4bd95e7de9a922b5a9438c930bca' => 
    array (
      0 => 'Plantillas/index.tpl',
      1 => 1511968188,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20972313205a1b4758c75688-95469117',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5a1b4758cbc981_85730515',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a1b4758cbc981_85730515')) {function content_5a1b4758cbc981_85730515($_smarty_tpl) {?><!DOCTYPE html>
<html>
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <title>Universidad Católica de Santa María</title>
      <link rel="stylesheet" href="./styles.css">
   </head>
<body>
<header>
   <div class="jumbotron text-center">
      <h1>Inicio de Sesion</h1>
   </div>
</header>
<div class="container">
   <div class="container">
       <div class="col-sm-4"></div>
   <form action="index.php" method="post" class="form-group col-sm-4">
       <div class="row">
         <label for="dni">DNI:</label>
         <input type="text" maxlength="8" class="form-control" name="pcNroDni" title="Número de DNI" id="dni" placeholder="Número de DNI" autofocus/>
       </div>
      <div class="row">
         
         <label for="Clave">Contraseña:</label>
         <input type="password"  class="form-control" maxlength="20" placeholder="Contraseña" name="pcClave" title="Clave" id="Clave" /><br>
          
      </div>
       <div class="text-center">
       <div class="row">
           <button type="submit" class="btn btn-default"  name="Boton1" value="IniciarSesion" title="Iniciar sesión">Iniciar Sesión</button>
        
       </div>
        </div>
      
   </form>
       
       <div class="col-sm-4"></div>
   </div>
</div>
</body>
<footer class="text-center">
    <h5>UCSM</h5>
</footer>

</html><?php }} ?>