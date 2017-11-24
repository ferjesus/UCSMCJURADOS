<?php /* Smarty version Smarty-3.1.8, created on 2017-11-23 22:47:11
         compiled from "Plantillas\Mjur1110.tpl" */ ?>
<?php /*%%SmartyHeaderCode:267555a173ef84e6375-60486424%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ce81a0f7c29f0406ed6d7c1c0ac8bfb35341de76' => 
    array (
      0 => 'Plantillas\\Mjur1110.tpl',
      1 => 1511473593,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '267555a173ef84e6375-60486424',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5a173ef85093d6_43369386',
  'variables' => 
  array (
    'saCursos' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a173ef85093d6_43369386')) {function content_5a173ef85093d6_43369386($_smarty_tpl) {?><!DOCTYPE html>
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
    </form>
    <footer>
        <h5>UCSM</h5>
    </footer>
</body><?php }} ?>