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


    $sql="select * from catalogo_materias_depa";
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
    <title> Materias Departamentales</title>
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
                title:"fecha_examen_departamental_"+(GetTodayDate()),
            },
            {
            /*'csvHtml5',*/
                extend: 'pdf',
                text:"Exporta PDF",
                title:"fecha_examen_departamental_"+(GetTodayDate()),
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


<script type="text/javascript">
<!--
function confirmation() {
    if(confirm("Realmente desea eliminar el registro?"))
    {
        return true;
    }
    return false;
}
//-->
</script>




</head>

<body>
    <?php
        if (!isset($_SESSION['usuario']))
            include('menu_publico.php');
        else
            include('menu_privado.php');
    ?>
    <div container-fluid align="center">
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
                <div class="col-md-12"><h1 class="text-center">Calendario Sistemas UAdeC: Materias Departamentales</h1></div>
                
            </div><!--fin del row -->
            <div class="row">
                <a href="agregar_mat_dep.php" style="text-decoration: none; color: #000;">
                <button type="button" class="btn btn-default btn-sm" id="btnagregar">                    
                    <span class="glyphicon glyphicon-calendar"></span> Agregar
                </button>
                </a>
                <table id="datatables" class="table table-bordered table-hover dataTable" role="grid" >
                    <thead>
                        <tr>
                            <th>Clave de Materia</th>
                            <th>Nombre de Materia</th>
                            <th>Fecha Ordinario</th>
                            <th>Fecha Extraordinario</th>
                            <th>Opciones</th>                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($row=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
                                $cve_mat=$row["cve_mat"];
                                $materia=strtoupper(utf8_encode($row["materia"]));
                                
                                $dia_aplicacion_ord=trim(utf8_encode($row["dia_aplicacion_ord"]));
                                $dia_aplicacion_ext=trim(utf8_encode($row["dia_aplicacion_ext"]));      


                        ?>
                                <tr >
                                    <td><?=$cve_mat;?></td>
                                    <td><?= strtoupper($materia);?></td>
                                    <td><?=$dia_aplicacion_ord;?></td>
                                    <td><?=$dia_aplicacion_ext;?></td>
                                    <td><a href="editar_mat_dep.php?cve_mat=<?=$cve_mat;?>&materia=<?=$materia;?>" style="text-decoration: none; color: #000;">
                                        <span class="glyphicon glyphicon-edit" id="editar"></span>
                                        </a>
                                        <a href="eliminar_mat_dep.php?cve_mat=<?=$cve_mat;?>&materia=<?=$materia;?>" onclick="return confirm('Realmente quiere borrar el registro?')" style="text-decoration: none; color: #000;">
                                        <span class="glyphicon glyphicon-trash" id="borrar" ></span>
                                        </a>
                                    </td>                                   
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

    <script>
       /* $(document).ready(function(){
            $(".borrar").on("click",function(){
                var cve_mat= $(this).parents('tr').find('td').eq(0).text();
                $.post("eliminar_mat_dep.php", {cve_mat: cve_mat}, function() {
                    location.reload();
                    //$(this).closest('tr').remove();
                    //$('table').trigger('update');
                });
            });
});*/
    </script>
</body>
</html>