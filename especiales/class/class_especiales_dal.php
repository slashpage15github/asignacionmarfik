<?php
include('class_especiales.php');
include("class_Db.php");

class especiales_dal extends class_Db
{
    public function __construct()
    {
        parent::__construct();
    }

    public function __destruct()
    {
        parent::__destruct(); // TODO: Change the autogenerated stub
    }


function existe_matricula_materia_carrera($mat,$mate,$car){
      $mat=$this->db_conn->real_escape_string($mat);
      $mate=$this->db_conn->real_escape_string($mate);
      $car=$this->db_conn->real_escape_string($car);

        $sql = "select count(*) from especiales where matricula='$mat' and cve_mat='$mate' and carrera='$car'";
       

        //echo $sql;
        $this->set_sql($sql);
        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        $total_de_registro = mysqli_num_rows($rs);
        $renglon= mysqli_fetch_array($rs);
        $cuantos= $renglon[0];

        return $cuantos;
    }


    //Checa si existe la matricula en la tabla especiales, retorna un int
    function existe_matricula_especiales($matr)
    {
        $matr = $this->db_conn->real_escape_string($matr);

        $this->set_sql(
            "SELECT * FROM especiales WHERE matricula = '$matr'"
        );

        $rs = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
        $total_rs = mysqli_num_rows($rs);

        return $total_rs;
    }

    function insertar($obj){
$fecha_registro = date("Y-m-d H:i:s");

		$sql = "insert into especiales (matricula,cve_mat,email,telefono,estatus,grado,carrera,nombre,fecha) ";
		$sql .= "values(";
    	$sql .= "'".$obj->getMatricula()."',";
        $sql .= "'".$obj->getCveMateria()."',";
        $sql .= "'".$obj->getEmail()."',";
        $sql .= "'".$obj->getTelefono()."',";
        $sql .= "'".$obj->getEstatus()."', ";
        $sql .= "'".$obj->getGrado()."', ";
        $sql .= "'".$obj->getCarrera()."', ";
        $sql .= "'".utf8_decode($obj->getNombre())."', ";
        $sql .= "'".$fecha_registro."' ";        
        $sql .= ")";
		//print $sql;exit;
	   	$this->set_sql($sql);
        $this->db_conn->set_charset("utf8");
    	mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        if(mysqli_affected_rows($this->db_conn)==1) {
			$insertado=1;
			//print "insertado"."\n";
		}else{
			$insertado=0;
		}
		unset($obj);
 		return $insertado;
  	}



    function num_especiales($matr)
    {
        $matr = $this->db_conn->real_escape_string($matr);

        $this->set_sql(
            "select count(matricula) as num_especiales from especiales where matricula = '$matr'"
        );

        $rs = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
        $renglon = mysqli_fetch_assoc($rs);

        return $renglon['num_especiales'];
    }

    //Trae los datos del alumno, de la tabla 'especiales'
    function get_datos_alumno_especiales($matr)
    {
        if ($this->existe_matricula_especiales($matr) > 0) {

            $matr = $this->db_conn->real_escape_string($matr);

            $this->set_sql(
                "SELECT matricula, cve_mat, email, telefono, estatus, grado, carrera, nombre 
                        FROM especiales WHERE matricula = '$matr'"
            );

            $rs = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
            $row = mysqli_fetch_assoc($rs);

            $obj = new especiales();

            $obj->setMatricula($row['matricula']);
            $obj->setCveMateria($row['cve_mat']);
            $obj->setEmail($row['email']);
            $obj->setTelefono($row['telefono']);
            $obj->setEstatus($row['estatus']);
            $obj->setGrado($row['grado']);
            $obj->setCarrera($row['carrera']);
            $obj->setNombre(utf8_encode($row['nombre']));

            return $obj;
        } else {
            return null;
        }
    }
}