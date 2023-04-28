<?php
session_start();
//load the database configuration file
include 'dbConfig4.php';

if(!empty($_GET['status'])){
    switch($_GET['status']){
        case 'succ':
            $statusMsgClass = 'alert-success';
            $statusMsg = 'Members data has been inserted successfully.';
            break;
        case 'err':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Some problem occurred, please try again.';
            break;
        case 'invalid_file':
            $statusMsgClass = 'alert-danger';
            $statusMsg = 'Please upload a valid CSV file.';
            break;
        default:
            $statusMsgClass = '';
            $statusMsg = '';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Importar CSV a Base de Datos</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
    .panel-heading a{float: right;}
    #importFrm{margin-bottom: 20px;display: none;}
    #importFrm input[type=file] {display: inline;}
  </style>
</head>
<body>
<?php
if (!isset($_SESSION['usuario']))
include('menu_publico.php');
else
include('menu_privado.php');
?>

<!-- Page Content -->
    <div class="container">
       <div class="row" style="margin-top: 55px">
            <div class="col-md-3 pull-left">
                <img src="images/logo.png">
            </div>
            <div class="col-md-3 pull-right">
                <img src="images/UAdeC.png">
            </div>
        </div>
     
     
      </div>
    <!-- /.Page Content -->







<div class="container">
    <h2>Importar archivo .CSV de la Carga Alumnos a la Base de Datos</h2>
    <?php if(!empty($statusMsg)){
        echo '<div class="alert '.$statusMsgClass.'">'.$statusMsg.'</div>';
    } ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            Lista
            <a href="javascript:void(0);" onclick="$('#importFrm').slideToggle();">Importar datos</a>
        </div>
        <div class="panel-body">
            <form action="importData4.php" method="post" enctype="multipart/form-data" id="importFrm">
                <input type="file" name="file" />
                <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORTAR">
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>


<th>  matricula </th>
<th>  alumno  </th>
<th>  cve_plan  </th>
<th>  grado </th>
<th>  clave </th>
<th>  materia </th>
<th>  expediente  </th>
<th>  maestro </th>
<th>  grupo </th>
<th>  oportunidad </th>
<th>  observacion </th>
<th>  dia_ordi  </th>
<th>  fecha_ordi  </th>
<th>  horai_ordi  </th>
<th>  horaf_ordi  </th>
<th>  aula_ordi </th>
<th>  dia_extra </th>
<th>  fecha_extra </th>
<th>  horai_extra </th>
<th>  horaf_extra </th>
<th>  aula_extra  </th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    
                    $query = $db->query("SELECT * FROM alumnos ORDER BY alumno DESC");
                    if($query->num_rows > 0){ 
                        while($row = $query->fetch_assoc()){
                        ?>
                    <tr>
                      
<td><?php echo $row['matricula']; ?></td>
<td><?php echo utf8_encode($row['alumno']); ?></td>
<td><?php echo $row['cve_plan']; ?></td>
<td><?php echo $row['grado']; ?></td>
<td><?php echo $row['clave']; ?></td>
<td><?php echo utf8_encode($row['materia']); ?></td>
<td><?php echo $row['expediente']; ?></td>
<td><?php echo utf8_encode($row['maestro']); ?></td>
<td><?php echo $row['grupo']; ?></td>
<td><?php echo $row['oportunidad']; ?></td>
<td><?php echo utf8_encode($row['observacion']); ?></td>
<td><?php echo utf8_encode($row['dia_ordi']); ?></td>
<td><?php echo $row['fecha_ordi']; ?></td>
<td><?php echo $row['horai_ordi']; ?></td>
<td><?php echo $row['horaf_ordi']; ?></td>
<td><?php echo utf8_encode($row['aula_ordi']); ?></td>
<td><?php echo $row['dia_extra']; ?></td>
<td><?php echo $row['fecha_extra']; ?></td>
<td><?php echo $row['horai_extra']; ?></td>
<td><?php echo $row['horaf_extra']; ?></td>
<td><?php echo utf8_encode($row['aula_extra']); ?></td>


                    </tr>
                    <?php } }else{ ?>
                    <tr><td colspan="5">No member(s) found.....</td></tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>