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
      fxAlert("1111111111111111111");
      $lo->paData = ['CNRODNI' => $_REQUEST['pcNroDni'],
                     'CCLAVE' => $_REQUEST['pcClave'],
                     'CTERMIP' => $_SERVER['REMOTE_ADDR']];
            fxAlert("22222222222222222222");

      $llOk = $lo->omIniciarSesion();
            fxAlert("333333333333333333333");

      if (!$llOk) {
         fxInit();
         fxAlert($lo->pcError);
         return;
      }
      $_SESSION['GCUNIACA'] = $lo->paDatos['CUNIACA'];
      $_SESSION['GCCODUSU'] = $lo->paDatos['CCODUSU'];
      $_SESSION['GCNRODNI'] = $lo->paDatos['CNRODNI'];
      $_SESSION['GCNOMBRE'] = $lo->paDatos['CNOMBRE'];
      $_SESSION['GCNIVEL'] = $lo->paDatos['CNIVEL'];
      fxAlert("XXXXXXXXXXXXXXXXXXXXXXXXXX");
      fxHeader("index1.php");    
   }
?>
