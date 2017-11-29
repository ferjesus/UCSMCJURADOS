<?php
require_once "Clases/CBase.php";
require_once "Clases/CSql.php";
class CConvalida extends CBase {
   public $paData, $paDatos, $paUniaca;

   public function __construct() {
      parent::__construct();
      $this->paData = $this->paDatos = $this->paLogin = $this->paCargas= null;
   }
   //-----------------------------------
   // SOLICITUD DE CONVALIDACION  
   //-----------------------------------
   public function omConvalidar() {
      $llOk = $this->mxValConvalidacion();
      if (!$llOk) {
         return false;
      }
      $loSql = new CSql();
      $llOk = $loSql->omConnect();
      if (!$llOk) {
         $this->pcError = $loSql->pcError;
         return false;
      }
      $llOk = $this->mxConvalidar($loSql);
      $loSql->omDisconnect();
      return $llOk;
   }
   
   protected function mxConvalidar($p_oSql) {
      $lcJson = json_encode($this->paData);
      $lcSql = "SELECT F_CONVALIDA('$lcJson')";
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
   protected function mxValConvalidacion () {
      if (empty($this->paData['CCODCUR'])) {
         $this->pcError = "CODIGO DE CURSO NO DEFINIDO";
         return false;
      } elseif (empty($this->paData['CIDCARG'])) {
        $this->pcError = "CARGA NO DEFINIDA";
        return false;
      } elseif (empty($this->paData['CCODALU'])) {
        $this->pcError = "CODIGO DE ALUMNO NO DEFINIDO";
        return false;
      }
      return true;
   }
   //-----------------------------------
   // OBTENER DATOS DE CURSOS
   //-----------------------------------
   public function omTraerCursos(){
      $llOk = $this->mxValTraerCursos();
      if (!$llOk) {
         return false;
      }
      $loSql = new CSql();
      $llOk = $loSql->omConnect();
      if (!$llOk) {
         $this->pcError = $loSql->pcError;
         return false;
      }
      $llOk = $this->mxTraerDatos($loSql);
      $loSql->omDisconnect();
      return $llOk;
   }
   
      protected function mxValTraerCursos () {
      if (empty($this->paData['CUNIACA'])) {
         $this->pcError = "UNIDAD ACADEMICA NO DEFINIDA";
         return false;
      }
      return true;
   }
   
   protected function mxTraerDatos($p_oSql) {
   $i = 0;
      $lcSql = "SELECT CCODCUR,CDESCRI, CPLAEST,CUNIACA,CNOMUNI FROM V_A02MCUR_1 WHERE CUNIACA ='".$this->paData['CUNIACA']."' ORDER BY CDESCRI";
      $R1 = $p_oSql->omExec($lcSql);
      while ($laFila = $p_oSql->fetch($R1)) {
         $i++;
         $this->paCursos[] = [$laFila[0], $laFila[1], $laFila[2], $laFila[3], $laFila[4]];
      }
      //$this->paUniAca[] = ['00', '* TODAS'];
      if ($i == 0) {
         $this->pcError = 'CURSOS NO ESTAN DEFINIDAS';
         return false;
      }    
      return true;
   }
      //-----------------------------------
   // OBTENER DATOS DE CARGAS DISPONIBLES
   //-----------------------------------
   public function omTraerCargas(){
      $loSql = new CSql();
      $llOk = $loSql->omConnect();
      if (!$llOk) {
         $this->pcError = $loSql->pcError;
         return false;
      }
      $llOk = $this->mxTraerCargas($loSql);
      $loSql->omDisconnect();
      return $llOk;
   }
   
   
   protected function mxTraerCargas($p_oSql) {
   $i = 0;
      $lcSql = "SELECT CIDCARG,CCODCUR,CDESCRI, CPLAEST,CUNIACA,CNOMUNI FROM V_A02MCAR WHERE CPROYEC = '2017-1' ORDER BY  CDESCRI";
      $R1 = $p_oSql->omExec($lcSql);
      while ($laFila = $p_oSql->fetch($R1)) {
         $i++;
         $this->paCargas[] = [$laFila[0], $laFila[1], $laFila[2], $laFila[3], $laFila[4],$laFila[5]];
      }
      //$this->paUniAca[] = ['00', '* TODAS'];
      if ($i == 0) {
         $this->pcError = 'CARGAS NO ESTAN DEFINIDAS';
         return false;
      }    
      return true;
   }

}
?>
