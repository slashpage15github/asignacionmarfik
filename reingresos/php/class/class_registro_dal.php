<?php
echo "<script src='../js/jquery-3.1.0.js'></script>
<link rel='stylesheet' type='text/css' href='../css/jquery.dataTables.min.css'>
<script src='../js/jquery.dataTables.min.js'></script>";
echo "<script src='js/jquery-3.1.0.js'></script>
<link rel='stylesheet' type='text/css' href='css/jquery.dataTables.min.css'>
<script src='js/jquery.dataTables.min.js'></script>";

echo "<script src='../js/dataTables.buttons.min.js'></script>";
echo "<script src='../js/buttons.flash.min.js'></script>";
echo "<script src='../js/jszip.min.js'></script>";
echo "<script src='../js/pdfmake.min.js'></script>";
echo "<script src='../js/vfs_fonts.js'></script>";
echo "<script src='../js/buttons.html5.min.js'></script>";
echo "<script src='../js/buttons.print.min.js'></script>";
echo "<link rel='stylesheet' href='../css/buttons.dataTables.min.css'>";

include("class_registro.php");
include("class_db.php");
class class_registro_dal extends class_db {
    function __construct()
    {
        parent::__construct(); //ejecuta el constructor del padre
    }
    function __destruct()
    {
        parent::__destruct();
    }


function describe_plan($plan){
    
    if ($plan=="828"){
        $v_plan="INGENIERIA EN SISTEMAS COMPUTACIONALES";
    }
    else if ($plan=="754"){
        $v_plan="INGENIERIA EN TECNOLOGIAS DE LA INFORMACION";
    }
    else if ($plan=="827"){
        $v_plan="INGENIERIA EN ELECTRONICA Y COMUNICACIONES";
    }   
    else if ($plan=="851"){
        $v_plan="INGENIERIA AUTOMOTRIZ";
    }
    else if ($plan=="820"){
        $v_plan="INGENIERIA INDUSTRIAL Y DE SISTEMAS";
    }

    return $v_plan;  

}


    //obtener listado de cursos
    function get_datos_lista_registro(){
        //$nivel=$this->db_conn->real_escape_string($nivel); evitar sql injection
        $elsql = "select matricula, grado, id_carrera, observacion, telefono,email from reingresos order by matricula";

        //print $elsql;exit;

        $this->set_sql($elsql);
        $lista=NULL;
        $rs=mysqli_query($this->db_conn,$this->db_query) or die (mysqli_error($this->db_conn));
        $total_de_registro=mysqli_num_rows($rs);
        $i=0;
        while($renglon=mysqli_fetch_assoc($rs)) {
            $obj_det=new registro($renglon["matricula"], utf8_encode($renglon["grado"]),$renglon["id_carrera"],utf8_encode($renglon["observacion"]), utf8_encode($renglon["telefono"]), utf8_encode($renglon["email"]),utf8_encode($renglon["status"]));

            $i++;
            $lista[$i]=$obj_det;
            unset($obj_det);
        }
        mysqli_free_result($rs);
        return $lista;
    }

function get_datos_by_matricula($matricula){
    $matricula=$this->db_conn->real_escape_string($matricula);

    $this->set_sql("select matricula, nombre, grado, id_carrera, observacion, telefono, email from reingresos where matricula='$matricula'");
    $rs= mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
    $total_de_registro=mysqli_num_rows($rs);
    $obj_det=null;
    $renglon=mysqli_fetch_assoc($rs);
    if($total_de_registro>0){
        $obj_det= new registro($renglon["matricula"],$renglon["nombre"],$renglon["grado"],$renglon["id_carrera"],$renglon["observacion"],$renglon["telefono"],$renglon["email"]);
    }
    return  $obj_det;

    }
    function contar_contenido_busca_matricula($matricula){
 
        $sql = "select count(*) from reingresos where matricula like '$matricula%'";
        
        //print $sql;
        $this->set_sql($sql);
        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        //$total_de_registro = mysqli_num_rows($rs);
        $renglon= mysqli_fetch_array($rs);
        $total= $renglon[0];
        $this->close_db();
        return $total;
 
    }
     function contar_contenido(){
 
        $sql = "select count(*) from reingresos";
        
        //print $sql;
        $this->set_sql($sql);
        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        //$total_de_registro = mysqli_num_rows($rs);
        $renglon= mysqli_fetch_array($rs);
        $total= $renglon[0];
        $this->close_db();
        return $total;
 
    }

