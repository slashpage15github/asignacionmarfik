<?php
require_once 'config.php';
// require_once './config.php'; // TODO Revisar por qué no funciona.

function prepend_root($public_path) {
	return $_SERVER['DOCUMENT_ROOT'] . $public_path;
}

function get_dbh() {
	$dbh = new PDO('mysql:host=' . DB_SERVER . ';dbname=' . DB_NAME, DB_USERNAME, DB_PASSWORD, array(
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::MYSQL_ATTR_INIT_COMMAND => "set names 'utf8'"
	));
	return $dbh;
}

class Job {
	public $id;
	public $public;
	public $title;
	public $description;
	public $poster_ext;
	public $creation;
	public $modification;

	public $poster; // Información del archivo subido.

	public $poster_filename;
	public $poster_url;
	public $poster_url_thumbnail;

	public function __construct() {
		$this->init_calculated_props();
	}

	private function init_calculated_props() {
		$this->poster_filename = $this->id . '.' . $this->poster_ext;
		$this->poster_url = get_poster_url($this);
		$this->poster_url_thumbnail = get_poster_url($this, true);
	}
}

function get_extension($path) {
	// basename() may prevent filesystem traversal attacks;
	// further validation/sanitation of the filename may be appropriate
	$extension = pathinfo(basename($path), PATHINFO_EXTENSION);
	return $extension;
}

function persist_file($uploaded_file, $parent, $filename) {
	$destination = $parent . $filename;
	$successful = move_uploaded_file($uploaded_file['tmp_name'], $destination);
	if (!$successful) {
		throw new Exception('Posible ataque de subida de archivo.');
	}
}

function delete_file($parent, $filename) {
	$destination = $parent . $filename;
	if (!file_exists($destination)) {
		return;
	}
	$successful = unlink($destination);
	if (!$successful) {
		throw new Exception('No se pudo eliminar el archivo.');
	}
}

function get_poster_url($job, $thumbnail = false) {
	return ($thumbnail ? THUMBNAILS_DIR : UPLOADS_DIR) . $job->poster_filename;
}

function xss($string) {
	return htmlspecialchars($string);
}
?>
