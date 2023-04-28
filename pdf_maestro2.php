<?php
session_start();
$expe=$_SESSION["expe"];
$mae=utf8_decode($_SESSION["mae"]);


//if (!file_exists("include('/class/data.inc.php');")){
  include("class/data.inc.php");
//}


$conexion = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);
if (!$conexion) {
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo '<br>';
    echo "Error: No se pudo conectar a MySQL." . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_errno() . PHP_EOL;
    echo "error de depuración: " . mysqli_connect_error() . PHP_EOL;
    exit;
}


$sql="select grupo,materia,dia_ordi,fecha_ordi,
horai_ordi,horaf_ordi,aula_ordi,dia_extra,fecha_extra,horai_extra,horaf_extra,aula_extra,observaciones 
from gruposmaestros
 where expediente='$expe' order by fecha_ordi,horai_ordi";
//echo $sql;exit;
$resultado=mysqli_query($conexion,$sql) or die (mysqli_error());
$cuantos=mysqli_num_rows($resultado);
//echo 'cuantos:'.$cuantos;exit;
//$detalles="";
$i=1;
while ($fila=mysqli_fetch_array($resultado))
{
   $grupo= $fila["grupo"];
  $materia= ($fila["materia"]);
   $dia_ordi= $fila["dia_ordi"];
   $fecha_ordi= $fila["fecha_ordi"];
   $horai_ordi= $fila["horai_ordi"];
   $horaf_ordi= $fila["horaf_ordi"];
   $aula_ordi= $fila["aula_ordi"];
   //fila extras
   $dia_extra= $fila["dia_extra"];
   $fecha_extra= $fila["fecha_extra"];
   $horai_extra= $fila["horai_extra"];
   $horaf_extra= $fila["horaf_extra"];
   $aula_extra= $fila["aula_extra"];


			$data[$i]=array('Num'=>$i,
			'Grupo'=>$grupo,
			'Materia'=>$materia,
			'Ordinario'=>$dia_ordi.' | '.$fecha_ordi.' | '.$horai_ordi.' | '.$horaf_ordi.' | '.$aula_ordi,
      'Extraordinarios'=>$dia_extra.' | '.$fecha_extra.' | '.$horai_extra.' | '.$horaf_extra.' | '.$aula_extra,
			);



$i++;
}

mysqli_free_result($resultado);
mysqli_close($conexion);
$fechas=date('d - m - Y');

function ConvierteMes($mes)
{
  $cad1="";
  switch ($mes) {
    case "01" :
      $cad1 = "Enero";
      break;  
  case "02" :
      $cad1 = "Febrero";
      break;  
  case "03" :
      $cad1 = "Marzo";
      break;  
  case "04" :
      $cad1 = "Abril";
      break;  
  case "05" :
      $cad1 = "Mayo";
      break;  
  case "06" :
      $cad1 = "Junio";
      break;  
  case "07" :
      $cad1 = "Julio";
      break;  
  case "08" :
      $cad1 = "Agosto";
      break;  
  case "09" :
      $cad1 = "Septiembre";
      break;  
  case "10":
      $cad1 = "Octubre";
      break;  
  case "11":
      $cad1 = "Noviembre";
      break;  
  case "12":
      $cad1 = "Diciembre";
      break;  
  }
 return $cad1;
}



$fecha = date("Y/m/d");
$aa    = substr($fecha,0,4);
$mm    = substr($fecha,5,2);   
$mm    = ConvierteMes($mm);
$dd    = substr($fecha,8,2);

/*********************************/
/*  Construcción del PDF         */
/*********************************/

include ('clase_pdf/class.ezpdf.php');
$pdf = New Cezpdf('letter','landscape');
$pdf ->selectFont('clase_pdf/fonts/Helvetica.afm');
//$pdf->ezSetMargins(120,50,50,50);
//$pdf->ezSetCmMargins(3.8,1,2,1);
$pdf->setLineStyle(1);
$pdf->line(50,760,550,760);
$pdf ->ezText('',10);
$pdf ->ezText('',10);
$pdf ->ezText('',10);
$pdf ->ezText('',10);
$pdf ->ezText('',10);

