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



$sql="select dia_extra,fecha_extra,horai_extra,horaf_extra,aula_extra,materia,matricula,alumno,clave,grupo,expediente,maestro
from alumnos
where concat(fecha_extra,matricula) in 
(
select concat(fecha_extra,matricula) as llave from alumnos where dia_extra is not null
GROUP BY fecha_extra,matricula
having count(*)>1
)
order by fecha_extra,matricula,horai_extra;";
//print $sql;exit;
$resultado=mysqli_query($conexion,$sql) or die (mysqli_error($conexion));
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

    <title>Reporte Asignación FS</title>
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
                title:"alumnos_con_2_o_mas_examenes_en_1_dia_extras_"+(GetTodayDate()),
            },
            {
            /*'csvHtml5',*/
                extend: 'pdf',
                text:"Exporta PDF",
                title:"alumnos_con_2_o_mas_examenes_en_1_dia_extras_"+(GetTodayDate()),
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
    <div class="col-md-12"><h1 class="text-center">Reporte de alumnos con 2 exámenes o más en un día</h1></div>
</div><!--fin del row -->


<div class="row">

         <table id="datatables" class="table table-bordered table-hover dataTable" role="grid" >
              <thead>
                <tr>
                 <th>
                  Día Extra.
                  </th>
                  <th>
                  Fecha Extra.
                  </th>
                  <th>
                  Inicio Extra.
                  </th>
                  <th>
                  Fin Extra.
                  </th>
                  <th>
                  Aula Extra.
                  </th>
                  <th>
                  Materia
                  </th>
                  <th>
                  Matrícula
                  </th>
                  <th>
                  Alumno
                  </th>
                  <th>
                  Clave
                  </th>
                  <th>
                  Grupo
                  </th>
                  <th>
                  Expediente
                  </th>
                  <th>
                  Maestro
                  </th>
                  </tr>
                   </thead>

               <tbody>
<?php
    while($row=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
            $dia_extra=trim(utf8_encode($row["dia_extra"]));
            $fecha_extra=utf8_encode(trim($row["fecha_extra"]));
            $horai_extra=trim($row["horai_extra"]);
            $horaf_extra=trim($row["horaf_extra"]);
            $aula_extra=trim(utf8_encode($row["aula_extra"]));
            $materia=trim(utf8_encode($row["materia"]));
            $matricula=trim($row["matricula"]);
            $alumno=trim(utf8_encode($row["alumno"]));
            $clave=trim($row["clave"]);
            $grupo=trim($row["grupo"]);
            $expediente=trim($row["expediente"]);
            $maestro=trim(utf8_encode($row["maestro"]));


// printf ("(%s)(%s)(%s)(%s)(%s)\n",$row["alumno"],$row["clave"],$row["grupo"],$row["maestro"],utf8_encode($row["materia"]));
?>
        <tr>
            <td><?=$dia_extra;?></td>
            <td><?=$fecha_extra;?></td>
            <td><?=$horai_extra;?></td>
            <td><?=$horaf_extra;?></td>
            <td><?=$aula_extra;?></td>
            <td><?=$materia;?></td>
            <td><?=$matricula;?></td>
            <td><?=$alumno;?></td>
            <td><?=$clave;?></td>
            <td><?=$grupo;?></td>
            <td><?=$expediente;?></td>
            <td><?=$maestro;?></td>
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