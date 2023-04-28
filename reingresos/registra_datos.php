 <script src="js/jquery-3.1.0.js"></script>
<script src="js/sweetalert.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

<?php
echo "<script src='js/jquery-3.1.0.js'></script>
<script src='js/sweetalert.min.js'></script>
  <script src='js/bootstrap.min.js'></script>
  ";
include("php/class/class_registro_dal.php");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// se guardan los datos del formulario en variables con el metodo $ _POST
$matricula=$_POST["imatricula"];
$nombre=strtoupper($_POST["inombre"]);
$grado=$_POST["igrado"];
$carrera=strtoupper($_POST["scarrera"]);
$observacion=strtoupper($_POST["iobservacion"]);
$telefono=$_POST["itelefono"];
$email=$_POST["iemail"];
$status=$_POST["istatus"];
//echo  "Los datos $matricula , $nombre, $grado , $carrera ,$observacion, $telefono ,$email se registraron! "."\n";
// Se crea un objeto con el constructor de class_registro mandando los datos del formulario como parametros
$obj = new registro
($matricula , $nombre, $grado, $carrera , $observacion, $telefono , $email, $status);
// Se manda ese objeto creado ($ obj) mandando llamar a la función insertar
$obj2=new class_registro_dal();
$cuantos=$obj2->existeMat($matricula);
if($cuantos==0){
$resultado2=$obj2->insertar_datos($obj);
//print($resultado2);
echo "<script>
$(document).ready(function() {
    swal({
  title:'AVISO',
  text:'Registrado correctamente',
  icon:'success',
 });

})
</script>";
}
else {
  echo '<script>';
        echo 'alert("Registro con esta matricula ya existe, no se puede duplicar");';
        echo 'window.history.back();';
        echo '</script';
}}
$obj2=new class_registro_dal();
$nombre_plan=$obj2->describe_plan($carrera);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/miestilo.css">

    <title></title>
    <?php include "menu.php";?>
  </head>
  <body>
    <div class="row">
    
    </div>

<h1>Reingresos <br> Aquí puedes ver los datos que han sido guardados</h1>


<div class="container">
<form method="post" onsubmit="return valida_campos();">

  <div class="row">
    <div class="col-25">
      <label for="Imatricula"> Matricula </label>
    </div>
    
    <div class="col-75">
     <input type="text" id="imatricula" name="imatricula" value="<?php print $matricula; ?>" readonly="true" maxlength="13"> 
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="Inombre"> Nombre </label>
    </div>
    
    <div class="col-75">
     <input type="text" id="inombre" name="inombre" value="<?php print $nombre; ?>" readonly="true" maxlength="13"> 
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="igrado"> Grado </label>
    </div>
    <div class="col-75">
      <input type="text" id="igrado" name="igrado" value="<?php print $grado; ?>" readonly="true"maxlength="13">
    </div>
  </div>
  
  <div class="row">
    <div class="col-25">
      <label for="Icarrera"> Carrera </label>
    </div>
    <div class="col-75">
      <input type="text" id="Scarrera" value="<?php print $carrera.' - '.$nombre_plan; ?>" readonly="true">
        
    </div>
  </div>

  <div class="row">
    <div class="col-75">
     <input type="text" hidden id="iobservacion" name="iobservacion" value="<?php print $observacion; ?>" readonly="true" maxlength="50"> 
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="Itelefono"> Telefono </label>
    </div>
    <div class="col-75">
      <input type="tel" pattern="[0-9]{10}" id="Itelefono" name="Itelefono" value="<?php print $telefono; ?>" readonly="true" maxlength="10">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
       <label for="Iemail"> Email </label> 
    </div>
    <div class="col-75">
      <input type="email" id="Iemail" name="Iemail" value="<?php print $email; ?>" readonly="true">
    </div>
  </div>
  <input type="text" id="istatus" name="istatus" hidden value="1">


</div>
</form>
<button class="bottom-back" onclick="goBack()"> Regresar</button>
</div>
  </body>
</html>

<script>
  function goBack(){
  window.location.href = "mat.php";
}
</script>