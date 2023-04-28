<?php
include("class_materias.php");
include("class_Db.php");
class materias_dal extends class_db{
	
	function __construct()
	{
		parent::__construct();
	}

	function __destruct()
	{
        parent::__destruct();

	}

    //Obtener listado de cursos
    function get_datos_lista_materias($cve){
       //$nivel=$this->db_conn->real_escape_string($nivel); evitar sql injection

       //$elsql ="SELECT SUBSTRING(clave,4,3) AS clave,materia FROM alumnos WHERE cve_plan='$cve' GROUP BY SUBSTRING(clave,4,3) ORDER BY SUBSTRING(clave,4,3);";
       $elsql ="SELECT clave,materia FROM planes_materias WHERE cve_plan='$cve' GROUP BY clave ORDER BY materia;";

        //print $elsql;exit;
        $this->set_sql($elsql);
        $lista=NULL;
        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        $total_de_registro = mysqli_num_rows($rs);
        $i=0;
        while($renglon = mysqli_fetch_assoc($rs)) {
                   $obj_det = new materias($renglon["clave"],utf8_encode($renglon["materia"]));
    
  
            $i++;
            $lista[$i]=$obj_det;
            unset($obj_det);
        }
        mysqli_free_result($rs);
        return $lista;
     }

}
?>