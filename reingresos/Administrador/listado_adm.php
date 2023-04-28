<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/miestilo.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>busquedas Registro</title>
</head>
<body>
<div class="row">
<?php include "menu_adm.php"; ?>
</div>
	<h2>Formulario de búsqueda de registros por Matricula</h2>
<p>Ingrese la matricula a buscar</p>

<div class="container">	
	<form action="" method="get" accept-charset="utf-8" >

	<div class="row">
		<div class="col-25">
			<label for="lmatricula"> Puede ver </label>
		</div>
		<div class="col-75">
			<input type="SUBMIT" id="datos" name="datos" value="Mostrar Datos">
		</div>
	</div>	

	</form>
</div> <!-- end class=container -->
</body>
<script src="js/funciones_js.js"></script>
</html>