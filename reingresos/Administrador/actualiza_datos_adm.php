<?php
require_once '../js/funciones.php';
include("../php/class/class_registro_dal.php");

$matricula=isset($_POST["imatricula"]) ? $_POST["imatricula"] : null;
$nombre=strtoupper(isset($_POST["inombre"])) ? $_POST["inombre"] : null;
$grado=isset($_POST["igrado"]) ? $_POST["igrado"] : null;
$carrera=isset($_POST["scarrera"]) ? $_POST["scarrera"] : null;
$observacion=strtoupper(isset($_POST["iobservacion"])) ? $_POST["iobservacion"] : null;
$telefono=isset($_POST["itelefono"]) ? $_POST["itelefono"] : null;
$email=isset($_POST["iemail"]) ? $_POST["iemail"] : null;

$errores = array();
//$scurso='0'; /*para provocar error del lado del server*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (!validaRequerido($matricula)) {
      $errores[] = 'El campo matricula se recibio vacio.';
   }

	if (!validaRequerido($nombre)) {
      $errores[] = 'El campo nombre se recibio vacio.';
   }

	if (!validaRequerido($grado)) {
      $errores[] = 'El campo grado se recibio vacio.';
   }
	if (!validaSelecthtml($carrera)) {
      $errores[] = 'El campo de carrera fue recibido sin selección válida.';
   }
	
	if (!validaRequerido($observacion)) {
      $errores[] = 'El campo observacion se recibió vacío.';
   }

   if (!validaRequerido($telefono)) {
      $errores[] = 'El campo telefono es incorrecto.';
   }
   if (!validaRequerido($email)) {
      $errores[] = 'El campo email es incorrecto.';
   }

   

   if(!$errores){
         $obj_registro = new registro($matricula , $nombre, $grado, $carrera , strtoupper($observacion), $telefono , $email  );

			/*
			print "<pre>";
			print_r($obj_registro);
			print "</pre>";
			return;
			*/
			$metodos_registro=new class_registro_dal;
			$cuantos=$metodos_registro->existeMat($matricula);

if ($cuantos==1){		

         $estatus=$metodos_registro->actualiza_registro_admin($obj_registro);
			if($estatus==1){
			  echo "<script>
			  alert('Registro actualizado correctamente.');
			  window.location='buscar_editar_adm.php'
			  </script>";
			}
         else if ($estatus==0){
         	 echo "<script>
			  alert('No se detecto algún cambio de datos.');
			  window.location='buscar_editar_adm.php'
			  </script>";
         }
         else{
			  print "Ocurrió un error al tratar de actualizar su registro. Dicho cambio no se guardó en nuestra Base de datos, vuelva a intentar";
			}
	
}
else{
			//echo '<ul style="color: #f00;font-size:25px;">';
         	//echo '<li>"Registro ya existe"</li>';
   			//echo '</ul>';
   			echo '<script>';
   			echo 'alert("Registro no existe, no se pudo completar la actualización");';
   			echo 'window.history.back();';
   			echo '</script>';
   				
}
}	
	else{
			echo '<ul style="color: #f00;font-size:25px;">';
      		foreach ($errores as $error):
         	echo '<li>'.$error.'</li>';
      		endforeach;
   			echo '</ul>';
	}
}
else{
	
	 echo "<script>
			  alert('No se recibieron datos por el metodo post, vuelva a intentar.');
			  window.location='editar_registro_adm.php'
			  </script>";
   			
   				
	//echo 'No se recibieron datos por el metodo post, vuelva a intentar';
}
?>