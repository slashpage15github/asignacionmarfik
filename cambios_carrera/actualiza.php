<?php
require_once 'php/funciones/funciones_php.php';
include("php/class/class_registroIns_dal.php");

$matricula=strtoupper(isset($_POST["matricula"])) ? $_POST["matricula"] : null;
$nombre=strtoupper(isset($_POST["nombre"])) ? $_POST["nombre"] : null;
$Estatus=isset($_POST["estatus"]) ? $_POST["estatus"] : null;
$Plan=isset($_POST["plan"]) ? $_POST["plan"] : null;
$Plan_Nuevo=isset($_POST["plan_nuevo"]) ? $_POST["plan_nuevo"] : null;
$telefono=isset($_POST["telefono"]) ? $_POST["telefono"] : null;
$correo=isset($_POST["correo"]) ? $_POST["correo"] : null;
$respuesta=isset($_POST["respuesta"]) ? $_POST["respuesta"] : null;
$errores = array();
//$scurso='0'; /*para provocar error del lado del server*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (!validaRequerido($respuesta)) {
      $errores[] = 'El campo Respuesta es incorrecto.';
   }

   if(!$errores){

			$obj_registro=new registro($matricula,$nombre,$Estatus,$Plan,$Plan_Nuevo,$telefono,$correo,$respuesta);
			/*
			print "<pre>";
			print_r($obj_registro);
			print "</pre>";
			return;
			*/
			$metodos_registro=new registro_dal;
			$cuantos=1;//$metodos_registro->existeMat($matricula);

if ($cuantos==1){		

         $estatus=$metodos_registro->actualiza_registro($obj_registro);
			if($estatus==1){
			   echo '<script>';
            echo 'alert("Registro actualizado correctamente.");';
            //echo 'window.history.back();';
            echo 'window.location.href="admin.php"';
            echo '</script>';


			}
         else if ($estatus==0){
         echo '<script>';
            echo 'alert("No se detecto algún cambio de datos");';
            //echo 'window.history.back();';
             echo 'window.location.href="admin.php"';
            echo '</script>';
          
         }
         else{
           echo '<script>';
            echo 'alert("Ocurrió un error al tratar de actualizar su registro. Dicho cambio no se guardó en nuestra Base de datos, vuelva a intentar");';
            echo 'window.history.back();';
            echo '</script>'; 
			  
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
	echo 'No se recibieron datos por el metodo post, vuelva a intentar';
}
?>