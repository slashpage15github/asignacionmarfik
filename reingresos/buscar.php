<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/miestilo.css">
	<title></title>
		<?php include "menu.php";?>

</head>
<body>


<h1>Formulario de Reingresos - Consulta de datos en el registro</h1>


<div class="container">

	<form action="" method="post" accept-charset="utf.g" onsubmit="return valida_campos();" 
	>
	<input type="text" id="istatus" name="istatus" hidden value="1">

	<div class="row">
		<div class="col-25">
			<label for="Imatricula">Matricula:</label>
		</div>
		<div class="col-75">
			<input type="text" id="imatricula" name="imatricula" value="<?=$ematricula; ?>" readonly="true">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lnombre">Nombre:</label>
		</div>
		<div class="col-75">
			<input type="text" id="inombre" name="inombre" maxlength="30" value="<?=$enombre; ?>" readonly="true">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lgrado">Grado:</label>
		</div>
		<div class="col-75">
			<input type="text" id="igrado" name="igrado" maxlength="30" value="<?=$egrado; ?>"readonly="true">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lcarrera">Carrera:</label>
		</div>
		<div class="col-75">
			<input type="text" id="icarrera" name="icarrera"  value="<?=$ecarrera.' - '.$nombre_plan; ?>" readonly="true">
		</div>
	</div>	

	<div class="row">
		<div class="col-25">
			<label for="lobservacion">Observacion:</label>
		</div>
		<div class="col-75">
			<input type="text" id="iobservacion" name="iobservacion"  value="<?=$eobservacion; ?>" readonly="true">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="ltelefono">Telefono:</label>
		</div>
		<div class="col-75">
			<input type="tel" pattern="[0-9]{10}" id="itelefono"
			name="itelefono" maxlength="10" readonly="true" value="<?=$etelefono; ?>">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lemail">Email:</label>
		</div>
		<div class="col-75">
			<input type="text" id="iemail" name="iemail" readonly="true" maxlength="30"
			value="<?=$eemail; ?>">
			
		</div>
	</div>


</form>
<button class="bottom-back" onclick="goBack()"> Regresar</button>
</div>


<script type="text/javascript" src="js/function.js"></script>
</body>
</html>

<script>
  function goBack(){
  window.location.href = "mat.php";
}
</script>