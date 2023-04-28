<?php 
session_start();
include('protected_sesion.php');
//echo $_SESSION['usuario'];
//echo $_SESSION['tipou'];
if ($_SESSION['tipou']==1){
  echo "<script>";
  echo "alert('Esta seccion es solo para usuarios tipo Administrador');";
  echo "window.history.back();";
  echo "</script>";
  //ESTE ES UN SCRIPT PARA MOSTRAR LO QUE ES UNA SUBSTRACCIÓN DE QUERY
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
<title>Movimientos a dias no departamentales
</title>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
</head>
   <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/jumbotron.css" rel="stylesheet">
    <link href="css/bootstrap-dialog.css" rel="stylesheet">
    <link href="css/mystyles.css" rel="stylesheet">

    <script src="js/jquery-3.1.0.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-dialog.js"></script>
<!--<link rel="stylesheet" type="text/css" href="./estilos/estilos.css">-->
    <script src="<?php echo 'http://'.$_SERVER["HTTP_HOST"];?>/asignacionfs/js/myfunctions_js.js"></script>
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
<script type="text/javascript">
function limpia_para_nuevos_dias()
{
 
  document.getElementById("operacion").value='Ingresar';
  document.getElementById("_id").value='';
  document.getElementById("_dia").value='';
  document.getElementById("_fecha").value='';
  document.getElementById("_tipo").value='';

  
  document.get|ElementById("nuevo").style.visibility="hidden";
  
  document.forma_ingreso.dias.focus();
  
  
}
</script>

<body>

<?php

if (!isset($_SESSION['usuario']))
include('menu_publico.php');
else
include('menu_privado.php');
?>


    <!-- Page Content -->
     <div class="container">
       <div class="row">
          <div class="col-md-3 pull-left">
             <IMG SRC = "images/logo.png"/>
         </div>
         <div class="col-md-3 pull-right">
             <IMG SRC = "images/UAdeC.png"/>
         </div>
     </div>
     <div class="row">
      <div class="col-lg-12 text-center">
         <h1 class="sinMargen">Calendario Sistemas UAdeC: Control de Dias</h1>
         <div id="calendar" class="col-centered">
         </div>
         <div id="img-out"></div>

     </div>
    </div>
    <script>
$(document).ready(function() {

 /*   $('#datatables tfoot th').each( function () {
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
                title:"dias_no_dep"+(GetTodayDate()),
            },
            {
            /*'csvHtml5',*/
                extend: 'pdf',
                text:"Exporta PDF",
                title:"dias_no_dep"+(GetTodayDate()),
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


<?php
include ("./Funciones_PHP/funciones_php.php");
include_once ("log_clase_dias_no_departamentales.php"); // incluye las clases

  $_id="";
  $_dia="";
  $_fecha="";
  $_tipo="";
  

  $id="";

if (isset($_GET['md'])) // si la operacion es modificar, este valor viene seteado y ejecuta el siguiente codigo
{
  
//print "voy a modificar";exit;
  $o_id=new DiasNoDep($_GET['md']);  // instancio la clase cliente pasandole el nro de cliente, de esta forma lo busca
  $_id=$o_id->getId();   // obtengo el nombre
  $_dia=$o_id->getDias(); // obtengo el apellido
  $_fecha=$o_id->getFecha();   // obtengo la fecha de nacimiento
  $_tipo=$o_id->getTipo();     // obtengo su peso


  $_id=$o_id->getId();       // obtengo el id

}

// asignacion de pagina para quese quede en la misma al actualizar
if (isset($_GET['_pagi_pg']))
{
$_pagi_pg=$_GET['_pagi_pg'];
//echo "cuando existe".$_pagi_pg;
}
else
{
$_pagi_pg=1;
//echo "cuando  NO existe".$_pagi_pg;
}
?>
<div >
<form method="POST" action="log_forma_dias_no_departamentales.php" name="forma_ingreso" onsubmit="return Validate_dias_no_dep();">
<input type="hidden" name="id" id="_id" value="<?php print $_id ?>">
<input type="hidden" name="pagina" value="<?php print $_pagi_pg ?>">

<center>
<table border="0" class="table table-hover" id="datatables" >

<tr>
  <td>ID:</td>
  <td><input type="text" name="id" id="_id" value="<?php print $_id ?>" size="70" maxlength="15"></td>
</tr>
<tr>
  <td>DIA:</td>
  <td><input type="text" name="dia" id="_dia" value="<?php print $_dia ?>" size="70" maxlength="15"></td>
</tr>
<tr>
   <td>FECHA:</td>
  <td><input type="text" name="fecha" id="f_fecha" value = "<?php print $_fecha?>" size="70" maxlength="15"></td>
</tr>

<tr>
  <td>TIPO:</td>
  <td>
     <?php
      $consulta="select tipo, tipo from parametros_dias_no_departamentales order by id";
      saca_menu_desplegable($consulta,$_tipo, 'tipo','_tipo');
     ?>
  </td>

</tr>

</tr>

<tr>
  <td></td>
  <td align =right><input type="submit" id="operacion" name="submit" value ="<?php if(is_numeric($_id)) print "Modificar"; else print "Ingresar";?>" class="btn btn-danger">
  <input type="button" id="nuevo" value="Nuevo Dia" onclick="limpia_para_nuevos_dias();" class="btn btn-danger">
  <!--
  <input type="button" id="menu" value="Ver Calendario" onclick="window.location.href = 'index.php';" class="btn btn-danger">
-->
  </td>

</tr>
</table>
</center>
</form>
</div>



<?php
if (isset($_POST['submit'])&&!is_numeric($_POST['id'])) // si presiono el boton ingresar
{
/*  
print "usuario:".$_POST['usuario'].'<br/>';
print "nombre_usuario:".$_POST['nombre_usuario'].'<br/>';
print "clave:".$_POST['clave'].'<br/>';
print "tipo usuario:".$_POST['tipo_usuario'].'<br/>';

exit;
*/  
  $o_id=new DiasNoDep();
  $o_id->setId($_POST['id']); // setea los datos
  $o_id->setDias($_POST['dia']);
  $o_id->setFecha($_POST['fecha']);
  $o_id->setTipo($_POST['tipo']);


  print " Consulta ejecutada: ". $o_id->insertDias(); // inserta y muestra el resultado

}
if (isset($_POST['submit'])&&is_numeric($_POST['id'])) // si presiono el boton y es modificar
{
//print "modificando";exit;

  $_pagi_pg=trim($_POST['pagina']);

  $o_id=new DiasNoDep($_POST['id']);  // instancio la clase pasandole el nro de cliente para cargar los datos
  $o_id->setId($_POST['id']); // setea los datos nuevos
  $o_id->setDias($_POST['dia']);
  $o_id->setFecha($_POST['fecha']);
  $o_id->setTipo($_POST['tipo']);

print " Consulta ejecutada: ". $o_id->updateDias(); // inserta y muestra el resultado

    //header("Location: log_forma_usuarios_abc.php?_pagi_pg=$_pagi_pg");
  //exit;

}

if (isset($_GET['br'])&&is_numeric($_GET['br'])) // si presiono el boton y es eliminar
{


  $id=new DiasNoDep();
  print " Consulta ejecutada: ". $id->deleteDias($_GET['br']); // elimina el cliente y muestra el resultado

  //header("Location: log_forma_usuarios_abc.php?_pagi_pg=$_pagi_pg");
}


        require("log_database.class.php");

        $db = new Database(DB_SERVER, DB_USER, DB_PASS, DB_PRUEBA);
        $db->connect();





//Sentencia sql (sin limit)
//$_pagi_sql = 'SELECT * FROM usuarios WHERE blnActivo='."'".$_SESSION['g_roles']."'".' ORDER BY Name';
$_pagi_sql ='select id, dia, fecha, tipo 
FROM parametros_dias_no_departamentales';

//echo $_pagi_sql;exit;

//cantidad de resultados por página (opcional, por defecto 20)
$_pagi_cuantos = 10;//Elegí un número pequeño para que se generen varias páginas

//cantidad de enlaces que se mostrarán como máximo en la barra de navegación
$_pagi_nav_num_enlaces = 5;//Elegí un número pequeño para que se note el resultado

//Decidimos si queremos que se muesten los errores de mysql
$_pagi_mostrar_errores = false;//recomendado true sólo en tiempo de desarrollo.

//Si tenemos una consulta compleja que hace que el Paginator no funcione correctamente,
//realizamos el conteo alternativo.
$_pagi_conteo_alternativo = true;//recomendado false.

//Supongamos que sólo nos interesa propagar estas dos variables
$_pagi_propagar = array("status","termino");//No importa si son POST o GET

//Definimos qué estilo CSS se utilizará para los enlaces de paginación.
//El estilo debe estar definido previamente
$_pagi_nav_estilo = "btn btn-danger";

//definimos qué irá en el enlace a la página anterior
$_pagi_nav_anterior = "&lt;";// podría ir un tag <img> o lo que sea  ="<img src=\"flecha_anterior.gif\">";

//definimos qué irá en el enlace a la página siguiente
$_pagi_nav_siguiente = "&gt;";// podría ir un tag <img> o lo que sea

//Incluimos el script de paginación. Éste ya ejecuta la consulta automáticamente
  
include("paginator.inc.php");

//Leemos y escribimos los registros de la página actual


print '<br/>

<div class="row">
<div class="col-md-2">
</div>
<div class="col-md-8">
<div id=ilumina_renglon>
<center>
<table border="0" id="datatables"  class="table table-bordered table-hover" >'
      .'<tr bgcolor="#ff9999"><td>Id</td>'
      .'<td>Dia</td>'
      .'<td>Fecha</td>'
      .'<td>Tipo</td>'
      .'<td>Modificar</td>'
      .'<td>Borrar</td></tr>';

while($row = mysql_fetch_array($_pagi_result)){



 print '<tr>'
      .'<td>'.$row['id'] .'</td>'
      .'<td>'.utf8_encode($row['dia']) .'</td>'
      .'<td>'.strtoupper(Utf8_encode($row['fecha'])).'</td>'
      .'<td>'.strtoupper(Utf8_encode($row['tipo'])).'</td>'
      .'<td><a href="log_forma_dias_no_departamentales.php?md='.$row['id'].'&_pagi_pg='.$_pagi_pg.'"><img src="pics/modificar.png" border="0" style="position:relative;left:12px;"></a></td>'   // en este ejemplo para simplificar se envian los parametros por get utilizando un href
      .'<td><a href="log_forma_dias_no_departamentales.php?br='.$row['id'].'&_pagi_pg='.$_pagi_pg.'" onclick="return confirmation()";"><img src="pics/borrar.png" border="0" style="position:relative;left:4px;"></a></td>'    // lo correcto seria enviarlos por post con un submit por ejem.
      .'</tr>';
}
echo '</table></center></div></div></div>';
//Incluimos la barra de navegación

if ($_pagi_totalReg>$_pagi_cuantos) {//Incluimos la barra de navegación si el "total de resultados" es mayor que el la cantidad de "resultados por página"
echo"<p><center>".$_pagi_navegacion."</p>";}

//Incluimos la información de la página actual
echo"<p>Mostrando Dias ".$_pagi_info."</center></p>";

$cerrar=new sQuery();
$cierra_conexion= $cerrar->Close();
?>
<SCRIPT LANGUAGE="JavaScript">

  if (document.getElementById("operacion").value=='Modificar')
  {
    //alert(document.getElementById("operacion").value);
  document.getElementById("nuevo").style.visibility="visible";
  }
  else
  {
  document.getElementById("nuevo").style.visibility="hidden";
  }

  //var propiedad=document.getElementById("nuevo").style;
    //propiedad.color="navy";



</SCRIPT>
</body>

</html>