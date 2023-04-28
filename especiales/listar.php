<?php
	session_start();
	include ("conexiondatatable.php");//importar el archivo conexión
	$matricula = $_SESSION["session_mat"];

	$query = "SELECT
	e.*,
	a.materia
FROM
	especiales e
JOIN planes_materias a ON e.carrera = a.cve_plan
AND e.cve_mat = a.clave
WHERE
	e.matricula = '$matricula';";
//echo $query;
	//query a la tabla
	$resultado = mysqli_query($conexion, $query);//variable resultado recibe conexion y query

	if (!$resultado){
		die("Error");
	}else{
		while($data = mysqli_fetch_assoc($resultado)){

			//se hace un arreglo de datos ya que a sí trabaja un datable
			$data['modificar'] = "<td><a class='btn btn-default' href='modificar.php?id_especial=".$data['id_especial']."'>Editar</a></td>";
			
			$data['eliminar'] = "<td><a id='eliminar' onclick='return alerta(".$data['id_especial'].",".$data['matricula'].");' class='btn btn-default'>Eliminar</a></td>";
			unset($data['id_especial']);
			//$utfEncodedArray = array_map("utf8_encode", $data);
			$arreglo["data"][] = array_map("utf8_encode", $data); //se guardan los datos en mi arreglo de datos
			//print_r($utfEncodedArray);
		}
//print_r($data);

		echo json_encode($arreglo);// se convierte a json los datos del arreglo y lo imprime con echo
	//exit;	
	}

	mysqli_free_result($resultado);//cerrar BD
	mysqli_close($conexion);//cierra conexión
	