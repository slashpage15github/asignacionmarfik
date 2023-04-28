<?php
session_start();
include('../../protected_sesion.php');
?>
<script src="../js/jquery-3.1.0.js"></script>
<script src="../js/sweetalert.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<?php include("../php/class/class_registro_dal.php"); ?>

<?php
 //para usar variables de sesion
if (isset($_POST['icontraseña'])) //isset:es para comprobar que existe definido un post, variable
{
  $_SESSION['password']=$_POST['icontraseña'];
  $password=$_SESSION['password'];
}
elseif (isset($_SESSION['password']))
{
  $password=$_SESSION['password'];
}

$obj_lista=new class_registro_dal;
$contraseña=$obj_lista->Confirmar_Admin();
$contraseña2=$obj_lista->Confirmar_Admin2();
if ($password==$contraseña or $password==$contraseña2){
echo '<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/tablas.css">
<link rel="stylesheet" type="text/css" href="../css/miestilo.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <title></title>
</head>
<body bgcolor="lightgrey">
<div class="row">

</div>
<h1>Formulario de Respuesta Control Escolar &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <img src="../images/logo.png"  width="200"></h1 >
<h1>Listado de Alumnos</h1>';

$obj_lista_registro=new class_registro_dal;
$total_registros=$obj_lista_registro->contar_contenido();

if ($total_registros==0){
        print '<section><h2>No se encontraron resultados.</h2><h3>No hay registros con esa matricula</h3></section>';
    }
    else{

$maxreg = 5;
 
if (!isset($_GET['page'])){
  $pag=1;
}
else{
$pag = $_GET['page'];
}

if(!isset($pag) || empty($pag)){
  
      $min = 0;
      $pag = 1;  
  
}else{
  
      if($pag == 1){
  
            $min = 0;
  
      }else{
  
            $min = $maxreg * $pag;
            $min = $min - $maxreg;
        }
}

/*include_once '../php/class/class_AutoPagination.php';
$obj = new AutoPagination($obj_lista_registro->contar_contenido(), $pag); */

$obj_lista_registro->mostrar_contenido($min,$maxreg);

//echo $obj->_paginateDetails();


    }

echo'</body>
<script src="../js/funciones_js.js"></script>
</html>';
}
else
echo "<script>
$(document).ready(function() {
    swal({
  title:'AVISO',
  text:'Contraseña incorrecta',
  icon:'error',
 }).then(function(){
      window.location = 'mat_adm.php';
    });

})
</script>";
?>