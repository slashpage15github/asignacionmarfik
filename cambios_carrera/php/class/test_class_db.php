<?php
//include("class_db.php");
//$resultado=array();
include("class_cursos_dal.php");
$obj = new class_db();
//$obj = new class_cursos_dal();
 // aqui vemos que es lo que contiene el objeto
echo '<pre>';
print_r($obj);
echo '</pre>';
//echo $obj->set_db();
$resultado=$obj-> get_datos_lista_cursos();
 echo('<pre>');
 print_r($resultado);
 echo('<pre>');

 $resultado2=$obj1-> get_datos_by_matricula();
print $resultado;
 echo('<pre>');
 print_r($resultado);
 echo('<pre>');
?>
