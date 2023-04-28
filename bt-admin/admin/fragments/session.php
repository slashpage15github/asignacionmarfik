<?php
session_start();

if (!isset($_SESSION['usuario'])) {

	header('Location: /asignacionfs/login.php');
	exit();
}
?>
