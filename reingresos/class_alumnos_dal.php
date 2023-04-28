<?php
include("class_alumnos.php");
include("class_db.php");
class class_alumnos_dal extends class_db {

	function __construct()
	{
		parent::__construct(); //ejecuta el constructor del padre
	}
	function __destruct()
	{
		parent::__destruct();
	}

	//obtener listado de cursos
	
function get_datos_by_matricula($matricula){
	$matricula=$this->db_conn->real_escape_string($matricula);

	$this->set_sql("select matricula, alumno, grado, cve_plan from alumnos where matricula='$matricula' group by matricula");
	$rs= mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
	$total_de_registro=mysqli_num_rows($rs);
	$obj_det=null;
	$renglon=mysqli_fetch_assoc($rs);
	if($total_de_registro>0){
		$obj_det= new alumnos($renglon["matricula"],$renglon["alumno"],$renglon["grado"],$renglon["cve_plan"]);
	}
	return  $obj_det;

	}
   

  function existeMat($matricula){
      $matricula=$this->db_conn->real_escape_string($matricula);

        $sql = "select count(*) from alumnos";
        $sql .= " where matricula='$matricula' group by matricula";

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