<?php
/**
* Clase para la conexion de la bd
*/
//Para evitar redefinir la clase se pregunta si existe dicha clase
if(class_exists('class_Db') != true)
{
	class class_Db{
		var $db_conn;
		var $db_name;
		var $db_query;

    	//Método mágico que se invoca solo, cuando el objeto se está construyendo
    	//Para este caso, cuando el objeto se está construyendo se conecta a la
    	//Base de Datos
    	function __construct(){

        	//$this->set_db("localhost","asignacionfs","menz95fb3285","asignacionfs_db");
        	$this->set_db("localhost","root","","asignacionfs_db");

    	}

    	function __destruct(){
           $this->close_db();
    	}

    	function set_db ($host,$user,$passwd,$db) {
        	if(!isset($this->db_conn)){
        	$this->db_conn = mysqli_connect($host,$user,$passwd,$db);
		  	//$this->db_conn = @mysql_connect ($host,$user,$passwd);
		  	$this->db_name = $db;
			}
		}

		function close_db () {
			if(isset($db_conn)){
				mysqli_close ($db_conn);
	  		}
		}

		function set_sql ($sql) {
        	$this->db_query = $sql;
    	}
	}
}
?>
