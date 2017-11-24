<?php
require_once "Clases/CBase.php";
require_once "Clases/CSql.php";


class CSesion {
   public $pcError, $pcJsonString, $paData, $paDatos;

   public function __construct() {
      $this->pcError = $this->pcJsonString = $this->paData = $this->paDatos = null;
   }
   
   
   
   // Iniciar sesion
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
      //echo $lcSql;die
      $RS = $p_oSql->omExec($lcSql);
      $laFila = $p_oSql->fetch($RS);
      $laFila = (!$laFila[0]) ? '{"ERROR": "ERROR DE EJECUCION DE BASE DE DATOS"}' : $laFila;
      //$lcJson = json_decode($laFila[0]);
      $this->paData = json_decode($laFila[0], true);
      //echo $lcJson;die;
      //$this->pcError = $lcJson->{'ERROR'};
      if (!empty($this->paData['ERROR'])) {
         $this->pcError = $this->paData['ERROR'];
         return false; 
      }
      /*$this->paData = ['CNRODNI'=>$lcJson->{'CNRODNI'}, 'CNOMBRE'=>$lcJson->{'CNOMBRE'},  //OJOFPM
                   'CCODUSU'=>$lcJson->{'CCODUSU'}, 'CUNIACA'=>$lcJson->{'CUNIACA'},
                   'CNIVEL'=>$lcJson->{'CNIVEL'}, 'CESTADO'=>$lcJson->{'CESTADO'}];*/
      return true;
   }
   
   protected function mxValInicioSesion () {
      if (empty($this->paData['CNRODNI'])) {
         $this->pcError = "NUMERO DE DOCUMENTO VACIO";
         return false;
      } elseif (empty($this->paData['CCLAVE'])) {
        $this->pcError = "CLAVE VACIA";
        return false;
      }
      return true;
   }
   
   // SESION ALUMNO
   public function omInitDatosAlumno() {
      $llOk = $this->mxValDatosAlumno();
      if (!$llOk) {
         return false;
      }
      $loSql = new CSql();
      $llOk = $loSql->omConnect();
      if (!$llOk) {
         $this->pcError = $loSql->pcError;
         return false;
      }
      $llOk = $this->mxInitDatosAlumno($loSql);
      $loSql->omDisconnect();
      return $llOk;
   }
   
   protected function mxInitDatosAlumno($p_oSql) {
      $lcJson = json_encode($this->paData);
      $lcSql = "SELECT P_S01MPER_4('$lcJson')";
      $RS = $p_oSql->omExec($lcSql);
      $laFila = $p_oSql->fetch($RS);
   $laFila[0] = (!$laFila[0]) ? '{"ERROR": "ERROR DE EJECUCION DE BASE DE DATOS"}' : $laFila[0];
      $this->paData = json_decode($laFila[0], true);
      if (!empty($this->paData['ERROR'])) {
         $this->pcError = $this->paData['ERROR'];
         return false; 
      }  
      return true;
   }
   
   protected function mxValDatosAlumno() {
      if (empty($this->paData['CNRODNI'])) {
         $this->pcError = "ERROR DNI NO DEFINIDO";
         return false;
      }
      return true;
   }
   
   public function omGenerarPago() {
     if (empty($this->paData['CCODALU'])) {
         $this->pcError = "ERROR CODIGO DE ALUMNO NO DEFINIDO";
         return false;
     }
     $loSql = new CSql();
     $llOk = $loSql->omConnect();
     if (!$llOk) {
       $this->pcError = $loSql->pcError;
       return false;
     }
     $llOk = $this->mxGrabarPersona($loSql);
     if (!$llOk) {
       $loSql->rollback();
       $loSql->omDisconnect();
       return false;
     }
     $llOk = $this->mxGrabarPago($loSql);
     if (!$llOk) {
       $loSql->rollback();
     }
     $loSql->omDisconnect();
     return $llOk;
   }
   
   public function omGrabarDatos() {
     $llOk = $this->mxValGrabarDatosAlumno();
     if (!$llOk) {
       return false;
     }
     $loSql = new CSql();
     $llOk = $loSql->omConnect();
     if (!$llOk) {
       $this->pcError = $loSql->pcError;
       return false;
     }
     $llOk = $this->mxGrabarPersona($loSql);
     if (!$llOk) {
       $loSql->rollback();
     }
     $loSql->omDisconnect();
     return $llOk;
   }
   
   
   // SESION ALUMNO --- Funcion REGISTRA PERSONA EN UNIDAD ACADEMICA
   public function omRegistrar() {
     $llOk = $this->mxValGrabarDatosAlumno();
     if (!$llOk) {
       return false;
     }
     $loSql = new CSql();
     $llOk = $loSql->omConnect();
     if (!$llOk) {
       $this->pcError = $loSql->pcError;
       return false;
     }
     $llOk = $this->mxRegistrar($loSql);
     if (!$llOk) {
       $loSql->rollback();
     }
     $loSql->omDisconnect();
     return $llOk;
   }
   
   protected function mxRegistrar($p_oSql) {
      $llOk = $this->mxGrabarPersona($p_oSql);
      if (!$llOk) {
         return false;
      }
      $llOk = $this->mxGrabarCodigoAlumno($p_oSql);
      if (!$llOk) {
         return false;
      }
      $llOk = $this->mxGrabarPago($p_oSql);
      return $llOk;
    }
    
    protected function mxGrabarPersona($p_oSql) {
      // Datos Json
      $lcJson = json_encode($this->paData);
      $lcNroDni = $this->paData['CNRODNI'];
      $lcUniAca = $this->paData['CUNIACA'];
      // Actualiza datos de persona
      $lcSql = "SELECT P_S01MPER_2('$lcJson')";
      //echo '<br>'.$lcSql.'<br>';
      $R1 = $p_oSql->omExec($lcSql);
      $laFila = $p_oSql->fetch($R1);
      $laFila[0] = (!$laFila[0]) ? '{"ERROR": "ERROR DE EJECUCION DE BASE DE DATOS"}' : $laFila[0];
      $laData = json_decode($laFila[0], true);
      if (!empty($laData['ERROR'])) {
         $this->pcError = $laData['ERROR'];
         return false;
      }
      return true;
    }
    
    protected function mxGrabarCodigoAlumno($p_oSql) {
      // Datos Json
      $lcJson = json_encode($this->paData);
      $lcNroDni = $this->paData['CNRODNI'];
      $lcUniAca = $this->paData['CUNIACA'];
      // Valida codigo alumno
      $lcSql = "SELECT cCodAlu FROM A01MALU WHERE cNroDni = '$lcNroDni' AND cUniAca = '$lcUniAca'";
      $R1 = $p_oSql->omExec($lcSql);
      $laFila = $p_oSql->fetch($R1);
      if (!empty($laFila[0])) {
         $this->paData['CCODALU'] = $laFila[0];
         return true;
      }
      // Genera codigo alumno unidad academica
      $lcSql = "SELECT P_A01MALU_1('$lcJson')";
      //echo '<br>'.$lcSql.'<br>';
      $R1 = $p_oSql->omExec($lcSql);
      $laFila = $p_oSql->fetch($R1);
      $laFila = (!$laFila[0]) ? '{"ERROR": "ERROR DE EJECUCION DE BASE DE DATOS"}' : $laFila;
      $laData = json_decode($laFila[0], true);
      $this->pcError = $laData['ERROR'];
      if (!empty($this->pcError)) {
         return false;
      }
      $this->paData['CCODALU'] = $laData['CCODALU'];
      return true;
    }
    
    
    protected function mxGrabarPago($p_oSql) {      
      // Genera PAGO INSTITUTO DE INFORMATICA
      $lcJson = json_encode($this->paData);
      $lcSql = "SELECT P_B01DPAG_1('$lcJson')";
      
      //echo '<br>'.$lcSql.'<br>';
      $R1 = $p_oSql->omExec($lcSql);
      $laFila = $p_oSql->fetch($R1);
      $laFila = (!$laFila) ? '{"ERROR": "ERROR DE EJECUCION DE BASE DE DATOS"}' : $laFila;
      $laData = json_decode($laFila[0], true);
      $this->pcError = $laData['ERROR'];
      if (!empty($this->pcError)) {
         return false;
      }
      return true;
    }
    
    
    
    protected function mxGrabarDatosOLD($p_oSql) {
      // Datos Json
      $lcCodAlu ='*';
      $lcJson = json_encode($this->paData);
      $lcNroDni = $this->paData['CNRODNI'];
      $lcUniAca = $this->paData['CUNIACA'];
      // Valida codigo alumno confucio
      $lcSql = "SELECT cCodAlu FROM A01MALU WHERE cNroDni = '$lcNroDni' AND cUniAca = '$lcUniAca'";
      $R1 = $p_oSql->omExec($lcSql);
      $laFila = $p_oSql->fetch($R1);
      if (isset($laFila[0])) {
         $lcCodAlu = $laFila[0];
      }
      // Actualiza datos de persona
      $lcSql = "SELECT P_S01MPER_2('$lcJson')";
      $R1 = $p_oSql->omExec($lcSql);
      $laFila = $p_oSql->fetch($R1);
      $laFila = (!$laFila[0]) ? '{"ERROR": "ERROR DE EJECUCION DE BASE DE DATOS"}' : $laFila;
      $laData = json_decode($laFila[0], true);
      if (!empty($laData['ERROR'])) {
         $this->pcError = $laData['ERROR'];
         return false;
      }
      // Si codigo alumno confucio ya existe retorna
      if ($lcCodAlu != '*') {
         return true;
      }
      // Genera codigo alumno unidad academica
      $lcSql = "SELECT P_A01MALU_1('$lcJson')";
      $R1 = $p_oSql->omExec($lcSql);
      $laFila = $p_oSql->fetch($R1);
      $laFila = (!$laFila[0]) ? '{"ERROR": "ERROR DE EJECUCION DE BASE DE DATOS"}' : $laFila;
      $laData = json_decode($laFila[0], true);
      $this->pcError = $laData['ERROR'];
      if (!empty($this->pcError)) {
         return false;
      }
      
      $this->paData['CCODALU'] = $laData['CCODALU'];
      
      $lcJson = json_encode($this->paData);
      // Genera PAGO INSTITUTO DE INFORMATICA
      $lcSql = "SELECT P_B01DPAG_1('$lcJson')";
      //echo $lcSql;die;
      $R1 = $p_oSql->omExec($lcSql);
      $laFila = $p_oSql->fetch($R1);
      $laFila = (!$laFila[0]) ? '{"ERROR": "ERROR DE EJECUCION DE BASE DE DATOS"}' : $laFila;
      $laData = json_decode($laFila[0], true);
      $this->pcError = $laData['ERROR'];
      if (!empty($this->pcError)) {
         return false;
      }
      return true;
    }
   
   protected function mxValGrabarDatosAlumno () {
     if (empty($this->paData['CNRODNI'])) {
        $this->pcError = "ERROR DNI NO DEFINIDO";
        return false;
     } elseif (empty($this->paData['CEMAIL'])) {
        $this->pcError = "ERROR EMAIL NO DEFINIDO";
        return false;
     } elseif (empty($this->paData['CNROCEL'])) {
        $this->pcError = "ERROR NRO. CELULAR NO DEFINIDO";
        return false;
     }
     return true;
   }
   //----- FIN FUNCION GRABAR DATOS PERSONALES ALUMNO
   
   
   // SESION ALUMNO --- Funcion INIT Matricula Alumno
   public function omInitMatriculaAlumno() {
      $loSql = new CSql();
      $llOk = $loSql->omConnect();
      if (!$llOk) {
         $this->pcError = $loSql->pcError;
         return false;
      }
      
      $llOk = $this->mxInitMatriculaAlumno($loSql);
      if (!$llOk) {
         $loSql->rollback();
      }
      return $llOk;
   }
   
   private function mxInitMatriculaAlumno($p_oSql) {
      $lcCodAlu = null;
      $lcNroDni = $this->paData['CNRODNI'];
      $lcUniAca = $this->paData['CUNIACA'];
      // Valida codigo alumno unidad academica
      $lcSql = "SELECT cCodAlu FROM A01MALU WHERE cNroDni = '$lcNroDni' AND cUniAca = '$lcUniAca'";
      $RS = $p_oSql->omExec($lcSql);
      $laFila = $p_oSql->fetch($RS);
      if (empty($laFila[0])) {
         $this->pcError = "ALUMNO NO EXISTE EN UNIDAD ACADEMICA";
         return false;
      } 
      $lcCodAlu = $laFila[0];
      $lcJson = json_encode($this->paData);
      // Cursos que puede llevar alumno
      $lcSql = "SELECT cIdRela, cNomCur, TRIM(cNomDoc), TRIM(cDesHor), cAula, cSecGru FROM F_A02MCAR_3('$lcJson')";
      //echo $lcSql;die;
      $R1 = $p_oSql->omExec($lcSql);
      $i = 0;
      while ($laFila = $p_oSql->fetch($R1)) {
         if (empty($laFila[0])) {
            continue;
         }
         if ($laFila[2] === '* SIN ASIGNAR') {
            $laFila[2] = 'S/D';
         }
         if ($laFila[3] === '* SIN HORARIO DEFINIDO') {
            $laFila[3] = 'S/H';
         }
         $this->paDatos[] = ['CIDRELA' => $laFila[0], 'CNOMCUR' => $laFila[1], 'CNOMDOC' => $laFila[2],
                             'CDESHOR' => $laFila[3], 'CAULA' => $laFila[4],   'CSECGRU' => $laFila[5]];
         $i++;
      }
      if ($i == 0) {
         $this->pcError = "NO TIENE CURSOS PARA LLEVAR";
         return false;
      }
      $this->paData['CCODALU'] = $lcCodAlu;
      return true;
   }
   
   //----- FIN FUNCION INIT MATRICULA ALUMNO
   
   
   // SESION ALUMNO --- Funcion Grabar Matricula Alumno
   public function omGrabarMatriculaAlumno () {
      $llOk = $this->mxValGrabarMatriculaAlumno();
      if (!$llOk) {
         return false;
      }
      $loSql = new CSql();
      $llOk = $loSql->omConnect();
      if (!$llOk) {
         $this->pcError = $loSql->pcError;
         return false;
      }
      $llOk = $this->mxGrabarMatriculaAlumno($loSql);
      if (!$llOk) {
         $loSql->rollback();
      }
      $loSql->omDisconnect();
      return $llOk;
   }
   
   protected function mxGrabarMatriculaAlumno($p_oSql) {
      $lcJson = json_encode($this->paData);
      //Procedimiento Verifica Pago de Matricula(3) (Ins. Informatica)
      $lcSql = "SELECT P_A01PMAT_3('$lcJson')";
      //echo $lcSql;
      $RS = $p_oSql->omExec($lcSql);
      $laFila = $p_oSql->fetch($RS);
      $laFila = (!$laFila[0]) ? '{"ERROR": "ERROR DE EJECUCION DE BASE DE DATOS"}' : $laFila;
      $this->paData = json_decode($laFila[0], true);
      if (!empty($this->paData['ERROR'])) {
         $this->pcError = $this->paData['ERROR'];
         return false;
      }
      return true;
   }

   private function mxValGrabarMatriculaAlumno () {
      if (empty($this->paData['CCODUSU'])) {
         $this->pcError = "CODIGO DE USUARIO NO DEFINIDO.";
         return false;
      } elseif (empty($this->paData['CCODALU'])) {
         $this->pcError = "CODIGO DE ALUMNO NO DEFINIDO.";
         return false;
      } elseif (empty($this->paData['CIDRELA'])) {
         $this->pcError = "ID DE RELACION DE CARGA NO DEFINIDO.";
         return false;
      }
      return true;
   }
   //FIN FUNCION GRABAR MATRICULA ALUMNO
   

   // SESION ALUMNO --- Funcion INIT CONSULTA Alumno
   public function omInitConsultaAlumno(){
      $llOk = $this->mxValConsultaAlumno();
      if (!$llOk) {
         return false;
      } 
      $loSql = new CSql();
      $llOk = $loSql->omConnect();
      if (!$llOk) {
         $this->pcError = $loSql->pcError;
         return false;
      }
      $llOk = $this->mxInitConsultaAlumno($loSql);
      if (!$llOk) {
         $loSql->rollback();
      }
      $loSql->omDisconnect();
      return $llOk;
      
   }
   public function mxInitConsultaAlumno($p_oSql){
      //MODIFICAR CON PROD ALMACENADO
      return true;
      //------
      $lcJson = json_encode($this->paData);
      $lcSql = "SELECT * FROM ----FUNCTION----('$lcJson')";
      $RS = $p_oSql->omExec($lcSql);
      if (!isset($RS) || empty($RS)) {
         $this->pcError = "ERROR AL EJECUTAR COMANDO BASE DE DATOS";
         return false;
      } 
      $laFila = $p_oSql->fetch($RS);
      $this->paData = json_decode($laFila[0]);
      $this->pcError = $this->paData->{'ERROR'};
      if (!empty($this->pcError)) {
         return false;
      }
      $this->paData = ['CCODALU'=>$lcJson->{'CCODALU'}, 'DNACIMI'=>$lcJson->{'DNACIMI'},
                  'CNROCEL'=>$lcJson->{'CNROCEL'}, 'CDIRECC'=>$lcJson->{'CDIRECC'},
                  'CEMAIL'=>$lcJson->{'CEMAIL'}];
      return true;
   }
   protected function mxValConsultaAlumno(){
      if (!isset($this->paData['CCODALU']) || empty($this->paData['CCODALU']) || $this->paData['CCODALU'] === '*') {
         $this->pcError = "CODIGO DE ALUMNO NO DEFINIDO.";
         return false;
      }
      return true;
   }
   
   public function omIniciarSesionIP() {
      if (empty($this->paData['CIPCONE'])) {
         $this->pcError = "IP DE CONEXIÓN NO DEFINIDA";
         return false;
      }
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
      $llOk = $this->mxIniciarSesionIP($loSql);
      if (!$llOk) {
         return false;
      }
      $llOk = $this->mxIniciarSesion($loSql);
      $loSql->omDisconnect();
      return $llOk;
   }
   
   protected function mxIniciarSesionIP($p_oSql){
      $lcTermIp = $this->paData['CIPCONE'];
      $lcUniAca = $this->paData['CUNIACA'];
      $lcSql = "SELECT cTermIp FROM S01TTER WHERE CCODOFI IN ('00','$lcUniAca') ORDER BY cTermId";
      $R1 = $p_oSql->omExec($lcSql);
      if (empty($R1)) {
         $this->pcError = "ERROR AL EJECUTAR COMANDO BASE DE DATOS";
         return false;
      }
      $i = 0;
      while ($laFila = $p_oSql->fetch($R1)) {
         if (strpos($lcTermIp, $laFila[0]) !== false) {
            return true;
         }
         $i = $i + 1;
      }
      if ($i == 0) {
         $this->pcError = "NO EXISTE UNA LISTA DE CONEXIÓN PREDEFINIDA";
         return false;
      }
      $this->pcError = "LA IP NO PERTENECE A LA RED PERMITIDA";
      return false;
   }
   
}
?>
