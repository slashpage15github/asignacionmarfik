<?php
//session_start();
if (!isset($_SESSION['usuario']))
{
    header("Location: http://".$_SERVER['HTTP_HOST']."/http://www.sistemas.uadec.mx/asignacionfs/index.php");	
    exit;
} 
?>