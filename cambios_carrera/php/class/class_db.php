<?php

if(class_exists('class_db') != true){
  class	class_db{
      var $db_conn;
      var $db_name;
      var $db_query;



  	function __construct(){
  		//$this->set_db("localhost","asignacionfs","menz95fb3285","asignacionfs_db");
      $this->set_db("localhost","root","","asignacionfs_db");      
      //echo (mysqli_connect_errno());
  	}

  	function __destruct(){
  		$this -> close_db();
  	}

  	function set_db($server,$user,$password,$db){
  		if(!isset($this->db_conn)){
        try{

          if($this->db_conn = @mysqli_connect($host,$user,$password,$db)){
            //@ con este comidin no se muestra el mensaje del sistema, suprime el warning message.
           // echo 'Conexion exitosa';
           
          }
          else
           {
            throw new Exception('No se puede conectar a la base de datos');
          }
          }
          catch (Exception $e){
            echo 'Exception capturada: ', $e->getMessage(),"\n";
          }
        }
      }

    function close_db(){
    	if(!isset($this->db_conn)){
    		mysqli_close($db_conn);
    	}
     }
    	function set_sql($sql){
    		$this ->db_query=$sql;
    	}
    }
  }
  ?>
