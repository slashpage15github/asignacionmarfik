<?php
include("../php/class/class_registro_dal.php");

// se guardan los datos del formulario en variables con el emtodo $ _POST
$matricula=$_POST["imatricula"];
$nombre=$_POST["inombre"];
$grado=$_POST["igrado"];
$carrera=$_POST["scarrera"];
$observacion=utf8_decode($_POST["iobservacion"]);
$telefono=$_POST["itelefono"];
$email=$_POST["iemail"];


//echo  "Los datos $matricula , $nombre, $grado , $carrera ,$observacion, $telefono ,$email se registraron! "."\n";
// Se crea un objeto con el constructor de class_registro mandando los datos del formulario como parametros
$obj = new registro($matricula , $nombre, $grado, $carrera , $observacion, $telefono , $email  );
// Se manda ese objeto creado ($ obj) mandando llamar a la función insertar
$obj2=new class_registro_dal();
$resultado2=$obj2->insertar_datos($obj);
print($resultado2);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/miestilo.css">

    <title></title>
    <?php include "menu_adm.php";?>
  </head>
  <body>
    <div class="row">
    
    </div>

<h1>Reingresos <br> Aqui puedes ver los datos que han sido guardados</h1>


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
      <input type="text" id="Scarrera" value="<?php print $carrera; ?>" readonly="true">
    </div>
  </div>

  <div class="row">
    <div class="col-25">
      <label for="Iobservacion"> Observaciones: </label>
    </div>
    <div class="col-75">
     <input type="text" id="iobservacion" name="iobservacion"  maxlength="50"> 
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
      <input type="email" id="Iemail" name="Iemail" value="<?php print $email; ?>" readonly="true" maxlength="30" >
    </div>
  </div>

  
</form>
</div>
  </body>
</html>
