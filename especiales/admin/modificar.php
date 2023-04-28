<?php
	require 'conexion.php';
	
	$id_especial = $_GET['id_especial'];

	$sql = "SELECT
	e.*,
	a.materia
FROM
	especiales e
JOIN planes_materias a ON e.carrera = a.cve_plan
AND e.cve_mat = a.clave
WHERE
	e.id_especial = '$id_especial';";
	$resultado = $mysqli->query($sql);
	$row = $resultado->fetch_array(MYSQLI_ASSOC);

	if($row['estatus'] == 1){
	    $est = "ACTIVO";
    }
	else{
	    $est = "INACTIVO";
    }
	if($row['carrera'] == '828'){
	    $crr = "828-Ingeniero en Sistemas Computacionales";
	}
	else if($row['carrera'] == '689'){
		$crr = "689-Licenciado de Sistemas Computacionales Administrativos";
	}
	else if($row['carrera'] == '851'){
		$crr = "851-Ingeniero Automotriz";
	}
	else if($row['carrera'] == '827'){
		$crr = "827-Ingeniero en Electronica y Comunicaciones";
	}
	else if($row['carrera'] == '820'){
		$crr = "820-Ingeniero Industrial y de Sistemas";
	}
	else if($row['carrera'] == '754'){
		$crr = "754-Ingeniero en Tecnologias de la Informacion y Comunicaciones";
	}
	else if($row['carrera'] == '686'){
		$crr = "686-Ingeniero Industrial(Antiguo)";
	}
	else if($row['carrera'] == '670'){
		$crr = "670-Ingeniero En Sistemas Computacionales(Antiguo)";
	}
?>
<html lang="es" xmlns="http://www.w3.org/1999/html">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/bootstrap-theme.css" rel="stylesheet">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<h3 style="text-align:center">MODIFICAR REGISTRO</h3>
			</div>
			
			<form class="form-horizontal" method="POST" action="update.php" autocomplete="off">
				<div class="form-group">
					<label for="matricula" class="col-sm-2 control-label">Matricula</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="matricula" name="matricula" placeholder="Matricula" value="<?php echo $row['matricula']; ?>" disabled>
					</div>
				</div>

                <div class="form-group">
                    <label for="cve_mat" class="col-sm-2 control-label">Clave de Materia</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="cve_mat" name="cve_mat" placeholder="cve_matricula" value="<?php echo $row['cve_mat']; ?>" disabled>
                    </div>
                </div>

               <div class="form-group">
                    <label for="cve_mat" class="col-sm-2 control-label">Materia</label>
                    <div class="col-sm-10">
                        <select name="cve_mat" id="cve_mat" class="form-control" disabled>
                            <option value="<?php echo $row['cve_mat'];?>" selected><?php echo $row['materia']; ?></option>
                            </select>
                    </div>
                </div>

				<input type="hidden" id="id_especial" name="id_especial" value="<?php echo $id_especial; ?>" />
				
				<div class="form-group">
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-10">
						<input type="email" class="form-control" id="email" name="email" placeholder="Email" value="<?php echo $row['email']; ?>"  disabled>
					</div>
				</div>
				
				<div class="form-group">
					<label for="telefono" class="col-sm-2 control-label">Telefono</label>
					<div class="col-sm-10">
						<input type="tel" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="<?php echo $row['telefono']; ?>" disabled>
					</div>
				</div>

                <div class="form-group">
                    <label for="estatus" class="col-sm-2 control-label">Estatus</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="estatus" name="estatus" placeholder="Estatus" value="<?php echo $est; ?>" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="grado" class="col-sm-2 control-label">Grado</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="grado" name="grado" placeholder="Grado" value="<?php echo $row['grado']; ?>" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="carrera" class="col-sm-2 control-label">Carrera</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="carrera" name="carrera" placeholder="Carrera" value="<?php echo $crr; ?>" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="<?php echo $row['nombre']; ?>" disabled>
                    </div>
                </div>

                <div class="form-group">
                    <label for="carrera" class="col-sm-2 control-label">Observaciones</label>
                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" rows="4" cols="50" id="observaciones" name="observaciones" placeholder="Observaciones" charset="utf-8"><?php echo utf8_encode($row['observaciones']);?></textarea>
                    </div>
                </div>
				
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<a href="index.php" class="btn btn-default">Regresar</a>
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</div>
			</form>
		</div>
	</body>
</html>