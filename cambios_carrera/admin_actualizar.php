<?php

function convierte_plan($planx){
  $desc_plan="";
  if ($planx=='754'){
    $desc_plan="Ingeniero en Tecnologías de la Información y Comunicaciones";
  }
  else if ($planx=='689'){
    $desc_plan="Licenciado en Sistemas Computacionales y Administrativos";
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

  <title></title>

  <link type="text/css" rel="stylesheet" href="css/estilos.css"/>

</head>

<body>
<?php include "menu.php";?>

<script >
  function verificamatricula(a){
    var JS_mat=document.getElementById("matricula").value.trim();
  
  if (JS_mat.length==0){
    alert("Error:Campo matricula no debe estar vacio");
    return false;
  }
  }
</script>


<?php
$metodos_registro=new registro_dal;
  if ($_POST){
$matricula =$_POST['matricula'];
if ($cuantos=$metodos_registro->existeMat($matricula)==0) {
  echo '<script>';
        echo 'alert("Registro no existe, registrate");';
       echo 'window.location.href="inicio.php"';
        echo '</script>';
}//echo $matricula;
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

?>
     </p>



<div class="container" style="margin:   5px"  >

    <form action="actualiza.php" method="post" accept-charset="utf8" onsubmit="">
    <div class="row">
     <div class="col-25">
    <label for="matricula">MATRICULA</label>
    </div>
    <div class="col-75">
        <input type="text" patternal="[0-9](8)" id="matricula" name="matricula" maxlength="8" value="<?php echo $matricula ?>" readonly placeholder= "INGRESE SU MATRICULA">
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
      <input type="text" patternal="[0-9](10)" id="telefono"name="telefono" maxlength="10"placeholder="INGRESE NUMERO DE TELEFONO" value="<?php echo $telefono?>" readonly >
       </div>
     </div>

   <div class="row">
    <div class="col-25">
      <label for="correo">CORREO:</label>
      </div>
      <div class="col-75">
        <input type="text" id="correo" name="correo" maxlength="150"
        placeholder= "INGRESE SU CORREO"value="<?php echo $correo ?>"readonly>
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
        <input type="text" id="plan" name="plan" maxlength="30" placeholder="PLAN ACTUAL" value="<?php echo convierte_plan($plan); ?>" readonly>
        
      </div>
    </div>
     
 <div class="row">
    <div class="col-25">
      <label for="plan_nuevo">NUEVO PLAN:</label>
      </div>
       <div class="col-75">
        <input type="text" id="plan_nuevo" name="plan_nuevo" maxlength="30" placeholder="PLAN NUEVO" value="<?php echo convierte_plan($plan_nuevo); ?>" readonly>
      </div>
    </div> 

    <div class="row">
    <div class="col-25">
      <label for="respuesta">OBSERVACIONES:</label>
      </div>
      <div class="col-75">
        <input type="text" id="respuesta" name="respuesta" value="<?php echo $respuesta ?>" maxlength="100" placeholder= "ESPERO SUS COMENTARIOS">
      </div>
     </div>    

<div class="row">
  <div class="boton">
    <input type="submit"  value="ACTUALIZAR">
  </div>
 </div>  

<script src ="js/function.js" type ="text/javascript"></script>

</form>
</div>
</body>
<footer style="background-color: lightgrey">
  <p align="center"><label >EN EL BIEN FINCAMOS EL SABER</label></p>
</footer>
</html>
<?php } ?>