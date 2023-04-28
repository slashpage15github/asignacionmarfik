<?php
$v_carrera=$_POST["v_carrera"];
//$v_matricula=$_POST["v_matricula"];
include("class/class_materias_dal.php");
$obj_materias=new materias_dal;
$result_materias=$obj_materias->get_datos_lista_materias($v_carrera);
/*
echo '<pre>';
print_r($result_materias);
echo '</pre>';exit;
*/
if ($result_materias==NULL){

                    print "<section><h2>No se encontraron resultados de materias.</h2><h3>No hay materias registrados</h3></section>";
        }
        else{
        	echo json_encode($result_materias);
        }
?>