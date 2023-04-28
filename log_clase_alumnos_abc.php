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


	class Alumno {
		//se declaran los atributos de la clase, que son los atributos del 'cliente'
		var $matricula; 
		var $alumno; 
		var $clave; 
		var $grupo;
		var $expediente; 
		var $maestro; 
		var $materia; 
		var $fecha_ordi;
		var $dia_ordi; 
		var $horai_ordi; 
		var $horaf_ordi; 
		var $aula_ordi; 

		//método constructor, consulta por matricula
		function Alumno($matric=0,$exp=0,$cve=0,$gpo="") {


			if ($matric!=0) {
				$obj_materia = new sQuery();
				//ejecuta la consulta para traer la materia
				$result = $obj_materia->executeQuery("SELECT matricula,alumno, clave, grupo,expediente, maestro,
				materia, dia_ordi, fecha_ordi, horai_ordi, horaf_ordi, aula_ordi, dia_extra, fecha_extra, 
				horai_extra, horaf_extra, aula_extra FROM alumnos WHERE matricula='$matric' AND clave='$cve' AND
				grupo='$gpo' AND expediente='$exp'");
				$row = mysql_fetch_array($result);
				$this->matricula = $row['matricula'];
				$this->alumno = $row['alumno'];
				$this->clave = $row['clave'];
				$this->grupo = $row['grupo'];
				$this->expediente = $row['expediente'];
				$this->maestro = $row['maestro'];
				$this->materia = $row['materia'];
				$this->dia_ordi = $row['dia_ordi'];
				$this->fecha_ordi = $row['fecha_ordi'];
				$this->horai_ordi = $row['horai_ordi'];
				$this->horaf_ordi = $row['horaf_ordi'];
				$this->aula_ordi = $row['aula_ordi'];
				$this->dia_extra = $row['dia_extra'];
				$this->fecha_extra = $row['fecha_extra'];
				$this->horai_extra = $row['horai_extra'];
				$this->horaf_extra = $row['horaf_extra'];
				$this->aula_extra = $row['aula_extra'];
			}
		}

		//este método no es necesario, sin embargo, se incluye para simplificar el código. Lo que hace es traer todos los 'clientes'
		function getAlumnos() {
			$obj_materia = new sQuery();
			//ejecuta la consulta para traer al 'cliente'
			$result = $obj_materia->executeQuery("SELECT alumno, clave, grupo, maestro, materia, dia_ordi, fecha_ordi, horai_ordi, horaf_ordi, aula_ordi, dia_extra, fecha_extra, horai_extra, horaf_extra, aula_extra FROM alumnos");
			//retorna a todos los 'clientes'
			return $result;
		}

		//los siguientes métodos, son los que devuelven valores
		function getMatricula() {
			return $this->matricula;
		}

		function getAlumno() {
			return $this->alumno;
		}

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

		function getDiaOrdi() {
			return $this->dia_ordi;
		}

		function getFechaOrdi() {
			return $this->fecha_ordi;
		}

		function getHoraiOrdi() {
			return $this->horai_ordi;
		}

		function getHorafOrdi() {
			return $this->horaf_ordi;
		}

		function getAulaOrdi() {
			return $this->aula_ordi;
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

		//los siguientes métodos son los que asignan valores para Ordinarios
		function setFechaOrdi($val) {
			$this->fecha_ordi = $val;
		}

		function setDiaOrdi($val) {
			$this->dia_ordi = utf8_decode($val);
		}

		function setHoraiOrdi($val) {
			$this->horai_ordi = $val;
		}

		function setHorafOrdi($val) {
			$this->horaf_ordi = $val;
		}

		function setAulaOrdi($val) {
			$this->aula_ordi = utf8_decode($val);
		}

		//los siguientes métodos son los que asignan valores para Extraordinarios
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
		function updateAlumnoOrdi() {
			$obj_alumno = new sQuery();
			$query = "update alumnos set fecha_ordi='$this->fecha_ordi',dia_ordi='$this->dia_ordi', 
					horai_ordi='$this->horai_ordi', horaf_ordi='$this->horaf_ordi', aula_ordi='$this->aula_ordi' 
					where matricula=$this->matricula and clave=$this->clave and grupo='$this->grupo' and 
					expediente=$this->expediente";
			//print $query;exit;
			//ejecuta la consulta para traer al 'cliente'
			$obj_alumno->executeQuery($query);
			//regresa todos los registros afectados
			return '<br/>Registros afectados: ' .$obj_alumno->getAffect();
		}

		function updateAlumnoExtra() {
			//echo 'dato:'.$this->aula_extra;exit;
			$obj_materia = new sQuery();
			$query = "update alumnos set fecha_extra='$this->fecha_extra', dia_extra='$this->dia_extra', horai_extra='$this->horai_extra', horaf_extra='$this->horaf_extra', aula_extra='$this->aula_extra' 
				where matricula=$this->matricula and clave=$this->clave and grupo='$this->grupo' and 
				expediente=$this->expediente";
				//echo $query;exit;
			//ejecuta la consulta para traer al 'cliente'
			$obj_materia->executeQuery($query);
			//regresa todos los registros afectados
			return '<br/>Registros afectados: ' .$obj_materia->getAffect();
		}
	}
?>