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




class Salon	 
{
	var $salon;     //se declaran los atributos de la clase, que son los atributos del cliente
	var $capacidad;
	var $piso;
	Var $caracteristica;
	
	function Salon($nro=0) // declara el constructor, si trae el numero de cliente lo busca , si no, trae todos los clientes
	{
		if ($nro!=0)
		{
			$obj_salon=new sQuery();
			$result=$obj_salon->executeQuery("select * from capacidadaulas where salon = $nro"); // ejecuta la consulta para traer al cliente 
			$row=mysql_fetch_array($result);
			$this->salon=$row['salon']; 
			$this->capacidad=$row['capacidad'];
			$this->piso=$row['piso'];
			$this->caracteristica=$row['caracteristica'];
			

		}
	}
	function getSalones() // este metodo podria no estar en esta clase, se incluye para simplificar el codigo, lo que hace es traer todos los clientes 
		{
			$obj_salon=new sQuery();
			$result=$obj_salon->executeQuery("select * from capacidadaulas"); // ejecuta la consulta para traer al cliente 
			return $result; // retorna todos los clientes
		}
		
		// metodos que devuelven valores
	function getSalon()
	 { return $this->salon;}
	
	function getCapacidad()
	 { return $this->capacidad;}
	
	function getPiso()
	 { return $this->piso;}
	
	function getCaracteristica()
	 { return $this->caracteristica;}
	 
		// metodos que setean los valores
	 function setSalon($val)
	 {  $this->salon=$val;}
	function setCapacidad($val)
	 {  $this->capacidad=$val;}
	function setPiso($val)
	 {  $this->piso=$val;}
	function setCaracteristica($val)
	 {  $this->caracteristica=$val;}

	function updateSalon()	// actualiza el cliente cargado en los atributos
	{
			$obj_salon=new sQuery();
			$query="update capacidadaulas set capacidad='$this->capacidad',piso='$this->piso',caracteristica='$this->caracteristica' where salon = $this->salon";
			//print $query;exit;
			
			$obj_salon->executeQuery($query); // ejecuta la consulta para traer al cliente 
			return /*$query .*/'<br/>Registros afectados: '.$obj_salon->getAffect(); // retorna todos los registros afectados
	
	}
	function insertSalon()	// inserta el cliente cargado en los atributos
	{
			$obj_salon=new sQuery();
			$query="insert into capacidadaulas(salon,capacidad,piso,caracteristica)values('$this->salon','$this->capacidad', '$this->piso','$this->caracteristica')";
			//print $query;exit;
			$obj_salon->executeQuery($query); // ejecuta la consulta para traer al cliente 
			return /*$query .*/'<br/>Registros afectados: '.$obj_salon->getAffect(); // retorna todos los registros afectados
	
	}	
	function deleteSalon($val)	// elimina el cliente
	{
			$obj_salon=new sQuery();
			$query="delete from capacidadaulas where salon=$val";
			$obj_salon->executeQuery($query); // ejecuta la consulta para  borrar el cliente
			return /*$query .*/'<br/>Registros afectados: '.$obj_salon->getAffect(); // retorna todos los registros afectados
	
	}	
	
}


?>