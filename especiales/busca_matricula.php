<?php
//return;
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Inicio</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->

<script>
function relocate_home()
{
     location.href = "http://www.sistemas.uadec.mx/asignacionfs/";
} 

(function() {

setInterval(function(){
  var el = document.getElementById('blink');
  if(el.className == 'luz'){
      el.className = 'luz on';
  }else{
      el.className = 'luz';
  }
},500);

})();
</script>
<style>
.luz.on{
  color: red;/*color del texto al cambiar*/
  text-shadow:
     1px  1px rgba(255, 255, 255, .1),
    -1px -1px rgba(0, 0, 0, .88),
     0px  0px 20px #0099ff;/*color de la luz del texto*/
}
.luz{
  font-size:20px;/*tamaño de la fuente*/
  color: #000000;
  text-shadow:
     1px  1px rgba(255, 255, 255, .1),
    -1px -1px rgba(0, 0, 0, .88);
}
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">

			<div class="wrap-login100">

				<form class="login100-form validate-form" action="busca_matricula_validator.php" onsubmit="return valida_captcha(this);" method="post">
					<span class="login100-form-title p-b-34">
								<input style="cursor:pointer" type="button" class="btn btn-danger" value="Menu  Principal" onclick="relocate_home();">

						
					</span>

					<span class="login100-form-title p-b-34">
						Solicitud de examenes Especiales
					</span>
					<span class="luz" id="blink">
						ESTAMOS EN PROCESO DE PRUEBA Y AJUSTES DE ESTE MÓDULO, POR FAVOR ESPERAR A QUE SE INDIQUE LA FECHA DEL PERIODO DE REGISTRO, YA QUE LA INFORMACIÓN INGRESADA SERÁ ELIMINADA. 
					</span>					
					
					<div class="wrap-input100 rs3-wrap-input100 validate-input m-b-20" data-validate="Type user name">
						<input id="first-name" class="input100" type="text" maxlength="8" onkeypress="validar_mtr(event);"
						name="imatricula" id="imatricula"
						placeholder="Ingresa tu Matrícula">
						<span class="focus-input100"></span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="btn-buscar" type="submit" >
							Buscar
						</button>
					</div>
					<div class="w-full text-center p-t-27 p-b-239">
						<a href="ver_respuesta.php" class="txt2">
							Consultar Solicitudes de Exámenes Especiales
						</a>
						<br><br><br>
						<div class="form-submit" style=" margin-left: 20px ">
                        	<div class="g-recaptcha"
                             data-sitekey="6LcUp24UAAAAAIMbz4GVp_jIvYJG_0UN4DCrlVXA">
                             </div>
                    	</div>

					</div>
				</form>

				<div class="login100-more" style="background-image: url('images/signup-img.jpg');"></div>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<script>
		$(".selection-2").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery.min.js"></script>
	<script src="vendor/sweetalert2.all.min.js" crossorigin="anonymous"></script>
	<script src="js/main.js"></script>
	<script src='https://www.google.com/recaptcha/api.js'></script>


</body>
</html>

<?php
session_destroy();
?>
<script type="text/javascript">
	document.getElementById("first-name").focus();
</script>