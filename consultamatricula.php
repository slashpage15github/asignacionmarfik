<?php
session_start();
include("class/data.inc.php");
$_SESSION["matr"]=$_matricula=$_POST['matricula'];
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

$sql="select alumno,clave,grupo,maestro,materia,dia_ordi,fecha_ordi,
horai_ordi,horaf_ordi,aula_ordi,dia_extra,fecha_extra,horai_extra,horaf_extra,aula_extra from alumnos FORCE INDEX (idx_matricula) where matricula='$_matricula' order by fecha_ordi,horai_ordi";
//print $sql;exit;
$resultado=mysqli_query($conexion,$sql) or die (mysqli_error());
$cuantoshay=mysqli_num_rows($resultado);
//echo 'cuantos:'.$cuantoshay;exit;

if ($cuantoshay>0) {
   $sql2="select alumno,matricula from alumnos FORCE INDEX (idx_matricula) where matricula='$_matricula' limit 1";
      $resultado2=mysqli_query($conexion,$sql2) or die (mysqli_error());
      $arr_alu = mysqli_fetch_array($resultado2);
      $_SESSION["alu"]=$nombre_alumno=utf8_encode($arr_alu["alumno"]);
      $matricula_alumno=$arr_alu["matricula"];

      //echo $nombre_maestro;exit;
?>
<!DOCTYPE html>
<html lang="sp">
<head>
    <title>Menú Para Nuevo Ingreso</title>
    <style type="text/css">
            .button{
                background: url('images/pdf3.png') no-repeat;
                width: 150px;
                height: 48px;
                cursor:pointer;
                border: none;
            }
        </style>
       <?php 

    include('script_js.php');
    include('script_css.php');
    ?>

<script>

function pdf_alumno(){
  window.open('pdf_alumno.php');
}
$(document).ready(function() {
  $("#myAlert").alert("close");
  $("#myAlert2").alert("close");
/*
    $('#datatables tfoot th').each( function () {
        var title = $('#datatables thead th').eq($(this).index()).text().trim();
        $(this).html( '<input type="text" placeholder="Filtra '+title+'"/>');
    } );
/*nota:para cambiar los filtros al head solo se invierte tfoot vs thead*/


var table =$('#datatables').DataTable({
        "order": [[0,"asc"]],
   dom: 'T<"clear">lfrtip',
   tableTools: { 
    "sSwfPath": "plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf" ,
    "aButtons": [
       /* {
          "sExtends": "print",
          "sButtonText": "Imprimir",
          "fnComplete": function( nButton, oConfig) {
            $("#contentplace").css('margin-left', '0px');
          }
        },*/
        /*"pdf","xls"*/
       
    ],
  },
   responsive: true,
   "scrollX": false,
   "language": {
    "search": "Filtro de Registros:",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sInfo": "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
    "oPaginate": {
        "sPrevious": "Anterior",
        "sNext": "Siguiente"
      }
  }  
    });

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
<div class="container-fluid" align="center"><!--style="border: 1px solid blue;"-->
    <div class="row">
        <div class="col-md-12">
        <div class="col-md-1"></div>
        <div class="col-md-5" style="margin-top: 20px;">
       
        <label for = "exp" class = "control-label">Alumno - Matrícula:</label>
        <label style ="text-transform: uppercase;font-size:17px;color:red;" for = "x" class = "control-label"><?php print $nombre_alumno.' - '.$matricula_alumno; ?>
        </label>
        </div>
        <div class="col-md-4" style="margin-top: 20px;">
        <input type="button" name="button"  onclick="pdf_alumno();" value="" class="button" align="left" />
        </div>
        
        <div class="col-md-2"></div>
        </div>
         <table id="datatables" class="table table-bordered table-hover dataTable" role="grid">
              <thead>
                <tr>
                   <th>
                  Clave
                  </th>
                  <th>
                  Grupo
                  </th>
                  <th>
                  Materia
                  </th>
                  <th>
                  Maestro
                  </th>
                  <th>
                  Ordinario
                  </th>
                  <th>
                  Extraordinario
                  </th>
                  </tr>
                </thead>
        
        <!--      <tfoot>
                <tr>
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
                  Materia
                  </th>
                  <th>
                  Maestro
                  </th>
                  <th>
                  Ordinario
                  </th>
                  </tr>
              </tfoot>
-->
               <tbody>
<?php
    while($row=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){

            $cve=$row["clave"];
            $gpo=$row["grupo"];
            $mat=$row["materia"];
            $mae=$row["maestro"];
            $ord=$row["dia_ordi"];
            $f_ordi=$row["fecha_ordi"];
            $hi_ordi=$row["horai_ordi"];
            $hf_ordi=$row["horaf_ordi"];
            $a_ordi=$row["aula_ordi"];
            $ext=$row["dia_extra"];
            $f_ext=$row["fecha_extra"];
            $hi_ext=$row["horai_extra"];
            $hf_ext=$row["horaf_extra"];
            $a_ext=$row["aula_extra"];


// printf ("(%s)(%s)(%s)(%s)(%s)\n",$row["alumno"],$row["clave"],$row["grupo"],$row["maestro"],utf8_encode($row["materia"]));
?>
        <tr>
      
            <td><?=$cve;?></td>
            <td><?=$gpo;?></td>
            <td><?=utf8_encode($mat);?></td>
            <td><?=utf8_encode($mae);?></td>
            <td><?=utf8_encode($ord).' | '.$f_ordi.' | '.$hi_ordi.' | '.$hf_ordi.' | '.utf8_encode($a_ordi);?></td>
            <td><?=utf8_encode($ext).' | '.$f_ext.' | '.$hi_ext.' | '.$hf_ext.' | '.utf8_encode($a_ext);?></td>

        </tr>
           
        <?php
		}//cierre de while lista de materias
         ?>
               </tbody> 

            </table>
     </div><!-- div row -->

             <center>
        <span style="color:black;">&#169; 2018 Facultad De Sistemas U. A. de C.</span>
        </center>

</div><!-- div container -->
<?php
mysqli_free_result($resultado);
mysqli_free_result($resultado2);
mysqli_close($conexion);
}
else{
    print("<span style='color:red;font-size:25px;'><b>Matrícula de alumno no localizada.</b></span>");
}   
?>
</body>
</html>