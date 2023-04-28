<?php
session_start(); 
include("php/class/class_alumnos_dal.php"); 
include("php/class/class_registro_dal.php"); 
//inicializa la opcion manejo de variables de sesion
//include("/php/class/class_registro_dal.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	/*if ($_POST["tmptxt"]!=$_SESSION['tmptxt']){
		echo "<script>";
		echo "location.href = 'mat.php';";
		echo "alert('Código invalido')";
		echo "</script>";
	return;
	}	*/
	if (isset($_POST["imatricula"])) {
   		$mat=$_POST["imatricula"];
		$obj_alumno=new alumnos($mat);
		$metodos_alumno=new class_alumnos_dal();
		$cuantos=$metodos_alumno->existeMatalumno($mat);
		//echo 'existen:'.$cuantos;

		$obj_registro=new registro($mat);
		$metodos_registro=new class_registro_dal();
		$cuantosreg=$metodos_registro->existeMat($mat);

	if ($cuantos>0 && $cuantosreg>0){	
		//	$objeto=$metodos_registro->get_datos_by_matricula($mat);	
			//$enombre=$objeto->alumno;
		//	$egrado=$objeto->grado;
		//	$ecarrera=$objeto->cve_plan;

			//echo $enombre;
			//echo $egrado;
			//echo $ecarrera; exit;
 		/*} 
		else {
		echo "<script>";
		echo "location.href = 'mat.php';";
		echo "alert('Esta matricula no existe')";
		echo "</script>";
			//echo "variable Vacía";
		return;
		}

	}
}*/
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
	<link rel="stylesheet" href="css/miestilo.css">
	<title></title>
		<?php include "menu.php";?>


</head>
<body>

<center>
<h1>Formulario de Reingresos &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <img src="images/logo.png"  width="200"></h1> </center> 
<br>
<div class="container">
	<form action="" method="post" accept-charset="utf-8" onsubmit="return valida_campos();" >
		<input type="text" id="istatus" name="istatus" hidden value="1">
<?php

	$obj_registro=new registro($mat);
		$metodos_registro=new class_registro_dal();
		$cuantos=$metodos_registro->existeMat($mat);
		//echo 'existen:'.$cuantos;
	//	if ($cuantos>0){			
			$objeto=$metodos_registro->get_datos_by_matricula($mat);	
			$enombre=$objeto->getNombre();
			$egrado=$objeto->getGrado();
			$ecarrera=$objeto->getCarrera();
			$eobservacion=$objeto->getObservacion();
			$etelefono=$objeto->getTelefono();
			$eemail=$objeto->getEmail();
//}

?>

	<div class="row">
		<div class="col-25">
			<label for="Imatricula">Matricula:</label>
		</div>
		<div class="col-75">
			<input type="text" id="imatricula" name="imatricula" value="<?php print $mat; ?>" readonly="true" maxlength="13">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lnombre">Nombre:</label>
		</div>
		<div class="col-75">
			<input type="text" id="inombre" name="inombre" value="<?=$enombre; ?>" readonly="true">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lgrado">Grado:</label>
		</div>
		<div class="col-75">
			<input type="text" maxlength="2" pattern="[0-9]{1,2}" id="igrado" name="igrado" value="<?=$egrado; ?>" readonly="true" title="Solo 2 dígitos del 1 al 12">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lcarrera">Carrera</label>
		</div>
		<div class="col-75">
			<select name="scarrera" id="scarrera" style="color:red;font-size: 17px;font-weight: bold;">
				<option value="0">Seleccione la Carrera:</option>
				<option value="828" <?php if($ecarrera =='828') { echo 'selected="true"';} ?>>828-INGENIERIA EN SISTEMAS COMPUTACIONALES</option>
				<option value="754" <?php if($ecarrera =='754') { echo 'selected="true"';} ?>>754-INGENIERIA EN TECNOLOGIAS DE LA INFORMACION</option>
				<option value="827" <?php if($ecarrera =='827') { echo 'selected="true"';} ?>>827-INGENIERIA EN ELECTRONICA Y COMUNICACIONES</option>
				<option value="851" <?php if($ecarrera =='851') { echo 'selected="true"';} ?>>851-INGENIERIA AUTOMOTRIZ</option>
				<option value="820" <?php if($ecarrera =='820') { echo 'selected="true"';} ?>>820-INGENIERIA INDUSTRIAL Y DE SISTEMAS</option>
				
			</select>
		</div>
	</div>	

	<div class="row">
		<div class="col-75">
			<input type="text" hidden id="iobservacion" name="iobservacion" value="<?=$eobservacion; ?>" readonly="true" maxlength="30" placeholder="Para uso de control escolar">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="ltelefono">Telefono:</label>
		</div>
		<div class="col-75">
			<input type="tel" pattern="[0-9]{10}" class="form-control" id="itelefono" name="itelefono" value="<?=$etelefono; ?>" maxlength="10" autocomplete="off" placeholder="INGRESE SU TELEFONO"  title="Cumpla el formato correcto ej:8444118899" readonly="true">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lemail">Email:</label>
		</div>
		<div class="col-75">
			<input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="form-control" id="iemail" name="iemail" value="<?=$eemail; ?>" maxlength="60" autocomplete="off" placeholder="INGRESE SU EMAIL" readonly="true" title="Cumpla el formato de un correo electrónico" style="text-transform: lowercase;">
		</div>
	</div>

</form>
</div>

<?php

} 
		else if ($cuantos==0 && $cuantosreg==0) {
		/*echo "<script>";
		echo "location.href = 'mat.php';";
		echo "alert('Esta matricula no existe')";
		echo "</script>";
			//echo "variable Vacía";*/?>
			<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/miestilo.css">
	<script src="js/sweetalert.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<title></title>
		<?php include "menu.php";?>
<div class="container">
	<form action="registra_datos.php" method="post"accept-charset="utf.g" onsubmit="return valida_campos();" >
		<input type="text" id="istatus" name="istatus" hidden value="0">


	<div class="row">
		<div class="col-25">
			<label for="Imatricula">Matricula:</label>
		</div>
		<div class="col-75">
			<input type="text" id="imatricula" name="imatricula" value="<?=$mat; ?>" readonly="true" maxlength="13">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lnombre">Nombre:</label>
		</div>
		<div class="col-75">
			<input type="text" style="text-transform:uppercase;" id="inombre" name="inombre"  >
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lgrado">Grado:</label>
		</div>
		<div class="col-75">
			<input type="text" maxlength="2" pattern="[0-9]{1,2}" id="igrado" name="igrado" title="Solo 2 dígitos del 1 al 12" >
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lcarrera">Carrera</label>
		</div>
		<div class="col-75">
			<select name="scarrera" id="scarrera" >
				<option value="0">Seleccione la Carrera:</option>
				<option value="828"  >828-INGENIERIA EN SISTEMAS COMPUTACIONALES</option>
				<option value="754" >754-INGENIERIA EN TECNOLOGIAS DE LA INFORMACION</option>
				<option value="827" >827-INGENIERIA EN ELECTRONICA Y COMUNICACIONES</option>
				<option value="851" >851-INGENIERIA AUTOMOTRIZ</option>
				<option value="820" >820-INGENIERIA INDUSTRIAL Y DE SISTEMAS</option>
			</select>
		</div>
	</div>	

	<div class="row">
		<div class="col-75">
			<input type="text" hidden style="text-transform:uppercase;" id="iobservacion" name="iobservacion"  readonly="true" maxlength="30" placeholder="Para uso de control escolar">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="ltelefono">Telefono:</label>
		</div>
		<div class="col-75">
			<input type="tel" pattern="[0-9]{10}" id="itelefono"name="itelefono"  maxlength="10" placeholder="INGRESE SU TELEFONO" title="Cumpla el formato correcto ej:8444118899">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lemail">Email:</label>
		</div>
		<div class="col-75">
			<input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="iemail" name="iemail" maxlength="60" placeholder="INGRESE SU EMAIL" title="Cumpla el formato de un correo electrónico" style="text-transform: lowercase;">
		</div>
	</div>

	<div class="row">
	<div class="boton">
		<input type="submit" value="REGISTRAR" >	
	</div>
</div>
</form>
</div>
 

 <?php
 echo "<script> swal({
 	title:'AVISO',
 	text:'Esta matricula NO esta registrada en la base de datos oficial de alumnos del semestre más reciente, aún así, puede registrarse, solo verifique y llene lo mejor posible la información',
 	icon:'warning',
 });</script>";

} 
		else if ($cuantos>0 && $cuantosreg==0) {
		echo "<script>";
		//echo "alert('Esta matricula fue encontrada, puede registrarse')";
		echo "</script>";
		/*echo "<script>";
		echo "location.href = 'mat.php';";
		echo "alert('Esta matricula no existe')";
		echo "</script>";
			//echo "variable Vacía";*/?>
			<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/miestilo.css">
	<title></title>
		<?php include "menu.php";?>
<div class="container">
	<form action="registra_datos.php" method="post"accept-charset="utf-8" onsubmit="return valida_campos();" >
		<input type="text" id="istatus" name="istatus" hidden value="1">

<?php

	$obj_registro=new alumnos($mat);
		$metodos_alumno=new class_alumnos_dal();
		$cuantos=$metodos_alumno->existeMatalumno($mat);
		//echo 'existen:'.$cuantos;
	//	if ($cuantos>0){		
			$objeto=$metodos_alumno->get_datos_alumno($mat);	
			$enombre=$objeto->alumno;
			$egrado=$objeto->grado;
			$ecarrera=$objeto->cve_plan;
			
//}

?>

	<div class="row">
		<div class="col-25">
			<label for="Imatricula">Matricula:</label>
		</div>
		<div class="col-75">
			<input type="text" id="imatricula" name="imatricula" value="<?=$mat; ?>"  maxlength="13" readonly>
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lnombre">Nombre:</label>
		</div>
		<div class="col-75">
			<input type="text" id="inombre" name="inombre" value="<?=$enombre; ?>"  readonly>
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lgrado">Grado:</label>
		</div>
		<div class="col-75">
			<input type="text" maxlength="2" pattern="[0-9]{1,2}" id="igrado" name="igrado"  value="<?=$egrado; ?>" title="Solo 2 dígitos del 1 al 12" readonly >
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lcarrera">Carrera</label>
		</div>
		<div class="col-75">
			<select name="scarrera" id="scarrera" style="color:red;font-size: 17px;font-weight: bold;">
				<option value="0">Seleccione la Carrera:</option>
				<option value="828" <?php if($ecarrera =='828') { echo 'selected="true"';} ?>>828-INGENIERIA EN SISTEMAS COMPUTACIONALES</option>
				<option value="754" <?php if($ecarrera =='754') { echo 'selected="true"';} ?>>754-INGENIERIA EN TECNOLOGIAS DE LA INFORMACION</option>
				<option value="827" <?php if($ecarrera =='827') { echo 'selected="true"';} ?>>827-INGENIERIA EN ELECTRONICA Y COMUNICACIONES</option>
				<option value="851" <?php if($ecarrera =='851') { echo 'selected="true"';} ?>>851-INGENIERIA AUTOMOTRIZ</option>
				<option value="820" <?php if($ecarrera =='820') { echo 'selected="true"';} ?>>820-INGENIERIA INDUSTRIAL Y DE SISTEMAS</option>
				
			</select>
		</div>
	</div>	

	<div class="row">
		<div class="col-75">
			<input type="text" hidden styleext-transform:uppercase;" id="iobservacion" name="iobservacion"  readonly="true" maxlength="30" placeholder="Para uso de control escolar">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="ltelefono">Telefono:</label>
		</div>
		<div class="col-75">
			<input type="tel" pattern="[0-9]{10}" id="itelefono"name="itelefono"  maxlength="10" placeholder="INGRESE SU TELEFONO" title="Complete el numero a 10 caracteres y solo números. Ejemplo: 8441234567">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lemail">Email:</label>
		</div>
		<div class="col-75">
			<input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="iemail" name="iemail" maxlength="60" placeholder="INGRESE SU EMAIL" title="Cumpla el formato de un correo electrónico" style="text-transform: lowercase;">
		</div>
	</div>

	<div class="row">
	<div class="boton">
		<input type="submit" value="REGISTRAR" >	
	</div>
	</div>

</form>
</div>

<?php

} 
		else if ($cuantos==0 && $cuantosreg>0) {
	
			//echo "variable Vacía";*/?>
			<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/miestilo.css">
	<script src="js/sweetalert.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<title></title>
		<?php include "menu.php";?>
<div class="container">
	<form action="registra_datos.php" method="post"accept-charset="utf.g" onsubmit="return valida_campos();" >
		<input type="text" id="istatus" name="istatus" hidden value="0">

<?php

	$obj_registro=new registro($mat);
		$metodos_registro=new class_registro_dal();
		$cuantos=$metodos_registro->existeMat($mat);
		//echo 'existen:'.$cuantos;
	//	if ($cuantos>0){			
			$objeto=$metodos_registro->get_datos_by_matricula($mat);	
			$enombre=$objeto->getNombre();
			$egrado=$objeto->getGrado();
			$ecarrera=$objeto->getCarrera();
			$eobservacion=$objeto->getObservacion();
			$etelefono=$objeto->getTelefono();
			$eemail=$objeto->getEmail();
//}

?>


	<div class="row">
		<div class="col-25">
			<label for="Imatricula">Matricula:</label>
		</div>
		<div class="col-75">
			<input type="text" id="imatricula" name="imatricula" value="<?=$mat; ?>"  maxlength="13" readonly="true">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lnombre">Nombre:</label>
		</div>
		<div class="col-75">
			<input type="text" id="inombre" value="<?=$enombre; ?>" name="inombre">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lgrado">Grado:</label>
		</div>
		<div class="col-75">
			<input type="text" maxlength="2" pattern="[0-9]{1,2}" id="igrado" name="igrado" value="<?=$egrado; ?>" title="Solo 2 dígitos del 1 al 12">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lcarrera">Carrera</label>
		</div>
		<div class="col-75">
			<select name="scarrera" id="scarrera" >
				<option value="0">Seleccione la Carrera:</option>
				<option value="828" <?php if($ecarrera =='828') { echo 'selected="true"';} ?> >828-INGENIERIA EN SISTEMAS COMPUTACIONALES</option>
				<option value="754" <?php if($ecarrera =='754') { echo 'selected="true"';} ?>>754-INGENIERIA EN TECNOLOGIAS DE LA INFORMACION</option>
				<option value="827" <?php if($ecarrera =='827') { echo 'selected="true"';} ?>>827-INGENIERIA EN ELECTRONICA Y COMUNICACIONES</option>
				<option value="851" <?php if($ecarrera =='851') { echo 'selected="true"';} ?>>851-INGENIERIA AUTOMOTRIZ</option>
				<option value="820" <?php if($ecarrera =='820') { echo 'selected="true"';} ?> >820-INGENIERIA INDUSTRIAL Y DE SISTEMAS</option>
				
			</select>
		</div>
	</div>	

	<div class="row">
		<div class="col-75">
			<input type="text" hidden style="text-transform:uppercase;"  id="iobservacion" name="iobservacion" value="<?=$eobservacion; ?>" readonly="true" maxlength="30" placeholder="Para uso de control escolar">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="ltelefono">Telefono:</label>
		</div>
		<div class="col-75">
			<input type="tel" pattern="[0-9]{10}" id="itelefono"name="itelefono" value="<?=$etelefono; ?>" maxlength="10" placeholder="INGRESE SU TELEFONO" readonly="true" title="Cumpla el formato correcto ej:8444118899">
		</div>
	</div>

	<div class="row">
		<div class="col-25">
			<label for="lemail">Email:</label>
		</div>
		<div class="col-75">
			<input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" id="iemail" name="iemail" value="<?=$eemail; ?>" maxlength="60" placeholder="INGRESE SU EMAIL" title="Cumpla el formato de un correo electrónico" readonly="true" style="text-transform: lowercase;">
		</div>
	</div>
	
</form>
</div>

<?php

 echo "<script> swal({
 	title:'AVISO',
 	text:'Esta matricula ya esta registrada, solo puede actualizar, si desea actualizar, de click en la opción Actualizar del menu superior',
 	icon:'warning',
 });</script>";	
		}

	}
}

?>
<script type="text/javascript" src="js/function.js"></script>
<script src ="js/jquery-3.1.0.js" type ="text/javascript"></script>
</body>
</html>
<script type="text/javascript">
//alert("HOLAx");
  $(document).ready(function () {
    //alert("HOLA");

    var x_plan="<?= $ecarrera; ?>";
    if (x_plan.length==3){
      $('#scarrera :not(:selected)').attr('disabled','disabled');
    }
  }) ; 
</script>