$pdf ->addJpegFromFile('images/logo_uadec2.jpg',10,555,130,50);
$pdf ->addJpegFromFile('images/logo_sistemas.jpg',645,565,130,40);

$i=$pdf->ezStartPageNumbers(757,545,10,'','Pag.{PAGENUM} de {TOTALPAGENUM}',1);

$pdf ->addText(242,590,14,utf8_decode('<b>UNIVERSIDAD AUTÓNOMA DE COAHUILA</b>'));
$pdf ->addText(310,575,12,'<b>FACULTAD DE SISTEMAS</b>');
$pdf ->addText(240,560,12,utf8_decode('<b>SECRETARÍA ACADÉMICA - CONTROL ESCOLAR</b>'));


$pdf ->addText(185,545,12,utf8_decode('<b>Horarios de exámenes Ordinarios y Extraordinarios: Modalidad Maestro'));

$pdf->addText(50,530,11,'<b>Expediente:'.$expe.'</b>');
$pdf->addText(50,517,11,'<b>Maestro(a):'.$mae.'</b>');

$pdf->addText(550,517,11,'Arteaga, Coahuila a '.$dd.' de '.$mm.' de '.$aa);


//$pdf ->addText(110,505,12,'C.T. : '.$_SESSION['gcentro'].' - '.$_SESSION['gctnom'].' - '.$_SESSION['gmunicipio'].' - Trimestre: '.$_SESSION['gtrimestre']);

$pdf ->ezText('',10);
$pdf ->ezText('',10);
$pdf ->ezText('',10);
$pdf ->ezText('',10);
$pdf->ezSetCmMargins(1.5,1,2,1);

$text1 = utf8_decode('Hacemos de su conocimiento la calendarización de Aplicación de Exámenes Ordinarios y Extraordinarios, correspondientes al Segundo Periodo del Ciclo Escolar 2021-2022, de las materias que usted imparte.');
$y = 495;   
while(strlen($text1) > 0)
{
  $text1 = $pdf->addTextWrap(50,$y,680,10,$text1,'full');
  $y = $y - 12;
}

$pdf->ezTable($data,array('Num'=>'Num.',
					'Grupo'=>'Grupo',
	                'Materia'=>'Materia',
	                'Ordinario'=>'Ordinario(s)',
                  'Extraordinarios'=>'Extraordinario(s)'
					),'',array('shadeCol'=>array(0.9,0.9,0.9),'shaded'=>0,'fontSize'=>8,'showLines'=>2, 'width'=>900,'cols'=>array('Num'=>array('width'=>40,'justification'=>'center'),
																									'Grupo'=>array('width'=>45,'justification'=>'center'),
																									'Materia'=>array('width'=>150,'justification'=>'left'),								
                                                  'Maestro' => array('width' =>150 ,'justificacion'=>'left'),
																									'Ordinario'=>array('width'=>250,'justification'=>'left'),
                                                  'Extraordinarios'=>array('width'=>250,'justification'=>'left'))
																									));



$pdf->addText(40,285,11,'<b>Se le recuerda tomar en cuenta lo siguiente:</b>');

$pdf ->addJpegFromFile('images/bullet1.jpg',51,269,8,9);
$text2 = utf8_decode('Los exámenes están estimados para una duración de 2 horas clase para materias que no son del área básica y 3 horas clase para materias del área de ciencias básicas.');
$y = 270;   
while(strlen($text2) > 0)
{
  $text2 = $pdf->addTextWrap(65,$y,680,9,$text2,'full');
  $y = $y - 10;
}


