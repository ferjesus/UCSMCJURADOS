<?php /* Smarty version Smarty-3.1.8, created on 2017-11-26 19:10:44
         compiled from "Plantillas/MJUR1110.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14099896985a1b580457df12-57865910%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '799c20d6126a844742ae5e1573dc2a54377b4352' => 
    array (
      0 => 'Plantillas/MJUR1110.tpl',
      1 => 1511720875,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14099896985a1b580457df12-57865910',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'saCursos' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5a1b58045a2b17_10493675',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a1b58045a2b17_10493675')) {function content_5a1b58045a2b17_10493675($_smarty_tpl) {?><!DOCTYPE html>
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
                       <?php  $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['i']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['saCursos']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['i']->key => $_smarty_tpl->tpl_vars['i']->value){
$_smarty_tpl->tpl_vars['i']->_loop = true;
?>  
                          <option value='<?php echo $_smarty_tpl->tpl_vars['i']->value[0];?>
'><?php echo $_smarty_tpl->tpl_vars['i']->value[5];?>
 </option>
                       <?php } ?>  
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
</body><?php }} ?>