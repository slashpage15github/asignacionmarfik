<script src="js/sweetalert.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<?php
require_once 'js/funciones.php';
include("php/class/class_registro_dal.php");

$imatricula=strtoupper(isset($_POST["imatricula"])) ? $_POST["imatricula"] : null;

$errores = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  if (!validaRequerido($imatricula)) {
      $errores[] = 'El campo Matricula se recibio vacio.';
   }

  if(!$errores){

      $obj_registro=new registro($imatricula);
      $metodos_registro=new class_registro_dal();
      $cuantos=$metodos_registro->existeMat($imatricula);

if ($cuantos==1){     
        $objeto=$metodos_registro->get_datos_by_matricula($imatricula);
        
        $ematricula=$objeto->getMatricula();
        $enombre=$objeto->getNombre();
        $egrado=$objeto->getGrado();
        $ecarrera=$objeto->getCarrera();
        $eobservacion=$objeto->getObservacion();
        $etelefono=$objeto->getTelefono();
        $eemail=$objeto->getEmail();
        $nombre_plan=$metodos_registro->describe_plan($ecarrera);
   
        include("buscar.php");
       

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

/// agrego codigo
$matricula=isset($_POST["imatricula"]) ? $_POST["imatricula"] : null;
$nombre=strtoupper(isset($_POST["inombre"])) ? $_POST["inombre"] : null;
$grado=isset($_POST["igrado"]) ? $_POST["igrado"] : null;
$carrera=isset($_POST["scarrera"]) ? $_POST["scarrera"] : null;
$telefono=isset($_POST["itelefono"]) ? $_POST["itelefono"] : null;
$observacion=isset($_POST["iobservacion"]) ? $_POST["iobservacion"] : null;
$email=isset($_POST["iemail"]) ? $_POST["iemail"] : null;

$errores = array();


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
  
   if (!validaRequerido($telefono)) {
      $errores[] = 'El campo telefono es incorrecto.';
   }
   if (!validaRequerido($email)) {
      $errores[] = 'El campo email es incorrecto.';
   }

   if(!$errores){

         $obj_registro = new registro($matricula , $nombre, $grado, $carrera, $observacion, $telefono , $email  );
  
      $metodos_registro=new class_registro_dal;
      $cuantos=$metodos_registro->existeMat($matricula);

if ($cuantos==1){   

         $cambio=$metodos_registro->actualiza_registro($obj_registro);
      if($cambio==1){
        echo "<script>
        swal({
      title: 'Aviso',
      text: 'Registro actualizado correctamente',
      type: 'success',
      icon:'success',
      timer: 10000
    }).then(function(){
      window.location = 'buscar_editar.php';
    });
        </script>";
      }
         else if ($cambio==0){
           echo "<script>
        alert('No se detectó algún cambio de datos.');        
        window.history.back();
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
}
?>

