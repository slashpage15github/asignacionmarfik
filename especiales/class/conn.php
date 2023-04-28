<?php 
	class conectar{
		public function conexion(){
//$conexion=mysqli_connect("localhost","asignacionfs","menz95fb3285","asignacionfs_db");
$conexion=mysqli_connect("localhost","root","","asignacionfs_db");			
			return $conexion;
		}
	}
 ?>