    function Confirmar_Admin(){
        $sql="select clave from usuarios where usuario='adm'";
         //print $sql;
        $this->set_sql($sql);
        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        //$total_de_registro = mysqli_num_rows($rs);
        $renglon= mysqli_fetch_array($rs);
        $pass= $renglon[0];
        $this->close_db();
        return $pass;
    }

    function Confirmar_Admin2(){
        $sql="select clave from usuarios where usuario='david'";
         //print $sql;
        $this->set_sql($sql);
        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        //$total_de_registro = mysqli_num_rows($rs);
        $renglon= mysqli_fetch_array($rs);
        $pass= $renglon[0];
        $this->close_db();
        return $pass;
    }

function insertar_datos($obj){
    $fecha_registro = date("Y-m-d H:i:s");
    $sql="insert into reingresos(";
    $sql .="matricula,";    
    $sql .="nombre,";   
    $sql .="grado,";
    $sql .="id_carrera,";
    $sql .="observacion,";
    $sql .="telefono,";
    $sql .="email,";
    $sql .="estatus,";
    $sql .="fecha";    
    $sql .=") ";
    $sql .="values(";
    $sql .="'".$obj->getMatricula()."',";   
  $sql .="'".$obj->getNombre()."',";
    $sql .="'".$obj->getGrado()."',";
    $sql .="'".$obj->getCarrera()."',";
    $sql .="'".$obj->getObservacion()."',";
    $sql .="'".$obj->getTelefono()."',";
    $sql .="'".$obj->getEmail()."',";
    $sql .="'".$obj->getStatus()."',";
    $sql .="'".$fecha_registro."'";    
    $sql .=")";

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

 function borrar($obj){
        
        $sql = "delete from reingresos where matricula='".$obj->getMatricula()."'";
     
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

        $sql = "select count(*) from reingresos";
        $sql .= " where matricula='$matricula'";

        //print $sql;
        $this->set_sql($sql);
        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
        //$total_de_registro = mysqli_num_rows($rs);
        $renglon= mysqli_fetch_array($rs);
        $cuantos= $renglon[0];

        return $cuantos;
    }
    
   function mostrar_contenido_busca_matricula($min,$max,$matricula){
        $sql = "select r.matricula,r.nombre,r.grado,r.id_carrera,c.carrera,r.observacion,r.telefono,r.email, r.estatus from reingresos r join carreras c on r.id_carrera=c.id_carrera where matricula like '$matricula%'
                ORDER BY matricula DESC LIMIT 1";
        
        //print $sql;
        $this->set_sql($sql);
        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
  
print '<div>'.
    '<table style="width:100%" border="1" id="t01">'.
    '<thead align="center">'.
      '<tr>'.
        '<th>Matricula</th>'.
        '<th>Nombre</th>'. 
        '<th>Grado</th>'.
        '<th>Id_Carrera</th>'.
        '<th>Descripcion</th>'.
        '<th>Observacion</th>'.
        '<th>Telefono</th>'.
        '<th>Email</th>'.
        '<th>Estatus</th>'.

      '</tr>'.
      '</thead>'.
      '<tbody id ="myTable" align="center">';
         while($row = mysqli_fetch_array($rs)) {
         print '<tr>';   
         print '<td>'.$row['matricula'].'</td>';
         print '<td>'.utf8_encode($row['nombre']).'</td>';
         print '<td>'.utf8_encode($row['grado']).'</td>';
         print '<td>'.$row['id_carrera'].'</td>';
         print '<td>'.$row['carrera'].'</td>';
         print '<td>'.utf8_encode($row['observacion']).'</td>';
         print '<td>'.$row['telefono'].'</td>';
         print '<td>'.$row['email'].'</td>';
         print '<td>'.$row['estatus'].'</td>';
         print '</tr>';   

         }
         print '</tbody>';
        print '</table>';
        print '</div>';
        $this->close_db();
 }

function mostrar_contenido(){
        $sql = "select r.matricula,r.nombre,r.grado,r.id_carrera,c.carrera,r.observacion,r.telefono,r.email, r.estatus from reingresos r join carreras c on r.id_carrera=c.id_carrera ";
        
        //print $sql;
        $this->set_sql($sql);
        $rs = mysqli_query($this->db_conn,$this->db_query) or die(mysqli_error($this->db_conn));
  
print '<div>'.
    '<table style="width:100%" border="1" id="alumnos">'.
    '<thead align="center">'.
      '<tr>'.
        '<th hidden>Id</th>'.
        '<th>Modificar</th>'.
        '<th>Matricula</th>'.
        '<th>Nombre</th>'. 
        '<th>Grado</th>'.
        '<th>Id_Carrera</th>'.
        '<th>Descripcion</th>'.
        '<th>Observacion</th>'.
        '<th>Telefono</th>'.
        '<th>Email</th>'.
        '<th>Estatus</th>'.
        '</tr>'.
        '</thead>'.
        '<tbody id ="myTable" align="center">';
       
         while($row = mysqli_fetch_array($rs)) {
         
         print '<tr>';
         print '<form action="../Administrador/editar_registro_adm.php" method="POST">';   
         print '<td hidden><input type="text" hidden size="6" name="imatricula" id="imatricula" value="'.$row['matricula'].'"  style="text-align: center; border:none"></td>';
         print '<td><input type="submit" value="Modificar"></td>';
         print '<td>'.$row['matricula'].'</td>';
         print '<td>'.utf8_encode($row['nombre']).'</td>';
         print '<td>'.utf8_encode($row['grado']).'</td>';
         print '<td>'.$row['id_carrera'].'</td>';
         print '<td>'.$row['carrera'].'</td>';
         print '<td>'.utf8_encode($row['observacion']).'</td>';
         print '<td>'.$row['telefono'].'</td>';
         print '<td>'.$row['email'].'</td>';
         print '<td>'.$row['estatus'].'</td>';
         print '</form>';
         print '</tr>';   
          
         }
         
         print '</tbody>';
        print '</table>';
        print '</div>';
       

      
        $this->close_db();
 }

  

function verificar_login($matricula, &$result)
{
    $sql="select * from alumnos where matricula='$matricula'";
    $rec= mysqli_query($sql);
    $count=0;
    while($row=mysqli_fetch_array($rec))
    {
        $count++;
        $result=$row;
    }
    if($count!=0)
    {
        return 1;
    }
    else
    {
        return 0;
    }
    }

    function actualiza_registro($obj){


        $sql = "update reingresos set ";
        $sql .= "nombre="."'".$obj->getNombre()."',";
        $sql .= "grado="."'".$obj->getGrado()."',";
        $sql .= "id_carrera="."'".$obj->getCarrera()."',";
        $sql .= "observacion="."'".$obj->getObservacion()."',";
        $sql .= "telefono="."'".$obj->getTelefono()."',";
        $sql .= "email="."'".$obj->getEmail()."'";
        $sql .= " where matricula = '".$obj->getMatricula()."'";

       // echo $sql;exit;
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

    function actualiza_registro_admin($obj){


        $sql = "update reingresos set ";
        $sql .= "nombre="."'".$obj->getNombre()."',";
        $sql .= "grado="."'".$obj->getGrado()."',";
        //$sql .= "id_carrera="."'".$obj->getCarrera()."',";
        $sql .= "observacion="."'".$obj->getObservacion()."',";
        $sql .= "telefono="."'".$obj->getTelefono()."',";
        $sql .= "email="."'".$obj->getEmail()."'";
        $sql .= " where matricula = '".$obj->getMatricula()."'";

       // echo $sql;exit;
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
}

?>
 <script>
  $(document).ready( function () {
    $("#alumnos").DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'excel',
            title: 'Listado de alumnos',
            text: 'EXCEL'
        }]
    });
} );
</script>

<script>
  $(document).ready( function(){
    $("#t01").DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy',
            'csv',
            'excel',
            'pdf',
            'print'
        ],
    } );
} );
</script>