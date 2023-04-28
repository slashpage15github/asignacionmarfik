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




  $sql="select * from ofertaacademica where alumnos=0;";
//print $sql;exit;
$resultado=mysqli_query($conexion,$sql) or die (mysqli_error());
$cuantoshay=mysqli_num_rows($resultado);
//echo 'cuantos:'.$cuantoshay;exit;

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>REPORTE OFERTA ACADEMICA CON ALUMNOS EN CERO(0) FS</title>
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
                title:"ofertaacademica_ALUMNOS_EN_0_"+(GetTodayDate()),
            },
            {
            /*'csvHtml5',*/
                extend: 'pdf',
                text:"Exporta PDF",
                title:"ofertaacademica_ALUMNOS_EN_0_"+(GetTodayDate()),
                messageTop: 'Facultad De Sistemas',
              },
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
                <div class="col-md-12"><h1 class="text-center">REPORTE OFERTA ACADEMICA DONDE DATO ALUMNO=0</h1></div>
            </div><!--fin del row -->
            <div class="row">
                <table id="datatables" class="table table-bordered table-hover dataTable" role="grid" >
                    <thead>
                        <tr>
                            <th>Alumnos</th>
                            <th>Clave</th>
                            <th>Materia</th>
                            <th>Progra Grupo</th>
                            <th>Grupo</th>
                            <th>Expediente</th>
                            <th>Horas</th>
                            <th>HiLunes</th>
                            <th>HfLunes</th>
                            <th>SLunes</th>
                            <th>HiMartes</th>
                            <th>HfMartes</th>
                            <th>SMartes</th>
                            <th>HiMiercoles</th>
                            <th>HfMiercoles</th>
                            <th>SMiercoles</th>
                            <th>HiJueves</th>
                            <th>HfJueves</th>
                            <th>SJueves</th>
                            <th>HiViernes</th>
                            <th>HfViernes</th>
                            <th>SViernes</th>
                            <th>HiSabado</th>
                            <th>HfSabado</th>
                            <th>SSabado</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                                              <?php
                            while($row=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
                                $alumnos=trim($row["alumnos"]);
                                $clave=trim(utf8_encode($row["clave"]));
                                $materia=trim(utf8_encode($row["materia"]));
                                $progra_grupo=trim(utf8_encode($row["progra_grupo"]));
                                $grupo=trim(utf8_encode($row["grupo"]));
                                $expediente=trim(utf8_encode($row["expediente"]));
                                $horas=trim($row["horas"]);
                                $hilunes=trim($row["hilunes"]);
                                $hflunes=trim(utf8_encode($row["hflunes"]));
                                $slunes=trim(utf8_encode($row["slunes"]));
                                $himartes=trim($row["himartes"]);
                                $hfmartes=trim(utf8_encode($row["hfmartes"]));
                                $smartes=trim(utf8_encode($row["smartes"]));
                                $himiercoles=trim($row["himiercoles"]);
                                $hfmiercoles=trim(utf8_encode($row["hfmiercoles"]));
                                $smiercoles=trim(utf8_encode($row["smiercoles"]));
                                $hijueves=trim($row["hijueves"]);
                                $hfjueves=trim(utf8_encode($row["hfjueves"]));
                                $sjueves=trim(utf8_encode($row["sjueves"]));
                                $hiviernes=trim($row["hiviernes"]);
                                $hfviernes=trim(utf8_encode($row["hfviernes"]));
                                $sviernes=trim(utf8_encode($row["sviernes"]));
                                $hisabado=trim($row["hisabado"]);
                                $hfsabado=trim(utf8_encode($row["hfsabado"]));
                                $ssabado=trim(utf8_encode($row["ssabado"]));
                        ?>
  
                                <tr>
                                    <td><?=$alumnos;?></td>
                                    <td><?=$clave;?></td>
                                    <td><?=$materia;?></td>
                                    <td><?=$progra_grupo;?></td>
                                    <td><?=$grupo;?></td>
                                    <td><?=$expediente;?></td>
                                    <td><?=$horas;?></td>
                                    <td><?=$hilunes;?></td>
                                    <td><?=$hflunes;?></td>
                                    <td><?=$slunes;?></td>
                                    <td><?=$himartes;?></td>
                                    <td><?=$hfmartes;?></td>
                                    <td><?=$smartes;?></td>
                                    <td><?=$himiercoles;?></td>
                                    <td><?=$hfmiercoles;?></td>
                                    <td><?=$smiercoles;?></td>
                                    <td><?=$hijueves;?></td>
                                    <td><?=$hfjueves;?></td>
                                    <td><?=$sjueves;?></td>
                                    <td><?=$hiviernes;?></td>
                                    <td><?=$hfviernes;?></td>
                                    <td><?=$sviernes;?></td>
                                    <td><?=$hisabado;?></td>
                                    <td><?=$hfsabado;?></td>
                                    <td><?=$ssabado;?></td>
                                </tr>
                        <?php
                            }//cierre de while lista de materias
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><!-- contenedor-->
    <?php
        mysqli_free_result($resultado);
        mysqli_close($conexion);
    ?>

</body>
</html>