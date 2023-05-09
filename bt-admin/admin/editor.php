<?php
	require_once './fragments/session.php';
	require_once './fragments/csrf.php';
	require_once './fragments/config.php';
	require_once './fragments/common.php';
	require_once './fragments/thumbnail.php';

	$error_msg = '';
	$error_msg_title = '';
	$error_msg_description = '';
	$error_msg_poster = '';

	function persist_poster($job, $creation_mode) {
		if (!$creation_mode) {
			delete_poster($job);
		}

		$new_filename = $job->id . '.' . $job->poster_ext;
		$new_filepath = prepend_root(UPLOADS_DIR) . $new_filename;

		ini_set('memory_limit', '192M'); // TODO Revisar por qué require tanta memoria o si hay fugas.

		// Guardar la imagen original.
		if ($job->poster['size'] <= 500 * 1024) {
			persist_file($job->poster, prepend_root(UPLOADS_DIR), $new_filename);
		} else {
			list($image_width, $image_height) = getimagesize($job->poster['tmp_name']);
			if ($image_height > 1080 || $image_width > 1920) {
				compress_image($job->poster['tmp_name'], $new_filepath, max(1080, 1920));
			} else {
				compress_image($job->poster['tmp_name'], $new_filepath, $image_width, $image_height);
			}
		}
		// Guardar una miniatura.
		$thumbnail_dest = prepend_root(THUMBNAILS_DIR) . $new_filename;
		compress_image($new_filepath, $thumbnail_dest, 96, 128);
	}

	function delete_poster($job) {
		// Eliminar la imagen original.
		delete_file(prepend_root(UPLOADS_DIR), $job->poster_filename);
		// Eliminar la miniatura.
		delete_file(prepend_root(THUMBNAILS_DIR), $job->poster_filename);
	}

	function read($job) {
		try {
			$dbh = get_dbh();
			$query = 'select id, public, title, description, poster_ext, creation, modification from job where id = :id';
			$stmt = $dbh->prepare($query);
			$stmt->setFetchMode(PDO::FETCH_CLASS, 'Job');
			$stmt->bindValue(':id', $job->id, PDO::PARAM_INT);
			$stmt->execute();
			$obj = $stmt->fetch();
			return $obj ? $obj : null;
		} catch (PDOException $e) {
			throw new Exception('No se pudo leer el registro.');
		}
	}

	function perisist($job, $creation_mode) {
		try {
			$dbh = get_dbh();
			if ($creation_mode) {
				$query = 'insert into job (public, title, description, poster_ext, creation, modification) values (:public, :title, :description, :poster_ext, now(), now())';
			} else {
				$query = 'update job set public = :public, title = :title, description = :description, poster_ext = :poster_ext, modification = now() where id = :id';
			}
			$stmt = $dbh->prepare($query);
			$stmt->bindValue(':public', $job->public, PDO::PARAM_BOOL);
			$stmt->bindValue(':title', $job->title, PDO::PARAM_STR);
			$stmt->bindValue(':description', $job->description, PDO::PARAM_STR);
			$stmt->bindValue(':poster_ext', $job->poster_ext, PDO::PARAM_STR);
			if (!$creation_mode) {
				$stmt->bindValue(':id', $job->id, PDO::PARAM_INT);
			}
			$stmt->execute();
			if ($creation_mode) {
				// Nota: El driver del PDO debe soportar el método.
				$job->id = $dbh->lastInsertId();
			}
		} catch (PDOException $e) {
			throw new Exception('No se pudo guardar el registro.');
		}

		if ($job->poster) {
			// Es posible que se guarde el registro en la BD y no el archivo, pero para este punto esto solo ocurriría en situaciones anormales (por un ususario malicioso) sin representar un riesgo de seguridad, pero evitar esta falta de atomicidad DB-sistema de archivos complicaría la implementación y los beneficios ni siquiera serían notados por un usuario honesto.
			persist_poster($job, $creation_mode);
		}
	}

	function delete($job) {
		// Eliminar el registro de la BD.
		try {
			$dbh = get_dbh();
			$query = 'delete from job where id = :id';
			$stmt = $dbh->prepare($query);
			$stmt->bindValue(':id', $job->id, PDO::PARAM_INT);
			$stmt->execute();
		} catch (PDOException $e) {
			throw new Exception('No se pudo eliminar el registro.');
		}

		// Eliminar el cartel del sistema de archivos.
		try {
			delete_poster($job);
		} catch (Exception $e) {
			// No es grave para los usuarios porque el registro que apunta al cartel ya no estará disponible. El cartel se tendría que eliminar manualmente, pero dejarlo no representaría un problema de seguridad.
		}
	}

	/**
	 * Obtiene y prepara los valores de los campos del formulario.
	 */
	function get_input_fields() {
		$job = new Job();
		$job->id = intval($_GET['id']);
		if ($_SERVER['REQUEST_METHOD'] === 'GET') {
			// Para este caso solo se necesita saber el ID.
			return $job;
		}
		$job->public = isset($_POST['public']);
		$job->title = trim($_POST['title']);
		$job->description = trim($_POST['description']);
		// Dejar la propiedad para el cartel como nula si es que no se especificó uno.
		if ($_FILES['poster']['error'] !== UPLOAD_ERR_NO_FILE) {
			$job->poster = $_FILES['poster'];
		}
		return $job;
	}

	function validate_input_fields($job, $creation_mode) {
		global $valid_mime_types;
		global $valid_extensions;
		$errors = array();

		if (!$job->title) {
			$errors['title'] = 'Campo requerido.';
		} elseif (mb_strlen($job->title, 'UTF-8') > MAX_LENGTH_TITLE) {
			$errors['title'] = 'Número máximo de caracteres excedido.';
		}

		if (!$job->description) {
			$errors['description'] = 'Campo requerido.';
		} elseif (mb_strlen($job->description, 'UTF-8') > MAX_LENGTH_DESCRIPTION) {
			$errors['description'] = 'Número máximo de caracteres excedido.';
		}

		// Verificar el cartel.
		if ($job->poster) {
			switch ($job->poster['error']) {
				case UPLOAD_ERR_OK:
					$reported_type_valid = in_array($job->poster['type'], $valid_mime_types, true);
					if (!$reported_type_valid || !in_array($extension = mb_strtolower(get_extension($job->poster['name']), 'UTF-8'), $valid_extensions, true)) {
						$errors['poster'] = 'Formato de imagen no soportado.';
					} elseif ($job->poster['size'] > MAX_IMAGE_SIZE) {
						$errors['poster'] = 'Tamaño máximo de imagen excedido.';
					} else {
						// La extensión de la imagen del cartel se asigna aquí (y no en una función donde encaje mejor) porque apenas se verificó la validez del archivo y evita tener que calcular nuevamente la extensión en pasos posteriores cuando desde este punto ya se conoce.
						$job->poster_ext = $extension;
					}
					break;
				case UPLOAD_ERR_FORM_SIZE:
					$errors['poster'] = 'Tamaño máximo de imagen excedido.';
					break;
				case UPLOAD_ERR_PARTIAL:
					$errors['poster'] = 'Imagen subida parcialmente. Intente nuevamente.';
					break;
				default:
					$errors['poster'] = 'Problema en el servidor al subir la imagen.';
					break;
			}
		} elseif ($creation_mode) {
			// El cartel es requerido en la creación, pero es opcianal en las modificaciones aunque la imagen no exista (por algún cambio manual) en el sistema de archivos.
			$errors['poster'] = 'Campo requerido.';
		}

		return $errors;
	}

	function get_or_redirect($job) {
		$job = read($job);
		if ($job) {
			return $job;
		} else {
			// Posiblemente se modificó el parámetro del ID manualmente.
			redirect_to_index();
		}
	}

	function copy_modifiable_properties($job, $original_job) {
		$original_job->public = $job->public;
		$original_job->title = $job->title;
		$original_job->description = $job->description;
		$original_job->poster = $job->poster;
	}

	function get_safely($job) {
		$original_job = get_or_redirect($job);
		copy_modifiable_properties($job, $original_job);
		return $original_job;
	}

	$job = get_input_fields();
	$creation_mode = $job->id === 0;

	if ($_SERVER['REQUEST_METHOD'] === 'GET') { // Lectura
		if ($creation_mode) {
			// Configurar valores por defecto.
			$job->public = true;
		} else {
			try {
				$job = get_or_redirect($job);
			} catch (Exception $e) {
				$error_msg = 'No se pudo leer el registro.';
			}
		}
	} elseif (isset($_POST['deletion'])) { // Eliminación.
		prevent_csrf();
		try {
			$job = get_safely($job);
			delete($job);
			$_SESSION['successful'] = 'Registro eliminado exitosamente.';
			redirect_to_index();
		} catch (Exception $e) {
			$error_msg = 'No se pudo eliminar el registro.';
		}
	} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') { // Creación o modificación.
		prevent_csrf();
		try {
			// No provocar una redirección en el modo creación ante el ID no existente, 0.
			if (!$creation_mode) {
				$job = get_safely($job);
			}
			$input_fields_errors = validate_input_fields($job, $creation_mode);
			if ($input_fields_errors) {
				$error_msg = 'Revise los campos que no pasaron las validaciones.';
				$error_msg_title = array_key_exists('title', $input_fields_errors) ? $input_fields_errors['title'] : '';
				$error_msg_description = array_key_exists('description', $input_fields_errors) ? $input_fields_errors['description'] : '';
				$error_msg_poster = array_key_exists('poster', $input_fields_errors) ? $input_fields_errors['poster'] : '';
			} else {
				perisist($job, $creation_mode);
				$_SESSION['successful'] = $creation_mode ? 'Registro creado exitosamente.' : 'Registro modificado exitosamente.';
				redirect_to_index();
			}
		} catch (Exception $e) {
			$error_msg = $creation_mode ? 'No se pudo crear el registro.' : 'No se pudo modificar el registro.';
		}
	}

	function prevent_csrf() {
		if (!validate_session_csrf_token()) {
			redirect_to_index();
		}
	}

	function redirect_to_index() {
		header('Location: index.php');
		exit();
	}

	$page_title = $creation_mode ? 'Creación de oferta de trabajo' : 'Modificación de oferta de trabajo';
