<?php 
   // Registrar y mantenimiento de notificaciones
   require_once "Libs/Smarty.class.php";
   require_once "Clases/CNotificacion.php"; 
   session_start();
   $loSmarty = new Smarty;
   $_SESSION['GCCODUSU'];
   if (!fxInitSession()) {
      fxHeader("index.php");
      fxAlert('Inicie Sesión');
   } elseif (@$_REQUEST['Boton'] == 'Grabar') {
      fxGrabar();
   } elseif (@$_REQUEST['Boton'] == 'Salir') {
      fxHeader("index.php");
   } elseif (@$_REQUEST['Boton'] == 'Enviar') {
      fxEnviar();
   } else {
      fxInit();
   }
   
  function fxInit() {
      $lo = new CMatricula();
      $llOk = $lo->omInitConsultas();
      if (!$llOk) {
         fxHeader("index.php", $lo->pcError);
         return;
      }
      $_SESSION['paUniAca'] = $lo->paUniAca;
      fxScreen();
   }
   
   function fxScreen() {
      global $loSmarty;
      $loSmarty->assign('saUniAca', $_SESSION['paUniAca']);
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
   
   function fxGrabar() {
      $lo = new CNotificacion();
      $lo->paData = ['CTITULO' => $_REQUEST['pcTitulo'], 'CDESCRI' => $_REQUEST['pcDescri'], 'CUNIACA' => $_REQUEST['pcUniAca'],
                     'CACAUNI' => $_REQUEST['pcAcaUni'], 'CLINK' => $_REQUEST['pcLink'], 'CCODUSU' => $_SESSION['GCCODUSU'], 'CTIPO' => "N"];
      $llOk = $lo->omGrabarNotificacion();
      if (!$llOk) {
         fxScreen();
         fxAlert($lo->pcError);
         return;
      }
      $_SESSION['paData'] = $lo->paData;
      fxAlert('GRABACION CONFORME');
      fxScreen1();
      
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
 
