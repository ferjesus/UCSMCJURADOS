<?php
require_once "Clases/CBase.php";
require_once "Clases/CSql.php";
class CLogin extends CBase {
   public $paData, $paDatos;

   public function __construct() {
      parent::__construct();
      $this->paData = $this->paDatos = $this->paLogin = null;
   }
   //-----------------------------------
   // INICIO DE SESION GENERICO
   //-----------------------------------
   public function omIniciarSesion() {

      $llOk = $this->mxValInicioSesion();
      if (!$llOk) {
         return false;
      }
      $loSql = new CSql();
      $llOk = $loSql->omConnect();
      if (!$llOk) {
         $this->pcError = $loSql->pcError;
         return false;
      }
      $llOk = $this->mxIniciarSesion($loSql);
      $loSql->omDisconnect();
      return $llOk;
   }
   
   protected function mxIniciarSesion($p_oSql) {
      $lcJson = json_encode($this->paData);
      $lcSql = "SELECT P_LOGIN('$lcJson')";
      print_r($lcSql);
      $RS = $p_oSql->omExec($lcSql);
      $laFila = $p_oSql->fetch($RS);
      $laFila[0] = (!$laFila[0]) ? '{"ERROR": "ERROR DE EJECUCION DE BASE DE DATOS"}' : $laFila[0];
      $this->paDatos = json_decode($laFila[0], true);
      echo '<br>'.$laFila[0].'<br>';
      if (!empty($this->paDatos['ERROR'])) {
         $this->pcError = $this->paDatos['ERROR'];
         return false; 
      }
      return true;
   }
   protected function mxValInicioSesion () {
      if (empty($this->paData['CNRODNI'])) {
         $this->pcError = "DNI NO DEFINIDO";
         return false;
      } elseif (empty($this->paData['CCLAVE'])) {
        $this->pcError = "CONTRASEÑA NO DEFINIDA";
        return false;
      }
      return true;
   }
   
}
?>
