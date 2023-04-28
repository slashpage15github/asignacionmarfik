<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/miestilo.css">
	<title></title>
		<?php include "menu.php";?>


</head>
<body>

<center>
<h1>Formulario de Reingresos &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <img src="images/logo.png"  width="200"></h1> </center> 


<br><br>


<div class="container">

	<form action="registra_datos.php" method="post"
	accept-charset="utf.g" onsubmit="return valida_campos();" 
	>
	<div class="row">
		<div class="col-25">
			<label for="Imatricula">Matricula:</label>
		</div>
		<div class="col-75">
			<input type="text" id="imatricula" name="imatricula" value="<?php print $mat; ?>"  maxlength="13">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lnombre">Nombre:</label>
		</div>
		<div class="col-75">
			<input type="text" id="inombre" name="inombre" maxlength="30" placeholder="Ingrese su nombre">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lgrado">Grado:</label>
		</div>
		<div class="col-75">
			<input type="text" id="igrado" name="igrado" maxlength="30" placeholder="Ingrese su grado">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lcarrera">Carrera</label>
		</div>
		<div class="col-75">
			<select name="scarrera" id="scarrera">

				<option value="0">Seleccione la Carrera:</option>
				<option value="828">INGENIERIA EN SISTEMAS COMPUTACIONALES</option>
				<option value="754">INGENIERIA EN TECNOLOGIAS DE LA INFORMACION</option>
				<option value="827">INGENIERIA EN ELECTRONICA Y COMUNICACIONES</option>
				<option value="851">INGENIERIA AUTOMOTRIZ</option>
				<option value="820">INGENIERIA INDUSTRIAL Y DE SISTEMAS</option>
			</select>
		</div>
	</div>	

	<div class="row">
		<div class="col-75">
			<input type="text" hidden id="iobservacion" name="iobservacion" readonly="true" maxlength="30" placeholder="Para uso de control escolar">
		</div>
	</div>
	<div class="row">
		<div class="col-25">
			<label for="ltelefono">Telefono:</label>
		</div>
		<div class="col-75">
			<input type="tel" pattern="[0-9]{10}" id="itelefono"
			name="itelefono" maxlength="10" placeholder="INGRESE SU TELEFONO">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lemail">Email:</label>
		</div>
		<div class="col-75">
			<input type="email" id="iemail" name="iemail" maxlength="30"
			placeholder="INGRESE SU EMAIL">
		</div>
	</div>

	<div class="row">
	<div class="boton">
		<input type="submit" value="REGISTRAR" >
	</div>
</div>

</form>
</div>
<script type="text/javascript" src="js/function.js"></script>
</body>
</html>
