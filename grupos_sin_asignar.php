

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




$sql="Select o.alumnos, o.clave, o.materia, o.grupo, o.expediente, o.maestro, o.horas, o.departamental, o.semestre, o.observacion 
from ofertaacademica o left join gruposmaestros g on g.clave=o.clave and g.grupo=o.grupo and g.expediente=o.expediente 
where g.grupo is null 
order by clave,  materia, grupo, maestro, horas, departamental, semestre, observaciones";
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

    <title>Reporte Grupos de Oferta vs Grupos Maestros FS</title>
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
                title:"grupos_sin_asignar"+(GetTodayDate()),
            },
            {
            /*'csvHtml5',*/
                extend: 'pdf',
                text:"Exporta PDF",
                title:"grupos_sin_asignar"+(GetTodayDate()),
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
    <div class="col-md-12"><h1 class="text-center">Reporte de grupos de Oferta Académica que no están en Grupos Maestros</h1></div>
</div><!--fin del row -->


<div class="row">

         <table id="datatables" class="table table-bordered table-hover dataTable" role="grid" >
              <thead>
                <tr>
                 <th>
                 Alumnos
                  </th>
                  <th>
                  Clave
                  </th>
                  <th>
                  Materia
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
                  <th>
                  Horas
                  </th>
                  <th>
                  Departamental
                  </th>
                  <th>
                  Semestre
                  </th>
                  <th>
                  Observaciones
                  </th>
                  </tr>
                   </thead>

               <tbody>
<?php
    while($row=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
            $alumnos=trim(utf8_encode($row["alumnos"]));
            $clave=trim($row["clave"]);
            $materia=trim(utf8_encode($row["materia"]));
            $grupo=trim(utf8_encode($row["grupo"]));
            $expediente=trim(utf8_encode($row["expediente"]));
            $maestro=trim(utf8_encode($row["maestro"]));
            $horas=trim(utf8_encode($row["horas"]));
             $departamental=trim(utf8_encode($row["departamental"]));
             $semestre=trim(utf8_encode($row["semestre"]));
             $observacion=trim(utf8_encode($row["observacion"]));
            


// printf ("(%s)(%s)(%s)(%s)(%s)\n",$row["alumno"],$row["clave"],$row["grupo"],$row["maestro"],utf8_encode($row["materia"]));
?>
        <tr>
  
            <td><?=$alumnos;?></td>
            <td><?=$clave;?></td>
            <td><?=$materia;?></td>
            <td><?=$grupo;?></td>
            <td><?=$expediente;?></td>
            <td><?=$maestro;?></td>
            <td><?=$horas;?></td>
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