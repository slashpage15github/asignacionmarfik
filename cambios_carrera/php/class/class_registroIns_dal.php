<?php
include("class_registroIns.php");
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

function actualiza_registro($obj){
/*
        echo '<pre>';
        echo print_r($obj);
        echo '</pre>';exit;
*/
        $sql = "UPDATE tabla_alumno_cambio set ";
        $sql .= "Telefono="."'".$obj->getTelefono()."',";
        $sql .= "Correo="."'".$obj->getCorreo()."',";
        $sql .= "Al_Plan="."'".$obj->getPlan_nuevo()."',";
        $sql .= "Respuesta = "."'".$obj->getRespuesta()."'";
        $sql .= " where Matricula = ".$obj->getMatricula()."";

        //echo $sql;exit;
        $this->set_sql($sql);
        $this->db_conn->set_charset("utf8");
        
        mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));

        if(mysqli_affected_rows($this->db_conn)==1) {
            $actualizado=1;
        }else{
            $actualizado=0;
        }
        unset($obj);
        return $actualizado;
    }
function actualiza_registroeditado($obj){
/*
        echo '<pre>';
        echo print_r($obj);
        echo '</pre>';exit;
*/
        $sql = "UPDATE tabla_alumno_cambio set ";
        $sql .= "Alumno="."'".$obj->getNombre()."',";
        $sql .= "Telefono="."'".$obj->getTelefono()."',";
        $sql .= "Correo="."'".$obj->getCorreo()."',";
         $sql .= "Plan="."'".$obj->getPlan()."',";
        $sql .= "Al_Plan="."'".$obj->getPlan_nuevo()."'";
        $sql .= " where Matricula = ".$obj->getMatricula()." and Plan!=".$obj->getPlan_nuevo()."";

        //echo $sql;exit;
        $this->set_sql($sql);
        $this->db_conn->set_charset("utf8");
        
        mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));

        if(mysqli_affected_rows($this->db_conn)==1) {
            $actualizado=1;
        }else{
            $actualizado=0;
        }
        unset($obj);
        return $actualizado;
    }
	    //Insertar
  	function insertar($obj){
        $fecha_registro = date("Y-m-d H:i:s");
      
		$sql = "INSERT into tabla_alumno_cambio (";
  		$sql .= "Matricula,";
        $sql .= "Alumno,";
        $sql .="Estatus,";
        $sql .= "Plan,";
        $sql .= "Al_Plan,";
        $sql .= "Telefono,";
        $sql .= "Correo,";
        $sql .= "Respuesta,";
        $sql .= "fecha";        
     	$sql .= ") ";
		$sql .= "values(";
    	$sql .= "".$obj->getMatricula().",";
        $sql .= "'".mb_strtoupper($obj->getNombre())."',";
        $sql .= "'".$obj->getEstatus()."', ";
        $sql .= "".$obj->getPlan()." , ";
        $sql .= "".$obj->getPlan_nuevo()." , ";
        $sql .= "".$obj->getTelefono()." , ";
        $sql .= "'".$obj->getCorreo()."', ";
        $sql .= "'".$obj->getRespuesta()."', ";
        $sql .= "'".$fecha_registro."' ";        
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

    function get_datos_by_matricula($matricula){
        $matricula=$this->db_conn->real_escape_string($matricula);

        $sql = 'SELECT * FROM alumnos WHERE Matricula ='.$matricula. " group by matricula";
        //echo $sql;exit;
        $this->set_sql($sql);

        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        $total_de_registro = mysqli_num_rows($rs);
        $obj_det=null;
        $renglon = mysqli_fetch_assoc($rs);
        if($total_de_registro>0){
        $obj_det = new registro(
        $renglon["matricula"],
        utf8_encode($renglon["alumno"]),
        $renglon["cve_plan"]
            );
        
        }
        return $obj_det;
     }
     function existeMatricula($matricula){
       $matricula=$this->db_conn->real_escape_string($matricula);

   
        $sql ='SELECT  count(*) from alumnos WHERE Matricula ='.$matricula. " group by matricula";

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