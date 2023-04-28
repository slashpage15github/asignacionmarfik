<?php  //esta clase será heredada en todas 
	if (class_exists('class_db')!=true) {  //si la clase existe ya no lo carga 
		class class_db{
			var $db_conn;
			var $db_name;  //variables de instancia
			var $db_query;
//
			function __construct(){  //constructor se hace cuando hacemos el new 
				//$this->set_db("localhost","asignacionfs","menz95fb3285","asignacionfs_db");
				$this->set_db("localhost","root","","asignacionfs_db");				
				// parametros son los datos de la base de datos
			}
//destruct libera el objeto y cierra la conexion
			function __destruct(){
				$this->close_db(); // Se usa -> para referenciar metodos
			}
			function set_db($host, $user, $passwd, $db){
				if(!isset($this->db_conn)){  //si no existe 
					try{

						if($this->db_conn=@mysqli_connect($host, $user, $passwd, $db)){

							//echo 'Conexion exitosa';
						}  //mysqli es la nueva version 
						else
						{
							throw new Exception('No se puede conectar a la base de datos');
						}
				}						

				catch (Exception $e){
					echo 'Exception capturada: ' , $e->getMessage() , "\n";
				}
			}
		}
			function close_db(){ 
				if(isset($db_conn)){ //si existe db_conn cierra 
					mysqli_close($db_conn);
				}
			}
			function set_sql($sql){
				$this->db_query=$sql;
			}



		}
	}





?>