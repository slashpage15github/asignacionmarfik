<?php session_start(); ?>
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
    <!-- Page Content -->
    <div class="row" style="margin-top: 30px">
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
                        include('slider.php');
                    ?>
                </div>
               
            </div>
        </div>
        <center>
        <span style="color:black;">&#169; 2018 Facultad De Sistemas U. A. de C.</span>
        </center>
    </div>
        

       
    <!-- /.Page Content -->

    
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	
	<script src='js/moment.min.js'></script>
    
   
 
</body>
</html>