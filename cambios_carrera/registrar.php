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
$Respuesta=isset($_POST["respuesta"]) ? $_POST["respuesta"] : null;

$errores = array();
//$scurso='0'; /*para provocar error del lado del server*/

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if (!validaRequerido($matricula)) {
      $errores[] = 'El campo Matricula se recibio vacio.';
   }

	if (!validaRequerido($nombre)) {
      $errores[] = 'El campo nombre se recibio vacio.';
   }

	if (!validaSelecthtml($Estatus)) {
      $errores[] = 'El campo de Estatus fue recibido sin selección válida.';
   }

	if (!validaSelecthtml($Plan)) {
      $errores[] = 'El campo de Plan fue recibido sin selección válida.';
   }
   if (!validaSelecthtml($Plan_Nuevo)) {
      $errores[] = 'El campo Plan_Nuevo se recibio vacio.';
     
   }
/*
	if (!validarNumerico($telefono)) {
      $errores[] = 'El campo telefono no fue numérico.';
   }
*/
   if (!validaEmail($correo)) {
      $errores[] = 'El campo email es incorrecto.';
   }

  
   if(!$errores){

			$obj_registro=new registro($matricula,$nombre,$Estatus,$Plan,$Plan_Nuevo,$telefono,$correo,$Respuesta);
			/*
			print "<pre>";
			print_r($obj_registro);
			print "</pre>";
			return;
			*/
			$metodos_registro=new registro_dal;
			$cuantos=$metodos_registro->existeMat($matricula);

if ($cuantos==0){			
         if($Plan==$Plan_Nuevo){
            echo '<script>';
            
           
           echo 'alert("No se permite cambio de carrera a la misma. Por favor revisa tu información");';
           echo 'window.history.back();';
             //eader(window.location.href="inicio.php"); 
            //echo 'window.location.href="inicio.php"';
            echo '</script>';
         }
			else if($metodos_registro->insertar($obj_registro)=="1"){
			  //print "Registro recibido correctamente. Gracias por completar estos datos que serán tomados en cuenta para contactarte.";
           echo '<script>';
            echo 'alert("Registro guardado. Espera instrucciones ");';
             //eader(window.location.href="inicio.php"); 
            echo 'window.location.href="inicio.php"';
            echo '</script>';
			}else{
			  print "Ocurrió un error al tratar de guardar su registro. Dicho registro no se guardó en nuestra Base de datos, vuelva a intentar";
			}
	
}
else{
			//echo '<ul style="color: #f00;font-size:25px;">';
         	//echo '<li>"Registro ya existe"</li>';
   			//echo '</ul>';
   			echo '<script>';
   			echo 'alert("Registro ya existe, no se permiten duplicados");';
   			echo 'window.location.href="inicio.php"';
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

