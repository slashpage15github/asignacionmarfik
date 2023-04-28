<?php
echo "<script src='./js/jquery-3.1.0.js'></script>
<script src='./js/jquery.dataTables.min.js'></script>
<link rel='stylesheet' type='text/css' href='./css/jquery.dataTables.min.css'>
<script src='./js/dataTables.buttons.min.js'></script>
<script src='./js/buttons.flash.min.js'></script>
<script src='./js/jszip.min.js'></script>
<script src='./js/pdfmake.min.js'></script>
<script src='./js/vfs_fonts.js'></script>
<script src='./js/buttons.html5.min.js'></script>
<script src='./js/buttons.print.min.js'></script>";

include("class_registro.php");
include("class_db.php");
class registro_dal extends class_db{
	
	function __construct()
	{
		parent::__construct();
	}

	function __destruct()
	{
        parent::__destruct();

	}


	    //Insertar
  	function insertar($obj){
      
		$sql = "INSERT into tabla_alumno_cambio (";
  		$sql .= "Matricula,";
        $sql .= "Alumno,";
        $sql .="Estatus,";
        $sql .= "Plan,";
        $sql .= "Al_Plan,";
        $sql .= "Telefono,";
        $sql .= "Correo,";
        $sql .= "Respuesta";
     	$sql .= ") ";
		$sql .= "values(";
    	$sql .= "".$obj->getMatricula().",";
        $sql .= "'".mb_strtoupper($obj->getNombre())."',";
        $sql .= "'".$obj->getEstatus()."', ";
        $sql .= "".$obj->getPlan()." , ";
        $sql .= "".$obj->getPlan_nuevo()." , ";
        $sql .= "".$obj->getTelefono()." , ";
        $sql .= "'".$obj->getCorreo()."', ";
        $sql .= "'".$obj->getRespuesta()."' ";
        $sql .= ")";
		//print $sql;exit;
	   	$this->set_sql($sql);
        $this->db_conn->set_charset("utf8");
        
    	mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));

        if(mysqli_affected_rows($this->db_conn)==1) {
			$insertado=1;
		}else{
			$insertado=0;
		}
		unset($obj);
 		return $insertado;
  	}


    function existeMatricula($matricula){
       $matricula=$this->db_conn->real_escape_string($matricula);

   
        $sql = "select count(*) from alumnos";
        $sql .= " where Matricula='$matricula'";

        //print $sql;
        $this->set_sql($sql);
        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        //$total_de_registro = mysqli_num_rows($rs);
        $renglon= mysqli_fetch_array($rs);
        $cuantos= $renglon[0];

        return $cuantos;
    }

    function get_datos_by_matricula($matricula){
        $matricula=$this->db_conn->real_escape_string($matricula);

        //$sql = 'SELECT * FROM alumnos WHERE Matricula ='.$matricula. " group by matricula";
        $sql ='SELECT matricula, alumno, cve_plan FROM alumnos WHERE Matricula ='.$matricula. " group by matricula";
        //echo $sql;exit;
        $this->set_sql($sql);

        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        $total_de_registro = mysqli_num_rows($rs);
        $obj_det=null;
        $renglon = mysqli_fetch_assoc($rs);
        if($total_de_registro>0){
            $obj_det = new registro(
            $renglon["matricula"],
            utf8_decode($renglon["alumno"]),
            $renglon["cve_plan"]

            );

        }
        return $obj_det;
        //echo $obj_det;
     }
     
    function get_matricula($matricula){
        $matricula=$this->db_conn->real_escape_string($matricula);

        $sql = 'SELECT * FROM tabla_alumno_cambio WHERE Matricula ='.$matricula. " group by matricula";
        //echo $sql;exit;
        $this->set_sql($sql);

        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        $total_de_registro = mysqli_num_rows($rs);
        $obj_det=null;
        $renglon = mysqli_fetch_assoc($rs);
        if($total_de_registro>0){
        $obj_det = new registro(
        $renglon["Matricula"],
        utf8_encode($renglon["Alumno"]),
        utf8_encode($renglon["Telefono"]),
        $renglon["Correo"],
        $renglon["Estatus"],
        $renglon["Plan"],
        $renglon["Al_Plan"],
        $renglon["Respuesta"]
                    );
        }
        return $obj_det;
     }

     function get_alumnos(){
        echo "<script src='js/dataTables.bootstrap.js'></script>
        <link rel='stylesheet' href='css/bootstrap.min.css'>
        <link rel='stylesheet' href='css/dataTables.bootstrap.min.css'>
        <link rel='stylesheet' href='https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css'>";

        $sql = 'SELECT * FROM tabla_alumno_cambio group by matricula';
        //echo $sql;exit;
        $this->set_sql($sql);

        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
      
        print '<div class="col-sm-12 col-md-12 col-lg-12">'.
    '<table class="table table-bordered table-hover table-responsive" cellspacing="0" style="width:100%" id="alumnos">'.
    '<thead align="center">'.
      '<tr>'.
        '<th hidden>Id</th>'.
        '<th>Matricula</th>'.
        '<th>Nombre</th>'. 
        '<th>Telefono</th>'.
        '<th>Correo</th>'.
        '<th>Estatus</th>'.
        '<th>Plan actual</th>'.
        '<th>Nuevo plan</th>'.
        '<th>Observaciones</th>'.
        '<th>Fecha</th>'.
        '<th>Editar</th>'.
      '</tr>'.
       '</thead>'.
       '<tbody id ="myTable" align="center">';
       
         while($renglon = mysqli_fetch_array($rs)) {
         if($renglon["Plan"]=="828"){
          $siglas_plan=" - ISC";
         }
         if($renglon["Plan"]=="820"){
          $siglas_plan=" - IIS";
         }
         if($renglon["Plan"]=="754"){
          $siglas_plan=" - ITIC";
         }
         if($renglon["Plan"]=="689"){
          $siglas_plan=" - LSCA";
         }
         if($renglon["Plan"]=="851"){
          $siglas_plan=" - IA";
         }
         if($renglon["Plan"]=="827"){
          $siglas_plan=" - IEC";
         }
         if($renglon["Al_Plan"]=="828"){
          $siglas_alplan=" - ISC";
         }
         if($renglon["Al_Plan"]=="820"){
          $siglas_alplan=" - IIS";
         }
         if($renglon["Al_Plan"]=="754"){
          $siglas_alplan=" - ITIC";
         }
         if($renglon["Al_Plan"]=="689"){
          $siglas_alplan=" - LSCA";
         }
         if($renglon["Al_Plan"]=="851"){
          $siglas_alplan=" - IA";
         }
         if($renglon["Al_Plan"]=="827"){
          $siglas_alplan=" - IEC";
         }

         print '<tr>';
         print '<form action="./admin_actualizar.php" method="POST">';   
         print '<td hidden><input type="text" hidden size="6" name="matricula" id="matricula" value="'.$renglon["Matricula"].'"  style="text-align: center"; border:none"></td>';
         print '<td>'.$renglon["Matricula"].'</td>';
         print '<td>'.$renglon["Alumno"].'</td>';
         print '<td>'.$renglon["Telefono"].'</td>';
         print '<td>'.$renglon["Correo"].'</td>';
         print '<td>'.$renglon["Estatus"].'</td>';
         print '<td>'.$renglon["Plan"].$siglas_plan.'</td>';
         print '<td>'.$renglon["Al_Plan"].$siglas_alplan.'</td>';
         print '<td>'.utf8_encode($renglon["Respuesta"]).'</td>';
         print '<td>'.$renglon["fecha"].'</td>';
         print '<td><input type="submit" value="Modificar"></td>';
         print '</form>';
         print '</tr>';   
          
         }
         
         print '</tbody>';
        print '</table>';
        print '</div>';
      
     }

     function existeMat($matricula){
       $matricula=$this->db_conn->real_escape_string($matricula);

   
        $sql = "SELECT * from tabla_alumno_cambio WHERE Matricula='$matricula'";

        //print $sql;
        $this->set_sql($sql);
        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        //$total_de_registro = mysqli_num_rows($rs);
        $renglon= mysqli_fetch_array($rs);
        $cuantos= $renglon[0];

        return $cuantos;
    }

 }

?>
<script>
  $(document).ready(function(){
    $("#alumnos").DataTable({
      dom: 'Blfrtip',
      buttons: [{
          extend:'excel',
          title: 'Lista de alumnos - Cambios de carrera',
          text: 'Guardar en excel'
        }]
    });
  });
</script>

<script>
  $(document).ready( function () {
    $("#alumnos").DataTable();
} );
</script>