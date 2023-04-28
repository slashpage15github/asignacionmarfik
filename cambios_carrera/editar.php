<?php
session_start();
function convierte_plan($planx){
  $desc_plan="";
  if ($planx=='754'){
    $desc_plan="Ingeniero en Tecnologías de la Información y Comunicaciones";
  }
  else if ($planx=='828'){
    $desc_plan="Ingeniero en Sistemas Computacionales ";
  }
  else if ($planx=='820') {
    $desc_plan="Ingeniero Industrial y de Sistemas";
  }
  else if ($planx=='851') {
    $desc_plan="Ingeniero Automotriz";
  }
  else if ($planx=='827') {
    $desc_plan="Ingeniero en Electrónica y Comunicaciones";
  }

  else{
    $desc_plan="indefinido";
  }
  return $planx."-".$desc_plan;

}


require_once 'php/class/class_registro_dal.php';
$conexion = new class_db();
?> 

<!DOCTYPE html>
<html>
<body bgcolor="White">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title></title>
  <link type="text/css" rel="stylesheet" href="css/estilo.css"/>
  <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body onload="ocultardiv()">
<?php include "menu.php";?>
<div id="divmatricula">
<h1 align="center">ACTUALIZACION DE CAMBIOS DE CARRERA</h1>
<H2 align="center">Ingresa tu Matricula</H2>

<form id="inicio" NAME="inicio" action="editar.php" method="post" onsubmit="return  verificamatricula(this)">
  <table align="center">
    <tr align="center">
      <td>Matricula:</td>
      <td><input id="matricula" type="text" name="matricula" placeholder="Escribe tu matricula" id="matricula" size="20" maxlength="10">
      </td>
    </tr>
    <br>
  </table>
  <table align="center">
    <tr align="center">  
      <td><div class="g-recaptcha" aling="center" data-sitekey="6LcUp24UAAAAAIMbz4GVp_jIvYJG_0UN4DCrlVXA" data-callback="enabledSubmit"></div><div class="row">
    <div class="boton2">
      <input type="submit" value="EDITAR">
    </div>
  </div></td>
    </tr>
    <tr></tr>
  </table>
    </form>
</div>

<script >
function validar_email( email ) {
    var regex = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    return regex.test(email) ? true : false;
}

  function verificamatricula(){
    var JS_mat=document.getElementById("matricula2").value.trim();
    var JS_cor=document.getElementById("correo").value.trim();
      var JS_tel=document.getElementById("telefono").value.trim();

  if (JS_mat.length==0){
    alert("Error:Campo MATRICULA no debe estar vacio");
    return false;
  }
  else if (JS_tel.length==0){
    alert("Error:Campo TÉLEFONO no debe estar vacio");
    return false;
  }
  else if (validar_email(JS_cor) == false){
    alert("Error: * Campo CORREO no cumple el formato correcto");
    return false;
  }

    //var response = grecaptcha.getResponse();
/*
    if(response.length == 0){
        alert("Captcha no verificado");
        return false;
      event.preventDefault();
    } else {
      //alert("Captcha verificado");
      return true;
    }*/
  }
</script>


<?php

