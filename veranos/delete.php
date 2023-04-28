<?php
	include('class/class_registro_dal.php');
	require 'conexiondatatable.php';
	
	$id_especial = mysqli_real_escape_string($conexion,$_GET['id_especial']);
	$matricula = mysqli_real_escape_string($conexion,$_GET['matricula']);
//echo $id_especial;
//echo $matricula;
//exit;

//	$cve_mat = $_POST['cve_mat'];
//    $email = $_POST['email'];
//    $telefono = $_POST['telefono'];
//    $estatus = $_POST['estatus'];
//    $grado = $_POST['grado'];
//    $carrera = $_POST['carrera'];
//	$nombre = $_POST['nombre'];
	//$observaciones = $_POST['observaciones'];

	
	$sql = "DELETE FROM veranos WHERE id_especial=$id_especial and matricula=$matricula";
//echo $sql;exit;
	$resultado = mysqli_query($conexion,$sql);
	if($resultado){
		$obj = new registro_dal();
        $existe = $obj->existe_matricula_especiales($matricula);

            //echo $existe;exit;

            if ($existe >0) {
                $_SESSION['session_mat'] = $matricula;
                header('location: consulta_especiales.php');
            } else {
                echo '<script type="text/javascript">';
                echo 'alert("Error: No tienes especiales registrados");';
                echo 'window.location.href = "busca_matricula.php";';
                echo '</script>';
            }
            } else {
                echo '<script type="text/javascript">';
                echo 'alert("Error: No se pudo eliminar el registro.");';
                echo 'window.location.href = "busca_matricula.php";';
                echo '</script>';
            }
            
?>