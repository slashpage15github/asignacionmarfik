<?php
session_start();
require_once 'php/class/class_registroIns_dal.php';
?> 
<?php

$metodos_registro=new registro_dal;
$matricula =$_POST['matricula'];//echo $matricula;
$_SESSION["matricula"]=$matricula;
if ($cuantos=$metodos_registro->existeMat($matricula)>=1) {
  echo '<script>';
        echo 'alert("Registro ya existe, puedes editar");';
        echo 'window.location.href="editar.php"';
        echo '</script>';
}
if ($cuantos=$metodos_registro->existeMatricula($matricula)==0) {
  $nombre="";
  $plan="";
}else {
  $obj = new registro_dal();
$resultado = $obj->get_datos_by_matricula($matricula);
//$obj=insertar();
      /*echo '<pre>';
        echo print_r($resultado);
        echo print_r($resultado->getTelefono());
        echo '</pre>';exit();*/
      // echo print_r($resultado->getPlan());
        $nombre= utf8_decode($resultado->getNombre());
        $plan =$resultado->getEstatus();
        //nombre==disabled;
     
}
    

?>
<!DOCTYPE html>
<html>
<body bgcolor="White">
<head>

  <title></title>
  <meta charset="utf-8">
  <link type="text/css" rel="stylesheet" href="css/estilos.css"/>

</head>
<body>
<?php include "menu.php";?>



<h3> Completa los datos para realizar tu solicitud de cambio de carrera.</h3>

     </p>
<div class="container" style="margin:   5px"  >

    <form action="registrar.php" method="post" accept-charset="utf8" onsubmit="return valida();">
    <div class="row">
     <div class="col-25">
    <label for="matricula">MATRICULA</label>
    </div>
    <div class="col-75">
        <input type="text" patternal="[0-9](8)" id="matricula" name="matricula"
         maxlength="10" readonly value="<?php echo $matricula ?>" placeholder= "INGRESE SU MATRICULA">
     </div>
    </div>

    <div class="row">
     <div class="col-25">
      <label for="nombre">NOMBRE:</label>
      </div>
      <div class="col-75">
          <?php 
//echo $cuantos;exit;
      if ($cuantos>=1){ ?>

      <input style="text-transform:uppercase;" type="text" id="nombre" name="nombre" maxlength="40"
        value="<?php echo $nombre ?>" placeholder= "INGRESE SU NOMBRE COMPLETO" >
  <?php }  else {?>     
      <input type="text" id="nombre" name="nombre" maxlength="40"
        value="<?php echo $nombre ?>" placeholder= "INGRESE SU NOMBRE COMPLETO" readonly>
<?php } ?>

      </div>
     </div>

  <div class="row">
    <div class="col-25">
      <label for="telefono">TELEFONO:</label>
      </div>
      <div class="col-75">
      <input type="tel" pattern="[0-9]{10}" id="telefono" name="telefono" maxlength="10"
         placeholder="INGRESE NUMERO DE TELEFONO" title="El número debe tener 10 digitos con lada ej. 8442223344">
       </div>
     </div>

   <div class="row">
    <div class="col-25">
      <label for="correo">CORREO:</label>
      </div>
      <div class="col-75">
        <input type="email" id="correo" name="correo" maxlength="150"
        placeholder= "INGRESE SU CORREO">
      </div>
     </div>

  <div class="row">
    <div class="col-25">
      <label for="estatus">ESTATUS:</label>
      </div>
      <div class="col-75">
        <select name="estatus" id="estatus">
          <option value="0">SELECCIONA TU ESTATUS ACTUAL</option>
          <option value="BAJA">BAJA </option>
          <option value="ACTIVO">ACTIVO </option>
        </select>
      </div>
    </div>

    <div class="row">
    <div class="col-25">
      <label for="plan">PLAN ACTUAL:</label>
      </div>
      <div class="col-75">
        <?php if(strlen($plan)==3) {?>

        <select name="plan" id="plan" value="<?php echo $plan ?>" style="color:red;font-size: 17px;font-weight: bold;">
          <option value="0">SELECCIONA TU PLAN ACTUAL</option>
          <option value="754" <?php if($plan == '754'){ echo ' selected="selected"'; } ?>>Ingeniero en Tecnologías de la Información y Comunicaciones Plan 754</option> 
          <option value="820" <?php if($plan == '820'){ echo ' selected="selected"'; } ?>>Ingeniero Industrial y de Sistemas Plan 820</option>
          <option value="828" <?php if($plan == '828'){ echo ' selected="selected"'; } ?>>Ingeniero en Sistemas Computacionales Plan 828</option>
          <option value="851" <?php if($plan == '851'){ echo ' selected="selected"'; } ?>>Ingeniero Automotriz Plan 851</option>
          <option value="827" <?php if($plan == '827'){ echo ' selected="selected"'; } ?> >Ingeniero en Electrónica y Comunicaciones Plan 827</option>
        </select>
      
        <?php } else { ?>
        <select name="plan" id="plan" value="<?php echo $plan ?>">
      <option value="0">SELECCIONA TU PLAN ACTUAL</option>
      <option value="754">Ingeniero en Tecnologías de la Información y Comunicaciones Plan 754</option>
      <option value="820">Ingeniero Industrial y de Sistemas Plan 820</option>
      <option value="828">Ingeniero en Sistemas Computacionales Plan 828</option>
      <option value="851">Ingeniero Automotriz Plan 851</option>
      <option value="827">Ingeniero en Electrónica y Comunicaciones Plan 827</option>
        </select>

        <?php } ?>

      </div>
    </div>
     
 <div class="row">
    <div class="col-25">
      <label for="plan_nuevo">NUEVO PLAN:</label>
      </div>
      <div class="col-75">
        <select name="plan_nuevo" id="plan_nuevo">
          <option value="0">SELECCIONA TU PLAN NUEVO</option>
          <option value="754">Ingeniero en Tecnologías de la Información y Comunicaciones Plan 754</option> 
          <option value="820">Ingeniero Industrial y de Sistemas Plan 820</option>
          <option value="828">Ingeniero en Sistemas Computacionales Plan 828</option>
          <option value="851">Ingeniero Automotriz Plan 851</option>
          <option value="827">Ingeniero en Electrónica y Comunicaciones Plan 827</option>
        </select>
      </div>
    </div> 
   

<div class="row">
  <div class="boton">
    <input type="submit" onclick="insertar(this)" value="REGISTRAR">
  </div>
 </div>  

<script src ="js/funcion.js" type ="text/javascript"></script>
<script src ="js/jquery-3.1.0.js" type ="text/javascript"></script>

</form>
</div>
</body>
<footer style="background-color: lightgrey">
  <p align="center"><label >EN EL BIEN FINCAMOS EL SABER</label></p>
</footer>
</html>
<script type="text/javascript">
//alert("HOLAx");
  $(document).ready(function () {
    //alert("HOLA");

    var x_plan="<?= $plan; ?>";
    if (x_plan.length==3){
      $('#plan :not(:selected)').attr('disabled','disabled');
    }
    //$('#f_carrera').prop('disabled', 'disabled');
    /////$('#f_carrera :not(:selected)').attr('disabled','disabled');
    //$('#f_carrera').attr('disabled', true);
  }) ; 
</script>
