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
	.container{
        background-color: red;
    }
	#header{
        background-color: green;
    }
    #titulo{
        background-color: yellow;
    }
    #menu{
        background-color: green;
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
session_start();
if (!isset($_SESSION['usuario']))
include('menu_publico.php');
else
include('menu_privado.php');
?>
    




    <!-- Page Content -->
    <div class="container">
        <div class="row" id="header">
            <div class="col-md-3 pull-left">
                <IMG SRC = "images/logo.png"/>
            </div>
            <div class="col-md-3 pull-right">
                <IMG SRC = "images/UAdeC.png"/>
            </div>
        </div>
            <div class="row">
            </div>
        <div class="col-md-12" id="titulo">
            MENU DE TUTORIALES.
        </div>
        <div class="row">
            </div>
        <div class="col-md-12" id="menu">
            @
        </div>
        @
	</div>


 

    <!-- /.Page Content -->


    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
	
	
	<script src='js/moment.min.js'></script>
</body>
</html>