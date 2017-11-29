<?php 
   // Registrar y mantenimiento de notificaciones
   require_once "Libs/Smarty.class.php";
   require_once "Clases/CConvalida.php"; 
   session_start();
   $loSmarty = new Smarty;

   if (!fxInitSession()) {
      fxHeader("index.php");
      fxAlert('Inicie Sesión');
   } elseif (@$_REQUEST['Boton1'] == 'Convalidar') {
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
      $lo = new CConvalida();
      $lo->paData = $laData;
      $llOk = $lo->omTraerCursos();
      if (!$llOk) {
         fxHeader("index1.php", $lo->pcError);
         return;
      }
      $llOk = $lo->omTraerCargas();
      if (!$llOk) {
         fxHeader("index1.php", $lo->pcError);
         return;
      }
      $_SESSION['paCursos'] = $lo->paCursos;
      $_SESSION['paCargas'] = $lo->paCargas;
      fxScreen();
   }
   
   function fxScreen() {
      global $loSmarty;
      $loSmarty->assign('saCursos', $_SESSION['paCursos']);
      $loSmarty->assign('saCargas', $_SESSION['paCargas']);
      $loSmarty->assign('scBehavior', '0');
      $loSmarty->display('Plantillas/MJUR1120.tpl');
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
    //  header("Location:GRIDNOTIFICACIONES.php");
   } 
   
   function fxScreen2() {
      global $loSmarty;
      $loSmarty->assign('saDatos', $_SESSION['paDatos']);
      $loSmarty->assign('scBehavior', '2');
      $loSmarty->display('Plantillas/App1110.tpl');
   }
 
