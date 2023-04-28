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



    $sql="select matricula,alumno,cve_plan,grado,a.clave,a.materia,a.expediente,a.maestro,a.grupo,oportunidad,a.observacion,dia_ordi,fecha_ordi,horai_ordi,horaf_ordi,aula_ordi,dia_extra,fecha_extra,
    horai_extra,horaf_extra,aula_extra,departamental,semestre 
from alumnos a join ofertaacademica o on a.clave=o.clave and a.grupo=o.grupo and a.expediente=o.expediente
where o.departamental='ND'";


    $resultado=mysqli_query($conexion,$sql) or die (mysqli_error($conexion));
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
    <title>Reporte Alumnos Con Materias No Departamentales</title>
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
                title:"reporte_alumnos_nodepartamentales_"+(GetTodayDate()),
            },
            {
            /*'csvHtml5',*/
                extend: 'pdf',
                text:"Exporta PDF",
                title:"reporte_alumnos_nodepartamentales_"+(GetTodayDate()),
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
                <div class="col-md-12"><h1 class="text-center">Reporte Alumnos Con Materias No Departamentales</h1></div>
            </div><!--fin del row -->
            <div class="row">
                <table id="datatables" class="table table-bordered table-hover dataTable" role="grid" >
                    <thead>
                    <tr>
                            <th>Matricula</th>
                            <th>Alumno</th>
                            <th>Cve_Plan</th>
                            <th>Grado</th>
                            <th>Clave</th>
                            <th>Materia</th>
                            <th>Expediente</th>
                            <th>Maestro</th>
                            <th>Grupo</th>
                            <th>Oportunidad</th>
                            <th>Observacion</th>
                            <th>Dia_Ordi</th>
                            <th>Fecha_Ordi</th>
                            <th>Horai_Ordi</th>
                            <th>Horaf_Ordi</th>
                            <th>Aula_Ordi</th>
                            <th>Dia_Extra</th>
                            <th>Fecha_Extra</th>
                            <th>Horai_Extra</th>
                            <th>Horaf_Extra</th>
                            <th>Aula_Extra</th>
                            <th>Departamental</th>
                            <th>Semestre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
                                $matricula=trim($row["matricula"]);
                                $alumno=trim(utf8_encode($row["alumno"]));
                                $cve_plan=trim(utf8_encode($row["cve_plan"]));
                                $grado=trim(utf8_encode($row["grado"]));
                                $clave=trim(utf8_encode($row["clave"]));
                                $materia=trim(utf8_encode($row["materia"]));
                                $expediente=trim(utf8_encode($row["expediente"]));
                                $maestro=trim(utf8_encode($row["maestro"]));
                                $grupo=trim(utf8_encode($row["grupo"]));
                                $oportunidad=trim(utf8_encode($row["oportunidad"]));
                                $observacion=trim(utf8_encode($row["observacion"]));
                                $dia_ordi=trim(utf8_encode($row["dia_ordi"]));
                                $fecha_ordi=trim(utf8_encode($row["fecha_ordi"]));
                                $horai_ordi=trim(utf8_encode($row["horai_ordi"]));
                                $horaf_ordi=trim(utf8_encode($row["horaf_ordi"]));
                                $aula_ordi=trim(utf8_encode($row["aula_ordi"]));
                                $dia_extra=trim(utf8_encode($row["dia_extra"]));
                                $fecha_extra=trim(utf8_encode($row["fecha_extra"]));
                                $horai_extra=trim(utf8_encode($row["horai_extra"]));
                                $horaf_extra=trim(utf8_encode($row["horaf_extra"]));
                                $aula_extra=trim(utf8_encode($row["aula_extra"]));
                                $departamental=trim(utf8_encode($row["departamental"]));
                                $semestre=trim(utf8_encode($row["semestre"]));
                        ?>
                                <tr>
                                    <td><?=$matricula;?></td>
                                    <td><?=$alumno;?></td>
                                    <td><?=$cve_plan;?></td>
                                    <td><?=$grado;?></td>
                                    <td><?=$clave;?></td>
                                    <td><?=$materia;?></td>
                                    <td><?=$expediente;?></td>
                                    <td><?=$maestro;?></td>
                                    <td><?=$grupo;?></td>
                                    <td><?=$oportunidad;?></td>
                                    <td><?=$observacion;?></td>
                                    <td><?=$dia_ordi;?></td>
                                    <td><?=$fecha_ordi;?></td>
                                    <td><?=$horai_ordi;?></td>
                                    <td><?=$horaf_ordi;?></td>
                                    <td><?=$aula_ordi;?></td>
                                    <td><?=$dia_extra;?></td>
                                    <td><?=$fecha_extra;?></td>
                                    <td><?=$horai_extra;?></td>
                                    <td><?=$horaf_extra;?></td>
                                    <td><?=$aula_extra;?></td>
                                    <td><?=$departamental;?></td>
                                    <td><?=$semestre;?></td>
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