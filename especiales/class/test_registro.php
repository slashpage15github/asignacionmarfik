<?php
include('class_registro_dal.php');

$objRegistro =new registro_dal();

$existe = $objRegistro->existe_matricula('98003208');
print "Existe Alumno: " . $existe . "<br><br>";

/*$datosAlum = $objRegistro->get_datos_alumno('98003208');
print "<pre>";
print_r($datosAlum);
print "</pre>";*/

$datosAlum = $objRegistro->get_datos_lista_materias();
print "<pre>";
print_r($datosAlum);
print "</pre>";
