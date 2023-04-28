<?php
	
	//$mysqli = new mysqli("localhost","asignacionfs","menz95fb3285","asignacionfs_db");
	$mysqli = new mysqli("localhost","root","","asignacionfs_db");	
	if($mysqli->connect_error){
		
		die('Error en la conexion' . $mysqli->connect_error);
		
	}
?>