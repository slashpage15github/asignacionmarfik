<?php
	require("log_config.inc.php");
	//se declara una clase para hacer la conexión con la BD
	class Conexion {
		var $con;

		function Conexion() {
			// se definen los datos del servidor de la BD
			//host
			$conection['server']=DB_SERVER;
			//usuario
			$conection['user']=DB_USER;
			//contraseña
			$conection['pass']=DB_PASS;
			//base de datos
			$conection['base']=DB_PRUEBA;
			//crea la conexión pasandole el servidor, usuario y contraseña
			$conect= mysql_pconnect($conection['server'],$conection['user'],$conection['pass']);
			//si la conexión fue exitosa, selecciona la base de datos
			if ($conect) {
				mysql_select_db($conection['base']);
				$this->con=$conect;
			}
		}
	
		//método que devuelve la conexión
		function getConexion() {
			return $this->con;
		}

		//método que cierra la conexión
		function Close() {
			mysql_close($this->con);
		}
	}


	//se declara una clase para poder ejecutar las consultas. Esta clase llama a la clase anterior
	class sQuery {
		var $pconeccion;
		var $pconsulta;
		var $resultados;

		//método constructor, sólo crea una conexión usando la clase "Conexion"
		function sQuery() {
			$this->pconeccion= new Conexion();
		}

		//método que ejecuta una consulta y la guarda en el atributo $pconsulta
		function executeQuery($cons) {
			$this->pconsulta= mysql_query($cons,$this->pconeccion->getConexion());
			return $this->pconsulta;
		}

		//método que retorna la consulta en forma de result
		function getResults() {
			return $this->pconsulta;
		}

		//método que cierra la conexión
		function Close() {
			$this->pconeccion->Close();
		}

		//método que libera la consulta
		function Clean() {
			mysql_free_result($this->pconsulta);
		}

		//método que devuelve la cantidad de registros encontrados
		function getResultados() {
			return mysql_affected_rows($this->pconeccion->getConexion()) ;
		}

		//método que devuelve las cantidad de filas afectadas
		function getAffect() {
			return mysql_affected_rows($this->pconeccion->getConexion()) ;
		}
	}


	class GrupoE {
		//se declaran los atributos de la clase, que son los atributos del 'cliente'
		var $clave; 
		var $grupo;
		var $expediente; 
		var $maestro; 
		var $materia; 
		var $fecha_extra;
		var $dia_extra; 
		var $horai_extra; 
		var $horaf_extra; 
		var $aula_extra; 

		//método constructor, consulta por matricula
		function GrupoE($exp=0,$cve=0,$gpo="") {

			// se cambio matric por mater
			if ($exp!=0) {
				$obj_materia = new sQuery();

				//ejecuta la consulta para traer la materia
				$result = $obj_materia->executeQuery("SELECT clave, grupo,expediente, maestro,
				materia, dia_extra, fecha_extra, horai_extra, horaf_extra, aula_extra FROM gruposmaestros WHERE clave='$cve' AND grupo='$gpo' AND expediente='$exp'");
				$row = mysql_fetch_array($result);
				
				$this->clave = $row['clave'];
				$this->grupo = $row['grupo'];
				$this->expediente = $row['expediente'];
				$this->maestro = $row['maestro'];
				$this->materia = $row['materia'];
				$this->dia_extra = $row['dia_extra'];
				$this->fecha_extra = $row['fecha_extra'];
				$this->horai_extra = $row['horai_extra'];
				$this->horaf_extra = $row['horaf_extra'];
				$this->aula_extra = $row['aula_extra'];
				
			}

		}
				
		//este método no es necesario, sin embargo, se incluye para simplificar el código. Lo que hace es traer todos los 'clientes'
		/*
		function getGruposE() {
			$obj_materia = new sQuery();
			//ejecuta la consulta para traer al 'cliente'
			$result = $obj_materia->executeQuery("SELECT  grupo, maestro, materia, dia_extra, fecha_extra, horai_extra, horaf_extra, aula_extra FROM gruposmaestros");
			//retorna a todos los 'clientes'
			return $result;
		}

		//los siguientes métodos, son los que devuelven valores

*/
		function getClave() {
			return $this->clave;
		}

		function getGrupo() {
			return $this->grupo;
		}

		function getExpediente() {
			return $this->expediente;
		}


		function getMaestro() {
			return $this->maestro;
		}

		function getMateria() {
			return $this->materia;
		}

		function getDiaExtra() {
			return $this->dia_extra;
		}

		function getFechaExtra() {
			return $this->fecha_extra;
		}

		function getHoraiExtra() {
			return $this->horai_extra;
		}

		function getHorafExtra() {
			return $this->horaf_extra;
		}

		function getAulaExtra() {
			return $this->aula_extra;
		}

		//los siguientes métodos, son los que asignan valores		
		function setFechaExtra($val) {
			$this->fecha_extra = $val;
		}

		function setDiaExtra($val) {
			$this->dia_extra = utf8_decode($val);
		}

		function setHoraiExtra($val) {
			$this->horai_extra = $val;
		}

		function setHorafExtra($val) {
			$this->horaf_extra = $val;
		}

		function setAulaExtra($val) {
			$this->aula_extra = utf8_decode($val);
		}


		//método que actualiza el 'cliente' cargado en los atributos
		function updateGrupoExtra() {
			$obj_grupo = new sQuery();
			$obj_alumnos= new sQuery();
			$query_gpo = "update gruposmaestros set fecha_extra='$this->fecha_extra',dia_extra='$this->dia_extra', horai_extra='$this->horai_extra', horaf_extra='$this->horaf_extra', aula_extra='$this->aula_extra' where clave=$this->clave and grupo='$this->grupo' and expediente=$this->expediente;";
			$query_alu="update alumnos set fecha_extra='$this->fecha_extra',dia_extra='$this->dia_extra', horai_extra='$this->horai_extra', horaf_extra='$this->horaf_extra', aula_extra='$this->aula_extra' where clave=$this->clave and grupo='$this->grupo' and expediente=$this->expediente;";
			
			//print $query_gpo.'<br>';
			//print $query_alu;
			//exit;
			//ejecuta la consulta para traer al 'cliente'

			$obj_grupo->executeQuery($query_gpo);
			$affect_grupo=$obj_grupo->getAffect();
			$obj_alumnos->executeQuery($query_alu);
			$affect_alu=$obj_alumnos->getAffect();
			//regresa todos los registros afectados
			return '<span style="color:red;"><br/>Grupos Actualizados: ' .$affect_grupo.
			'<br/>Alumnos Actualizados: ' .$affect_alu.'</span>';
		}


	}
?>