<?php
session_start();
include("class/data.inc.php");

if (isset($_POST['id'])){
      $id = $_POST['id'];
      $mensaje = array();     
}
else{
      echo 'no llego el id';
      return;
}

//echo $id;return;

 $conexion = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_DATABASE);
if (!$conexion){
    echo'<br>';
    echo'<br>';
    echo'<br>';
    echo'<br>';
    echo'<br>';
    echo"Error: No se puede conectar a MySql." .PHP_EOL;
    echo"error de depuración: " .mysqli_connect_errno().PHP_EOL;
    echo"error de depuración: " .mysqli_connect_error().PHP_EOL;
    exit;
}
      

    
      //Selecciona todo de la tabla mmv001 
      //donde el nombre sea igual a $consultaBusqueda, 
      //o el apellido sea igual a $consultaBusqueda, 
      //o $consultaBusqueda sea igual a nombre + (espacio) + apellido
      $consulta = mysqli_query($conexion, "select NOMBRE, DESCRIPCION, LINK from videos where ID='$id'");

      //Obtiene la cantidad de filas que hay en la consulta
      $filas = mysqli_num_rows($consulta);

      //Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
      if ($filas === 0) {
            $mensaje[]= "<p>No hay ningún video</p>";
      } else {
            //Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
            

            //La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
            while($resultados = mysqli_fetch_array($consulta)) {
                  $nombre = $resultados['NOMBRE'];
                  $descripcion = $resultados['DESCRIPCION'];
                  $link = $resultados['LINK'];
                  
                  //Output
                  $mensaje["nom"]= utf8_encode($nombre);
                  $mensaje["des"]= utf8_encode($descripcion);
                  $mensaje["lin"]= $link;

            };//Fin while $resultados
            //print '<pre>';
            //print_r($mensaje);
            //print '</pre>';return;
      }; //Fin else $filas
      //$mensaje= utf8_encode($mensaje);
      echo json_encode($mensaje);
      //echo utf8_encode($mensaje);
      //echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
       
?>
