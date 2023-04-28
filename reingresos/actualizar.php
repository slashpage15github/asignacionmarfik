<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/miestilo.css">
	<title></title>
		<?php include "menu.php";?>

</head>
<body>


<h1>Formulario de Reingresos - Para cambio de datos en el registro</h1>


<div class="container">

	<form action="" method="post" accept-charset="utf-8" onsubmit="return valida_campos();" 
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
			<label for="lcarrera">Carrera</label>
		</div>
		<div class="col-75">
			
<?php if($cuantos_alumnos>0) {?>
			<select name="scarrera" id="scarrera" style="color:red;font-size: 17px;font-weight: bold;">

				<option value="0">Seleccione la Carrera:</option>
				<option value="828" <?php if($ecarrera =='828') { echo 'selected="true"';} ?>>828-INGENIERIA EN SISTEMAS COMPUTACIONALES</option>
				<option value="754" <?php if($ecarrera =='754') { echo 'selected="true"';} ?>>754-INGENIERIA EN TECNOLOGIAS DE LA INFORMACION</option>
				<option value="827" <?php if($ecarrera =='827') { echo 'selected="true"';} ?>>827-INGENIERIA EN ELECTRONICA Y COMUNICACIONES</option>
				<option value="851" <?php if($ecarrera =='851') { echo 'selected="true"';} ?>>851-INGENIERIA AUTOMOTRIZ</option>
				<option value="820" <?php if($ecarrera =='820') { echo 'selected="true"';} ?>>820-INGENIERIA INDUSTRIAL Y DE SISTEMAS</option>
			</select>

<?php } else { ?>

			<select name="scarrera" id="scarrera">

				<option value="0">Seleccione la Carrera:</option>
				<option value="828" <?php if($ecarrera =='828') { echo 'selected="true"';} ?>>828-INGENIERIA EN SISTEMAS COMPUTACIONALES</option>
				<option value="754" <?php if($ecarrera =='754') { echo 'selected="true"';} ?>>754-INGENIERIA EN TECNOLOGIAS DE LA INFORMACION</option>
				<option value="827" <?php if($ecarrera =='827') { echo 'selected="true"';} ?>>827-INGENIERIA EN ELECTRONICA Y COMUNICACIONES</option>
				<option value="851" <?php if($ecarrera =='851') { echo 'selected="true"';} ?>>851-INGENIERIA AUTOMOTRIZ</option>
				<option value="820" <?php if($ecarrera =='820') { echo 'selected="true"';} ?>>820-INGENIERIA INDUSTRIAL Y DE SISTEMAS</option>
			</select>
<?php } ?>
		</div>
	</div>	

	<div class="row">
		<div class="col-75">
			<input type="text" hidden id="iobservacion" name="iobservacion"  value="<?=$eobservacion; ?>" readonly="true">
		</div>
	</div>
	<div class="row">
		<div class="col-25">
			<label for="ltelefono">Telefono:</label>
		</div>
		<div class="col-75">
			<input type="tel" pattern="[0-9]{10}" id="itelefono" name="itelefono" title="Complete el numero a 10 caracteres y solo números. Ejemplo: 8441234567" maxlength="10" value="<?=$etelefono; ?>">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lemail">Email:</label>
		</div>
		<div class="col-75">
			<input type="text" id="iemail" name="iemail" maxlength="60" value="<?=$eemail; ?>">	
		</div>
	</div>

	<div class="row">
	<div class="boton">
		<input type="submit" value="ACTUALIZAR" >
		
	</div>
</div>


</form>
</div>


<script type="text/javascript" src="js/function.js"></script>
<script src ="js/jquery-3.1.0.js" type ="text/javascript"></script>
</body>
</html>
<script>
    $(document).ready(function () {
    //alert("HOLA");

    var x_plan="<?= $cuantos_alumnos; ?>";
    if (x_plan>0){
      $('#scarrera :not(:selected)').attr('disabled','disabled');
    }
    
  }) ; 
</script>
