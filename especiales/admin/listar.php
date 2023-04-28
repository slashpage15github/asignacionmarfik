<?php

	include ("conexion.php");//importar el archivo conexión

	$query = "SELECT
	e.id_especial,
	e.matricula,
	e.nombre,
	e.carrera,
	e.grado,
	e.estatus,
	e.email,
	e.telefono,
	e.observaciones,
	e.cve_mat,
	a.materia,
	e.fecha
FROM
	especiales e 
JOIN planes_materias a ON e.carrera = a.cve_plan
AND e.cve_mat = a.clave";//query a la tabla
	//$mysqli->set_charset("utf8");
	$resultado = $mysqli->query($query);//variable resultado recibe conexion y query

	if (!$resultado){
		die("Error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){

			//se hace un arreglo de datos ya que a sí trabaja un datable
			$data['modificar'] = "<td><a class='btn btn-default' href='modificar.php?id_especial=".$data['id_especial']."'>Modificar</a></td>";
			$data['eliminar'] = "<td><a id='eliminar' onclick='return alerta(".$data['id_especial'].",".$data['matricula'].");' class='btn btn-default'>Eliminar</a></td>";
			unset($data['id_especial']);
			//$utfEncodedArray = array_map("utf8_encode", $data);
			$arreglo["data"][] = array_map("utf8_encode", $data); //se guardan los datos en mi arreglo de datos
			//print_r($utfEncodedArray);
		}
		echo json_encode($arreglo);// se convierte a json los datos del arreglo y lo imprime con echo
		
	}

	//mysqli_free_result($resultado);//cerrar BD
	//mysqli_close($conexion);//cierra conexión
	