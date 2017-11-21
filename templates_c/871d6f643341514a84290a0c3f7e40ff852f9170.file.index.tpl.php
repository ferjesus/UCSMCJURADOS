<?php /* Smarty version Smarty-3.1.8, created on 2017-11-14 16:29:44
         compiled from "Plantillas\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10675a0b6048b53626-02237926%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '871d6f643341514a84290a0c3f7e40ff852f9170' => 
    array (
      0 => 'Plantillas\\index.tpl',
      1 => 1510694685,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10675a0b6048b53626-02237926',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5a0b6048b6f6a3_07813505',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a0b6048b6f6a3_07813505')) {function content_5a0b6048b6f6a3_07813505($_smarty_tpl) {?><!DOCTYPE html>
<html>
   <head>
      <meta HTTP-EQUIV="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="Responsive/bootstrap.min.css">
      <link rel="stylesheet" href="CSS/GeneralStyle.css">
      <title>Universidad Católica de Santa María</title>
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

</html><?php }} ?>