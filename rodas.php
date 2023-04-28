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


    $sql="select distinct (select count(*) AS grupos from ofertaacademica) as resultado, 
                (select count(*) as grupos from ofertaacademica where departamental='MD') as resultado2, 
                (select count(*) as grupos from ofertaacademica where departamental='ND') as resultado3,
                (select count(*) as grupos from ofertaacademica where departamental='MI') as resultado4, 
                (select count(*) as grupos from ofertaacademica where departamental not in ('MD','ND','MI')) as resultado5,
                (select count(*) AS alumnos from alumnos) as resultado6,
                (select count(*) as alumnos 
                    from alumnos a 
                    join ofertaacademica o on a.clave=o.clave and a.grupo=o.grupo and a.expediente=o.expediente 
                    where o.departamental='MD') as resultado7 
                from ofertaacademica , alumnos";
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
        background-color:#f5f5f5;
    }
    .statContainer {
        margin:auto;
        width:960px;
    }
    .statRedirect {
        color:#06f;
        font-family:'segoe ui light',arial;
        font-size:14px;
        display: inline-block;
        overflow: hidden;

        vertical-align: top;
        -webkit-perspective: 600px;
        -moz-perspective: 600px;
        -ms-perspective: 600px;
        perspective: 600px;

        -webkit-perspective-origin: 50% 50%;
        -moz-perspective-origin: 50% 50%;
        -ms-perspective-origin: 50% 50%;
        perspective-origin: 50% 50%;
    }
    .statRedirect span {
        display: block;
        position: relative;
        padding: 2px 8px;

        -webkit-transition: all 400ms ease;
        -moz-transition: all 400ms ease;
        -ms-transition: all 400ms ease;
        transition: all 400ms ease;
        -webkit-transform-origin: 50% 0%;
        -moz-transform-origin: 50% 0%;
        -ms-transform-origin: 50% 0%;
        transform-origin: 50% 0%;
        -webkit-transform-style: preserve-3d;
  -moz-transform-style: preserve-3d;
  -ms-transform-style: preserve-3d;
  transform-style: preserve-3d;
}

.statBubbleContainer:hover > .statRedirect span {
  background: #00929c;

  -webkit-transform: translate3d( 0px, 0px, -30px ) rotateX( 90deg );
  -moz-transform: translate3d( 0px, 0px, -30px ) rotateX( 90deg );
  -ms-transform: translate3d( 0px, 0px, -30px ) rotateX( 90deg );
  transform: translate3d( 0px, 0px, -30px ) rotateX( 90deg );
}

.statRedirect span:after {
  content: attr(data-title);

  display: block;
  position: absolute;
  left: 0;
  top: 0;
  padding: 2px 8px;

  color: #fff;
  background: #0e76bc;

  -webkit-transform-origin: 50% 0%;
  -moz-transform-origin: 50% 0%;
  -ms-transform-origin: 50% 0%;
  transform-origin: 50% 0%;

  -webkit-transform: translate3d( 0px, 105%, 0px ) rotateX( -90deg );
  -moz-transform: translate3d( 0px, 105%, 0px ) rotateX( -90deg );
  -ms-transform: translate3d( 0px, 105%, 0px ) rotateX( -90deg );
  transform: translate3d( 0px, 105%, 0px ) rotateX( -90deg );
}

.statBubbleContainer:hover > .statRedirect {
  text-decoration:none;
}

.underline {
  text-decoration:underline;
}

.statBubbleContainer {
    width:163px;
    height:250px;
    position:relative;
    cursor:pointer;
    text-align:center;
    margin:auto;
    margin-top:50px;
    display:inline-block;
    margin-left:36px;
    margin-right:36px;
}

.nounderline {
  text-decoration:none;
}

.statBubbleContainer h3 {
  font-family:'segoe ui bold',arial;
  font-size:14px;
  color:#828282;
  -webkit-transition:all 0.3s ease-in-out;
  -ms-transition:all 0.3s ease-in-out;
  -moz-transition:all 0.3s ease-in-out;
  -o-transition:all 0.3s ease-in-out;
  -apple-transition:all 0.3s ease-in-out;
  transition:all 0.3s ease-in-out;
}

.statBubbleContainer:hover > h3 {
  color:#0e76bc;  
}

.statBubbleContainer:hover > .statBubble {
  border:6px solid #0e76bc;
  background-position:center -140px;
}

.statBubbleContainer:hover .statNum {
  color:#2b2b2b;
}


.grupo {

  background-image:url( "images/grupo.png");  

}
.alumno {

  background-image:url( "images/alumno.png");  

}


