<?php
	include ("./Funciones_PHP/funciones_php.php");
	session_start();

	if (isset($_POST['matric'])) {
		$_SESSION['$matriculaa'] = $_POST['matric'];
		//echo $_SESSION['$matriculaa'];
	}

	include('protected_sesion.php');
	//echo $_SESSION['usuario'];
	//echo $_SESSION['tipou'];
	if ($_SESSION['tipou']==1) {
		echo "<script>";
		echo "alert('Esta sección es solo para usuarios tipo Administrador');";
		echo "window.history.back();";
		echo "</script>";
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8">
	<title>Modificación de horario Ordinario por alumno</title>
</head>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/jumbotron.css" rel="stylesheet">
<link href="css/bootstrap-dialog.css" rel="stylesheet">
<link href="css/mystyles.css" rel="stylesheet">

<script src="js/jquery-3.1.0.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-dialog.js"></script>
<script src="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/js/myfunctions_js.js"></script>
<script src="js/jquery.timeMask.js"></script>


<!--###################################################################################################################################################################################################################################-->
<!-- DatePicker -->
<link rel="stylesheet" type="text/css" href="css/jquery-ui.min.css">
<!--<script type="text/javascript" src="js/jquery.js"></script>-->
<script type="text/javascript" src="js/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/datepicker-es.js"></script>
<script>
	$( function() {
		$('#f_fecha').datepicker( {
			dateFormat: 'yy-mm-dd',
    		inline: true,
    		onSelect: function(dateText, inst) { 
        		var date = $(this).datepicker('getDate'),
            	day  = date.getDate(),  
            	month = date.getMonth() + 1,              
            	year =  date.getFullYear();
            	var dayOfWeek = date.getUTCDay();
	            var weekday=new Array(7);
		         weekday[0]="DOMINGO";
		         weekday[1]="LUNES";
		         weekday[2]="MARTES";
		         weekday[3]="MIÉRCOLES";
		         weekday[4]="JUEVES";
		         weekday[5]="VIERNES";
		         weekday[6]="SÁBADO";
		         var nombredia=weekday[dayOfWeek]

		        //alert(day + '-' + month + '-' + year+weekday[dayOfWeek]);
		        $('#f_dia').val(nombredia);
    		}

		} );
		$( "#created_date_new" ).datepicker({
    		'dateFormat':'dd/mm/yy',
    		onSelect: function(dateText){
	        	var seldate = $(this).datepicker('getDate');
	       		seldate = seldate.toDateString();
	        	seldate = seldate.split(' ');
	        	var weekday=new Array();
	        	weekday['D']="Domingo";	
	            weekday['L']="Lunes";
	            weekday['Ma']="Martes";
	            weekday['Mi']="Miércoles";
	            weekday['J']="Jueves";
	            weekday['V']="Viernes";
	            weekday['S']="Sábado";
	        	var dayOfWeek = weekday[seldate[0]];
	        	$('#dayOfWeek').val(dayOfWeek);
    		}
		});
	});
</script>
<!--###################################################################################################################################################################################################################################-->
<!-- TimePicker -->
<link rel="stylesheet" type="text/css" href="css/wickedpicker.min.css">
<script type="text/javascript" src="js/wickedpicker.js"></script>
<script type="text/javascript">
	$( function() {
			var options = {
		        now: "9:30", //hh:mm 24 hour format only, defaults to current time
		        twentyFour: true,  //Display 24 hour format, defaults to false
		        upArrow: 'wickedpicker__controls__control-up',  //The up arrow class selector to use, for custom CSS
		        downArrow: 'wickedpicker__controls__control-down', //The down arrow class selector to use, for custom CSS
		        close: 'wickedpicker__close', //The close class selector to use, for custom CSS
		        hoverState: 'hover-state', //The hover state class to use, for custom CSS
		        title: 'Hora inicial', //The Wickedpicker's title,
		        showSeconds: false, //Whether or not to show seconds,
		        timeSeparator: ':', // The string to put in between hours and minutes (and seconds)
		        secondsInterval: 1, //Change interval for seconds, defaults to 1,
		        minutesInterval: 30, //Change interval for minutes, defaults to 1
		        beforeShow: null, //A function to be called before the Wickedpicker is shown
		        afterShow: null, //A function to be called after the Wickedpicker is closed/hidden
		        show: null, //A function to be called when the Wickedpicker is shown
		        clearable: false, //Make the picker's input clearable (has clickable "x")
			};
			var options2 = {
		        now: "12:30", //hh:mm 24 hour format only, defaults to current time
		        twentyFour: true,  //Display 24 hour format, defaults to false
		        upArrow: 'wickedpicker__controls__control-up',  //The up arrow class selector to use, for custom CSS
		        downArrow: 'wickedpicker__controls__control-down', //The down arrow class selector to use, for custom CSS
		        close: 'wickedpicker__close', //The close class selector to use, for custom CSS
		        hoverState: 'hover-state', //The hover state class to use, for custom CSS
		        title: 'Hora final', //The Wickedpicker's title,
		        showSeconds: false, //Whether or not to show seconds,
		        timeSeparator: ':', // The string to put in between hours and minutes (and seconds)
		        secondsInterval: 1, //Change interval for seconds, defaults to 1,
		        minutesInterval: 30, //Change interval for minutes, defaults to 1
		        beforeShow: null, //A function to be called before the Wickedpicker is shown
		        afterShow: null, //A function to be called after the Wickedpicker is closed/hidden
		        show: null, //A function to be called when the Wickedpicker is shown
		        clearable: false, //Make the picker's input clearable (has clickable "x")
			};
			
		$("#f_hi").timeMask();
		$("#f_hf").timeMask();
	});
</script>
<!--###################################################################################################################################################################################################################################-->


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
			<a href="http://www.sistemas.uadec.mx/" target="_blank"><div class="col-md-3 pull-left"><IMG SRC = "images/logo.png"/></div></a>
			<a href="http://www.uadec.mx/" target="_blank"><div class="col-md-3 pull-right"><IMG SRC = "images/UAdeC.png"/></div>
		</div></a>
		<div class="row">
			<div class="col-lg-12 text-center">
				<h1 class="sinMargen"><a class="btn btn-danger" href="consulta_ordi_alumno.php" role="button">Buscar Matrícula</a>&nbsp;&nbsp;Ajuste individual Ordinarios por alumno </h1>
				<div id="calendar" class="col-centered"></div>
				<div id="img-out"></div>
			</div>
			<div class="col-lg-12 text-center">
				<label for="exp" class="control-label" style="text-transform: uppercase; font-size: 14px;">
					<strong>Alumno: </strong>
				</label>
				<i><?php
					echo $matrix=obtener_matricula_nombre($_SESSION['$matriculaa']);
					if (strlen($matrix==0)){
						echo "<script>";
						echo "alert('La matrícula que ingreso no fue localizada, vuelva a intentar');";
						echo "location.href = 'consulta_ordi_alumno.php';";
						echo "</script>";
						return;
					}
				?></i>
			</div>
		</div>

		<?php
			//include ("./Funciones_PHP/funciones_php.php");
			//incluye las clases
			include_once ("log_clase_alumnos_abc.php");

			$_matricula=""; $_alumno=""; $_clave=""; $_grupo="";$_expediente=""; $_maestro=""; $_materia=""; 
			$_dia_ordi=""; $_fecha_ordi=""; $_horai_ordi=""; $_horaf_ordi=""; $_aula_ordi=""; $alumno="";

			// si la operacion es modificar, este valor viene seteado y ejecuta el siguiente codigo
			if (isset($_GET['md']) and isset($_GET['exp']) AND isset($_GET['cve']) AND isset($_GET['gpo'])) {
				//echo "entre ";exit;

				// instancio la clase 'Alumno' pasandole la matrícula, de esta forma lo busca
				
				$o_alumno = new Alumno($_GET['md'],$_GET['exp'],$_GET['cve'],$_GET['gpo']);
				$_alumno = $o_alumno->getAlumno();
				$_clave = $o_alumno->getClave();
				$_grupo = $o_alumno->getGrupo();
				$_expediente = $o_alumno->getExpediente();
				$_maestro = $o_alumno->getMaestro();
				$_materia = $o_alumno->getMateria();
				$_dia_ordi = $o_alumno->getDiaOrdi();
				$_fecha_ordi = $o_alumno->getFechaOrdi();
				$_horai_ordi = $o_alumno->getHoraiOrdi();
				$_horaf_ordi = $o_alumno->getHorafOrdi();
				$_aula_ordi = $o_alumno->getAulaOrdi();
				/*$_dia_extra = $o_alumno->getDiaExtra();
				$_fecha_extra = $o_alumno->getFechaExtra();
				$_horai_extra = $o_alumno->getHoraiExtra();
				$_horaf_extra = $o_alumno->getHorafExtra();
				$_aula_extra = $o_alumno->getAulaExtra();*/
				//obtengo la matrícula
				$_matricula = $o_alumno->getMatricula();
			}

			//asignación de página para que se quede en la misma al actualizar
			if (isset($_GET['_pagi_pg'])) {
				//echo "cuando SI existe".$_pagi_pg;
				$_pagi_pg=$_GET['_pagi_pg'];
			}
			else {
				//echo "cuando NO existe".$_pagi_pg;
				$_pagi_pg=1;
			}
		?>

		<!--apartir de aquí, indentar líneas-->
		<div id="container">
		<form action="log_forma_alumnos_ordi_abc.php" name="alumno_ordi" onsubmit="return valida_alumno_ordi();" method="post">
				<input type="hidden" name="id" id="_id" value="<?php print $_idusuario ?>">
				<input type="hidden" name="pagina" value="<?php print $_pagi_pg ?>">
            	<div class='col-md-12'>
                	<div class="col-md-2 form-group">
                    	<label>Matrícula</label>
                    	<input style='font-weight:bold;text-align:center;font-size:20px;' type="text" id="f_mat" 
                    	name="f_mat" class="form-control" value="<?=$_matricula;?>"  readonly>
                	</div>
                	<div class="col-md-4 form-group">
                    	<label>Alumno</label>
                    	<input type="text" id="f_nombre" name="f_nombre" class="form-control" 
                    			value="<?=utf8_encode($_alumno);?>"  readonly>
                	</div>
                	<div class="col-md-2 form-group">
                    	<label>Clave</label>
                    	<input type="text" id="f_cve" name="f_cve" class="form-control" value="<?=$_clave;?>"  readonly>
                	</div>
                	<div class="col-md-2 form-group">
                    	<label>Grupo</label>
                    	<input type="text" id="f_gpo" name="f_gpo" class="form-control" value="<?=$_grupo;?>"  readonly>
                	</div>
                	<div class="col-md-2 form-group">
                    	<label>Expediente</label>
                    	<input type="text" id="f_exp" name="f_exp" class="form-control" value="<?=$_expediente;?>" readonly>
                    </div>
            	</div>

				
				<div class='col-md-12'>
                	<div class="col-md-3 form-group">
                    	<label>Maestro</label>
                    	<input  type="text" id="f_idpre" name="f_idpre" class="form-control" 
                    			value="<?=utf8_encode($_maestro);?>"  readonly>
                	</div> 
                	<div class="col-md-4 form-group">
                    	<label>Materia</label>
                    	<input type="text" id="f_curp" name="f_curp" class="form-control" 
                    			value="<?=utf8_encode($_materia);?>"  readonly>
                	</div>
                	<div class="col-md-2 form-group">
                		<label>Fecha</label>
                    	<input style="background: white;" type="text" id="f_fecha" name="f_fecha" class="form-control" value="<?=$_fecha_ordi;?>" readonly>
                	</div>
                	<div class="col-md-2 form-group">
                    	<label>Día</label>
                    	<input style="background: white;" type="text" id="f_dia" name="f_dia" class="form-control" value="<?=utf8_encode($_dia_ordi);?>" readonly>
                    </div>
				</div>


				<div class='col-md-12'>
                	<div class="col-md-2 form-group">
                    	<label>Hora Inicio</label>
                    	<input  type="text" id="f_hi" name="f_hi" class="form-control" value="<?=$_horai_ordi;?>">
                	</div>
                	<div class="col-md-2 form-group">
                    	<label>Hora Fin</label>
                    	<input type="text" id="f_hf" name="f_hf" class="form-control" value="<?=$_horaf_ordi;?>">
                	</div>
                	<div class="col-md-6 form-group">
                    	<label>Aula</label>
                    	<!--<input type="text" id="f_aula" name="f_aula" class="form-control" value="<?=$_aula_ordi;?>">-->
						<?php
		 					$consulta="select concat('AULA ',salon,' ',IF(caracteristica IS NULL,'',caracteristica))
		 					AS id_salon, concat('AULA ',salon,' ',IF(caracteristica IS NULL,'',caracteristica)) AS 
		 					text_salon from capacidadaulas";
							saca_menu_desplegable_boostrap_alumnos($consulta,$_aula_ordi, "f_aula_ordi", 
								"f_aula_ordi");
		 				?>
                	</div>
                	<div class="col-md-2 form-group">
                		<input style="margin-top: 25px;float: right;" type="submit" id="operacion" name="submit" value ="
                		<?php if(is_numeric($_matricula)) print "Modificar"; else print "Ingresar";?>" class="btn btn-danger">
                	</div>
				</div>	
			</form>
		</div>


		<?php
			//si presiono el botón y es 'modificar'
			if (isset($_POST['submit'])&&is_numeric($_SESSION['$matriculaa'])&&is_numeric($_POST['f_exp'])
				&&is_numeric($_POST['f_cve'])&&isset($_POST['f_gpo']))
			{				
				//print "modificando";
				//exit;
				$_pagi_pg=trim($_POST['pagina']);

				$o_alumno=new Alumno($_SESSION['$matriculaa'],$_POST['f_exp'],$_POST['f_cve'],$_POST['f_gpo']);  // instancio la clase pasandole el nro de cliente para cargar los datos
				$o_alumno->setFechaOrdi($_POST['f_fecha']); // setea los datos nuevos
				$o_alumno->setDiaOrdi($_POST['f_dia']);
				$o_alumno->setHoraiOrdi($_POST['f_hi']);
				$o_alumno->setHorafOrdi($_POST['f_hf']);
				$o_alumno->setAulaOrdi($_POST['f_aula_ordi']);

				print '¡Horario modificado!'. $o_alumno->updateAlumnoOrdi();
			}

			require("log_database.class.php");
			$db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_PRUEBA);
			$db->connect();
			
			//Sentencia sql (sin limit)
			//$_pagi_sql = 'SELECT * FROM usuarios WHERE blnActivo='."'".$_SESSION['g_roles']."'".' ORDER BY Name';
			$_pagi_sql ="select alumno, clave, grupo,expediente, maestro, materia, dia_ordi, fecha_ordi, horai_ordi, horaf_ordi, aula_ordi, dia_extra, fecha_extra, horai_extra, horaf_extra, aula_extra from alumnos where matricula=".$_SESSION['$matriculaa'];

			//echo $_pagi_sql;exit;

			//cantidad de resultados por página (opcional, por defecto 20)
			$_pagi_cuantos = 10;//Elegí un número pequeño para que se generen varias páginas

			//cantidad de enlaces que se mostrarán como máximo en la barra de navegación
			$_pagi_nav_num_enlaces = 5;//Elegí un número pequeño para que se note el resultado

			//Decidimos si queremos que se muesten los errores de mysql
			$_pagi_mostrar_errores = false;//recomendado true sólo en tiempo de desarrollo.

			//Si tenemos una consulta compleja que hace que el Paginator no funcione correctamente,
			//realizamos el conteo alternativo.
			$_pagi_conteo_alternativo = true;//recomendado false.

			//Supongamos que sólo nos interesa propagar estas dos variables
			$_pagi_propagar = array("status","termino");//No importa si son POST o GET

			//Definimos qué estilo CSS se utilizará para los enlaces de paginación.
			//El estilo debe estar definido previamente
			$_pagi_nav_estilo = "btn btn-danger";

			//definimos qué irá en el enlace a la página anterior
			$_pagi_nav_anterior = "&lt;";// podría ir un tag <img> o lo que sea	 ="<img src=\"flecha_anterior.gif\">";

			//definimos qué irá en el enlace a la página siguiente
			$_pagi_nav_siguiente = "&gt;";// podría ir un tag <img> o lo que sea

			//Incluimos el script de paginación. Éste ya ejecuta la consulta automáticamente
			include("paginator.inc.php");

			

			//Leemos y escribimos los registros de la página actual
			print	'<br/>
					<div class="row">
						
						<div class="col-md-12">
							<div id=ilumina_renglon>
								<center>
									<table border="0"  class="table table-hover">'
										.'<tr bgcolor="#ff9999">'
										.'<td>Clave</td>'
		  								.'<td>Grupo</td>'
		  								.'<td>Materia</td>'
		  								.'<td>Expediente</td>'
										.'<td>Maestro</td>'
										.'<td>Ordinario</td>'
										//.'<td>Extraordinario</td>'
										.'<td>Modificar</td>'
										.'</tr>';
									while($row = mysql_fetch_array($_pagi_result)) {
										print 	'<tr>'
		  										.'<td>'.$row['clave'].'</td>'
												.'<td>'.$row['grupo'].'</td>'
												.'<td>'.utf8_encode($row['materia']).'</td>'
												.'<td>'.$row['expediente'].'</td>'
												.'<td>'.utf8_encode($row['maestro']).'</td>'
												.'<td>'.utf8_encode($row['dia_ordi']).' | '.$row['fecha_ordi'].' | '.$row['horai_ordi'].' | '.$row['horaf_ordi'].' | '.utf8_encode($row['aula_ordi']).'</td>'
												/*.'<td>'.$row['dia_extra'].' | '.$row['fecha_extra'].' | '.$row['horai_extra'].' | '.$row['horaf_extra'].' | '.$row['aula_extra'].'</td>'*/
												//en este ejemplo para simplificar se envian los parametros por get utilizando un href
												.'<td><a href="log_forma_alumnos_ordi_abc.php?exp='.$row['expediente'].'&gpo='.$row['grupo'].'&cve='.$row['clave'].'&md='.$_SESSION['$matriculaa'].'&_pagi_pg='.$_pagi_pg.'"><img src="pics/modificar.png" border="0" style="position:relative;left:12px;"></a></td>'   
												.'</tr>';									}
									echo '</table>';
								echo '</center>';
							echo '</div>';
						echo '</div>';
					echo '</div>';
			
				//Incluimos la barra de navegación
				//Incluimos la barra de navegación si el "total de resultados" es mayor que la cantidad de "resultados por página"
				if ($_pagi_totalReg>$_pagi_cuantos) {
					echo"<p><center>".$_pagi_navegacion."</p>";
				}

				//Incluimos la información de la página actual
				echo"<p>Mostrando Usuarios ".$_pagi_info."</center></p>";

				$cerrar=new sQuery();
				$cierra_conexion= $cerrar->Close();
			?>
		<SCRIPT LANGUAGE="JavaScript"></SCRIPT>
</body>
</html>