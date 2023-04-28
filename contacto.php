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

    .well{
        margin-left: 30px;
        margin-right: 30px; 
        font-size: 200%;
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
        <div class="row" style="margin-top: 0px;">
            <div class="col-md-3 pull-left">
                <IMG SRC = "images/logo.png"/>
            </div>
            <div class="col-md-3 pull-right">
                <IMG SRC = "images/UAdeC.png"/>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="sinMargen">Asignación de exámenes Ordinarios y Extraordinarios.<br>Facultad de Sistemas, U. A. de C.</h1>
 
                <div id="img-out"></div>
            </div>
        </div>
    </div>
        
<div class="well">
     
<p align="center">TITULAR <br>Lic. Fabiola Catalina Ramírez Valdez<br>
<img src="images/contacto.jpg"><br>faramirezv@uadec.edu.mx</p> 
</div>
         <center>
        <span style="color:black;">&#169; 2018 Facultad De Sistemas U. A. de C.</span>
        </center>     
    <!-- /.Page Content -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	
	<script src='js/moment.min.js'></script>
    <script src= 'lang/es.js'></script>
    <script src= 'js/canvas2image.js'></script>
 
</body>
</html>