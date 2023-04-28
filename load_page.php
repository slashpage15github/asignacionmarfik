<?php if(!$_POST['pag']) die("0");

//$page =$_POST['page'];

if(file_exists('pag_slider.php'))
	include ('pag_slider.php');
else if (file_exists('pag_presentacion.php')) {
	echo file_get_contents('pag_presentacion.php');
} 
else echo '¡PÁGINA NO ENCONTRADA!';
?>