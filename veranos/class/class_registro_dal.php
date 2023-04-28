<?php
include("class_registro.php");
include("class_carreras.php");
include("class_Db.php");

class registro_dal extends class_Db
{
    function __construct()
    {
        parent::__construct();
    }

    function __destruct()
    {
        parent::__destruct();

    }

    //Checa si la matrícula existe en la tabla alumnos, retorna un int


        
    function existe_matricula($matr)
    {
        $matr = $this->db_conn->real_escape_string($matr);

        /*$sql = "SELECT COUNT(*) as counter FROM alumnos";
        $sql .= " where Matricula='$Matricula'";*/


        $this->set_sql(
            "SELECT * FROM alumnos WHERE matricula = '$matr' LIMIT 1"
        );
        //print $sql;

        $rs = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
        //$total_de_registro = mysqli_num_rows($rs);
        $total_rs = mysqli_num_rows($rs);

        return $total_rs;
    }

function existe_matricula_especiales($matr)
    {
        $matr = $this->db_conn->real_escape_string($matr);

        /*$sql = "SELECT COUNT(*) as counter FROM alumnos";
        $sql .= " where Matricula='$Matricula'";*/


        $this->set_sql(
            "SELECT * FROM veranos WHERE matricula = '$matr' LIMIT 1"
        );
        //print $sql;

        $rs = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
        //$total_de_registro = mysqli_num_rows($rs);
        $total_rs = mysqli_num_rows($rs);

        return $total_rs;
    }

    //Trae los datos del alumno, de la tabla 'alumnos'
    function get_datos_alumno($matr)
    {
        if ($this->existe_matricula($matr) > 0) {

            $matr = $this->db_conn->real_escape_string($matr);

            $this->set_sql(
                "SELECT matricula, alumno, grado, cve_plan
                        FROM alumnos WHERE matricula = '$matr'"
            );

            $rs = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));

            $total_rs = mysqli_num_rows($rs);

            if ($total_rs > 0) {
                $row = mysqli_fetch_assoc($rs);
                $obj = new registro();

                $obj->setId_materia($row['matricula']);
                $obj->setNombre($row['alumno']);
                $obj->setGrado($row['grado']);
                $obj->setId_carrera($row['cve_plan']);
            }

            return $obj;
        } else {
            return null;
        }
    }

//Muestra la tabla alumnos
    function get_datos_lista_alumnos()
    {

        $elsql = "select Matricula,Nombre,Correo,Telefono,Grado,Id_carrera,Id_materia,Estatus 
                    from veranos order by Matricula";

        //print $elsql;exit;

        $this->set_sql($elsql);
        $lista = NULL;
        $rs = mysqli_query($this->db_conn, $this->db_query) or die (mysqli_error($this->db_conn));
        $total_de_registro = mysqli_num_rows($rs);
        $i = 0;
        while ($renglon = mysqli_fetch_assoc($rs)) {
            $obj_det = new registro(
                $renglon["Matricula"],
                utf8_encode($renglon["Nombre"]),
                utf8_encode($renglon["Correo"]),
                utf8_encode($renglon["Telefono"]),
                utf8_encode($renglon["Grado"]),
                $renglon["Id_carrera"],
                $renglon["Id_materia"],
                $renglon["Estatus"]
            );

            $i++;
            $lista[$i] = $obj_det;
            unset($obj_det);
        }
        mysqli_free_result($rs);
        return $lista;
    }

    function ValidarRegistroEspeciales($Matricula)
    {
        $Matricula = $this->db_conn->real_escape_string($Matricula);

        $sql = "select count(*) from veranos";
        $sql .= " where Matricula='$Matricula'";

        //print $sql;
        $this->set_sql($sql);
        $rs = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
        $renglon = mysqli_fetch_row($rs);

        return $renglon[0];
    }


    function get_datos_lista_materias()
    {
        $elsql = "select cve_plan, materia from alumnos GROUP BY materia;";
        //print $elsql;exit;
        $this->set_sql($elsql);
        $lista=NULL;
        $rs=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
        $lista=mysqli_fetch_all($rs);
        //$i=0;
        /*  while($renglon=mysqli_fetch_assoc($rs)) {
            $obj_det = new registro(
            $renglon["Matricula"],
            utf8_encode($renglon["Nombre"]),
            utf8_encode($renglon["Correo"]),
            utf8_encode($renglon["Telefono"]),
            utf8_encode($renglon["Grado"]),
            $renglon["Id_carrera"],
            $renglon["Id_materia"],
            $renglon["Estatus"]
            );*/
        /*
            $i++;
            $lista[$i]=$obj_det;
            unset($obj_det);*/
        /*  }
          mysqli_free_result($rs);*/
        return $lista;
    }

    function get_datos_lista_carreras()
    {

        $elsql = "select 
        cve_plan,
        (select case cve_plan 
        when '670' then 'Ingeniero En Sistemas(Antiguo)' 
        when '686' then 'Ingeniero Industrial(Antiguo)' 
        when '689' then 'Licenciado de Sistemas Computacionales Administrativos' 
        when '742' then 'INGLES'
        when '754' then 'Ingeniero en Tecnologias de la Informacion y Comunicaciones'
        when '820' then 'Ingeniero Industrial y de Sistemas'
        when '827' then 'Ingeniero en Electronica y Comunicaciones'
        when '828' then 'Ingeniero en Sistemas Computacionales'
        when '851' then 'Ingeniero Automotriz'
         
        else ' sin plan' end) as nombre_carera from alumnos where cve_plan not in (742,668,670)
        GROUP BY cve_plan;";

        //print $elsql;exit;

        $this->set_sql($elsql);
        $lista = NULL;
        $rs = mysqli_query($this->db_conn, $this->db_query) or die (mysqli_error($this->db_conn));
        //$lista = mysqli_fetch_all($rs);

        $i=0;
        while($renglon = mysqli_fetch_assoc($rs)) {
                   $obj_det = new carreras($renglon["cve_plan"],utf8_encode($renglon["nombre_carera"]));
    
  
            $i++;
            $lista[$i]=$obj_det;
            unset($obj_det);
        }
        mysqli_free_result($rs);



        return $lista;
    }




    // function get_materias_by_carrera($car){
    //     $elsql = "select substring(clave,4,3) As clave,materia from alumnos
    //     where cve_plan='$car'
    //     group by substring(clave,4,3)
    //     order by substring(clave,4,3); ";
    //     $this->set_sql($elsql);
    //     $lista = NULL;
    //     $rs=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
    //     $lista= mysqli_fetch_all($rs);

    //     return $lista;
    // }
