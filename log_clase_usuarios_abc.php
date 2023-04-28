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




class Usuario	 
{
	var $IDUsuario;     //se declaran los atributos de la clase, que son los atributos del cliente
	var $usuario;
	var $clave;
	Var $nombre_usuario;
	Var $tipo_usuario;
	function Usuario($nro=0) // declara el constructor, si trae el numero de cliente lo busca , si no, trae todos los clientes
	{
		if ($nro!=0)
		{
			$obj_usuario=new sQuery();
			$result=$obj_usuario->executeQuery("select * from usuarios where IDUsuario = $nro"); // ejecuta la consulta para traer al cliente 
			$row=mysql_fetch_array($result);
			$this->IDUsuario=$row['IDUsuario']; 
			$this->usuario=$row['usuario'];
			$this->clave=$row['clave'];
			$this->nombre_usuario=$row['nombre_usuario'];
			$this->tipo_usuario=$row['tipo_usuario'];

		}
	}
	function getUsuarios() // este metodo podria no estar en esta clase, se incluye para simplificar el codigo, lo que hace es traer todos los clientes 
		{
			$obj_usuario=new sQuery();
			$result=$obj_usuario->executeQuery("select * from usuarios"); // ejecuta la consulta para traer al cliente 
			return $result; // retorna todos los clientes
		}
		
		// metodos que devuelven valores
	function getIDUsuario()
	 { return $this->IDUsuario;}
	
	function getUsuario()
	 { return $this->usuario;}
	
	function getClave()
	 { return $this->clave;}
	
	function getNombre_usuario()
	 { return $this->nombre_usuario;}
	
	function getTipo_usuario()
	 { return $this->tipo_usuario;}
	 
		// metodos que setean los valores
	function setUsuario($val)
	 { $this->usuario=$val;}
	function setClave($val)
	 {  $this->clave=$val;}
	function setNombre_usuario($val)
	 {  $this->nombre_usuario=$val;}
	function setTipo_usuario($val)
	 {  $this->tipo_usuario=$val;}

	function updateUsuario()	// actualiza el cliente cargado en los atributos
	{
			$obj_usuario=new sQuery();
			$query="update usuarios set usuario='$this->usuario', clave='$this->clave',nombre_usuario='$this->nombre_usuario',tipo_usuario=$this->tipo_usuario where IDUsuario = $this->IDUsuario";
			//print $query;exit;
			
			$obj_usuario->executeQuery($query); // ejecuta la consulta para traer al cliente 
			return /*$query .*/'<br/>Registros afectados: '.$obj_usuario->getAffect(); // retorna todos los registros afectados
	
	}
	function insertUsuario()	// inserta el cliente cargado en los atributos
	{
			$obj_usuario=new sQuery();
			$query="insert into usuarios(usuario,clave,nombre_usuario,tipo_usuario)values('$this->usuario', '$this->clave','$this->nombre_usuario',$this->tipo_usuario)";
			//print $query;exit;
			$obj_usuario->executeQuery($query); // ejecuta la consulta para traer al cliente 
			return /*$query .*/'<br/>Registros afectados: '.$obj_usuario->getAffect(); // retorna todos los registros afectados
	
	}	
	function deleteUsuario($val)	// elimina el cliente
	{
			$obj_usuario=new sQuery();
			$query="delete from usuarios where IDUsuario=$val";
			$obj_usuario->executeQuery($query); // ejecuta la consulta para  borrar el cliente
			return /*$query .*/'<br/>Registros afectados: '.$obj_usuario->getAffect(); // retorna todos los registros afectados
	
	}	
	
}


?>