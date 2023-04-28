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
    <link href="jquery-ui-1.11.4.custom/jquery-ui.css" rel="stylesheet">
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
    
        .demoHeaders {
        margin-top: 2em;
    }
    #dialog-link {
        padding: .4em 1em .4em 20px;
        text-decoration: none;
        position: relative;
    }
    #dialog-link span.ui-icon {
        margin: 0 5px 0 0;
        position: absolute;
        left: .2em;
        top: 50%;
        margin-top: -8px;
    }
    #icons {
        margin: 0;
        padding: 0;
    }
    #icons li {
        margin: 2px;
        position: relative;
        padding: 4px 0;
        cursor: pointer;
        float: left;
        list-style: none;
    }
    #icons span.ui-icon {
        float: left;
        margin: 0 4px;
    }
    .fakewindowcontain .ui-widget-overlay {
        position: absolute;
    }
    select {
        width: 200px;
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
          <div class="col-md-3 pull-left">
             <IMG SRC = "images/logo.png"/>
         </div>
         <div class="col-md-3 pull-right">
             <IMG SRC = "images/UAdeC.png"/>
         </div>
     </div>

<!--<h2 class="demoHeaders">Dialog</h2>
<p><a href="#" id="dialog-link" class="ui-state-default ui-corner-all"><span class="ui-icon ui-icon-newwin"></span>Open Dialog</a></p>-->

<div class = "row">
    <div class="col-md-12"><h1 class="text-center">Simulación de Asignación de Exámenes</h1></div>

    <div class = "col col-md-12" align="center">
    <input type = "button" class ="btn btn-warning btn-flat" value ="Generar Asignación" id="dialog-link2" name='can_exp' onclick ="return valida_expediente();">
    </div>


    <div class = "row">
    <div class="col-md-12">
    <div id="contentplace" class="text-center"></div>
    </div>
    </div>
    </div><!--fin del row -->




        </div>

<div id="dialog" title="Advertencia: Leer antes de continuar">
    <p style='font-weight: bold;'>¿Esta seguro de generar la simulación de Exámenes?
    <br>
    <li >EL proceso se inicia desde cero.</li>
    <li >Si ya has hecho algunos ajustes posteriores de la última simulación, los perderás.</li>

    </p>
</div>

    <!-- /.Page Content -->


    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    
    
    <script src='js/moment.min.js'></script>
<!--<script>window.location.assign("asignacion.php");</script>-->
<script src="jquery-ui-1.11.4.custom/jquery-ui.js"></script>



<script>
$( "#dialog" ).dialog({
    autoOpen: false,
    width: 400,
    buttons: [
        {
            text: "Ok",
            click: function() {
                $( this ).dialog( "close" );
            }
        },
        {
            text: "Cancel",
            click: function() {
                $( this ).dialog( "close" );
            }
        }
    ]
});

// Link to open the dialog
$( "#dialog-link" ).click(function( event ) {
    $( "#dialog" ).dialog( "open" );
    event.preventDefault();
});

$( "#dialog-link2" ).click(function( event ) {
    $( "#dialog" ).dialog( "open" );
    event.preventDefault();
});
function valida_expediente(){
$( "#dialog" ).dialog({
    autoOpen: false,
    width: 400,
    buttons: [
        {
            text: "Ok",
            click: function() {
                $( this ).dialog( "close" );



//Añadimos la imagen de carga en el contenedor
        $('#contentplace').html('<div><img src="images/loading4.gif"/>Generando simulación...</div>');

        //var expediente=document.getElementById('can_exp').value;
        //var datos={expediente};
        $.ajax({
            
                    url:'asignacion.php',
                    type:'POST',
                    dataType:'html',
                    //data:datos,
                    success:function(response){
                        //alert(response);
                        $("#contentplace").html(response); 
                        $("#contentplace").show();


                        //Cargamos finalmente el contenido deseado
                        $('#contentplace').fadeIn(1000).html(response);
                    },
                    error:function(xhr, desc,err){
                        console.log(xhr);
                        console.log("Details:"+desc+"error:"+err);
                    }
            });// end ajax function


            }
        },
        {
            text: "Cancel",
            click: function() {
                $( this ).dialog( "close" );
            }
        }
    ]
});
}
</script>
</body>
</html>