//Insertar
    function insertar($obj)
    {


        $sql = "insert into veranos (";
        $sql .= "Matricula,";
        $sql .= "Nombre,";
        $sql .= "Correo,";
        $sql .= "Telefono,";
        $sql .= "Grado,";
        $sql .= "Id_carrera,";
        $sql .= "Id_materia,";
        $sql .= "Estatus";
        $sql .= ") ";
        $sql .= "values(";
        $sql .= "'" . $obj->getMatricula() . "',";
        $sql .= "'" . $obj->getNombre() . "',";
        $sql .= "'" . $obj->getCorreo() . "',";
        $sql .= "'" . $obj->getTelefono() . "',";
        $sql .= "'" . $obj->getGrado() . "', ";
        $sql .= "'" . $obj->getId_carrera() . "', ";
        $sql .= "'" . $obj->getId_materia() . "', ";
        $sql .= "'" . $obj->getEstatus() . "' ";
        $sql .= ")";
        //print $sql;exit;
        $this->set_sql($sql);
        $this->db_conn->set_charset("utf8");

        mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));

        if (mysqli_affected_rows($this->db_conn) == 1) {
            $insertado = 1;
            //print "insertado"."\n";
        } else {
            $insertado = 0;
        }
        unset($obj);
        return $insertado;
    }


    /*function actualizar($obj){

      $sql = "UPDATE especiales ";
      $sql .= SET  "Matricula = '"$obj->getMatricula()"',";
      $sql .= "Nombre = '"$obj->getNombre()"',";
      $sql .= "Correo = '"$obj->getCorreo()"',";
      $sql .= "Telefono = '"$obj->getTelefono()"',";
      $sql .= "Grado = '"$obj->getGrado()"',";
      $sql .= "Id_carrera = '"$obj->getId_carrera()"',";
      $sql .= "Id_materia = '"$obj->getId_materia()"',";
      $sql .= "Estatus = '"$obj->getEstatus()"' ";
      $sql .= "WHERE Matricula = '"$obj->getMatricula()"'";

      //print $sql;exit;
      $this->set_sql($sql);
      $this->db_conn->set_charset("utf8");

      mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));

      if(mysqli_affected_rows($this->db_conn)==1) {
        $actualizado=1;
        print "actualizado"."\n";
      }
      else{
        $actualizado=0;
      }
      unset($obj);
      return $actualizado;
      }*/

    /*
           //borrar
       function borrar($obj){

           $sql = "delete from especiales where Matricula='".$obj->getMatricula()."'";

           //print $sql;exit;
           $this->set_sql($sql);
           $this->db_conn->set_charset("utf8");

           mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));

           if(mysqli_affected_rows($this->db_conn)==1) {
               $borrado=1;
           }else{
               $borrado=0;
           }
           unset($obj);
           return $borrado;
       }

    */


//Muestra un campo d ela tabla alumnos segun la matricula dada
    function get_datos_by_matricula($Matricula)
    {
        $Matricula = $this->db_conn->real_escape_string($Matricula);

        $this->set_sql("select id_especial,id_matricula,cve_mat,email,telefono,estatus,grado,carrera,nombre from veranos where id_matricula='$Matricula'");

        $rs = mysqli_query($this->db_conn, $this->db_query) or die(mysqli_error($this->db_conn));
        $total_de_registro = mysqli_num_rows($rs);
        $obj_det = null;
        $renglon = mysqli_fetch_assoc($rs);
        if ($total_de_registro > 0) {
            $obj_det = new registro(
                utf8_encode($renglon["nombre"]),
                utf8_encode($renglon["email"]),
                utf8_encode($renglon["telefono"]),
                utf8_encode($renglon["grado"]),
                $renglon["carrera"],
                $renglon["cve_mat"],
                $renglon["estatus"]
            );
            return $obj_det;
        }
    }

}

?>
