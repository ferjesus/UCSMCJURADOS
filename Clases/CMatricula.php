<?php
require_once "Clases/CBase.php";
require_once "Clases/CSql.php";
class CMatricula extends CBase {
   public $paData, $paDatos, $paUniaca, $paCursos;

   public function __construct() {
      parent::__construct();
      $this->paData = $this->paDatos = $this->paLogin  =$this->paCursos = null;
   }
   //-----------------------------------
   // MATRICULA EN CURSO 
   //-----------------------------------
   public function omMatricular() {
      $llOk = $this->mxValMatricula();
      if (!$llOk) {
         return false;
      }
      $loSql = new CSql();
      $llOk = $loSql->omConnect();
      if (!$llOk) {
         $this->pcError = $loSql->pcError;
         return false;
      }
      $llOk = $this->mxMatricular($loSql);
      $loSql->omDisconnect();
      return $llOk;
   }
   
   protected function mxMatricular($p_oSql) {
      $lcJson = json_encode($this->paData);
      $lcSql = "SELECT F_MATRICULA('$lcJson')";
      //print_r($lcSql);
      $RS = $p_oSql->omExec($lcSql);
      $laFila = $p_oSql->fetch($RS);
      $laFila[0] = (!$laFila[0]) ? '{"ERROR": "ERROR DE EJECUCION DE BASE DE DATOS"}' : $laFila[0];
      $this->paDatos = json_decode($laFila[0], true);
     // echo '<br>'.$laFila[0].'<br>';
      if (!empty($this->paDatos['ERROR'])) {
         $this->pcError = $this->paDatos['ERROR'];
         return false; 
      }
      return true;
   }
   protected function mxValMatricula () {
      if (empty($this->paData['CCODALU'])) {
         $this->pcError = "CODIGO DE ALUMNO NO DEFINIDO";
         return false;
      } elseif (empty($this->paData['CIDCARG'])) {
        $this->pcError = "CARGA NO DEFINIDA";
        return false;
      }
      return true;
   }

   //-----------------------------------
   // ANULA MATRICULA
   //-----------------------------------
   public function omAnular() {
      $llOk = $this->mxValAnular();
      if (!$llOk) {
         return false;
      }
      $loSql = new CSql();
      $llOk = $loSql->omConnect();
      if (!$llOk) {
         $this->pcError = $loSql->pcError;
         return false;
      }
      $llOk = $this->mxAnular($loSql);
      $loSql->omDisconnect();
      return $llOk;
   }
   
   protected function mxAnular($p_oSql) {
      $lcJson = json_encode($this->paData);
      $lcSql = "SELECT F_ANULA('$lcJson')";
     // print_r($lcSql);
      $RS = $p_oSql->omExec($lcSql);
      $laFila = $p_oSql->fetch($RS);
      $laFila[0] = (!$laFila[0]) ? '{"ERROR": "ERROR DE EJECUCION DE BASE DE DATOS"}' : $laFila[0];
      $this->paDatos = json_decode($laFila[0], true);
     // echo '<br>'.$laFila[0].'<br>';
      if (!empty($this->paDatos['ERROR'])) {
         $this->pcError = $this->paDatos['ERROR'];
         return false; 
      }
      return true;
   }
   protected function mxValAnular () {
      if (empty($this->paData['CCODALU'])) {
         $this->pcError = "CODIGO DE ALUMNO NO DEFINIDO";
         return false;
      } elseif (empty($this->paData['CIDCARG'])) {
        $this->pcError = "CARGA NO DEFINIDA";
        return false;
      }
      return true;
   }


   //-----------------------------------
   // OBTENER DATOS DE CURSOS
   //-----------------------------------
   public function omTraerCursos(){
      $llOk = $this->mxValTraerDatos();
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
      protected function mxValTraerDatos () {
      if (empty($this->paData['CUNIACA'])) {
         $this->pcError = "UNIDAD ACADEMICA NO DEFINIDA";
         return false;
      }
      return true;
   }
   
   protected function mxTraerDatos($p_oSql) {
      $i = 0;
      $lcSql = "SELECT CIDCARG, CPROYEC,CESTADO,CUNIACA, CCODCUR,CDESCRI FROM V_A02MCAJ  WHERE CUNIACA ='".$this->paData['CUNIACA']."' ORDER BY CDESCRI";
      $R1 = $p_oSql->omExec($lcSql);
      while ($laFila = $p_oSql->fetch($R1)) {
         $i++;
         $this->paCursos[] = [$laFila[0], $laFila[1], $laFila[2], $laFila[3], $laFila[4], $laFila[5]];
      }
      //$this->paUniAca[] = ['00', '* TODAS'];
      if ($i == 0) {
         $this->pcError = 'CURSOS NO ESTAN DEFINIDOS';
         return false;
      }    
      return true;
   }
   
//-----------------------------------
   // CURSOS MATRICULADOS
   //-----------------------------------
   public function omTraerMatriculas(){
      $llOk = $this->mxValTraerDatosMatricula();
      if (!$llOk) {
         return false;
      }
      $loSql = new CSql();
      $llOk = $loSql->omConnect();
      if (!$llOk) {
         $this->pcError = $loSql->pcError;
         return false;
      }
      $llOk = $this->mxTraerMatriculas($loSql);
      $loSql->omDisconnect();
      return $llOk;
   }
      protected function mxValTraerDatosMatricula () {
      if (empty($this->paData['CCODALU'])) {
         $this->pcError = "CODIGO DE ALUMNO NO DEFINIDO";
         return false;
      }
      return true;
   }
   
   protected function mxTraerMatriculas($p_oSql) {
      $i = 0;
      $lcSql = "SELECT CIDCARG, CPROYEC,CESTADO,CUNIACA, CCODCUR,CDESCRI FROM V_A01PMAT WHERE CCODALU ='".$this->paData['CCODALU']."' AND CESTADO = 'A' ORDER BY CDESCRI";
      $R1 = $p_oSql->omExec($lcSql);
      while ($laFila = $p_oSql->fetch($R1)) {
         $i++;
         $this->paCursos[] = [$laFila[0], $laFila[1], $laFila[2], $laFila[3], $laFila[4], $laFila[5]];
      }
      //$this->paUniAca[] = ['00', '* TODAS'];
      if ($i == 0) {
         $this->pcError = 'NO HAY CURSOS POR JURADO EN LOS QUE EL ALUMNO ESTÉ MATRICULADO';
         return false;
      }    
      return true;
   }

}
?>
