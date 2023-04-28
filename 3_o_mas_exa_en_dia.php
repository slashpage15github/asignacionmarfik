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
/*OPCION SIN CONCAT,POR SI SE EMPIEZA A VER LNTO EL OTRO QUERY
select a.dia_ordi,a.fecha_ordi,a.horai_ordi,a.horaf_ordi,a.aula_ordi,a.materia,a.matricula,a.alumno,
a.clave,a.grupo,a.expediente,a.maestro,a.estatus
from alumnos a
inner join
(
select fecha_ordi,matricula from alumnos where dia_ordi is not null
GROUP BY fecha_ordi,matricula
having count(*)>2
) as x
on a.fecha_ordi=x.fecha_ordi and a.matricula=x.matricula
order by a.fecha_ordi,a.matricula,a.horai_ordi
*/


$sql="select dia_ordi,fecha_ordi,horai_ordi,horaf_ordi,aula_ordi,materia,matricula,alumno,clave,grupo,expediente,maestro
from alumnos
where concat(fecha_ordi,matricula) in 
(
select concat(fecha_ordi,matricula) as llave from alumnos where dia_ordi is not null
GROUP BY fecha_ordi,matricula
having count(*)>2
)
order by fecha_ordi,matricula,horai_ordi;";
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
                title:"alumnos_con_3_examenes_en_1_dia_"+(GetTodayDate()),
            },
            {
            /*'csvHtml5',*/
                extend: 'pdf',
                text:"Exporta PDF",
                title:"alumnos_con_3_examenes_en_1_dia_"+(GetTodayDate()),
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
    <div class="col-md-12"><h1 class="text-center">Reporte de alumnos con 3 exámenes o más en un día</h1></div>
</div><!--fin del row -->


<div class="row">

         <table id="datatables" class="table table-bordered table-hover dataTable" role="grid" >
              <thead>
                <tr>
                 <th>
                  Día Ordi.
                  </th>
                  <th>
                  Fecha Ordi.
                  </th>
                  <th>
                  Inicio Ordi.
                  </th>
                  <th>
                  Fin Ordi.
                  </th>
                  <th>
                  Aula Ordi.
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
            $dia_ordi=trim(utf8_encode($row["dia_ordi"]));
            $fecha_ordi=utf8_encode(trim($row["fecha_ordi"]));
            $horai_ordi=trim($row["horai_ordi"]);
            $horaf_ordi=trim($row["horaf_ordi"]);
            $aula_ordi=trim(utf8_encode($row["aula_ordi"]));
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
            <td><?=$dia_ordi;?></td>
            <td><?=$fecha_ordi;?></td>
            <td><?=$horai_ordi;?></td>
            <td><?=$horaf_ordi;?></td>
            <td><?=$aula_ordi;?></td>
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