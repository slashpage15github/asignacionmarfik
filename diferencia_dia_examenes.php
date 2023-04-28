<?php
session_start();
include("class/data.inc.php");

//echo $_matricula;exit;
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

$sql="select DATEDIFF(FECHA_extra, FECHA_ordi) AS DIFERENCIA_DIAS, Materia, Maestro, dia_ordi, fecha_ordi, horai_ordi,horaf_ordi,aula_ordi,dia_extra,fecha_extra, horai_extra, horaf_extra, aula_extra
FROM gruposmaestros g 
ORDER BY DATEDIFF(FECHA_EXTRA,FECHA_ORDI) ASC;";

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
<title>Diferencia de dias entre los ordinarios y extraordinarios</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <script src="js/jquery-1.12.4.js"></script>
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
                title:"diferencia de días"+(GetTodayDate()),
            },
            {
            /*'csvHtml5',*/
                extend: 'pdf',
                text:"Exporta PDF",
                title:"diferencia de días"+(GetTodayDate()),
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
    <div class="col-md-12"><h1 class="text-center">Diferencia en dias entre examenes ordinarios y extraordinarios</h1></div>
</div><!--fin del row -->

<div class="row">

         <table id="datatables" class="table table-bordered table-hover dataTable" role="grid" >
              <thead>
                <tr>
                 
                  <th>
                  DIFERENCIA_DIAS
                  </th>
                  <th>
                  materia
                  </th>
                  <th>
                   maestro
                  </th>
                  <th>
                    dia_ordi
                  </th>
                  <th>
                    fecha_ordi
                  </th>
                  <th>
                    horai_ordi
                  </th>
                  <th>
                    horaf_ordi
                  </th>
                  <th>
                    aula_ordi
                  </th>
                  <th>
                    dia_extra
                  </th>
                  <th>
                    fecha_extra
                  </th>
                  <th>
                    horai_extra
                  </th>
                  <th>
                    horaf_extra
                  </th>
                  <th>
                    aula_extra
                  </th>
                   </thead>
               <tbody>
<?php
    while($row=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
            
            $DIFERENCIA_DIAS=trim($row["DIFERENCIA_DIAS"]);
            $Materia=trim(utf8_encode($row["Materia"]));
            $Maestro=trim(utf8_encode($row["Maestro"]));
            $dia_ordi=trim(utf8_encode($row["dia_ordi"]));
            $fecha_ordi=trim($row["fecha_ordi"]);
            $horai_ordi=trim($row["horai_ordi"]);
            $horaf_ordi=trim($row["horaf_ordi"]);
            $aula_ordi=trim(utf8_encode($row["aula_ordi"]));
            $dia_extra=trim(utf8_encode($row["dia_extra"]));
            $fecha_extra=trim($row["fecha_extra"]);
            $horai_extra=trim($row["horai_extra"]);
            $horaf_extra=trim($row["horaf_extra"]);
            $aula_extra=trim(utf8_encode($row["aula_extra"]));

            
// printf ("(%s)(%s)(%s)(%s)(%s)\n",$row["alumno"],$row["clave"],$row["grupo"],$row["maestro"],utf8_encode($row["materia"]));
?>
        <tr>
            <td><?=$DIFERENCIA_DIAS;?></td>
            <td><?=$Materia;?></td>
            <td><?=$Maestro;?></td>
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