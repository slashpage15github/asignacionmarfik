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




class DiasNoDep
{
	var $id;     //se declaran los atributos de la clase, que son los atributos del cliente
	var $dia;
	var $fecha;
	Var $tipo;
	
	function DiasNoDep($nro=0) // declara el constructor, si trae el numero de cliente lo busca , si no, trae todos los clientes
	{
		if ($nro!=0)
		{
			$obj_dias=new sQuery();
			$result=$obj_dias->executeQuery("select * from parametros_dias_no_departamentales where id = $nro"); // ejecuta la consulta para traer al cliente 
			$row=mysql_fetch_array($result);
			$this->id=$row['id']; 
			$this->dia=$row['dia'];
			$this->fecha=$row['fecha'];
			$this->tipo=$row['tipo'];
			

		}
	}
	function getDiasNoDep() // este metodo podria no estar en esta clase, se incluye para simplificar el codigo, lo que hace es traer todos los clientes 
		{
			$obj_dias=new sQuery();
			$result=$obj_dias->executeQuery("select * from parametros_dias_no_departamentales"); // ejecuta la consulta para traer al cliente 
			return $result; // retorna todos los clientes
		}
		
		// metodos que devuelven valores
	function getId()
	 { return $this->id;}
	
	function getDias()
	 { return $this->dia;}
	
	function getFecha()
	 { return $this->fecha;}
	
	function getTipo()
	 { return $this->tipo;}
	 
		// metodos que setean los valores
	 function setId($val)
	 {  $this->id=$val;}
	function setDias($val)
	 {  $this->dia=$val;}
	function setFecha($val)
	 {  $this->fecha=$val;}
	function setTipo($val)
	 {  $this->tipo=$val;}

	function updateDias()	// actualiza el cliente cargado en los atributos
	{
			$obj_dias=new sQuery();
			$query="update parametros_dias_no_departamentales set id='$this->id',dia='$this->dia',fecha='$this->fecha', tipo='$this->tipo' where id = $this->id";
			//print $query;exit;
			
			$obj_dias->executeQuery($query); // ejecuta la consulta para traer al cliente 
			return /*$query .*/'<br/>Registros afectados: '.$obj_dias->getAffect(); // retorna todos los registros afectados
	
	}
	function insertDias()	// inserta el cliente cargado en los atributos
	{
			$obj_dias=new sQuery();
			$query="insert into parametros_dias_no_departamentales(id,dia,fecha,tipo)values('$this->id','$this->dia', '$this->fecha','$this->tipo')";
			//print $query;exit;
			$obj_dias->executeQuery($query); // ejecuta la consulta para traer al cliente 
			return /*$query .*/'<br/>Registros afectados: '.$obj_dias->getAffect(); // retorna todos los registros afectados
	
	}	
	function deleteDias($val)	// elimina el cliente
	{
			$obj_dias=new sQuery();
			$query="delete from parametros_dias_no_departamentales where id=$val";
			$obj_dias->executeQuery($query); // ejecuta la consulta para  borrar el cliente
			return /*$query .*/'<br/>Registros afectados: '.$obj_dias->getAffect(); // retorna todos los registros afectados
	
	}	
	
}


?>