$pdf ->addJpegFromFile('images/bullet1.jpg',51,249,8,9);
$text3 = utf8_decode('Dar a conocer los resultados antes de confirmar en el sistema PDU, por lo que se le sugiere aprovechar la fecha de aplicación para indicar a sus alumnos, el día y hora en el que les mostrará sus exámenes y dará a conocer su calificación final.');
$y = 250;   
while(strlen($text3) > 0)
{
  $text3 = $pdf->addTextWrap(65,$y,680,9,$text3,'full');
  $y = $y - 10;
}


$pdf ->addJpegFromFile('images/bullet1.jpg',51,229,8,9);
$text4 = utf8_decode('Para presentar exámenes extraordinarios, es obligatorio la ficha de pago original expedida por el Banco, la que deberá anexar al examen correspondiente, de no cumplir el alumno con lo anterior, NO DEBERA PERMITIRLE PRESENTAR EL EXAMEN EXTRAORDINARIO, previamente (dar a conocer a sus alumnos este punto).');
$y = 230;   
while(strlen($text4) > 0)
{
  $text4 = $pdf->addTextWrap(65,$y,680,9,$text4,'full');
  $y = $y - 10;
}

$pdf ->addJpegFromFile('images/bullet1.jpg',51,199,8,9);
$text5 = utf8_decode('Registrar y confirmar calificaciones en el sistema, dentro de los tres días después de la fecha de aplicación.');
$y = 200;   
while(strlen($text5) > 0)
{
  $text5 = $pdf->addTextWrap(65,$y,680,9,$text5,'full');
  $y = $y - 10;
}

$pdf ->addJpegFromFile('images/bullet1.jpg',51,189,8,9);
$text6 = utf8_decode('En caso de tener alumnos con calificación no aprobatoria, SD ó NP en el Acta de Evaluación Ordinaria, SE DEBERÁ GENERAR Y ENTREGAR EL ACTA DE EVALUACIÓN EXTRAORDINARIA, aun cuando el alumno no tenga derecho ó no se presenten al examen.');
$y = 190;   
while(strlen($text6) > 0)
{
  $text6 = $pdf->addTextWrap(65,$y,680,9,$text6,'full');
  $y = $y - 10;
}




$text8 = utf8_decode('IMPORTANTE: Entregar las Actas de Evaluación y con firma autógrafa, en Secretaria Académica, para el caso de Examen Ordinario se cuenta con 3 días hábiles y para el caso del Extraordinario 2 días hábiles después de la fecha de aplicación.');
$y = 165;   
while(strlen($text8) > 0)
{
  $text8 = $pdf->addTextWrap(65,$y,680,9,$text8,'full');
  $y = $y - 10;
}

$texto9=utf8_decode('<b>Agradeciendo contar con su colaboración en el cumplimiento  de los puntos, quedo de Usted.</b>');
$pdf->addText(175,140,11,$texto9);

$pdf->addText(290,120,11,'<b>"EN EL BIEN FINCAMOS EL SABER"</b>');
$pdf ->addPngFromFile('images/sello_fs8.png',160,35,100,105);

$pdf ->addPngFromFile('images/carmen2.png',335,69,90,50);
$pdf->addText(290,70,11,'_______________________________');

$texto10=utf8_decode('<b>M. Ed. MARÍA DEL CARMEN CORONADO RIVERA</b>');
$pdf->addText(270,56,11,$texto10);

$texto11=utf8_decode('<b>SECRETARÍA ACADÉMICA</b>');
$pdf->addText(315,45,11,$texto11);
$pdf ->addText(205,20,9,utf8_decode('Ciudad Universitaria Arteaga. Carretera a México Km 13, C.P. 25350 Arteaga, Coahuila.'));
$pdf ->addText(290,10,9,utf8_decode('Teléfono 689 10 32  / www.sistemas.uadec.mx'));

$pdf ->ezStream();
/*********************************/
/*  Fin del PDF         */
/*********************************/

?>