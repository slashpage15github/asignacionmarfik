<?php
include("class_usuarios.php");
include("class_db.php");
class usuarios_dal extends class_db{
	
	function __construct()
	{
		parent::__construct();
	}

	function __destruct()
	{
        parent::__destruct();

	}
	
  

    //Obtener listado
    function verify_user($usuario,$clave){
        $elsql =sprintf("select * from usuarios where usuario='%s' and clave='%s'",mysqli_real_escape_string($this->db_conn,$usuario),mysqli_real_escape_string($this->db_conn,$clave));
        //echo $elsql; exit;
        $this->set_sql( $elsql);
    	$rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        $total_de_registro = mysqli_num_rows($rs);
            if($total_de_registro==1){
                return 1;
            }
            else{
                return 0;
            }
            mysqli_free_result($rs);
            //mysqli_close($conn);
     }
    

    function verify_usertipo($usuario,$clave){
        $elsql =sprintf("select tipo_usuario from usuarios where usuario='%s' and clave='%s'",mysqli_real_escape_string($this->db_conn,$usuario),mysqli_real_escape_string($this->db_conn,$clave));
        //echo $elsql; exit;
        $this->set_sql( $elsql);
        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        $renglon= mysqli_fetch_array($rs);
        $tipou= $renglon[0];

        return $tipou;
            mysqli_free_result($rs);
            //mysqli_close($conn);
     }


     //Obtener listado
    function get_datos_total_usuarios(){

        $elsql ="select * ";
        $elsql.="from usuarios";

        $this->set_sql($elsql);

        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        $total_de_registro = mysqli_num_rows($rs);
        $i=0;
        while($renglon = mysqli_fetch_assoc($rs)) {
            $obj_det = new usuarios($renglon["usuario"],$renglon["clave"]);

          
            $i++;
            $lista[$i]=$obj_det;
            unset($obj_det);
        }

        return $lista;
     }

    }//end class
?>