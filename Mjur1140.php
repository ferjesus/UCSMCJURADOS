<?php 
   require_once "Libs/Smarty.class.php";
   require_once "Clases/CMatricula.php"; 
   session_start();
   $loSmarty = new Smarty;

   if (!fxInitSession()) {
      fxHeader("index.php");
      fxAlert('Inicie Sesión');
   } elseif (@$_REQUEST['Boton1'] == 'Matricularse') {
      fxAnular();
   } elseif (@$_REQUEST['Boton'] == 'Salir') {
      fxHeader("index.php");
   } elseif (@$_REQUEST['Boton'] == 'Enviar') {
      fxEnviar();
   } else {
      fxInit();
   }
   ///WASdASdASD
  function fxInit() {
      $laData['CCODALU'] = $_SESSION['GCCODALU'] ;
      $lo = new CMatricula();
      $lo->paData = $laData;
      $llOk = $lo->omTraerMatriculas();
      if (!$llOk) {
         fxHeader("index1.php", $lo->pcError);
         return;
      }
      $_SESSION['paCursos'] = $lo->paCursos;
      fxScreen();
   }
   
   function fxScreen() {
      global $loSmarty;
      $loSmarty->assign('saCursos', $_SESSION['paCursos']);
      $loSmarty->assign('scBehavior', '0');
      $loSmarty->display('Plantillas/Mjur1140.tpl');
   }
   
   function fxEnviar() {
      fxGrabar();
      $lo = new CNotificacion();
      $lo->paData = ['CTITULO' => $_REQUEST['pcTitulo'], 'CDESCRI' => $_REQUEST['pcDescri']];
      $llOk = $lo->omEnviarNotificacion();
      $_SESSION['paData'] = $lo->paData;
   }
   
   function fxAnular() {
       
      $laData = $_REQUEST['paData']; 
      $laData['CCODALU'] = $_SESSION['GCCODALU'] ;
      $lo = new CMatricula();
      $lo->paData = $laData;
      $llOk = $lo->omAnular();
      if (!$llOk) {
         fxScreen();
         fxAlert($lo->pcError);
         return;
      }
      $_SESSION['paData'] = $lo->paData;
      fxAlert('MATRICULA ANULADA');
      fxScreen3();
      
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
    function fxScreen3() {
      global $loSmarty;
      $loSmarty->display('Plantillas/index1.tpl');
   }