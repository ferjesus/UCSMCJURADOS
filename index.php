<?php
   //INICIO SESION ADMINISTRADOR
   date_default_timezone_set('America/Lima');
   require_once 'Libs/Smarty.class.php';
   require_once 'Clases/CLogin.php';
   session_start();
   $loSmarty = new Smarty;
   if (@$_REQUEST['Boton1'] == 'IniciarSesion') {
      fxInicioSesion();
   } else {
      fxInit();
   }
   function fxInit () {
      global $loSmarty;
      $_SESSION = [];
      $loSmarty->display('Plantillas/index.tpl');
   }
   function fxInicioSesion () {
      $lo = new CLogin();
      $lo->paData = ['CNRODNI' => $_REQUEST['pcNroDni'],
                     'CCLAVE' => $_REQUEST['pcClave'],
                     'CTERMIP' => $_SERVER['REMOTE_ADDR']];

      $llOk = $lo->omIniciarSesion();

      if (!$llOk) {
         fxInit();
         fxAlert($lo->pcError);
         return;
      }
      $_SESSION['GCNRODNI'] = $lo->paDatos['CNRODNI'];
      $_SESSION['GCNOMBRE'] = $lo->paDatos['CNOMBRE'];
      $_SESSION['GCCOALU'] = $lo->paDatos['CCODALU'];
      $_SESSION['GCESTADO'] = $lo->paDatos['CESTADO'];
      fxHeader("index1.php");    
   }
?>
