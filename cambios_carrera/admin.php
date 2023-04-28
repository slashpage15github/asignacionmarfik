<?php
session_start();
include('../protected_sesion.php');
require_once 'php/class/class_registro_dal.php';
$conexion = new class_db();
?> 

<?php
$metodos_registro=new registro_dal;
//$matricula =$_POST['matricula'];

$obj = new registro_dal();
echo '<!DOCTYPE html>
<html>
<head>
 <link type="text/css" rel="stylesheet" href="css/estilos.css"/>
 <link rel="stylesheet" href="css/bootstrap.min.css">
 <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title></title>
</head>
<body bgcolor="White">
<div class="row" style="background-color:Black">
<h1 class="text-center  text-uppercase" style="color:White">Lista de Alumnos - Cambios de carrera</h1>

</div>';

//$obj=insertar();
      /* echo '<pre>';
        echo print_r($resultado);

        echo '</pre>';exit();*/
       //echo print_r($resultado->getPlan());
  $obj->get_alumnos();    
echo'</body>

</html>';
?>
