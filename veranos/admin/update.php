<?php
	
	require 'conexion.php';
	
	$id_especial = $_POST['id_especial'];
//	$cve_mat = $_POST['cve_mat'];
//    $email = $_POST['email'];
//    $telefono = $_POST['telefono'];
//    $estatus = $_POST['estatus'];
//    $grado = $_POST['grado'];
//    $carrera = $_POST['carrera'];
//	$nombre = $_POST['nombre'];
	$observaciones = utf8_decode($_POST['observaciones']);

	
	$sql = "UPDATE veranos SET observaciones='$observaciones' WHERE id_especial = '$id_especial'";
	$resultado = $mysqli->query($sql);
	if($resultado){
		header('location: index.php');
            } else {
                echo '<script type="text/javascript">';
                echo 'alert("Error: No se pudo actualizar el registro.")';
                echo '</script>';
               header('location: index.php');
            }
?>

<!--<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					<?php if($resultado) { ?>
						<h3>REGISTRO MODIFICADO</h3>
						<?php } else { ?>
						<h3>ERROR AL MODIFICAR</h3>
					<?php } ?>
					
					<a href="index.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>-->
