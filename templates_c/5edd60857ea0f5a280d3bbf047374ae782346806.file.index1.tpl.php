<?php /* Smarty version Smarty-3.1.8, created on 2017-11-26 19:10:12
         compiled from "Plantillas/index1.tpl" */ ?>
<?php /*%%SmartyHeaderCode:19829191385a1b4a7abbae33-33783673%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5edd60857ea0f5a280d3bbf047374ae782346806' => 
    array (
      0 => 'Plantillas/index1.tpl',
      1 => 1511741408,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '19829191385a1b4a7abbae33-33783673',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_5a1b4a7abe2f11_20745097',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5a1b4a7abe2f11_20745097')) {function content_5a1b4a7abe2f11_20745097($_smarty_tpl) {?><!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./styles.css">
    <title>Universidad Católica de Santa María</title>
    <script src="JS/java.js"></script>
</head>
<body>
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
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <a href="Mjur1110.php"> <button type="button" class="btn btn-primary btn-lg btn btn-success">Matricula de Cursos por Jurado</button></a>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <a href="MJUR1120.php"> <button type="button" class="btn btn-primary btn-lg btn btn-success">Convalidacion</button></a>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-4">
                <a href="MJUR1130.php"> <button type="button" class="btn btn-primary btn-lg btn btn-success">Cerrar Sesion</button></a>
            </div>
            <div class="col-sm-4"></div>
        </div>
    </div>
    <footer class="text-center">
        <h5>UCSM</h5>
    </footer>
</body>

</html>
<?php }} ?>