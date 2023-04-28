<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Examenes Especiales</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/miestilo_data.css">

<script>
function alerta(id_especial,matricula) {
	
  if(confirm("¿Estas seguro de eliminar el registro?")){
  	//alert(id_especial+'-'+matricula);
  	window.location.href = "delete.php?id_especial="+id_especial+"&matricula="+matricula;
  	//return true;
  }
  else{
  	return false;
  }
}
</script>

</head>
<body>
	<ul class="topnav">
		<li><a href="../index.php"> Menú Principal </a></li>
	</ul>
	<h1> Registro de Examenes Especiales &nbsp &nbsp&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <img src="images/logo.png"  width="200"></h1>
	<div class = "row">
		<div id ="tabla" class= "col-sm-12 col-md-12 col-lg-12">
			<div class="table-responsive col-sm-12">
				<table id="dt_especiales" class="table table-bordered table-hover" cellpadding="0" width="100%">
					<thead>
						<tr>
							<th>Editar</th>
							<th>Eliminar</th>
							<th>Matricula</th>
							<th>Nombre</th>
							<th>Carrera</th>
							<th>Grado</th>
							<th>Estatus</th>
							<th>Email</th>
							<th>Telefono</th>
							<th>Observaciones</th>
							<th>Clave de Materia</th>
							<th>Materia</th>
						</tr>
					</thead>
				</table>
			</div>
		</div>
	</div>
<script src="admin/js/jquery-3.1.1.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="admin/js/bootstrap.min.js"></script>
<script src="js/dataTables.bootstrap.js"></script>
<script src="js/poblardatatable_publico.js"></script>
</body>
</html>