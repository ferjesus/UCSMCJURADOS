<?php 
   require_once "Libs/Smarty.class.php";
   require_once "Clases/CBase.php"; 
   session_start();
   $loSmarty = new Smarty;
         fxAlert("555555555555555555");

   if (!fxInitSession()) {
             fxAlert("666666666666666");

      fxHeader("index.php");
      fxAlert('Inicie Sesión');
   } elseif (@$_REQUEST['Boton'] == 'Grabar') {
      fxGrabar();
   } elseif (@$_REQUEST['Boton'] == 'Salir') {
      fxHeader("index1.php");
   } elseif (@$_REQUEST['Boton'] == 'Enviar') {
      fxEnviar();
   } else {
      fxAlert("feeeeeer");
      fxInit();
   }
   
  function fxInit() {
      fxScreen();
   }
   
   function fxScreen() {
       
      global $loSmarty;
      $loSmarty->assign('scBehavior', '0');
      $loSmarty->display('Plantillas/index1.tpl');
   }
     
   function fxScreen1() {
      //header("Location:GRIDNOTIFICACIONES.php");
   } 
   

 
