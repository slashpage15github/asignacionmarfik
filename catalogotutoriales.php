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



$sql="select ID, NOMBRE from videos order by ID asc;";
//$sql="select * from videos order by ID asc;";
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
    #catalogo{
      
      height: 600px;
    }
    /*#cuadro{
      background-image: url("https://i.ytimg.com/vi/uSGdOgwSnb4/maxresdefault.jpg");
      
      height: 60%;
    }
    #preview{
      height: 0%;
      text-align: center;
      font-family: Verdana;
      background: rgba(255, 255, 255, 0.0);
      -webkit-transition: background 1s;
      

    }
    #preview span{
      margin-top: 39%;
      margin-bottom: 39%;
      font-size: 130px;
      opacity: 0;
      -webkit-transition: opacity 2s;
    }
    #cuadro:hover #preview{
      height: 100%;
      text-align: center;
      font-family: Verdana;
      background: rgba(255, 255, 255, 0.5);
    }
    #cuadro:hover #preview span{
      opacity: 1;
    }*/
    .cuadro{
      margin-top: 20px;
      margin-left: 70px;
      background-color: rgba(0, 0, 0, 1);
      height: 40%;
      box-shadow: 0px 0px 0px #888888;
      -webkit-transition: box-shadow 2s;

    }
    .cuadro a{
      text-decoration: none;
    }
    #previewI{
      
      text-align: center;
      font-family: Verdana;
      background: rgba(255, 255, 255, 0);
      -webkit-transition: background 2s;
      

    }
    #previewI span{
      margin-top: 15%;
      margin-bottom: 15%; 
      font-size: 90px;
      /*opacity: 0;*/
      -webkit-transition: margin-top 2s;
      -webkit-transition: margin-bottom 2s;
    }
     #previewt{
      
      font-family: Verdana;
      background: rgba(191, 191, 191, 1);
      -webkit-transition: background 2s; 

    }
    #previewt p{
      margin-top: 11%;
      margin-bottom: 1%;
      margin-left: 5%;
      font-size: 14px;
      -webkit-transition: margin-top 2s;
      -webkit-transition: margin-left 2s; 
      -webkit-transition: font-size 1s; 
    }
    .cuadro:hover{
      box-shadow: 5px 9px 8px #888888;
    }
    .cuadro:hover #previewI{
      background: rgba(255, 255, 255, 0.5);
    }
    .cuadro:hover #previewI span{      
      margin-top: 12%;
      margin-bottom: 9%;
    }
    .cuadro:hover #previewt p{
      margin-left: 20%;
      font-size: 25px;
      margin-bottom: 9%;
      margin-top: 9%;
    }
    #video{
      
    }
    video {
      width: 100%;
      height: auto;
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
      <div class="col-md-8"></div>
      <div class="col-md-2" >
          <IMG SRC = "images/UAdeC.png" width="150px"/>
      </div>
    </div>
 


    <div class = "row">
      <div class="col-md-12"><b><h1 class="text-center">Videos tutoriales.</h1></b></div>
    </div>
    </div><!--fin del row -->




  </div>


</div><!-- contenedor-->

  <div class="col-md-12" id="catalogo">
    <!--<div class="col-md-3" id="cuadro">
      <div class="row">
        <div class="col-md-12" id="previewI">
          <a href="#"><span class="glyphicon glyphicon-play-circle"></span></a>
        </div>
        <div class="col-md-12" id="previewt">
          <b><p>Tutorial 1.</p></b>
        </div>
      </div>
    </div>
    <div class="col-md-3" id="cuadro">
      <div class="row">
        <div class="col-md-12" id="previewI">
          <a href="#"><span class="glyphicon glyphicon-play-circle"></span></a>
        </div>
        <div class="col-md-12" id="previewt">
          <b><p>Tutorial 1.</p></b>
        </div>
      </div>
    </div><br>-->
  <?php
    if (!$resultado) {
      $message = 'Invalid query: ' . mysql_error() . " ";
      $message .= 'Whole query: ' . $query;
      die($message);
    }
 
    // Use resultado
    //Aca recorres todas las filas y te va devolviendo el resultado
    while ($row =mysqli_fetch_array($resultado)) {
  ?>
      
        <div class="cuadro col-md-3" id="<?php echo utf8_encode($row['ID']); ?>">
          <div class="row">
            <div class="col-md-12" id="previewI">
              <a href="#"><span class="glyphicon glyphicon-play-circle"></span></a>
            </div>
            <div class="col-md-12" id="previewt">
              <b><p><?php echo utf8_encode($row['NOMBRE']); ?></p></b>
            </div>
          </div>
        </div>
  <?php
    }
  ?>
</div>
<!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">TUTORIAL 1.</h4>
        </div>
        <div class="modal-body">
          <p id="descripcion">Como generar tu horario de examenes ordinario y extraordinarios.</p><br>
          <div class="col-md-12" id="video">
            <video width="400" controls id="reproductordevideo">
              <!--<source src="" type="video/mp4" id="videomuestra">-->
              <!--<source src="mov_bbb.ogg" type="video/ogg" id="videomuestra">-->
              Your browser does not support HTML5 video.
            </video>
          </div>
        </div><br>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" id="cerrar-modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>

<p id="prueba"></p>

<script>
  $(document).ready(function(){
    var id;
    var arreglo=new Array();
    $(".cuadro").click(function(){
      id = $(this).attr("id");
      
      $.post("buscar.php", {id: id}, function(mensaje) {
        arreglo=mensaje;
        var obj =JSON.parse(mensaje);
          
            $(".modal-title").text(obj.nom);
            $("#descripcion").text(obj.des);
            //$("#videomuestra").attr("src",obj.lin);//aqui pongo el link 
            $("video").html('<source src="'+obj.lin+'" type="video/mp4" id="videomuestra">' );
            $("video").load();
            $("video").trigger('play');
      });
                 
     /* $(".modal-title").text();
      $("#descripcion").text("hola");
      $("[id=videomuestra]").attr("src","second.jpg");*///aqui pongo el link 
      $("#myModal").modal();
        
    });//fin click function

    $('#cerrar-modal').click(function(){
      //$('#reproductordevideo')[0].pause();
      //$("#videomuestra").Attr("src",'');
      //$("video").html('<source src=" " type="video/mp4" id="videomuestra">' );
      $("video").trigger('pause');
      //$("video")[0].('pause');

    });
    $("#myModal").on('hidden.bs.modal', function () {
            $("video").trigger('pause');
    });
  });//fin funxtion
</script>
    
	
	
<?php
mysqli_free_result($resultado);
mysqli_close($conexion);
?>
</body>
</html>