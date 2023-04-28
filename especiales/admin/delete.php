<?php
	
	require 'conexion.php';
	$id_especial = mysqli_real_escape_string($mysqli,$_GET['id_especial']);
	$matricula = mysqli_real_escape_string($mysqli,$_GET['matricula']);
//echo $id_especial;
//echo $matricula;
//exit;

	
	$sql = "DELETE FROM especiales WHERE id_especial=$id_especial and matricula=$matricula";
	//echo $sql;exit;

	$resultado = $mysqli->query($sql);
	if($resultado){
		header('location: index.php');
            } else {
                echo '<script type="text/javascript">';
                echo 'alert("Error: No se pudo eliminar el registro.")';
				echo 'window.location.href = "index.php"';                
                echo '</script>';
            }
?>