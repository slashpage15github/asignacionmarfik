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
<?php include "menu_adm.php"; ?>
</div> <center>
<h1 font-color="black">Resultado de la búsqueda de Alumnos</h1>
<?php

if (!isset($_GET["imatricula"])){
	echo 'Fallo get, no recibi información para la consulta';
	return;
}
else{
	$matricula=$_GET["imatricula"];
}


$obj_lista_registro=new class_registro_dal;
$total_registros=$obj_lista_registro->contar_contenido_busca_matricula($matricula);

if ($total_registros==0){
        print "<section><h2>No se encontraron resultados.</h2><h3>No hay registros con esa matricula</h3></section>";
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

include_once '../php/class/class.AutoPagination.php';
$obj = new AutoPagination($obj_lista_registro->contar_contenido_busca_matricula($matricula), $pag); 

$obj_lista_registro->mostrar_contenido_busca_matricula($min,$maxreg,$matricula);

echo $obj->_paginateDetails();


    }
?>
</body>
</html>