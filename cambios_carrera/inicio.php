<?php
require_once "php/class/class_db.php";
$conexion = new class_db();
?> 

<!DOCTYPE html>
<html>
<body bgcolor="white">
 <head>
 	<meta charset="UTF-8">
	<title></title>
	<link type="text/css" rel="stylesheet" href="css/estilos.css"/>
	<script src='https://www.google.com/recaptcha/api.js'></script>
 </head>
 <body >
 	<?php include "menu.php";?>
 	
<center>
<h1 align="center">SOLICITUD DE CAMBIOS DE CARRERA</h1>
<H2 align="center">Ingresa tu Matricula</H2>
<form id="inicio" NAME="inicio" action="cambio_carrera.php" method="post" onsubmit="return miFuncion(this)">

<table align="center">
	<tr align="center">
		<td>Matricula:</td>
		<td><input id="matricula" type="text" maxlength="10" name="matricula" placeholder="Escribe tu matricula"    id="matricula" size="20">
		</td>
	</tr>
	<br>
</table>
<table align="center">
	<td>
		<div class="g-recaptcha" aling="center" data-sitekey="6LcUp24UAAAAAIMbz4GVp_jIvYJG_0UN4DCrlVXA" data-callback="enabledSubmit"></div>
	</td>
	<tr align="center">
		
		<td><div class="row">
  <div class="boton2">
   
    <input type="submit"  value="REGISTRAR">
  </div>
</div></td>
	</tr>

	<tr>
		</tr>
</table>
	</form>
</center>
<script >
	function miFuncion(a) {
    var JS_mat=document.getElementById("matricula").value.trim();
  
  if (JS_mat.length==0){
    alert("Error:Campo MATRICULA no debe estar vacío");
    return false;
  }
  else if (JS_mat.length<7){
		alert("Matrícula debe ser al menos 7 caracteres");
		return false;
	}


    var response = grecaptcha.getResponse();

    if(response.length == 0){
        alert("Captcha no verificado");
        return false;
      event.preventDefault();
    } else {
    	
      //alert("Captcha verificado");
      return true;
    }
  }
</script>
<script src ="js/function.js" type ="text/javascript"></script>

</body>
<footer style="background-color: lightgrey">
	<p align="center"><label >EN EL BIEN FINCAMOS EL SABER</label></p>
</footer>
</html>