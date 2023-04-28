<?php
require_once '../js/funciones.php';
include("../php/class/class_registro_dal.php");

$imatricula=strtoupper(isset($_POST["imatricula"])) ? $_POST["imatricula"] : null;

$errores = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (!validaRequerido($imatricula)) {
      $errores[] = 'El campo Matricula se recibio vacio.';
   }

	if(!$errores){

			$obj_registro=new registro($imatricula);
		
			$metodos_registro=new class_registro_dal;
			$cuantos=$metodos_registro->existeMat($imatricula);

if ($cuantos==1){			
				$objeto=$metodos_registro->get_datos_by_matricula($imatricula);
				
				$ematricula=$objeto->getMatricula();
				$enombre=$objeto->getNombre();
				$egrado=$objeto->getGrado();
				$ecarrera=$objeto->getCarrera();
				$eobservacion=utf8_encode($objeto->getObservacion());
				$etelefono=$objeto->getTelefono();
				$eemail=$objeto->getEmail();
				$estatus=$objeto->getStatus();
   
				include("actualizar_adm.php");
				
       
}
else{
			echo '<script>';
   			echo 'alert("Registro no existe, no se puede editar");';
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

?>