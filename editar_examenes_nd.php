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
    $id=$_GET["id"];
    $sql="select * from parametros_dias_no_departamentales where id='$id'";
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
    <title>Reporte Asignación FS</title>
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


</head>

<body>
    <?php
        if (!isset($_SESSION['usuario']))
            include('menu_publico.php');
        else
            include('menu_privado.php');
    ?>
    
    <div container-fluid" align="center">
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
                <div class="col-md-12"><h1 class="text-center">Fecha examenes departamentales y extraordinarios.</h1></div><br>
                
            </div><!--fin del row -->
            <div class="row">
                <form class="form-horizontal">
                <div class="contenedor col-md-4" style="margin-left: 10%;">
        
            
                
                
                <?php
                            while($row=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
                                $id=$row["id"];
                                $dia=$row["dia"];
                                $fecha=$row["fecha"];
                            }                            
                        ?>                   
             <input type="hidden" name="idsecreto" id="idsecreto" value="<?=$id;?>">
                 <div class="form-group">
                    <label class="col-md-4 control-label">Elegir fecha:</label>    
                    <div class="input-group col-md-10">
                        <input type="date" name="fecha_examen" id="fecha_examen" value="<?=$fecha;?>" class="form-control">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                    </div>

                </div>
                
               
                <div class="row">
                <table id="datatables" class="table" role="grid" >
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Dia</th>
                            <th>Fecha de aplicacion</th>                            
                        </tr>
                    </thead>
                    <tbody>                        
                        <tr value="<?=$id;?>">
                            <td id="id"><?=$id;?></td>
                            <td id="dia"><?=$dia;?></td>
                            <td align="center" id="fecha"><?=$fecha;?></td>                                                               
                        </tr>                        
                    </tbody>
                </table>
                </div><br>
        
            
        
        <div class="form-group col-md-12 pull-right">
            <a href="parametros_fecha_examen_nd.php" style="text-decoration: none; color: #000;">
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
            var dias=["LUNES", "MARTES", "MIERCOLES", "JUEVES", "VIERNES", "SABADO", "DOMINGO"];
            $("#fecha_examen").change(function(){
                var fecha=$('#fecha_examen').val();
                var pre_dia= new Date(fecha);
                var dia= dias[pre_dia.getDay()];
                var id=$('#idsecreto').val();
                $('#id').html(id);
                $('#dia').html(dia);
                $('#fecha').html(fecha);
            });

            $("#btnguardar").click(function(){                
                var id=$("#id").text();
                var dia=$("#dia").text();
                var fecha=$("#fecha").text();
                if(id=="" || dia=="" || fecha==""){
                    alert("Faltan datos."); return;
                }
                else{
                    $.post("editarexamennd.php", {id: id, dia:dia, fecha:fecha}, function() {
                        location.href="parametros_fecha_examen_nd.php";
                    }); 
                }   
                
                
                
            });
        });
    </script>
</body>
</html>