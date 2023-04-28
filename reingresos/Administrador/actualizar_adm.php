<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="../css/miestilo.css">
	<title></title>
		<?php include "menu_adm.php";?>

</head>
<body>


<h1>Formulario de Reingresos-Para Respuesta de Control Escolar</h1>


<div class="container">

	<form action="actualiza_datos_adm.php" method="post"
	accept-charset="utf.g" onsubmit="return valida_campos();">
	<div class="row">
		<div class="col-25">
			<label for="Imatricula">Matricula:</label>
		</div>
		<div class="col-75">
			<input type="text" id="imatricula" name="imatricula" value="<?=$ematricula; ?>" readonly="true" maxlength="13">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lnombre">Nombre:</label>
		</div>
		<div class="col-75">
			<input type="text" id="inombre" name="inombre" maxlength="30" readonly="true" value="<?=$enombre; ?>" >
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lgrado">Grado:</label>
		</div>
		<div class="col-75">
			<input type="text" id="igrado" name="igrado" maxlength="30" readonly="true" value="<?=$egrado; ?>">
		</div>
	</div>

  <div class="row">
		<div class="col-25">
			<label for="lcarrera">Carrera</label>
		</div>
		<div class="col-75">
			<select disabled  name="scarrera"  readonly="true" id="scarrera"  style="color:black;">
				<option value="0">Seleccione la Carrera:</option>
				<option value="828" <?php if($ecarrera =='828') { echo 'selected="selected"';} ?>>INGENIERIA EN SISTEMAS COMPUTACIONALES</option>
				<option value="754" <?php if($ecarrera =='754') { echo 'selected="selected"';} ?>>INGENIERIA EN TECNOLOGIAS DE LA INFORMACION</option>
				<option value="827" <?php if($ecarrera =='827') { echo 'selected="selected"';} ?>>INGENIERIA EN ELECTRONICA Y COMUNICACIONES</option>
				<option value="851" <?php if($ecarrera =='851') { echo 'selected="selected"';} ?>>INGENIERIA AUTOMOTRIZ</option>
				<option value="820" <?php if($ecarrera =='820') { echo 'selected="selected"';} ?>>INGENIERIA INDUSTRIAL Y DE SISTEMAS</option>
			</select>
		</div>
	</div>	


	<div class="row">
		<div class="col-25">
			<label for="lobervacion">Observacion:</label>
		</div>
		<div class="col-75">
			<input type="text" id="iobservacion" name="iobservacion" maxlength="50" autocomplete="off" value="<?=$eobservacion; ?>">
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
			<input type="text" id="iemail" readonly="true" name="iemail" maxlength="30"
			value="<?=$eemail; ?>">
		</div>
	</div>

	<div class="row">
	<div class="boton">
		<input type="submit" value="ACTUALIZAR" >
	</div>
</div>


</form>
</div>
<script type="text/javascript" src="../js/function.js"></script>
</body>
</html>
