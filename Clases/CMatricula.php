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
   // OBTENER DATOS DE CURSOS
   //-----------------------------------
   public function omTraerCursos(){
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
   
   
   protected function mxTraerDatos($p_oSql) {
   $i = 0;
      $lcSql = "SELECT CIDCARG, CPROYEC,CESTADO,CUNIACA, CCODCUR,CDESCRI FROM V_A02MCAR ORDER BY CDESCRI";
      $R1 = $p_oSql->omExec($lcSql);
      while ($laFila = $p_oSql->fetch($R1)) {
         $i++;
         $this->paCursos[] = [$laFila[0], $laFila[1], $laFila[2], $laFila[3], $laFila[4], $laFila[5]];
      }
      //$this->paUniAca[] = ['00', '* TODAS'];
      if ($i == 0) {
         $this->pcError = 'CURSOS NO ESTAN DEFINIDAS';
         return false;
      }    
      return true;
   }
   

}
?>