.statBubble {
  margin:auto;
  width:150px;
  height:150px;
  border-radius:100%;
  border:6px solid #ED2B15;
  background-repeat:no-repeat;
  background-position:center 25px;
  position:relative;
  text-align:center;
  -webkit-transition:all 0.3s ease-in-out;
  -ms-transition:all 0.3s ease-in-out;
  -moz-transition:all 0.3s ease-in-out;
  -o-transition:all 0.3s ease-in-out;
  -apple-transition:all 0.3s ease-in-out;
  transition:all 0.3s ease-in-out;
}

.statNum {
  position:absolute;
  font-family:'segoe ui light',arial;
  left:0;
  right:0;
  margin:auto;
  line-height:150px;
  vertical-align:middle;
  font-size:40px;
  color:#414141;
   -webkit-transition:all 0.3s ease-in-out;
  -ms-transition:all 0.3s ease-in-out;
  -moz-transition:all 0.3s ease-in-out;
  -o-transition:all 0.3s ease-in-out;
  -apple-transition:all 0.3s ease-in-out;
  transition:all 0.3s ease-in-out;
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
                title:"reporte_plantilla_docente_"+(GetTodayDate()),
            },
            {
            /*'csvHtml5',*/
                extend: 'pdf',
                text:"Exporta PDF",
                title:"reporte_plantilla_docente_"+(GetTodayDate()),
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
                <div class="col-md-12"><h1 class="text-center">Reportes</h1></div>
                
            </div><!--fin del row -->
            <div class="row">
                
                        <?php
                            while($row=mysqli_fetch_array($resultado,MYSQLI_ASSOC)){
                                $resultado0=trim($row["resultado"]);
                                $resultado2=trim($row["resultado2"]);
                                $resultado3=trim($row["resultado3"]);
                                $resultado4=trim($row["resultado4"]);
                                $resultado5=trim($row["resultado5"]);
                                $resultado6=trim($row["resultado6"]);
                                $resultado7=trim($row["resultado7"]);
                                                                
                        ?>
                                  <div class="statContainer">
                                    <a class="nounderline"  title="Todas las materias">
                                      <div class="statBubbleContainer"> 
                                        <div class="statBubble grupo">
                                          <div class="statNum">
                                            <?=$resultado0;?>
                                              
                                            </div>
                                          </div>
                                          <h3>Materias Totales</h3>
                                        -
                                      </div>
                                    </a>
                                    <a class="nounderline"  title="Todas las materias">


<a class="nounderline"  href="reportesmd.php" title="Materias Departamentales" >
<div class="statBubbleContainer">
<div class="statBubble grupo">
  <div class="statNum">
   <?=$resultado2;?>

  </div>
</div>
  <h3>Departamentales </h3>
  <div class="statRedirect"><span data-title="Reporte →">Reporte →</span> </div>
</div>
</a>


<a class="nounderline"  href="reportend.php" title="Materias No Departamentales">
<div class="statBubbleContainer">
<div class="statBubble grupo">
  <div class="statNum">
<?=$resultado3;?>
  </div>
</div>
  <h3>No Departamentales</h3>
  <div class="statRedirect"><span data-title="Reporte →">Reporte →</span> </div>
</div>
</a>


<a class="nounderline"  href="reportemi.php" title="Materia Ingles">
<div class="statBubbleContainer">
<div class="statBubble grupo">
  <div class="statNum">
<?=$resultado4;?>
  </div>
</div>
  <h3>Ingles</h3>
  <div class="statRedirect"><span data-title="Reporte →">Reporte →</span> </div>
</div>
</a>


<a class="nounderline"  href="reporteot.php" title="Materias no asignadas">
<div class="statBubbleContainer">
<div class="statBubble grupo">
  <div class="statNum">
<?=$resultado5;?>
  </div>
</div>
  <h3>No Asignadas</h3>
  <div class="statRedirect"><span data-title="Reporte →">Reporte →</span> </div>
</div>
</a>




<a class="nounderline"  title="Alumnos Totales">
<div class="statBubbleContainer">
<div class="statBubble alumno">
  <div class="statNum">
  <?=$resultado6;?>

  </div>
</div>
  <h3>Alumnos Totales</h3>
   -
</div>
</a>


<a class="nounderline"  href="reporamd.php" title="Alumnos que Cursan Materias Departamentales">
<div class="statBubbleContainer">
<div class="statBubble alumno">
  <div class="statNum">
 <?=$resultado7;?>
  </div>
</div>
  <h3>Departamentales</h3>
  <div class="statRedirect"><span data-title="Reporte →">Reporte →</span> </div>
</div>
</a>

                                
                              
                                
                                 
                               
                                  
                        <?php
                            }//cierre de while lista de materias
                        ?>
                    
            </div>
        </div>
    </div><!-- contenedor-->
    <?php
        //mysqli_free_result($resultado);
        mysqli_close($conexion);
    ?>

    <script>
        $(document).ready(function(){
            $("#borrar").click(function(){
                var semestre= "this.val();"
                alert(semestre);
            });
        });
    </script>
</body>
</html>