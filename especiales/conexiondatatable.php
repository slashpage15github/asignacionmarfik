<?php
	//$server = "localhost";
	//$user = "asignacionfs";
	//$password = "menz95fb3285";
	//$bd = "asignacionfs_db";

	$server = "localhost";
	$user = "root";
	$password = "";
	$bd = "asignacionfs_db";	

	$conexion = mysqli_connect($server,$user,$password,$bd);
	if (!$conexion){
		die('Error de Conexion: ' . mysqli_connect_errno());
	}
?>