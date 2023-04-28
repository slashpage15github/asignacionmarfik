<?php 
session_start();
include('../../protected_sesion.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Examenes Especiales</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="css/buttons.dataTables.min.css">
	<link rel="stylesheet" type="text/css" href="css/miestilo.css">
</head>
<body>
	<ul class="topnav">
		<li><a href="../../index.php"> Menú Principal </a></li>
	</ul>
	<h1>Examenes Especiales &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <img src="images/logo.png"  width="200"></h1>
	<div class = "row">
		<div id ="tabla" class= "col-sm-12 col-md-12 col-lg-12">
			<div class="table-responsive col-sm-12">
				<table id="especiales" class="table table-bordered" cellpadding="0" width="100%">
					<thead>
						<tr>
							<th>Responder</th>
							<th>Eliminar</th>
							<th>Matricula</th>
							<th>Nombre</th>
							<th>Carrera</th>
							<th>Grado</th>
							<th id="estatus">Estatus</th>
							<th>Email</th>
							<th>Telefono</th>
							<th>Observaciones</th>
							<th>Clave de Materia</th>
							<th>Materia</th>
							<th>Fecha</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
<script>

function alerta(id_especial,matricula) {
  if(confirm("¿Estas seguro de eliminar el registro?")){
  	window.location.href = "delete.php?id_especial="+id_especial+"&matricula="+matricula;
  	//return true;
  }
  else{
  	return false;
  }
}	
</script>
<script src="../js/jquery-1.12.3.js"></script>
<script src="../js/jquery.dataTables.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/dataTables.bootstrap.js"></script>
<script src="js/poblardatatable.js"></script>
<script type="text/javascript" src="js/dataTables.buttons.min.js"></script>
	<script type="text/javascript" src="js/buttons.flash.min.js"></script>
	<script type="text/javascript" src="js/jszip.min.js"></script>
	<script type="text/javascript" src="js/pdfmake.min.js"></script>
	<script type="text/javascript" src="js/vfs_fonts.js"></script>
	<script type="text/javascript" src="js/buttons.html5.min.js"></script>
	<script type="text/javascript" src="js/buttons.print.min.js"></script>

</body>
</html>