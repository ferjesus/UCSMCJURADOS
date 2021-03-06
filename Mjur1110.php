<?php 
   // Registrar y mantenimiento de notificaciones
   require_once "Libs/Smarty.class.php";
   require_once "Clases/CMatricula.php"; 
   session_start();
   $loSmarty = new Smarty;

   if (!fxInitSession()) {
      fxHeader("index.php");
      fxAlert('Inicie Sesión');
   } elseif (@$_REQUEST['Boton1'] == 'Matricularse') {
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
      $laData['CUNIACA'] = $_SESSION['GCUNIACA'] ;
      $lo = new CMatricula();
      $lo->paData = $laData;
      $llOk = $lo->omTraerCursos();
      if (!$llOk) {
         fxHeader("index1.php", $lo->pcError);
         return;
      }
      $_SESSION['paCursos'] = $lo->paCursos;
      fxScreen();
   }
   
   function fxScreen() {
      global $loSmarty;
      $laData =  $_SESSION; 
      $loSmarty->assign('saData', $laData);
      $loSmarty->assign('saCursos', $_SESSION['paCursos']);
      $loSmarty->assign('scBehavior', '0');
      $loSmarty->assign('saDatos', $_SESSION);
      $loSmarty->display('Plantillas/Mjur1110.tpl');
   }
   
   function fxEnviar() {
      fxGrabar();
      $lo = new CNotificacion();
      $lo->paData = ['CTITULO' => $_REQUEST['pcTitulo'], 'CDESCRI' => $_REQUEST['pcDescri']];
      $llOk = $lo->omEnviarNotificacion();
      $_SESSION['paData'] = $lo->paData;
   }
   
   function fxMatricular() {
       
      $laData = $_REQUEST['paData']; 
      $laData['CCODALU'] = $_SESSION['GCCODALU'] ;
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
 
