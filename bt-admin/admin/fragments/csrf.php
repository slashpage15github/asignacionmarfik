<?php
session_start();

function _get_session_csrf_token() {
	if (!isset($_SESSION['SESSION_CSRF_TOKEN'])) {
		$key = '/ig^284+k./xMi]+4D';
		$_SESSION['SESSION_CSRF_TOKEN'] = hash_hmac('sha256', session_id(), $key);
	}
	return $_SESSION['SESSION_CSRF_TOKEN'];
}

function validate_session_csrf_token() {
	$token = $_POST['_csrftoken'];
	return md5($token) === md5($_SESSION['SESSION_CSRF_TOKEN']);
}

function insert_session_csrf_token() {
	$token = _get_session_csrf_token();
	echo '<input type="hidden" name="_csrftoken" value="' . $token . '">';
}
?>
