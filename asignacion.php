<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Asignación FS Administrador</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
   
    <!-- Custom CSS -->
   


    <style>
    body {

        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
	#calendar {
		max-width: 1000px;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
	

    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif] -->
</head>
<body>
<?php
if (!isset($_SESSION['usuario']))
include('menu_publico.php');
else
include('menu_privado.php');
?>

    <!-- Page Content -->
     <div class="container">
      <div class="row">
      <div class="col-lg-12 text-center">
         <h1 class="sinMargen">Resultados de Asignaciones Orindarios</h1>
         <div id="calendar" class="col-centered">
         </div>
         <div id="img-out"></div>
     </div>
    
    </div>
  	    </div><!-- end container -->


 

    <!-- /.Page Content -->


    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	
	<script src='js/moment.min.js'></script>
</body>
</html>
<?php
ini_set('max_execution_time', 600); //300 seconds = 10 minutes
include("class/data.inc.php");
$conexion = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);
if (!$conexion){
    echo'<br>';
    echo'<br>';
    echo'<br>';
    echo'<br>';
    echo'<br>';
    echo"Error: No se puede conectar a MySql." .PHP_EOL;
    echo"error de depuración: " .mysqli_connect_errno().PHP_EOL;
    echo"error de depuración: " .mysqli_connect_error().PHP_EOL;
    exit;
}



/******/
 mysqli_query($conexion,"CALL 1_separa_horas_aulas_y_cacula_minutos_por_dia();") or die("Fallo : 1_separa_horas_aulas_y_cacula_minutos_por_dia()" . mysqli_error($conexion));

 print("<span style='color:red;font-size:25px;'><b>1.- ORD-Cálculo de Minutos, Finalizado.</b></span><br>");


 mysqli_query($conexion,"CALL 2_inicializa_disponibilidad_horas_dias_salones_depart();") or die("Fallo : 2_inicializa_disponibilidad_horas_dias_salones_depart()" . mysqli_error($conexion));

 print("<span style='color:red;font-size:25px;'><b>2.- ORD-Disponibilidad de salones. Finalizado.</b></span><br>");
 

 mysqli_query($conexion,"CALL 3_asigna_no_departamentales();") or die("Fallo : 3_asigna_no_departamentales()" . mysqli_error($conexion));

 print("<span style='color:red;font-size:25px;'><b>3.- ORD-Asignación No Departamentales. Finalizado.</b></span><br>");


 mysqli_query($conexion,"CALL 4_ajusta_disponibilidad_salones_para_departamentales();") or die("Fallo : 4_ajusta_disponibilidad_salones_para_departamentales()" . mysqli_error($conexion));

 print("<span style='color:red;font-size:25px;'><b>4.- ORD-Ajusta disponibilidad de salones para Departamentales. Finalizado.</b></span><br>");


 mysqli_query($conexion,"CALL 5_libera_salones_por_rangos_de_hrs_departa_matutinos();") or die("Fallo : 5_libera_salones_por_rangos_de_hrs_departa_matutinos()" . mysqli_error($conexion));

 print("<span style='color:red;font-size:25px;'><b>5.- ORD-Liberación de salones por rango de horas para Departamentales(Matutinos). Finalizado.</b></span><br>");

 mysqli_query($conexion,"CALL 6_libera_salones_por_rangos_de_hrs_departa_vespertinos();") or die("Fallo : 6_libera_salones_por_rangos_de_hrs_departa_vespertinos()" . mysqli_error($conexion));

 print("<span style='color:red;font-size:25px;'><b>6.- ORD-Liberación de salones por rango de horas para Departamentales(Vespertinos). Finalizado.</b></span><br>");

