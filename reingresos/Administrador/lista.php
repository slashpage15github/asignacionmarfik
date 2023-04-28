<?php include("../php/class/class_registro_dal.php"); ?>
<!DOCTYPE html>
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
<h1>Formulario de Respuesta Control Escolar &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <img src="../images/logo.png"  width="200"></h1>

<h1>Listado de Alumnos</h1>
<?php
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
?>
</body>
</html>
