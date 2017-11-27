<?php 
   // Registrar y mantenimiento de notificaciones
   require_once "Libs/Smarty.class.php";
   require_once "Clases/CMatricula.php"; 
   session_start();
   $loSmarty = new Smarty;
   fxAlert($_SESSION['GCCOALU']);

   if (!fxInitSession()) {
      fxHeader("index.php");
      fxAlert('Inicie Sesión');
   } elseif (@$_REQUEST['Boton'] == 'Matricularse') {
             fxAlert('88888888888888888888');

      fxMatricular();
   } elseif (@$_REQUEST['Boton'] == 'Salir') {
      fxHeader("index.php");
   } elseif (@$_REQUEST['Boton'] == 'Enviar') {
      fxEnviar();
   } else {
      fxInit();
   }
   ///WASdASdASD
  function fxInit() {
      $lo = new CMatricula();
      $llOk = $lo->omTraerCursos();
      if (!$llOk) {
         fxHeader("index.php", $lo->pcError);
         return;
      }
      $_SESSION['paCursos'] = $lo->paCursos;
      fxScreen();
   }
   
   function fxScreen() {
      global $loSmarty;
      $loSmarty->assign('saCursos', $_SESSION['paCursos']);
      $loSmarty->assign('scBehavior', '0');
      $loSmarty->display('Plantillas/Mjur1110.tpl');
   }
   
   function fxEnviar() {
      fxGrabar();
      $lo = new CNotificacion();
      $lo->paData = ['CTITULO' => $_REQUEST['pcTitulo'], 'CDESCRI' => $_REQUEST['pcDescri']];
      $llOk = $lo->omEnviarNotificacion();
      $_SESSION['paData'] = $lo->paData;
      fxAlert( 'SIII');
   }
   
   function fxMatricular() {
       
      $laData = $_REQUEST['paData']; 
      $laData['CCODALU'] = $_SESSION['GCCOALU'] ;
      $lo = new CMatricula();
      $lo->paData = $laData;
      $llOk = $lo->omMatricular();
      if (!$llOk) {
         fxScreen();
         fxAlert($lo->pcError);
         return;
      }
      $_SESSION['paData'] = $lo->paData;
      fxAlert('GRABACION CONFORME');
      fxScreen();
      
   }  
   
   function fxScreen1() {
      header("Location:GRIDNOTIFICACIONES.php");
   } 
   
   function fxScreen2() {
      global $loSmarty;
      $loSmarty->assign('saDatos', $_SESSION['paDatos']);
      $loSmarty->assign('scBehavior', '2');
      $loSmarty->display('Plantillas/App1110.tpl');
   }
 
