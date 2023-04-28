<?php
session_start();
$matr=$_SESSION["matr"];
$alu=utf8_decode($_SESSION["alu"]);
//echo $matr.''.$alu;exit;
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


$sql="select clave,grupo,maestro,materia,dia_ordi,fecha_ordi,
horai_ordi,horaf_ordi,aula_ordi,dia_extra,fecha_extra,horai_extra,horaf_extra,aula_extra from alumnos where matricula='$matr' order by fecha_ordi,horai_ordi";



//echo $sql;exit;
$resultado=mysqli_query($conexion,$sql) or die (mysqli_error());
$cuantos=mysqli_num_rows($resultado);
//echo 'cuantos:'.$cuantos;exit;
//$detalles="";
$i=1;
while ($fila=mysqli_fetch_array($resultado))
{
   $clave=$fila["clave"];
   $grupo= $fila["grupo"];
   $materia= $fila["materia"];
   $maestro=$fila["maestro"];
  
   $dia_ordi= $fila["dia_ordi"];
   $fecha_ordi= $fila["fecha_ordi"];
   $horai_ordi= $fila["horai_ordi"];
   $horaf_ordi= $fila["horaf_ordi"];
   $aula_ordi= $fila["aula_ordi"];
   $dia_extra= $fila["dia_extra"];
   $fecha_extra= $fila["fecha_extra"];
   $horai_extra= $fila["horai_extra"];
   $horaf_extra=$fila["horaf_extra"];
   $aula_extra=$fila["aula_extra"];
   
   



			$data[$i]=array('Num'=>$i,
      'Clave'=>$clave,
			'Grupo'=>$grupo,
			'Materia'=>$materia,
      'Maestro'=>$maestro,
			'Ordinario'=>$dia_ordi.' | '.$fecha_ordi.' | '.$horai_ordi.' | '.$horaf_ordi.' | '.$aula_ordi,
      'Extraordinario'=>$dia_extra.' | '.$fecha_extra.' | '.$horai_extra.' | '.$horaf_extra.' | '.$aula_extra,
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

$i=$pdf->ezStartPageNumbers(757,510,10,'','Pag.{PAGENUM} de {TOTALPAGENUM}',1);

$pdf ->addText(232,580,16,utf8_decode('<b>UNIVERSIDAD AUTÓNOMA DE COAHUILA</b>'));
$pdf ->addText(320,560,14,'<b>FACULTAD DE SISTEMAS</b>');
$pdf ->addText(228,540,14,utf8_decode('<b>SECRETARÍA ACADÉMICA - CONTROL ESCOLAR</b>'));


$pdf ->addText(175,525,14,utf8_decode('Horarios de exámenes Ordinarios y Extraordinarios: Modalidad Alumno'));

$pdf->addText(50,475,11,utf8_decode('<b>Matrícula:').$matr.'</b>');
$pdf->addText(50,460,11,'<b>Alumno:'.$alu.'</b>');

$pdf->addText(550,490,11,'Arteaga, Coahuila a '.$dd.' de '.$mm.' de '.$aa);


//$pdf ->addText(110,505,12,'C.T. : '.$_SESSION['gcentro'].' - '.$_SESSION['gctnom'].' - '.$_SESSION['gmunicipio'].' - Trimestre: '.$_SESSION['gtrimestre']);




$pdf ->ezText('',10);
$pdf ->ezText('',10);
$pdf ->ezText('',10);$pdf ->ezText('',10);$pdf ->ezText('',10);$pdf ->ezText('',10);
$pdf->ezSetCmMargins(1.5,1,2,1);

$pdf->ezTable($data,array('Num'=>'#',
          'Clave'=>'Clave',
					'Grupo'=>'Grupo',
	                'Materia'=>'Materia',
                  'Maestro'=>'Maestro',
	                'Ordinario'=>'Ordinario(s)',
                  'Extraordinario'=>'Extraordinario(s)',
					),'',array('shadeCol'=>array(0.9,0.9,0.9),'shaded'=>0,'fontSize'=>8,'showLines'=>2, 'width'=>900,'cols'=>array('Num'=>array('width'=>20,'justification'=>'center'),
                                                  'Clave'=>array('width'=>40,'justification'=>'center'),
																									'Grupo'=>array('width'=>40,'justification'=>'center'),
																									'Materia'=>array('width'=>100,'justification'=>'center'),													
                                                  'Maestro'=>array('width'=>100,'justification'=>'center'),                         
																									'Ordinario'=>array('width'=>220,'justification'=>'center'),
                                                  'Extraordinario'=>array('width'=>220,'justification'=>'center'))
                                                    ));

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