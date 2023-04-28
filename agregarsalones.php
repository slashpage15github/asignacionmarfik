<?php
    session_start();
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

    $sql="select * from capacidadaulas";
    $resultado=mysqli_query($conexion,$sql) or die (mysqli_error());
    $cuantoshay=mysqli_num_rows($resultado);
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Capacidad Aulas</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/js/myfunctions_js.js"></script>
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Custom CSS -->
    <style>
        body {

            padding-top: 55px;
            /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
        }
        #editar{
            font-size: 2em;
            margin-right: 15px;
        }
        #borrar{
            font-size: 2em;
        }
        a{
            text-decoration: none;
        }
    </style>

    <?php 
        include('script_js.php');
        include('script_css.php');
    ?>


<script>
$(document).ready(function() {
/*
    $('#datatables tfoot th').each( function () {
        var title = $('#datatables thead th').eq($(this).index()).text().trim();
        $(this).html( '<input type="text" placeholder="Filtra '+title+'"/>');
    } );
/*nota:para cambiar los filtros al head solo se invierte tfoot vs thead*/

    var table =$('#datatables').DataTable( {
            "order": [[0,"asc"]],
   dom: 'Blfrtip',
     
        buttons: [
            /*'copyHtml5',*/
             {
                extend: 'excel',
                messageTop: 'Facultad De Sistemas',
                text:"Exporta Excel",
                title:"Capacidad_Aulas_1_"+(GetTodayDate()),
            },
            {
            /*'csvHtml5',*/
                extend: 'pdf',
                text:"Exporta PDF",
                title:"Capacidad_Aulas_1_"+(GetTodayDate()),
                messageTop: 'Facultad De Sistemas',
              }
        ],
  responsive: true,
  "scrollX": true,
   "language": {
    "search": "Filtro de Registros:",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sInfo": "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
    "oPaginate": {
        "sPrevious": "Anterior",
        "sNext": "Siguiente"
      }
  }  
    } );


 
/*
 // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
/*nota:para cambiar los filtros al head solo se cambia footer() por header*/
});
</script> 






</head>

<body>
    <?php
        if (!isset($_SESSION['usuario']))
            include('menu_publico.php');
        else
            include('menu_privado.php');
    ?>
    
    <div class="container-fluid" align="center">
        <div class="col-md-12">
            <div class="row" style="margin-top: 0px">
                <div class="col-md-2">
                    <IMG SRC = "images/logo.png" width="150px" align="right"/>
                </div> 
                <div class="col-md-8">

                </div>
                <div class="col-md-2" >
                    <IMG SRC = "images/UAdeC.png" width="150px"/>
                </div>
            </div>
            <div class = "row">
                <div class="col-md-12"><h1 class="text-center">Capacidad Aulas.</h1></div><br>
                
            </div><!--fin del row -->
            <div class="row">
                <form class="form-horizontal">
                <div class="contenedor col-md-4" style="margin-left: 10%;">
        
            
                
                
                
                                               
             
                 <div class="form-group">
                    <label class="col-md-3 control-label">Salon:</label>    
                    <div class="input-group col-md-9">
                        <input type="text" name="salon" id="salon" value=" " class="form-control">  
                        <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                    </div>
                </div>
                
<div class="form-group">
                    <label class="col-md-3 control-label">Capacidad:</label>    
                    <div class="input-group col-md-9">
                        <input type="text" name="capacidad" id="capacidad" value=" " class="form-control">  
                        <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-md-3 control-label">Piso:</label>    
                    <div class="input-group col-md-9">
                        <input type="text" name="piso" id="piso" value=" " class="form-control">  
                        <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                    </div>
                </div>

                
                <div class="form-group">
                    <label class="col-md-3 control-label">Caracteristica:</label>    
                    <div class="input-group col-md-9">
                        <input type="text" name="caracteristica" id="caracteristica" value="" class="form-control">  
                        <span class="input-group-addon"><i class="glyphicon glyphicon-file"></i></span>
                    </div>
                </div>
                </div>

                <div class="form-group col-md-12 pull-right">
            <a href="capacidad_aulas.php" style="text-decoration: none; color: #000;">
                <button type="button" class="btn col-md-5" style="margin-right: 2%;">Cancelar</button>
            </a>            
            <button type="button" class="btn btn-success col-md-5" id="btnguardar">Guardar</button>
        </div>
    </div>
    </form>
    <div class="col-md-4">
        
    </div>
            </div>
        </div>
    </div><!-- contenedor-->
    <?php
        mysqli_free_result($resultado);
        mysqli_close($conexion);
    ?>

    <script>
        $(document).ready(function(){
            $("#btnguardar").click(function(){
                var salon=$("#salon").val().trim();
                salon=salon.toUpperCase();
                var capacidad=$("#capacidad").val().trim();
                var piso=$("#piso").val().trim();
                var caracteristica=$("#caracteristica").val().toUpperCase();
                
                if(salon.length==0){
                alert("Llenar campo salon.");
                $("#salon").focus();
                }
                else if 
                    (capacidad.length==0){ 
                        alert("Llenar campo capacidad.");
                        $("#capacidad").focus();
                    }
                    else if
                        (piso.length==0){
                        alert("Llenar campo piso.");
                        $("#piso").focus();
                    }
                    else if
                        (caracteristica.length==0){
                        alert("Llenar campo caracteristica.");
                        $("#caracteristica").focus();
                    }

else{
    

                $.post("agregarsalon.php", {salon: salon, capacidad:capacidad, piso:piso, caracteristica:caracteristica}, function() {
                    location.href="capacidad_aulas.php";
                });
                }
            });
        });
    </script>
</body>
</html>