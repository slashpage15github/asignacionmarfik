<!DOCTYPE html>
<html lang="es">
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Asignación FS</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
     <script src="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/js/myfunctions_js.js"></script>
     <script type="text/javascript" src="https://parall.ax/parallax/js/jspdf.js"></script>
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
    .jumbotron{
        text-align: justify;
    }
	#integrantes{
		font-size: 20px;
		color: red;
		

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
<div class="row" style="margin-top: 30px">
    
    <!-- Page Content -->
    <div class="container">
        

<?php
if (!isset($_SESSION['usuario']))
include('menu_publico.php');
else
include('menu_privado.php');
?>
        
            <div class="col-md-3 pull-left">
                <IMG SRC = "images/UAdeC.png"/>
            </div>
            <div class="col-md-3 pull-right">
                <IMG SRC = "images/logo.png"/>
            </div>
        </div>

    <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="sinMargen">Asignación de exámenes Ordinarios y Extraordinarios.<br>Facultad de Sistemas, U. A. de C.</h1>
                <div id="calendar" class="col-centered">
                    <?php
                        include('sliderPresentacion.php');
                    ?>
                </div>
                <div id="img-out"></div>
            </div>
        </div>
<div class="container theme-showcase">
<div class="jumbotron" >
        
        <h3><b><span style="color:red;">Primera Etapa</span></b></h3>
        <h3><b>Problema</b></h3>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;No se contaba con un sistema efectivo para realizar los horarios de exámenes Ordinarios y Extraordinarios.El tiempo de espera era muy largo y en ocasiones los alumnos tenían materias en el mismo horario, por lo cual se les dificultaba realizar sus exámenes.
        </p>
        <h3><b>Justificación</b></h3>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;El presente proyecto se realiza con la finalidad de atender las inquietudes de los alumnos, así como de agilizar el proceso de asignación de horarios de exámenes Ordinarios y Extraordinarios.
        </p>
        <h3><b>Proyecto</b></h3>
        <p>
            &nbsp;&nbsp;&nbsp;&nbsp;Este proyecto proporciona archivos PDF que muestra el horario de exámenes Ordinarios y Extraordinarios alumno-maestro.
        </p>
        <h3><b>Además</b></h3>
        <p>&nbsp;&nbsp;&nbsp;&nbsp;Para mayor comodidad de los estudiantes se plantea el apoyo al sistema con revisiones en los horarios una vez que se ha publicado; en caso de que el alumno tenga inconvenientes, deberá informarlo al personal de Secretaría Académica.<br>&nbsp;&nbsp;&nbsp;&nbsp;El horario es publicado para alumno y maestro respectivamente.</p>
        <h3><b><span style="color:red;">Segunda Etapa</span></b></h3>
        <p>&nbsp;&nbsp;&nbsp;&nbsp; El proyecto se continua mejorando con apoyo de nuevos estudiantes, los cuales estan ayudadando a complementar con la informacion necesaria para llegar a cumplir la meta que es la funcionalidad total de este sistema, que seria de mucho apoyo para el area de secretaria academica.
        <br>&nbsp;&nbsp;&nbsp;&nbsp;En esta segunda etapa se esta trabajando con diversas actividades para una mejor usubilidad como por ejemplo:
        <br>&nbsp;&nbsp;&nbsp;&nbsp;-Análisis de las estructuras de oferta academica y alumnos ya que se generan en excel y se requiere consistencia al 100% de la base de datos. 
        <br>&nbsp;&nbsp;&nbsp;&nbsp;-Desarrollo de exporta y respaldo general.
        <br>&nbsp;&nbsp;&nbsp;&nbsp;-Ajuste puntual por alumno ó grupo de datos de ordinario y extraordinario.
 		<br>&nbsp;&nbsp;&nbsp;&nbsp;-Implementación en el host de la facultad de sistemas.
 		<br>&nbsp;&nbsp;&nbsp;&nbsp;-Estas solo son algunas de las actividades que se estan realizando en este momento.
 		</p>



</div>



<div class="row">
    <center>

    <div class="col-md-4" style="color:black;"></div>
    <div class="col-md-4" style="color:black; font-size:24px;"><STRONG>Elaborado por:</STRONG></div>
    <div class="col-md-4" style="color:black;"></div>
    </center>
</div>
<div class="row">
    <center>
    <div class="col-md-4" style="color:black;"></div>
    <div class="col-md-4" style="color:black; font-size:18px;"><STRONG>ING. DAVID PEREZ TINOCO</STRONG></div>
    <div class="col-md-4" style="color:black;"></div>

    </center>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4" id="integrantes"  align="Right">REINA VAZQUEZ</div>
        <div class="col-md-4" id="integrantes" align="LEFT">DIEGO QUIÑONES</div>

</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4" id="integrantes" align="Right">KARINA GUERRERO</div>
        <div class="col-md-4" id="integrantes" align="LEFT">MIGUEL JALOMO</div>
</div>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4" id="integrantes" align="Right">GUILLERMO RINCON DE ALBA</div>
        <div class="col-md-4" id="integrantes" align="LEFT">CARMEN MEJIA SALAS</div>

</div>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4" id="integrantes" align="Right">JUAN DANIEL GARCIA OVALLE</div>
    <div class="col-md-4" id="integrantes" align="LEFT">JACQUELINE CONSTANCIO</div>
</div>

<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4" id="integrantes" align="Right">ROBERTO RODAS</div>
    <div class="col-md-4" id="integrantes" align="LEFT">RUBI GUZMAN ZUL</div>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4" id="integrantes" align="Right">MARIA MARTINEZ RIVERA</div>
    <div class="col-md-4" id="integrantes" align="LEFT">MARIA JOSE FLORES</div>
</div>
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-4" id="integrantes" align="Right">NEFTALI GUTIERREZ</div>
    <div class="col-md-4" id="integrantes" align="LEFT">lUIS MARTIN CARIELO</div>
</div>
<div class="row">
    <center>
    <div class="col-md-4" style="color:black;"></div>
    <div class="col-md-4" id="integrantes">GEORGINA VALENZUELA</div>
    <div class="col-md-4" style="color:black;"></div>
    </center>

</div>
<br>

</div>
        <center>
        <span style="color:black;">&#169; 2018 Facultad De Sistemas U. A. de C.</span>
        </center>

    </div>
       
    <!-- /.Page Content -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	
	<script src='js/moment.min.js'></script>
    
    
 
</body>
</html>