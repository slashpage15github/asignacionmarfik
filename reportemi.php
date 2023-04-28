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




$sql=" select clave,alumnos,materia,progra_grupo, grupo, expediente, maestro, departamental, semestre, observacion
    from ofertaacademica where departamental='MI'";






   
/*

*/
    $resultado=mysqli_query($conexion,$sql) or die (mysqli_error());
    $cuantoshay=mysqli_num_rows($resultado);
?>



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
                title:"reporte_alumnos_departamentales_"+(GetTodayDate()),
            },
            {
            /*'csvHtml5',*/
                extend: 'pdf',
                text:"Exporta PDF",
                title:"reporte_alumnos_departamentales_"+(GetTodayDate()),
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
                <div class="col-md-12"><h1 class="text-center">Reporte de Ingles</h1></div>
            </div><!--fin del row -->
            <div class="row">
                <table id="datatables" class="table table-bordered table-hover dataTable" role="grid" >
                    <thead>
                    <tr>
                            <th>clave</th>
                            <th>alumnos</th>
                            <th>materia</th>
                            <th>progra_grupo</th>
                            <th>grupo</th>
                            <th>expediente</th>
                            <th>maestro</th>
                            <th>departamental</th>
                            <th>semestre</th>
                            <th>observacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
                                $clave=trim($row["clave"]);
                                $alumnos=trim(utf8_encode($row["alumnos"]));
                                $materia=trim(utf8_encode($row["materia"]));
                                $progra_grupo=trim(utf8_encode($row["progra_grupo"]));
                                $grupo=trim(utf8_encode($row["grupo"]));
                                $expediente=trim(utf8_encode($row["expediente"]));
                                $maestro=trim(utf8_encode($row["maestro"]));
                                $departamental=trim(utf8_encode($row["departamental"]));
                                $semestre=trim(utf8_encode($row["semestre"]));
                                $observacion=trim(utf8_encode($row["observacion"]));
                               
                        ?>
                                <tr>
                                    <td><?=$clave;?></td>
                                    <td><?=$alumnos;?></td>
                                    <td><?=$materia;?></td>
                                    <td><?=$progra_grupo;?></td>
                                    <td><?=$grupo;?></td>
                                    <td><?=$expediente;?></td>
                                    <td><?=$maestro;?></td>
                                    <td><?=$departamental;?></td>
                                    <td><?=$semestre;?></td>
                                    <td><?=$observacion;?></td>

                                 
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