print "</br></br><h1 class='sinMargen'>Resultados de Asignaciones Extraordinarios</h1></p>";


 /******/
 
  mysqli_query($conexion,"CALL 2_extra_inicializa_disponibilidad_horas_dias_salones_depart();") or die("Fallo : 2_extra_inicializa_disponibilidad_horas_dias_salones_depart()" . mysqli_error($conexion));

 print("<span style='color:red;font-size:25px;'><b>2.-(Extraordinario)Disponibilidad de salones. Finalizado.</b></span><br>");
 

 mysqli_query($conexion,"CALL 3_extra_asigna_no_departamentales();") or die("Fallo : 3_extra_asigna_no_departamentales()" . mysqli_error($conexion));

 print("<span style='color:red;font-size:25px;'><b>3.-(Extraordinario)Asignación No Departamentales. Finalizado.</b></span><br>");


 mysqli_query($conexion,"CALL 4_extra_ajusta_disponibilidad_salones_para_departamentales();") or die("Fallo : 4_extra_ajusta_disponibilidad_salones_para_departamentales()" . mysqli_error($conexion));

 print("<span style='color:red;font-size:25px;'><b>4.-(Extraordinario)Ajusta disponibilidad de salones para Departamentales. Finalizado.</b></span><br>");


 mysqli_query($conexion,"CALL 5_extra_libera_salones_por_rangos_de_hrs_departa_matutinos();") or die("Fallo : 5_extra_libera_salones_por_rangos_de_hrs_departa_matutinos()" . mysqli_error($conexion));

 print("<span style='color:red;font-size:25px;'><b>5.-(Extraordinario)Liberación de salones por rango de horas para Departamentales(Matutinos). Finalizado.</b></span><br>");

 mysqli_query($conexion,"CALL 6_extra_libera_salones_por_rangos_de_hrs_departa_vespertinos();") or die("Fallo : 6_extra_libera_salones_por_rangos_de_hrs_departa_vespertinos()" . mysqli_error($conexion));

 print("<span style='color:red;font-size:25px;'><b>6.-(Extraordinario)Liberación de salones por rango de horas para Departamentales(Vespertinos). Finalizado.</b></span><br>");

 mysqli_query($conexion,"CALL 7_asigna_y_genera_gruposmaestros_depart();") or die("Fallo : 7_asigna_y_genera_gruposmaestros_depart()" . mysqli_error($conexion));

 print("<span style='color:red;font-size:25px;'><b>7.-ORDINARIO Asignación de materias Departamentales. Finalizado.</b></span><br>");


 mysqli_query($conexion,"CALL 8_desplaza_nd_para_acomodar_md_en_dia_comodin_blocks();") or die("Fallo : 8_desplaza_nd_para_acomodar_md_en_dia_comodin_blocks()" . mysqli_error($conexion));

 print("<span style='color:red;font-size:25px;'><b>8.-ORD-Ajuste de materias ORDINARIO Departamentales desplazando a No Departamentales al día comodín. Finalizado.</b></span><br>");


mysqli_query($conexion,"CALL 9_ajuste_de_duplicados_de_salon_no_departamentales_desplazados();") or die("Fallo : 9_ajuste_de_duplicados_de_salon_no_departamentales_desplazados()" . mysqli_error($conexion));

 print("<span style='color:red;font-size:25px;'><b>9.-ORD-Ajuste de materias DESPLAZADAS PERO QUE SE DUPLICAN. Finalizado.</b></span><br>");


 mysqli_query($conexion,"CALL 7_extra_asigna_y_genera_gruposmaestros_depart();") or die("Fallo : 7_extra_asigna_y_genera_gruposmaestros_depart()" . mysqli_error($conexion));

 print("<span style='color:red;font-size:25px;'><b>7.-(Extraordinario)Asignación de materias Departamentales. Finalizado.</b></span><br>");



 mysqli_query($conexion,"CALL 8_extra_desplaza_nd_para_acomodar_md_en_dia_comodin_blocks();") or die("Fallo : 8_extra_desplaza_nd_para_acomodar_md_en_dia_comodin_blocks()" . mysqli_error($conexion));

 print("<span style='color:red;font-size:25px;'><b>8.-(Extraordinario)Ajuste de materias Departamentales desplazando a No Departamentales al día comodín. Finalizado.</b></span><br>");

mysqli_query($conexion,"CALL 9_extra_ajuste_de_duplicados_de_salon_no_depar_desplazados();") or die("Fallo : 9_extra_ajuste_de_duplicados_de_salon_no_depar_desplazados()" . mysqli_error($conexion));

 print("<span style='color:red;font-size:25px;'><b>9.-Extras-Ajuste de materias DESPLAZADAS PERO QUE SE DUPLICAN. Finalizado.</b></span><br>");
 mysqli_close($conexion);
?>