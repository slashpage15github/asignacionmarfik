<?php
session_start();
//load the database configuration file
include 'dbConfig2.php';

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
    <h2>Importar archivo .CSV de la Carga Oferta Academica a la Base de Datos</h2>
    <?php if(!empty($statusMsg)){
        echo '<div class="alert '.$statusMsgClass.'">'.$statusMsg.'</div>';
    } ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            Lista
            <a href="javascript:void(0);" onclick="$('#importFrm').slideToggle();">Importar datos</a>
        </div>
        <div class="panel-body">
            <form action="importData2.php" method="post" enctype="multipart/form-data" id="importFrm">
                <input type="file" name="file" />
                <input type="submit" class="btn btn-primary" name="importSubmit" value="IMPORTAR">
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>



  <th>  alumnos </th>
  <th>  clave </th>
  <th>  materia </th>
  <th>  progra_grupo  </th>
  <th>  grupo </th>
  <th>  expediente  </th>
  <th>  maestro </th>
  <th>  horas </th>
  <th>  hilunes </th>
  <th>  hflunes </th>
  <th>  mlunes  </th>
  <th>  slunes  </th>
  <th>  himartes  </th>
  <th>  hfmartes  </th>
  <th>  mmartes </th>
  <th>  smartes </th>
  <th>  himiercoles </th>
  <th>  hfmiercoles </th>
  <th>  mmiercoles  </th>
  <th>  smiercoles  </th>
  <th>  hijueves  </th>
  <th>  hfjueves  </th>
  <th>  mjueves </th>
  <th>  sjueves </th>
  <th>  hiviernes </th>
  <th>  hfviernes </th>
  <th>  mviernes  </th>
  <th>  sviernes  </th>
  <th>  hisabado  </th>
  <th>  hfsabado  </th>
  <th>  msabado </th>
  <th>  ssabado </th>
  <th>  departamental </th>
  <th>  semestre  </th>
  <th>  observacion </th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    //get rows query
                    $query = $db->query("SELECT * FROM ofertaacademica ORDER BY materia DESC");
                    if($query->num_rows > 0){
                        while($row = $query->fetch_assoc()){
                        ?>
                    <tr>

<td><?php echo $row['alumnos']; ?></td>
<td><?php echo $row['clave']; ?></td>
<td><?php echo utf8_encode($row['materia']); ?></td>
<td><?php echo $row['progra_grupo']; ?></td>
<td><?php echo $row['grupo']; ?></td>
<td><?php echo $row['expediente']; ?></td>
<td><?php echo utf8_encode($row['maestro']); ?></td>
<td><?php echo $row['horas']; ?></td>
<td><?php echo $row['hilunes']; ?></td>
<td><?php echo $row['hflunes']; ?></td>
<td><?php echo $row['mlunes']; ?></td>
<td><?php echo $row['slunes']; ?></td>
<td><?php echo $row['himartes']; ?></td>
<td><?php echo $row['hfmartes']; ?></td>
<td><?php echo $row['mmartes']; ?></td>
<td><?php echo $row['smartes']; ?></td>
<td><?php echo $row['himiercoles']; ?></td>
<td><?php echo $row['hfmiercoles']; ?></td>
<td><?php echo $row['mmiercoles']; ?></td>
<td><?php echo $row['smiercoles']; ?></td>
<td><?php echo $row['hijueves']; ?></td>
<td><?php echo $row['hfjueves']; ?></td>
<td><?php echo $row['mjueves']; ?></td>
<td><?php echo $row['sjueves']; ?></td>
<td><?php echo $row['hiviernes']; ?></td>
<td><?php echo $row['hfviernes']; ?></td>
<td><?php echo $row['mviernes']; ?></td>
<td><?php echo $row['sviernes']; ?></td>
<td><?php echo $row['hisabado']; ?></td>
<td><?php echo $row['hfsabado']; ?></td>
<td><?php echo $row['msabado']; ?></td>
<td><?php echo $row['ssabado']; ?></td>
<td><?php echo $row['departamental']; ?></td>
<td><?php echo $row['semestre']; ?></td>
<td><?php echo utf8_encode($row['observacion']); ?></td>

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
