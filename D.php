<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Contadores De Alumnos</title>
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
<body>

    <?php
        session_start();
    include("class/data.inc.php");
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
                <div class="col-md-12"><h1 class="text-center">LISTADOS DE ALUMNOS</h1></div>
            </div><!--fin del row -->
            <div class="row">
                <table id="datatables" class="table table-bordered table-hover dataTable" role="grid" >
                    <thead>
<table BORDER=5 CELLPADDING=10 CELLSPACING=10 width="70%" border="1px" align="center">

<?php
$conexion = mysql_connect('127.0.0.1', 'root', '');
mysql_select_db('asignacionfs_db', $conexion);
$consulta = mysql_query("select count(*) as alumnos,o.departamental 
from alumnos a join ofertaacademica o on a.clave=o.clave and a.grupo=o.grupo and a.expediente=o.expediente
where o.departamental not in ('ND','MI');", $conexion);

$consulta2 = mysql_query("select count(*) as alumnos,o.departamental 
from alumnos a join ofertaacademica o on a.clave=o.clave and a.grupo=o.grupo and a.expediente=o.expediente
where o.departamental='ND'", $conexion);

$consulta3 = mysql_query("select count(*) as alumnos,o.departamental 
from alumnos a join ofertaacademica o on a.clave=o.clave and a.grupo=o.grupo and a.expediente=o.expediente
where o.departamental='MI'", $conexion);
$result = mysql_fetch_assoc($consulta);
$result2 = mysql_fetch_assoc($consulta2);
$result3 = mysql_fetch_assoc($consulta3);
?>
<tr align="center">
<div class="btn-toolbar" role="toolbar">
<td <div class="btn-group"><button type="button" class="btn btn-danger"><a style="color:white;font-weight: bold;font-size: 18px;text-decoration:none;" href="reporte_d.php" target="_blank"><?php print 'MATERIAS DEPARTAMENTALES'.'<br>'.$result['alumnos']; ?></button></td>
</div>
<td <div class="btn-group"><button type="button" class="btn btn-danger"><a style="color:white;font-weight: bold;font-size: 18px;text-decoration:none;" href="reporte_nd.php" target="_blank"><?php print 'MATERIAS NO DEPARTAMENTALES'.'<br>'.$result2['alumnos']; ?></td>
</div>
<td <div class="btn-group"><button type="button" class="btn btn-danger"><a style="color:white;font-weight: bold;font-size: 18px;text-decoration:none;" href="reporte_mi.php" target="_blank"><?php print 'MATERIA DE INGLES'.'<br>'.$result3['alumnos']; ?></td>
</div>
</div>
</table>
<?php
        mysql_free_result($consulta);
        mysql_free_result($consulta2);
        mysql_free_result($consulta3);
        mysql_close($conexion);
    ?>