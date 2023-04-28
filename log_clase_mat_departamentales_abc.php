<?php
require("log_config.inc.php");
class Conexion  // se declara una clase para hacer la conexion con la base de datos
{
	var $con; 
	function Conexion()
		   	 
	{
		 
		// se definen los datos del servidor de base de datos 
		$conection['server']=DB_SERVER;  //host
		$conection['user']=DB_USER;         //  usuario
		$conection['pass']=DB_PASS;		//password
		$conection['base']=DB_PRUEBA;			//base de datos
		
		
		// crea la conexion pasandole el servidor , usuario y clave
		$conect= mysql_pconnect($conection['server'],$conection['user'],$conection['pass']);


			
		if ($conect) // si la conexion fue exitosa , selecciona la base
		{
			mysql_select_db($conection['base']);			
			$this->con=$conect;
		}
	}
	function getConexion() // devuelve la conexion
	{
		return $this->con;
	}
	function Close()  // cierra la conexion
	{
		mysql_close($this->con);
	}	

}




class sQuery   // se declara una clase para poder ejecutar las consultas, esta clase llama a la clase anterior
{

	var $pconeccion;
	var $pconsulta;
	var $resultados;
	function sQuery()  // constructor, solo crea una conexion usando la clase "Conexion"
	{
		$this->pconeccion= new Conexion();
	}
	function executeQuery($cons)  // metodo que ejecuta una consulta y la guarda en el atributo $pconsulta
	{
		$this->pconsulta= mysql_query($cons,$this->pconeccion->getConexion());
		return $this->pconsulta;
	}	
	function getResults()   // retorna la consulta en forma de result.
	{return $this->pconsulta;}	
	
	function Close()		// cierra la conexion
	{$this->pconeccion->Close();}	
	
	function Clean() // libera la consulta
	{mysql_free_result($this->pconsulta);}
	
	function getResultados() // debuelve la cantidad de registros encontrados
	{return mysql_affected_rows($this->pconeccion->getConexion()) ;}
	
	function getAffect() // devuelve las cantidad de filas afectadas
	{return mysql_affected_rows($this->pconeccion->getConexion()) ;}
}




class mat_departamentales	 
{
	var $clave_Materia;     //se declaran los atributos de la clase, que son los atributos del cliente
	var $nombre_materia;
	var $dia_aplicacion_ord;
	Var $dia_aplicacion_ext;
	
	function mat_departamentales($nro=0) // declara el constructor, si trae el numero de cliente lo busca , si no, trae todos los clientes
	{
		if ($nro!=0)
		{
			$obj_Materia=new sQuery();
			$result=$obj_Materia->executeQuery("select * from catalogo_materias_depa where cve_mat = $nro"); // ejecuta la consulta para traer al cliente 
			$row=mysql_fetch_array($result);
			$this->clave_Materia=$row['cve_mat']; 
			$this->nombre_materia=$row['materia'];
			$this->dia_aplicacion_ord=$row['dia_aplicacion_ord'];
			$this->dia_aplicacion_ext=$row['dia_aplicacion_ext'];	
		

		}
	}
	function getMaterias() // este metodo podria no estar en esta clase, se incluye para simplificar el codigo, lo que hace es traer todos los clientes 
		{
			$obj_Materia=new sQuery();
			$result=$obj_Materia->executeQuery("select * from catalogo_materias_depa"); // ejecuta la consulta para traer al cliente 
			return $result; // retorna todos los clientes
		}
		
		// metodos que devuelven valores
	function getclave_Materia()
	 { return $this->clave_Materia;}
	
	function getnombre_materia()
	 { return $this->nombre_materia;}
	
	function getdia_aplicacion_ord()
	 { return $this->dia_aplicacion_ord;}
	
	function getdia_aplicacion_ext()
	 { return $this->dia_aplicacion_ext;}
	
	 // metodos que setean los valores
	function setclaveMateria($val)
	 { $this->clave_Materia=$val;}
	function setnombre_materia($val)
	 {  $this->nombre_materia=$val;}
	function setdia_aplicacion_ord($val)
	 {  $this->dia_aplicacion_ord=$val;}
	function setdia_aplicacion_ext($val)
	 {  $this->dia_aplicacion_ext=$val;}

	function updateMateria()	// actualiza el cliente cargado en los atributos
	{
			$obj_Materia=new sQuery();
			$query="update catalogo_materias_depa set cve_mat='$this->clave_Materia', materia = '$this->nombre_materia', dia_aplicacion_ord='$this->dia_aplicacion_ord', dia_aplicacion_ext='$this->dia_aplicacion_ext' where cve_mat=$this->clave_Materia";	
				//print $query;exit;

			$obj_Materia->executeQuery($query); // ejecuta la consulta para traer al cliente 
			return /*$query .*/'<br/>Registros afectados: '.$obj_Materia->getAffect(); // retorna todos los registros afectados
	
	}
	function insertMateria()	// inserta el cliente cargado en los atributos
	{
			$obj_Materia=new sQuery();
			$query="insert into catalogo_materias_depa(cve_mat,materia,dia_aplicacion_ord,dia_aplicacion_ext)
												values
													   ('$this->clave_Materia', '$this->nombre_materia',
													   	'$this->dia_aplicacion_ord','$this->dia_aplicacion_ext')";
			//print $query;exit;
			$obj_Materia->executeQuery($query); // ejecuta la consulta para traer al cliente 
			return /*$query .*/'<br/>Registros afectados: '.$obj_Materia->getAffect(); // retorna todos los registros afectados
	
	}	
	function deleteMateria($val)	// elimina el cliente
	{
			$obj_Materia=new sQuery();
			$query="delete from catalogo_materias_depa where cve_mat=$val";
			$obj_Materia->executeQuery($query); // ejecuta la consulta para  borrar el cliente
			return /*$query .*/'<br/>Registros afectados: '.$obj_Materia->getAffect(); // retorna todos los registros afectados
	
	}	
	
}


?>
