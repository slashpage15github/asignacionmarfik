<?php
	
	require 'conexiondatatable.php';

	$matricula=$_POST['matricula'];
	$id_especial = $_POST['id_especial'];
	$cve_mat = $_POST['cve_mat'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
//    $estatus = $_POST['estatus'];
//    $grado = $_POST['grado'];
    $carrera = $_POST['clave'];
//	$nombre = $_POST['nombre'];
	//$observaciones = $_POST['observaciones'];

	
//echo $matricula.'-'.$cve_mat.'-'.$carrera; 
include('class/class_especiales_dal.php');

$obj = new especiales_dal();
$num_sol_mat_mate_car = $obj -> existe_matricula_materia_carrera($matricula,$cve_mat,$carrera);

//echo $num_sol_mat_mate_car;exit;

if ($num_sol_mat_mate_car==0){

	$sql = "UPDATE veranos SET cve_mat='$cve_mat', email='$email', telefono='$telefono' WHERE id_especial = '$id_especial'";
	$resultado = mysqli_query($conexion,$sql);
	if($resultado){
		header('location: consulta_especiales.php');
            } else {
                echo '<script type="text/javascript">';
                echo 'alert("Error: No se pudo actualizar el registro.")';
                echo '</script>';
               header('location: consulta_especiales.php');
            }
}
else{
		echo '<script type="text/javascript">';
        echo 'alert("Error: Intenta registrar una materia que ya tiene solicitada .");window.history.back()';
        
        echo '</script>';
        //header('location: consulta_especiales.php');	

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
					
					<a href="cambios_especiales.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>-->
