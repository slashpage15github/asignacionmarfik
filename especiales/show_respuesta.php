<?php session_start(); ?>
<!DOCTYPE html>
<html>
<?php 
require 'class/conn.php';
$obj = new conectar();
$conexion = $obj->conexion();


$matricula = $_SESSION["session_mat"];

$sql = "SELECT
	e.matricula,
	e.nombre,
	e.carrera,
	e.grado,
	e.estatus,
	e.email,	
	e.telefono,
	e.cve_mat,
	e.id_especial,
	a.materia
FROM
	especiales e
JOIN planes_materias a ON e.carrera = a.cve_plan
AND e.cve_mat = a.clave
WHERE
	e.matricula = '$matricula';";


$result =mysqli_query($conexion, $sql);

?>
<head>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/miestilo.css">
	<!--<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/bootstrap-theme.css" rel="stylesheet">
	<script src="js/bootstrap.min.js"></script>-->
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Respuesta Especiales</title>
	<meta charset="UTF-8">
</head>
<body>
	<div class="row">
	</div>
	<ul class="topnav">
		<li><a href="ver_respuesta.php"> Otra Matrícula </a></li>
		<li><a href="../index.php"> Menú Principal </a></li>
	</ul>
	<h1>Tus Exámenes Especiales &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <img src="images/logo.png"  width="200"></h1>
	<div class="row">
		<div class="table-responsive col-sm-12">
			<table id="mitabla" class="table table-bordered" cellpadding="0" width="100%">
				<thead >
					<tr>
						<th>Respuesta</th>
						<th>Matricula</th>
						<th>Nombre</th>
						<th>Carrera</th>
						<th>Grado</th>
						<th>Estatus</th>
						<th>Email</th>
						<th>Telefono</th>
						<th>Clave de Materia</th>
						<th>Materia</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					while ($mostrar = mysqli_fetch_row($result)) 
					{
						//$mostrar = array_map("utf8_encode",$mostrar);
						//href='ver_respuesta2.php?id_especial=".$mostrar[8]."'
						$mostrar[] = "<td><a class='btn btn-primary' href='ver_respuesta2.php?id_especial=".$mostrar[8]."'>Ver</a></td>";
						?>
						<tr>
							<?php echo $mostrar[10]?>
							<td><?php echo $mostrar[0] ?></td>
							<td charset="utf-8"><?php echo $mostrar[1]; ?></td>
							<td><?php echo $mostrar[2] ?></td>
							<td><?php echo $mostrar[3] ?></td>
							<td><?php echo $mostrar[4] ?></td>
							<td><?php echo $mostrar[5] ?></td>
							<td><?php echo $mostrar[6] ?></td>
							<td><?php echo $mostrar[7] ?></td>
							<td><?php echo utf8_encode($mostrar[9]) ?></td>
						</tr>
						<?php 
					}
					?>
				</tbody>
			</table>
		</div>
	</div> <!-- end class=container -->
	<!-- <script src="js/jquery-3.3.1.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.js"></script>
	<script type="text/javascript"> 
		$(document).ready( function () {
			$('#mitabla').DataTable();
		} );
	</script>-->
	
	<script src="js/bootstrap.min.css.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.js"></script>
</body>
</html>