?>
<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?= $page_title ?></title>

	<!-- Bootstrap y su dependencia de JavaScript. -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" defer integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<style>
		.navbar-fixed-top ~ .container,
		.navbar-fixed-top ~ .container-fluid {
			margin-top: 60px;
		}
	</style>
</head>

<body>
	<?php include prepend_root('/asignacionfs/menu_privado.php') ?>

	<div class="container">
		<?php include './fragments/logos.php' ?>

		<a href="index.php" class="btn btn-default" style="margin-bottom: 20px;">Regresar</a>

		<form method="POST" enctype="multipart/form-data" class="form-horizontal">
			<?php if ($error_msg) { ?>
			<div class="alert alert-danger text-center" role="alert"><?= $error_msg ?></div>
			<?php } ?>

			<h1 class="text-center"><?= $page_title ?></h1>

			<div class="form-group">
				<div class="col-md-offset-2 col-md-10">
					<div class="checkbox">
						<label>
							<input type="checkbox" id="public" name="public"<?= $job->public ? ' checked' : '' ?>> Visible al público
						</label>
					</div>
				</div>
			</div>

			<div class="form-group<?= $error_msg_title ? ' has-error' : '' ?>">
				<label for="title" class="col-md-2 control-label">Título</label>
				<div class="col-md-10">
					<input type="text" class="form-control" id="title" name="title" value="<?= xss($job->title) ?>" required maxlength="<?= MAX_LENGTH_TITLE ?>" aria-describedby="title-help">

					<p class="help-block" id="title-help">
						Requerido. Máximo <?= MAX_LENGTH_TITLE ?> caracteres.
						<?php if ($error_msg_title) { ?>
						<br>
						Error: <?= $error_msg_title ?>
						<?php } ?>
					</p>
				</div>
			</div>

			<div class="form-group<?= $error_msg_description ? ' has-error' : '' ?>">
				<label for="description" class="col-md-2 control-label">Descripción</label>
				<div class="col-md-10">
					<textarea rows="5" class="form-control" id="description" name="description" required maxlength="<?= MAX_LENGTH_DESCRIPTION ?>" aria-describedby="description-help"><?= xss($job->description) ?></textarea>

					<p class="help-block" id="description-help">
						Requerido. Máximo <?= MAX_LENGTH_DESCRIPTION ?> caracteres.
						<?php if ($error_msg_description) { ?>
						<br>
						Error: <?= $error_msg_description ?>
						<?php } ?>
					</p>
				</div>
			</div>

			<div class="form-group<?= $error_msg_poster ? ' has-error' : '' ?>">
				<label for="poster" class="col-md-2 control-label">Cartel</label>
				<div class="col-md-10">
					<div style="border: 1px solid #ccc; border-radius: 4px; padding: 4px;">
						<!-- MAX_FILE_SIZE must precede the file input field -->
						<input type="hidden" name="MAX_FILE_SIZE" value="<?= MAX_IMAGE_SIZE ?>">
						<input type="file" id="poster" name="poster" accept="<?= implode(',', $valid_mime_types) ?>" <?= $creation_mode ? 'required ' : '' ?>aria-describedby="poster-help">

						<?php if (!$creation_mode) { ?>
						<a href="<?= $job->poster_url ?>" target="_blank" style="display: inline-block; margin-top: 1em;">
							<img src="<?= $job->poster_url_thumbnail ?>" alt="Cartel" width="96" height="128">
						</a>
						<?php } ?>
					</div>

					<p class="help-block" id="poster-help">
						<?= $creation_mode ? 'Requerido.' : 'Opcional.' ?> Imagen de tipo JPEG o PNG no mayor que <?= MAX_IMAGE_SIZE / 1024 / 1024 ?> MiB (<?= number_format(MAX_IMAGE_SIZE) ?> bytes).
						<?php if ($error_msg_poster) { ?>
						<br>
						Error: <?= $error_msg_poster ?>
						<?php } ?>
					</p>
				</div>
			</div>

			<?php if (!$creation_mode) { ?>
			<div class="form-group">
				<label for="creation" class="col-md-2 control-label">Fecha de creación</label>
				<div class="col-md-10">
					<input type="text" class="form-control" id="creation" value="<?= $job->creation ?>" readonly>
				</div>
			</div>

			<div class="form-group">
				<label for="modification" class="col-md-2 control-label">Fecha de modificación</label>
				<div class="col-md-10">
					<input type="text" class="form-control" id="modification" value="<?= $job->modification ?>" readonly>
				</div>
			</div>
			<?php } ?>

			<div class="form-group">
				<div class="col-md-offset-2 col-md-10" style="display: flex; justify-content: space-between;">
					<button type="submit" class="btn btn-primary">Guardar</button>
					<?php if (!$creation_mode) { ?>
					<button type="submit" class="btn btn-danger" name="deletion">Eliminar</button>
					<?php } ?>
				</div>
			</div>

			<?php insert_session_csrf_token() ?>
		</form>
	</div>
</body>

</html>