if(isset($_POST['matricula'])){
  $matricula=$_POST['matricula'];
}
else if(isset($_SESSION["matricula"])){
  $matricula =$_SESSION["matricula"];
}
$metodos_registro=new registro_dal;



  if (isset($matricula)){
$esta_en_alumnos=$metodos_registro->existeMatricula($matricula);

if ($cuantos=$metodos_registro->existeMat($matricula)==0) {
  echo '<script>';
        echo 'alert("Registro no existe, registrate");';
       echo 'window.location.href="inicio.php"';
        echo '</script>';
}//e
else if ($cuantos=$metodos_registro->existeMatricula($matricula)==0){
  $nombre="";
  $plan="";

//echo $matricula;
$obj = new registro_dal();
$resultado = $obj->get_matricula($matricula);
//$obj=insertar();
      /* echo '<pre>';
        echo print_r($resultado);

        echo '</pre>';exit();*/
       //echo print_r($resultado->getPlan());
        $nombre= utf8_decode($resultado->getNombre());
        $telefono=$resultado->getTelefono();
        $correo=$resultado->getCorreo();
        $estatus=$resultado->getEstatus();
        $plan =$resultado->getPlan();
        $plan_nuevo=$resultado->getPlan_nuevo();
        $respuesta=$resultado->getRespuesta();



}
else{
  //echo $matricula;
$obj = new registro_dal();
$resultado = $obj->get_matricula($matricula);
//$obj=insertar();
      /* echo '<pre>';
        echo print_r($resultado);

        echo '</pre>';exit();*/
       //echo print_r($resultado->getPlan());
        $nombre= utf8_decode($resultado->getNombre());
        $telefono=$resultado->getTelefono();
        $correo=$resultado->getCorreo();
        $estatus=$resultado->getEstatus();
        $plan =$resultado->getPlan();
        $plan_nuevo=$resultado->getPlan_nuevo();
        $respuesta=$resultado->getRespuesta();

}

?>
     </p>



<div class="container" style="margin:   5px"  >

    <form action="actualiza_edit.php" method="post" accept-charset="utf8" onsubmit="return verificamatricula();">
    <div class="row">
     <div class="col-25">
    <label for="matricula">MATRICULA</label>
    </div>
    <div class="col-75">
        <input type="text" patternal="[0-9](8)" id="matricula2" name="matricula" maxlength="8" value="<?php echo $matricula ?>" readonly placeholder= "INGRESE SU MATRICULA">
     </div>
    </div>

    <div class="row">
     <div class="col-25">
      <label for="nombre">NOMBRE:</label>
      </div>
      <div class="col-75">
      <input type="text" id="nombre" name="nombre" maxlength="40"
        value="<?php echo $nombre ?>" placeholder= "INGRESE SU NOMBRE COMPLETO" readonly>
      </div>
     </div>

  <div class="row">
    <div class="col-25">
      <label for="telefono">TELEFONO:</label>
      </div>
      <div class="col-75">
      <?php if ($cuantos>=1){ ?>
      <input type="tel" pattern="[0-9]{10}" id="telefono" name="telefono" maxlength="10" placeholder="INGRESE NUMERO DE TELEFONO" title="El número debe tener 10 digitos numericos" value="<?php echo $telefono?>">
<?php } else { ?>
      <input type="tel" pattern="[0-9]{10}" id="telefono" name="telefono" maxlength="10" placeholder="INGRESE NUMERO DE TELEFONO" title="El número debe tener 10 digitos numericos" value="<?php echo $telefono?>">
<?php } ?>
       </div>
     </div>

   <div class="row">
    <div class="col-25">
      <label for="correo">CORREO:</label>
      </div>
      <div class="col-75">
        <input type="email" id="correo" name="correo" maxlength="150"
        placeholder= "INGRESE SU CORREO"value="<?php echo $correo ?>" required>
      </div>
     </div>

  <div class="row">
    <div class="col-25">
      <label for="estatus">ESTATUS:</label>
      </div>
      <div class="col-75">
        <input type="text" id="estatus" name="estatus" maxlength="30"
        placeholder= "ESTATUS ACTUAL"value="<?php echo $estatus ?>"readonly>
      </div>
    </div>

   <div class="row">
    <div class="col-25">
      <label for="plan">PLAN ACTUAL:</label>
      </div>
      <div class="col-75">

      <?php if($esta_en_alumnos>0) {?>

        <select name="plan" id="plan"value="<?php echo $plan ?>" style="color:red;font-size: 17px;font-weight: bold;">
          <option value="0">SELECCIONA TU PLAN ACTUAL</option>
          <option value="754" <?php if($plan == '754'){ echo ' selected="selected"'; } ?>>Ingeniero en Tecnologías de la Información y Comunicaciones Plan 754</option> 
          <option value="820" <?php if($plan == '820'){ echo ' selected="selected"'; } ?>>Ingeniero Industrial y de Sistemas Plan 820</option>
          <option value="828" <?php if($plan == '828'){ echo ' selected="selected"'; } ?>>Ingeniero en Sistemas Computacionales Plan 828</option>
          <option value="851" <?php if($plan == '851'){ echo ' selected="selected"'; } ?>>Ingeniero Automotriz Plan 851</option>
          <option value="827" <?php if($plan == '827'){ echo ' selected="selected"'; } ?> >Ingeniero en Electrónica y Comunicaciones Plan 827</option>
        </select>

      <?php } else { ?>

<select name="plan" id="plan"value="<?php echo $plan ?>">
          <option value="0">SELECCIONA TU PLAN ACTUAL</option>
          <option value="754" <?php if($plan == '754'){ echo ' selected="selected"'; } ?>>Ingeniero en Tecnologías de la Información y Comunicaciones Plan 754</option> 
          <option value="820" <?php if($plan == '820'){ echo ' selected="selected"'; } ?>>Ingeniero Industrial y de Sistemas Plan 820</option>
          <option value="828" <?php if($plan == '828'){ echo ' selected="selected"'; } ?>>Ingeniero en Sistemas Computacionales Plan 828</option>
          <option value="851" <?php if($plan == '851'){ echo ' selected="selected"'; } ?>>Ingeniero Automotriz Plan 851</option>
          <option value="827" <?php if($plan == '827'){ echo ' selected="selected"'; } ?> >Ingeniero en Electrónica y Comunicaciones Plan 827</option>
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
          <option value="754" <?php if($plan_nuevo == '754'){ echo ' selected="selected"'; } ?>>Ingeniero en Tecnologías de la Información y Comunicaciones Plan 754</option> 
          <option value="820"<?php if($plan_nuevo == '820'){ echo ' selected="selected"'; } ?>>Ingeniero Industrial y de Sistemas Plan 820</option>
          <option value="828"<?php if($plan_nuevo == '828'){ echo ' selected="selected"'; } ?>>Ingeniero en Sistemas Computacionales Plan 828</option>
          <option value="851"<?php if($plan_nuevo == '851'){ echo ' selected="selected"'; } ?>>Ingeniero Automotriz Plan 851</option>
          <option value="827"<?php if($plan_nuevo == '827'){ echo ' selected="selected"'; } ?>>Ingeniero en Electrónica y Comunicaciones Plan 827</option>
        </select>
      </div>
    </div>  

  <div class="row">
    <input type="submit"  value="ACTUALIZAR"> 
    <input type="button" value ="REGRESAR" onclick="window.location.href='inicio.php'">
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
<?php }
session_destroy(); 
?>

<script>
  function ocultardiv(){
    var div = document.getElementById('divmatricula');
    var mat = document.getElementById('matricula2').value;
    if(mat.length>0){
      div.style.display='none';
    }
    else{
      div.style.display='block';
    }
  }

    $(document).ready(function () {
    //alert("HOLA");

    var x_plan="<?= $esta_en_alumnos; ?>";
    if (x_plan>0){
      $('#plan :not(:selected)').attr('disabled','disabled');
    }
    
  }) ; 
</script>